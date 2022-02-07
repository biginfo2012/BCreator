<x-user-layout>
    <style>
        .wrp_prof-info input[type="email"] {
            border: none;
            border-bottom: solid 1.5px #ccc;
            width: 100%;
        }

        .wrp_prof-info input[type="password"] {
            border: none;
            border-bottom: solid 1.5px #ccc;
            width: 100%;
        }

        .wrp_prof_log .box .tag .curriculum {
            background-color: #f39800;
        }
        .hide{
            display: none;
        }
    </style>
    <div class="wrp_my-box">
        <div class="container">
            @if(Auth::user()->role == 4)
                <div class="bank-alert_box">
                    <span class="item_title">銀行振込が確認できておりません</span>
                    <span>受講料のご入金が確認がまだ完了しておりません、今しばらくお待ちください。<br>お振込みがお済みでない方はお手続きをよろしくお願いいたします。お振込先や受講料金についてはユーザー登録時に記入いただいたメールアドレスに記載があります。ご確認ください。</span>
                    <span>ご不明な点がございましたら、<a href="{{ route('contact') }}">こちら</a>にご連絡ください。</span>
                </div>
            @endif
            <div class="wrp_set-box">
                <div class="set-nav">
                    <div class="{{Auth::user()->role != 2 ? 'fx-bet' : 'flex fx-coc'}} fx-wrp">
                        <div class="tab active"><span>プロフィール</span></div>
                        @if(Auth::user()->role != 2)
                            <div class="tab"><span>お支払い情報</span></div>
                        @endif
                        <div class="tab"><span>学習履歴</span></div>
                    </div>
                </div>
                <div class="wrp_set-con">
                    <div class="tab-item show">
                        <form id="user_modify">
                            @csrf
                            <div class="wrp_prof-info">
                                <div class="img"><a id="profile-image-btn"> <img style="width: 160px"
                                                                                 src="{{ isset(Auth::user()->image) ? asset(Auth::user()->image) : asset('images/no_img_head.png') }}"
                                                                                 id="img_avatar"> </a></div>
                                <input type="file" id="avatar" class="profile-image-input" name="file"
                                       style="display: none">
                                <div class="name input"><span>ユーザー名</span> <input type="text"
                                                                                  value="{{$user->username}}"
                                                                                  name="username" required></div>
                                <div class="mail input"><span>メールアドレス</span> <input type="email"
                                                                                    value="{{$user->email}}"
                                                                                    name="email" required></div>
                                <div class="pass input"><span>パスワード</span> <input type="password" minlength="8"
                                                                                  name="password" required></div>
                                <div class="wrp_gen-btn"><a class="gen-btn btn_submit" href="#">更新</a></div>
                                <div class="wrp_deact"><a class="deact" href="{{ route('withdrawal') }}">退会手続きはこちら</a>
                                </div>
                            </div>
                        </form>
                    </div>
                    @if(Auth::user()->role != 2)
                        <div class="tab-item">
                            <div class="wrp_prof_pay">
                                <div class="pay_howto">
                                    <div class="title"><span>お支払い方法</span></div>
                                    <div class="content" id="pay_credit">
                                        <div class="flex fx-itc fx-wrp">
                                            @if($user->pay_setting == 1)
                                                <div class="icon"><img src="{{ $user->card_brand == 'Visa' ? asset('images/payments/visa.svg') : asset('images/jcb.png') }}"></div>
                                                <div class="number">
                                                    <span>末尾 {{substr($user->card_number, -4)}}</span></div>
                                                <div class="expiry">
                                                    <span>有効期限：{{$user->card_month}}/{{$user->card_year}}</span></div>
                                                <div class="edit"><a data-toggle="modal"
                                                                     data-target="#creditModal">編集</a></div>
                                            @else
                                                <div class=""><span>銀行振込</span></div>
                                            @endif

                                        </div>
                                    </div>
                                    <!--                                     <div class="content" id="pay_bank">                                         <span class="bank"><i class="fas fa-university"></i>銀行振り込み</span>                                     </div> -->
                                </div>
                                <div class="pay_log">
                                    <div class="title">
                                        <div class="flex fx-bet fx-end"><span>お支払い内容</span> <span
                                                class="sub">分割回数：{{$pay_cnt}}回</span></div>
                                    </div>
                                    <div class="content">
                                        <div class="box">
                                            <div class="name">
                                                <div class="flex"><span class="day">お支払日</span> <span
                                                        class="how">お支払方法</span> <span class="price">お支払料金</span></div>
                                            </div>
                                            @foreach($pay as $item)
                                                <div class="item">
                                                    <div class="flex"><span
                                                            class="day">{{ date('Y/m/d', strtotime($item->created_at)) }}</span>
                                                        <span
                                                            class="how">{{$item->type == 1 ? 'カード自動引落' : '銀行振込'}}</span>
                                                        <span class="price">{{ number_format($item->amount) }}円</span>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="tab-item">
                        <div class="wrp_prof_log">
                            @foreach($history as $item)
                                <div class="box">
                                    <div class="flex fx-itc fx-wrp">
                                        <div class="day">
                                            <span>{{ date('Y.m.d', strtotime($item->created_at)) }}<br
                                                    class="sm-hidden">{{date('H:i', strtotime($item->created_at))}}</span>
                                        </div>
                                        <div class="tag">
                                            @if($item->type == 1)
                                                <span class="curriculum">カリキュラム</span>
                                            @elseif($item->type == 2)
                                                <span class="lesson">レッスン</span>
                                            @elseif($item->type == 3)
                                                <span class="review">復習</span>
                                            @else
                                                <span class="test">テスト</span>
                                            @endif
                                        </div>
                                        <div class="title">
                                            <span class="main">
                                                @if($item->type == 1)
                                                    {{$item->curriculum->title}}
                                                @elseif($item->type == 2)
                                                    {{$item->lesson->title}}
                                                @elseif($item->type == 3)
                                                    {{$item->review->title}}
                                                @else
                                                    {{$item->test->title}}
                                                @endif
                                            </span>
                                            <span class="sub">
                                                 @if($item->type == 2)
                                                    {{$item->lesson->comment}}
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="last_box"><span>過去30件を表示</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="creditModal" tabindex="-1" role="dialog" aria-labelledby="creditModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document" style="max-width: 500px">
                <form method="post" id="checkout_form" data-cc-on-file="false"
                      data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" role="form">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" id="creditModalLabel">お支払い方法</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" id="qr_image">
                            <div class="wrp-input-box mb-0">
                                <div class="in_box">
                                    <div class="content-ch how01">
                                        <div class="item cre-name">
                                            <input type="text" name="card_name" class="required " placeholder="カード名義人" size="4">
                                        </div>
                                        <div class="item cre-num">
                                            <input type="text" name="creditCardText" class="required card-number creditCardText" placeholder="カード番号" size="20" autocomplete="off">
                                            <input type="hidden" name="card_number" class="required card-number" placeholder="カード番号" size="20" autocomplete="off">
                                        </div>
                                        <div class="item cre-code">
                                            <input type="text" id="card_date" name="card_date" placeholder="有効期限 月/年" style="width: 48%; margin-right: 10px;">
                                            <input type="text" name="card_cvc" class="required card-cvc" placeholder="セキュリティコード" style="width: 48%;">
                                        </div>
                                        <input type="hidden" name="card_month" class="required card-month">
                                        <input type="hidden" name="card_year" class="required card-year">
                                        <div class='form-row row error hide'>
                                            <div class='col-md-12 form-group'>
                                                <div class='alert-danger alert'>Please correct the errors and try again.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" id="checkout_btn" class="btn btn-round">編集</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://js.stripe.com/v2/"></script>
    <script type="text/javascript">

        let pay_modify = '{{route('pay-modify')}}';
        $(document).ready(function() {
            var $form = $("#checkout_form");
            $('.creditCardText').keypress(function (e) {
                if($(this).val().length == 19){
                    e.preventDefault();
                }
            })
            $('.card-cvc').keypress(function (e) {
                if($(this).val().length == 4){
                    e.preventDefault();
                }
            })
            $('.creditCardText').keyup(function() {
                var foo = $(this).val().split(" ").join(""); // remove hyphens
                if (foo.length > 0) {
                    foo = foo.match(new RegExp('.{1,4}', 'g')).join(" ");
                }
                $(this).val(foo);
            });
            $('#card_date').keydown(function (e) {
                if (e.keyCode == 8) {
                    if($(this).val().length == 5){
                        let val = $(this).val().substring(0, 2);
                        console.log(val);
                        $(this).val(val);
                    }
                }
            })
            $('#card_date').keypress(function (e) {
                if($(this).val().length == 7){
                    e.preventDefault();
                }

            })
            $('#card_date').keyup(function () {
                var val = $(this).val();
                if(val.length == 2){
                    if(val.includes('/')){
                        if(val == ' /' || val == '/ '){
                            val = '';
                        }
                    }
                    else{
                        val = val + ' / ';
                    }
                }
                else if(val.length == 1){
                    if(val != 1 && val != 0 && !(val.includes('/'))){
                        val = '0' + val + ' / ';
                    }
                    else if(val == ' ' || val == '/'){
                        val = '';
                    }
                }
                else if(val.length == 3){
                    if(val == ' / '){
                        val = '';
                    }
                }
                $(this).val(val);
            })
            $('#checkout_btn').click(function (e) {
                e.preventDefault();
                if($('[name=card_name]').val() == ""){
                    $(document).find('input[name=card_name]').css('border-color', 'red');
                    return;
                }
                $(document).find('input[name=card_name]').css('border-color', '#ccc');
                console.log($('[name=card_number]').val());
                if($('[name=creditCardText]').val() == "" || $('[name=creditCardText]').val().length < 19 || $('[name=creditCardText]').val().length > 19){
                    $(document).find('input[name=creditCardText]').css('border-color', 'red');
                    return;
                }
                $(document).find('input[name=creditCardText]').css('border-color', '#ccc');
                var cardText = $('[name=creditCardText]').val().replaceAll(' ', '');
                $('[name=card_number]').val(cardText);

                var card_date = $('input[name=card_date]').val();
                var dateArr = card_date.split(' / ');
                if(dateArr.length<2 || dateArr.length>2){
                    $(document).find('input[name=card_date]').css('border-color', 'red');
                    return;
                }
                else{
                    if(dateArr[0] == "" || dateArr[0].length > 2){
                        $(document).find('input[name=card_date]').css('border-color', 'red');
                        return;
                    }
                    else if(dateArr[1] == "" || dateArr[1].length > 2){
                        $(document).find('input[name=card_date]').css('border-color', 'red');
                        return;
                    }
                    else{
                        $('[name=card_month]').val(dateArr[0]);
                        $('[name=card_year]').val(dateArr[1]);
                    }
                }
                $(document).find('input[name=card_date]').css('border-color', '#ccc');

                if($('[name=card_cvc]').val() == "" || $('[name=card_cvc]').val().length > 4){
                    $(document).find('input[name=card_cvc]').css('border-color', 'red');
                    return;
                }
                $(document).find('input[name=card_cvc]').css('border-color', '#ccc');
                if (!$form.data('cc-on-file')) {
                    e.preventDefault();
                    console.log("d")
                    Stripe.setPublishableKey($form.data('stripe-publishable-key'));

                    Stripe.createToken({
                        number: $('.card-number').val(),
                        cvc: $('.card-cvc').val(),
                        exp_month: $('.card-month').val(),
                        exp_year: $('.card-year').val()
                    }, stripeResponseHandler);
                }
            });
            function stripeResponseHandler(status, response) {
                if (response.error) {
                    if(response.error.code == 'invalid_number'){
                        $('.error')
                            .removeClass('hide')
                            .find('.alert')
                            .text('カード関連情報を数字形式で入力してください。');
                    }
                    if(response.error.code == 'incorrect_number'){
                        $('.error')
                            .removeClass('hide')
                            .find('.alert')
                            .text('カード番号が正しくありません。');
                    }
                    if(response.error.code == 'invalid_expiry_year'){
                        $('.error')
                            .removeClass('hide')
                            .find('.alert')
                            .text('カードの有効期限(年)は無効です。');
                    }
                    if(response.error.code == "invalid_expiry_month"){
                        $('.error')
                            .removeClass('hide')
                            .find('.alert')
                            .text('カードの有効期限(月)は無効です。');
                    }
                    if(response.error.code == "invalid_cvc"){
                        $('.error')
                            .removeClass('hide')
                            .find('.alert')
                            .text('セキュリティコードが無効です。');
                    }
                    console.log(response)

                } else {
                    /* token contains id, last4, and card type */
                    var token = response['id'];
                    $form.find('input[type=text]').empty();
                    var brand = response['card']['brand'];
                    $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                    $form.append("<input type='hidden' name='card_brand' value='" +  + "'/>");
                    //$form.get(0).submit();
                    saveForm('checkout_form', pay_modify, true)
                }
            }
        });

        $(document).ready(function () {
            $('.btn_submit').click(function (e) {
                e.preventDefault();
                saveForm('user_modify', user_modify, true)
            })
            $('#profile-image-btn').click(function () {
                $('#avatar').click()
            });
            $('#avatar').change(function () {
                var files = $('#avatar')[0].files;
                // FileReader support
                if (FileReader && files && files.length) {
                    var fr = new FileReader();
                    fr.onload = function () {
                        document.getElementById('img_avatar').src = fr.result;
                    }
                    fr.readAsDataURL(files[0]);
                }
            })
        })
    </script>
</x-user-layout>
