<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="wrp-input-box">
                <!-- Email Address -->
                <div class="item mail">
                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus placeholder="メールアドレス"/>
                </div>
                <!-- Password -->
                <div class="item pass">
                    <x-input id="password" class="block mt-1 w-full"
                             type="password"
                             name="password"
                             required autocomplete="current-password" placeholder="パスワード"/>
                </div>
                <!-- Remember Me -->
                <div class="item save">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                        ログイン情報を保存する
                    </label>
                </div>
            </div>
            <div class="box">
                <button class="login-btn">ログイン</button>
                <span class="forgot">パスワードを忘れた場合は<a href="{{ route('password.request') }}">こちら</a></span>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
