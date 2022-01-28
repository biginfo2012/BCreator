<?php

namespace App\Http\Requests\Auth;

use App\Models\User;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => ['required', 'string'],
            'password' => ['required', 'string'],
        ];
    }

    /**
     * Attempt to authenticate the request's credentials.
     *
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function authenticate()
    {
        $this->ensureIsNotRateLimited();

        $user_email = User::where('email', $this->input('email'))->first();
        $user_name = User::where('username', $this->input('email'))->first();
        if(isset($user_email)){
            if($user_email->exit == 1){
                throw ValidationException::withMessages([
                    'email' => __('auth.exit'),
                ]);
            }
            else if($user_email->status == 0 || isset($user_email->deleted_at)){
                throw ValidationException::withMessages([
                    'email' => __('auth.stop'),
                ]);
            }
        }
        if(isset($user_name)){
            if($user_name->exit == 1){
                throw ValidationException::withMessages([
                    'email' => __('auth.exit'),
                ]);
            }
            else if($user_name->status == 0 || isset($user_name->deleted_at)){
                throw ValidationException::withMessages([
                    'email' => __('auth.stop'),
                ]);
            }
        }
        Log::info('login part');

        if (! Auth::attempt($this->only('email', 'password'), $this->boolean('remember'))) {
            $user = User::where('username', $this->input('email'))->first();
            if(isset($user)){
                $email = $user->email;
                Log::info('$email:' .$email);
                if(! Auth::attempt(['email' => $email, 'password' => $this->input('password')], $this->boolean('remember'))){
                    RateLimiter::hit($this->throttleKey());

                    throw ValidationException::withMessages([
                        'email' => __('auth.failed'),
                    ]);
                }
            }
            else{
                RateLimiter::hit($this->throttleKey());

                throw ValidationException::withMessages([
                    'email' => __('auth.failed'),
                ]);
            }

        }
        Log::info('clear part');
        RateLimiter::clear($this->throttleKey());
    }

    /**
     * Ensure the login request is not rate limited.
     *
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function ensureIsNotRateLimited()
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout($this));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the rate limiting throttle key for the request.
     *
     * @return string
     */
    public function throttleKey()
    {
        return Str::lower($this->input('email')).'|'.$this->ip();
    }
}
