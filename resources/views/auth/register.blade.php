<x-guest-layout>
    <x-register-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="wrp-input-box">
                <div class="box name">
                    <input type="text" name="firstMame" placeholder="姓">
                    <input type="text" name="lastName" placeholder="名">
                </div>
                <div class="item mail">
                    <input type="email" name="email" placeholder="メールアドレス">
                </div>
                <div class="item pass">
                    <input type="password" name="password" placeholder="パスワード">
                </div>
                <div class="item save">
                    <label><input type="checkbox" name="check"><a
                            href="">利用規約</a>に同意する</label>
                </div>
            </div>
            <div class="box">
                <button class="regist-btn">登録する</button>
            </div>

        </form>
    </x-register-card>
</x-guest-layout>
