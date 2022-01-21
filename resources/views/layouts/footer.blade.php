<footer id="footer">
    <div class="wrp-footer">
        <div class="container">
            <div class="fx-bet fx-wrp">
                <div class="foot-logo">
                    <a href="{{url('/')}}" title="b-Creator:21リニューアル_テスト" rel="home">
                        <img src="{{asset('images/f-logo.png')}}">
                    </a>
                </div>
                <div class="foot-box">
                    <div class="fx-bet fx-wrp">
                        <div class="foot-item">
                            <a href="{{url('/')}}">TOP</a>
                            <a href="{{route('about')}}">b-Creatorについて</a>
                            <a href="{{route('faq')}}">よくある質問</a>
                        </div>
                        <div class="foot-item">
                            <a href="{{route('price')}}">受講料金</a>
                            <a href="{{route('curriculum')}}">学習内容</a>
                            <a href="{{route('voice')}}">受講生の声</a>
                        </div>
                        <div class="foot-item">
                            <a href="{{route('discount')}}">割引一覧</a>
                            <a href="{{route('counseling')}}">無料カウンセリング</a>
                            @if(!isset(\Illuminate\Support\Facades\Auth::user()->email))
                                <a href="{{route('login')}}">ログイン</a>
                            @elseif(Auth::user()->role == 1)
                                <a href="{{route('master.dashboard')}}">ログイン</a>
                            @elseif(Auth::user()->role == 3)
                                <a href="{{route('mypage')}}">ログイン</a>
                            @else
                                <a href="{{route('setup')}}">ログイン</a>
                            @endif
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
