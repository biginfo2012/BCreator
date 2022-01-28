<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Card;
use App\Models\Payment;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rules;
use Stripe\Charge;
use Stripe\Customer;
use Stripe\Exception\CardException;
use Stripe\Stripe;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', Rules\Password::defaults()],
        ], ['email.unique' => '既に存在するユーザーです。']);

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->givePermissionTo('user');
//        event(new Registered($user));
//
//        Auth::login($user);

//        return redirect(RouteServiceProvider::CHECKOUT);
        $user_id = $user->id;
        $password = $request->password;
        return view('auth.checkout', compact('user_id', 'password'));
    }

    public function checkout(Request $request){
        $user_id = $request->user_id;
        $user = User::where('id', $user_id)->first();
        $password = $request->password;
        if($request->pay_setting == 2){
            User::where('id', $user_id)->update(['pay_setting' => $request->pay_setting, 'role' => 4]);
            $details =[
                'first_name' => $user->first_name,
                'last_name' => $user->last_name,
                'email' => $user->email,
                'password' => $password
            ];

            sendBankRegisterEmail($details, $user->email);
            return view('auth.register-complete', compact('user', 'password'));
        }
        else{
            Stripe::setApiKey(env('STRIPE_SECRET'));
            $stripe_token = $request->stripeToken;
            if($request->segment == 0){
                $price = 338000;
            }
            else if($request->segment == 3){
                $price = 112200;
            }
            else if($request->segment == 6){
                $price = 56750;
            }
            else if($request->segment == 12){
                $price = 28850;
            }
            else{
                $price = 14800;
            }

            $cus_id = null;
            $error = null;
            try {
                $customer = Customer::create([
                    'email' => $user->email,
                    'source' => $stripe_token
                ]);
                $cus_id = $customer->id;

            } catch (CardException $e) {
                $body = $e->getJsonBody();
                $err = $body['error'];
                $error = 'Customer ' . $user->email . ': error: ' . $err['code'];
                Log::error('CardException: ' . $e);
            } catch (\Exception $e) {
                $error = 'Stripe Api Issue :' . $e->getCode();
                Log::error('Exception: ' . $e);
            }

            if ($error != null) {
                Log::error('$error: ' . $error);
                session()->flash('error', $error);
                return view('auth.checkout', compact('user_id', 'password'));
            }

            try {
                $customerInfo = Customer::retrieve($cus_id);
//            $cardinfo = $customerInfo->sources->data;
//            $card_number = $cardinfo[0]->id;
//            $countryCode = $cardinfo[0]->country;
//            $card = $customerInfo->sources->retrieve($card_number);
//            $card->name = $name;
//            $card->save();

                $cardInfo = [
                    'email' => $user->email,
                    'stripe_cus_id' => $cus_id
                ];
                Card::updateOrCreate(['user_id' => $user_id], $cardInfo);
            } catch (CardException $e) {
                $body = $e->getJsonBody();
                $err = $body['error'];
                $error = 'Customer ' . $user->email . ': error: ' . $err['code'];
                Log::error('139CardException: ' . $e);
            } catch (\Exception $e) {
                $error = 'Stripe Api Issue :' . $e->getCode();
                Log::error('142Exception: ' . $e);
            }
            if ($error != null) {
                $cu = Customer::retrieve($cus_id);
                $cu->delete();
                Log::error('147$error: ' . $error);
                session()->flash('error', $error);
                return view('auth.checkout', compact('user_id', 'password'));
            }

            try {
                $charge = Charge::create([
                    "amount" => $price * 100,
                    "currency" => "JPY",
                    "customer" => $cus_id,
                    "capture" => false,
                    'description' => "Buying Chips"
                ]);

                $source = $charge->source;

                $ch_id = $charge->id;
                $status = $charge->status;
                $payment_method = $charge->payment_method;
                $out = $charge->outcome;
                if ($out->reason == 'elevated_risk_level') {
                    $error = 'Your card was declined. Please try with another card';
                } else if ($out->reason == 'highest_risk_level') {
                    $error = 'Your card was declined. Please try with another card';
                } else if ($out->reason == 'merchant_blacklis') {
                    $error = 'Your card was declined. Please try with another card';
                } else if ($source->funding == 'prepaid') {
                    $error = 'Sorry, but we dont allow prepaid Cards. Please use a credit / debit valid card';
                }

                if (strpos($ch_id, 'ch_') === false || $charge->failure_message != '') {
                    $error = $charge->failure_message;
                }
                if ($error != null) {
                    $cu = Customer::retrieve($cus_id);
                    $cu->delete();
                    session()->flash('error', $error);
                    return view('auth.checkout', compact('user_id', 'password'));
                }

            } catch (CardException $e) {
                $body = $e->getJsonBody();
                $err = $body['error'];
                $error = 'Customer ' . $user->email . ': error: ' . $err['code'];
                if ($err['decline_code'] == 'do_not_honor') {
                    $error = 'Your card don\'t have funds or isn\'t active';
                }
            } catch (\Exception $e) {
                $error = 'The card validation cant be executed at this moment. Please retry later';
            }
            if ($error != null) {
                $cu = Customer::retrieve($cus_id);
                $cu->delete();
                session()->flash('error', $error);
                return view('auth.checkout', compact('user_id', 'password'));
            }

            //write payment log
            $log = [
                'user_id' => $user_id,
                'amount' => $price,
                'status' => $status,
                'paid_date' => date('Y-m-d'),
                'payment_id' => $ch_id,
                'payment_method' => $payment_method,
                'good_id' => $request->good
            ];
            Payment::create($log);

            $data = [
                'card_name' => $request->card_name,
                'card_number' => $request->card_number,
                'card_month' => $request->card_month,
                'card_year' => $request->card_year,
                'card_cvc' => $request->card_cvc,
                'segment' => $request->segment,
                'role' => 3
            ];
            User::where('id', $user_id)->update($data);

            session()->flash('payment_success', 1);

            $password = $request->password;

            $details =[
                'first_name' => $user->first_name,
                'last_name' => $user->last_name,
                'email' => $user->email,
                'password' => $password
            ];

            sendRegisterEmail($details, $user->email);

            return view('auth.register-complete', compact('user', 'password'));
        }

    }
}
