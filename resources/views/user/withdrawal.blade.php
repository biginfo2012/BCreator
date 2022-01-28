<x-user-layout>
    <div class="fix-box" id="withdrawal">
        <div class="container">
            <div class="title mb-3">
                <span class="main">退会手続き</span>
                <span class="sub">【ご注意】</span>
                <ul>
                    <li>分割払いの残債分は継続し同様に支払いが発生いたします。</li>
                    <li>退会手続き完了後のキャンセルは一切受け付けておりません。</li>
                </ul>
            </div>
            <div class="content">
                <div class="wrp_reserve_input">
                    <form method="POST" action="{{ route('user-exit') }}">
                        @csrf
                        <div class="box">
                            <div class="flex fx-bet fx-itc fx-wrp">
                                <div class="name">
                                    <div class="flex">
                                        <span class="require">必須</span>
                                        <span>退会理由</span>
                                    </div>
                                </div>
                                <div class="reserve_input">
                                    <div class="wrp_select">
                                        <select class="is-empty" name="reason" required>
                                            <option disabled selected style="display:none;" value="">お選びください</option>
                                            <option value="利用したいコンテンツが少なかった">利用したいコンテンツが少なかった</option>
                                            <option value="サイトが使いにくかった">サイトが使いにくかった</option>
                                            <option value="それほど利用しなかった">それほど利用しなかった</option>
                                            <option value="役に立たなかった">役に立たなかった</option>
                                            <option value="今後利用しないから">今後利用しないから</option>
                                            <option value="その他">その他</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box">
                            <div class="flex fx-bet fx-wrp">
                                <div class="name">
                                    <div class="flex">
                                        <span class="require">必須</span>
                                        <span>コメント</span>
                                    </div>
                                </div>
                                <div class="reserve_input">
                                    <textarea rows="10" cols="60" placeholder="ここに記入してください" name="comment" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="box_btn">
                            <span><input type="checkbox" name="check"><a href="#">個人情報の取り扱いについて</a>にご同意頂いた上で、<br class="pc-hidden">下記ボタンよりお申し込みを完了ください</span>
                            <button type="submit" class="send_btn border-0" id="send_btn" disabled>退会する</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            $('[name=check]').change(function () {
                if($(this).is(":checked")){
                    $('#send_btn')[0].disabled = false;
                }
                else{
                    $('#send_btn')[0].disabled = true;
                }
            })
        })
    </script>
</x-user-layout>
