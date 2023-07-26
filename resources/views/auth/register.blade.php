@extends('layouts.layout_auth')

@section('content')
    <div class="login-form">
        {{-- <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card"> --}}
        <div class="card-header">ユーザ登録</div>

        <div class="card-body">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="input-item mb20">
                    <label for="name" class="item-label">お名前</label>

                    <div class="input-box">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror "
                            name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="input-item mb20">
                    <label for="email" class="item-label">メールアドレス</label>

                    <div class="input-box">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email">

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
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password" required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="input-item mb20">
                    <label for="password-confirm" class="item-label">パスワード確認</label>

                    <div class="input-box">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                            required autocomplete="new-password">
                    </div>
                </div>

                <div class="input-item mb20">
                    <div class="item-label">
                        <button type="submit" class="btn btn-primary">登録
                        </button>
                    </div>
                </div>
            </form>
        </div>
        {{-- </div>
            </div>
        </div> --}}
    </div>
@endsection
