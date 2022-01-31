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
    </style>
    <div class="wrp_my-box">
        <div class="container">
            @if(Auth::user()->role != 3 && Auth::user()->role != 1)
                <div class="bank-alert_box">
                    <span class="item_title">銀行振込が確認できておりません</span>
                    <span>受講料のご入金が確認がまだ完了しておりません、今しばらくお待ちください。<br>お振込みがお済みでない方はお手続きをよろしくお願いいたします。お振込先や受講料金についてはユーザー登録時に記入いただいたメールアドレスに記載があります。ご確認ください。</span>
                    <span>ご不明な点がございましたら、<a href="{{ route('contact') }}">こちら</a>にご連絡ください。</span>
                </div>
            @endif
            <div class="wrp_set-box">
                <div class="set-nav">
                    <div class="fx-bet fx-wrp">
                        <div class="tab active"><span>プロフィール</span></div>
                        <div class="tab"><span>お支払い情報</span></div>
                        <div class="tab"><span>学習履歴</span></div>
                    </div>
                </div>
                <div class="wrp_set-con">
                    <div class="tab-item show">
                        <form id="user_modify">
                            @csrf
                            <div class="wrp_prof-info">
                                <div class="img"><a id="profile-image-btn"> <img style="width: 160px" src="{{ isset(Auth::user()->image) ? asset(Auth::user()->image) : asset('images/no_img_head.png') }}" id="img_avatar"> </a></div>
                                <input type="file" id="avatar" class="profile-image-input" name="file" style="display: none">
                                <div class="name input"><span>ユーザー名</span> <input type="text" value="{{$user->username}}" name="username" required></div>
                                <div class="mail input"><span>メールアドレス</span> <input type="email" value="{{$user->email}}" name="email" required></div>
                                <div class="pass input"><span>パスワード</span> <input type="password" minlength="8" name="password" required></div>
                                <div class="wrp_gen-btn"><a class="gen-btn btn_submit" href="#">更新</a></div>
                                <div class="wrp_deact"><a class="deact" href="{{ route('withdrawal') }}">退会手続きはこちら</a></div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-item">
                        <div class="wrp_prof_pay">
                            <div class="pay_howto">
                                <div class="title"><span>お支払い方法</span></div>
                                <div class="content" id="pay_credit">
                                    <div class="flex fx-itc fx-wrp">
                                        @if($user->pay_setting == 1)
                                            <div class="icon"><img src="{{ asset('images/jcb.png') }}"></div>
                                            <div class="number"><span>{{$user->card_name}} {{$user->card_number}}</span></div>
                                            <div class="expiry"><span>有効期限：{{$user->card_month}}/{{$user->card_year}}</span></div>
                                            <div class="edit"><a href="#">編集</a></div>
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
                                                <div class="flex"><span class="day">{{ date('Y/m/d', strtotime($item->created_at)) }}</span> <span class="how">{{$item->type == 1 ? 'カード自動引落' : '銀行振込'}}</span>
                                                    <span class="price">{{ number_format($item->amount) }}円</span></div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-item">
                        <div class="wrp_prof_log">
                            @foreach($history as $item)
                                <div class="box">
                                    <div class="flex fx-itc fx-wrp">
                                        <div class="day">
                                            <span>{{ date('Y.m.d', strtotime($item->created_at)) }}<br class="sm-hidden">{{date('H:i', strtotime($item->created_at))}}</span>
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
    </div>
    <script type="text/javascript">
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
