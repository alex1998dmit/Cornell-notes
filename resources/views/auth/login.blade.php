@extends('layouts.app')

@section('content')
<main role="main">
    <div class="container">
        <div class="row justify-content-center mt-5 pb-5">
            <div class="col-12 col-sm-8 col-md-7 col-lg-4">
                <div class="card register-card shadow">
                    <div class="card-body">
                        <h1 class="h3 mb-4 mt-3 text-center">{{ __('Вход') }}</h1>
                        <form method="POST" action="{{ route('login') }}" enctype="multipart/form-data">
                            @csrf
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
                            <div class="my-2 text-right">
                                <a class="x-link-only-hover" href="{{ route('password.request') }}">
                                    {{ __('Забыли пароль?') }}
                                </a>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">{{ __('Войти') }}</button>
                        </form>
                    </div>
                    <div class="card-footer py-4 border-top-0 text-center">
                        <span class="text-muted">{{ __('Нет аккаунта?') }}</span>
                        <span class="font-weight-bolder"><a class="x-link-only-hover" href="{{ route('login') }}">{{ __('Зарегистрироваться') }}</a></span>
                        </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
