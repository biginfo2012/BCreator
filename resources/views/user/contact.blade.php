<x-user-layout>
    <div class="fix-box" id="contact">
        <div class="container">
            <div class="title">
                <span class="main">お問い合わせ</span>
                <span class="sub">【ご注意】</span>
                <ul>
                    <li>お問合せの内容により、返信に時間を要する場合や、回答しかねる場合がございます。</li>
                    <li>回答内容の一部または全部の転用、二次利用はご遠慮ください。</li>
                </ul>
            </div>
            <div class="content">
                <form method="POST" action="{{ route('contact-complete') }}">
                    @csrf
                    <div class="wrp_reserve_input">
                        <div class="box">
                            <div class="flex fx-bet fx-itc fx-wrp">
                                <div class="name">
                                    <div class="flex">
                                        <span class="require">必須</span>
                                        <span>お名前</span>
                                    </div>
                                </div>
                                <div class="reserve_input double">
                                    <input type="text" name="first_name" placeholder="姓" autocomplete="family-name">
                                    <input type="text" name="last_name" placeholder="名" autocomplete="given-name">
                                </div>
                            </div>
                        </div>
                        <div class="box">
                            <div class="flex fx-bet fx-itc fx-wrp">
                                <div class="name">
                                    <div class="flex">
                                        <span class="require">必須</span>
                                        <span>メールアドレス</span>
                                    </div>
                                </div>
                                <div class="reserve_input">
                                    <input type="email" name="email" placeholder="メールアドレス" autocomplete="email">
                                </div>
                            </div>
                        </div>
                        <div class="box">
                            <div class="flex fx-bet fx-wrp">
                                <div class="name">
                                    <div class="flex">
                                        <span class="require">必須</span>
                                        <span>ご用件</span>
                                    </div>
                                </div>
                                <div class="reserve_input">
                                    <textarea rows="10" cols="60" placeholder="ここに記入してください" name="detail"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="box_btn">
                            <span><input type="checkbox" name="check"><a href="#">個人情報の取り扱いについて</a>にご同意頂いた上で、<br class="pc-hidden">下記ボタンよりお申し込みを完了ください</span>
                            <button class="send_btn border-0" id="btn_send_contact" disabled>送信する</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            $('[name=check]').change(function () {
                if($(this).is(":checked")){
                    $('#btn_send_contact')[0].disabled = false;
                }
                else{
                    $('#btn_send_contact')[0].disabled = true;
                }
            })
        })
    </script>
</x-user-layout>
