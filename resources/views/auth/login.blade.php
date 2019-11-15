@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-light bg-light">
                <h1 class="col-md-12 text-center custom-form my-4">{{ __('Login') }}</h1>

                <div class="card-body h5 custom-form">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-default btn-outline-dark mt-2" style="font-weight:800;">ログインする</button>

                                @if (Route::has('password.request'))
                                    <p><a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a></p>

                                @endif
                            </div>
                        </div>
                    </form>

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                    <form action="{{ route('login') }}" method="post">
                      @csrf
                      <input type="hidden" name="email" value='a@a.com'>
                      <input type="hidden" name="password" value='aaaaaaaa'>
                      <button type="submit" class="btn btn-warning btn-outline-dark mt-2" style="font-weight:800;">簡単ログイン（ポートフォリオ閲覧用）</button>
                    </form>
                  </div>
              </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
