{{--<footer id="footer">--}}
{{--    <div class="wrp-footer">--}}
{{--        <div class="container">--}}
{{--            <div class="fx-bet fx-wrp">--}}
{{--                <div class="foot-logo"><a href="{{ url('') }}" title="b-Creator:21リニューアル_テスト" rel="home">--}}
{{--                        <img src="{{ asset('images/f-logo.png') }}"> </a></div>--}}
{{--                <div class="foot-box">--}}
{{--                    <div class="fx-bet fx-wrp">--}}
{{--                        <div class="foot-item">--}}
{{--                            <a href="{{ url('') }}">TOP</a>--}}
{{--                            <a href="{{ route('about') }}">b-Creatorについて</a>--}}
{{--                            <a href="{{ route('faq') }}">よくある質問</a>--}}
{{--                            <a href="{{ route('price') }}">受講料金</a>--}}
{{--                        </div>--}}
{{--                        <div class="foot-item"><a href="{{ route('about') }}">b-Creatorについて</a></div>--}}
{{--                        <div class="foot-item"><a href="{{ route('about') }}">b-Creatorについて</a></div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="copy">--}}
{{--        <div class="container"><span>Copyright © hinata All rights reserved</span></div>--}}
{{--    </div>--}}
{{--</footer>--}}

<footer id="footer">
    <div class="wrp-footer">
        <div class="container">
            <div class="fx-bet fx-wrp">
                <div class="foot-logo">
                    <a href="{{ url('') }}" title="b-Creator:21リニューアル_テスト" rel="home">
                        <img src="{{ asset('images/f-logo.png') }}">
                    </a>
                </div>
                <div class="foot-box">
                    <div class="fx-bet fx-wrp">
                        <div class="foot-item">
                            <a href="{{ url('') }}">ダッシュボード</a>
                            @if(Auth::user()->role != 4)
                                <a href="{{ route('archive-curriculum') }}">カリキュラム一覧</a>
                                <a href="{{ route('archive-test') }}">テスト一覧</a>
                            @endif

                        </div>
                        <div class="foot-item">
                            <a href="{{ route('setup') }}">アカウント設定</a>
                            <a href="{{ route('myfaq') }}">ヘルプ</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a style="color: white;" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                    ログアウト
                                </a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copy">
        <div class="container">
            <span>Copyright © hinata All rights reserved</span>
        </div>
    </div>
</footer>
