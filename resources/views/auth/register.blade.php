@extends('layouts.app')

@section('content')
<!--<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row">
                                <label for="avatar" class="col-md-4 col-form-label text-md-right">Avatar</label>

                                <div class="col-md-6">
                                    <input id="avatar" type="file" class="form-control" name="avatar">
                                </div>
                            </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>-->
<main role="main">
    <div class="container">
        <div class="row justify-content-center mt-5 pb-5">
            <div class="col-12 col-sm-8 col-md-7 col-lg-4">
                <div class="card register-card shadow border-top border-primary">
                    <div class="card-body">
                        <h1 class="h3 mb-4 mt-3 text-center">{{ __('Регистрация') }}</h1>
                        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group string required">
                                <input class="form-control string form-control{{ $errors->has('name') ? ' is-invalid' : '' }} required" autofocus="autofocus" placeholder="{{ __('имя') }}" type="text" name="name" id="name" value="{{ old('name') }}">
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="form-group email required">
                                <input class="form-control string email form-control{{ $errors->has('email') ? ' is-invalid' : '' }} required" placeholder="{{ __('e-mail') }}" type="email" name="email" id="email" value="{{ old('email') }}">
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="form-group password required">
                                <input class="form-control password form-control{{ $errors->has('password') ? ' is-invalid' : '' }} required" placeholder="{{ __('пароль') }}" type="password" name="password" id="password">
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <div class="form-group password required">
                                <input class="form-control password form-control required" placeholder="{{ __('введите пароль ещё раз') }}" type="password" name="password_confirmation" id="password_confirmation">
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Зарегистрироваться</button>
                        </form>
                    </div>
                    <div class="card-footer py-4 border-top-0 text-center">
                        <span class="text-muted">Уже есть аккаунт?</span>
                        <span class="font-weight-bolder"><a class="x-link-only-hover" href="{{ route('login') }}">Войти</a></span>
                        </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
