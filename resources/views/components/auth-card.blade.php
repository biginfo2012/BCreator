<div class="fix-box bg_white" id="login">
    <div class="container">
        <div class="login-box">
            <div class="title">
                {{ $logo }}
                <span>ログイン</span>
            </div>
            {{ $slot }}
        </div>
        <div class="wrp-new-class">
            <a href="{{ route('register') }}">b-Creator新規受講はこちら</a>
        </div>
    </div>
</div>
