@extends('layouts.layout_auth')

@section('content')
    <dlayouts.iv class="login-form">

        <h2 class="card-header">ログイン画面</h2>

        <div class="card-body">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="input-item mb20">
                    <label for="email" class="item-label">メールアドレス</label>

                    <div class="input-box">
                        <input type="email" name="email" value="{{ old('email') }}" required autocomplete="email"
                            autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="input-item mb20">
                    <label for="password" class="item-label">パスワード</label>

                    <div class="input-box">
                        <input id="password" type="password" name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="input-item mb20">
                    <div class="remember-box">
                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label for="remember">
                            パスワードを覚える
                        </label>

                    </div>
                </div>

                <div class="input-item mb20">
                    <div class="remember-box">
                        <button type="submit" class="btn btn-primary">
                            ログイン
                        </button>
                    </div>
                </div>
                {{-- <div class="input-item mb20">
                    <div class="pass-reset">
                        @if (Route::has('password.request'))
                            パスワード忘れた方は<a class="btn-link"
                                href="{{ route('password.request') }}"><span>パスワード再設定</span></a>をクリックしてください。
                        @endif
                    </div>
                </div> --}}
            </form>
        </div>

    </dlayouts.iv>
@endsection
