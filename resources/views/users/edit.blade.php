@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <h3 class="col-md-8 mb-3 text-center text-muted">プロフィール編集</h3>

        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                  <form action="{{ url('users/' .$user->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group row align-items-center">
                      <label for="profile_image" class="col-md-4 col-form-label text-md-right">{{ __('Profile Image') }}</label>

                      <div class="col-md-6 d-flex align-items-center">
                        <img src="{{ asset('storage/profile_image/' .$user->profile_image) }}" class="mr-2 rounded-circle" width="50" height="50" alt="profile_image">
                        <input type="file" name="profile_image" class="@error('profile_image') is-invalid @enderror" autocomplete="profile_image">

                      </div>
                    </div>
                    @error('profile_image')
                      <div class="alert alert-danger text-center">
                        <strong>ファイルをご確認ください</strong>
                      </div>
                    @enderror

                    <div class="form-group row">
                      <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                      <div class="col-md-6">
                        <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>
                        @error('name')
                        <div class="alert alert-danger">
                          <strong>{{ $message }}</strong>
                        </div>
                        @enderror
                      </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>
                        <div class="col-md-6">
                          <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">
                          @error('email')
                          <div class="alert alert-danger">
                            <strong>{{ $message }}</strong>
                          </div>
                          @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                      <div class="mt-4 col-md-6 offset-md-4">
                        @if($user->email == 'a@a.com')
                        <p type="" class="btn btn-primary">更新する</p>
                        <p>ポートフォリオ閲覧用ユーザーは更新できません</p>
                        @else
                        <button type="submit" class="btn btn-primary">更新する</button>
                        @endif

                        @if (Route::has('password.request'))
                        @if($user->email == 'a@a.com')
                        <p class="btn btn-primary">パスワードの変更はこちら</a>
                          <p>ポートフォリオ閲覧用ユーザーは変更できません</p>

                          @else
                            <button class="btn btn-primary"><a class="text-white" href="{{ route('password.request') }}">パスワードの変更はこちら</a></button>
                            @endif
                        @endif
                      </div>
                    </div>
                    </form>

                    <div class="form-group row mb-0">
                      <div class="col-md-6 offset-md-4">
                    <form method="POST" action="{{ url('users/' .$user->id) }}" class="mb-0">
                     @csrf
                     @method('DELETE')
                     @if($user->email == 'a@a.com')
                     <p class="mt-2 btn btn-danger">アカウント削除</p>
                     <p>ポートフォリオ閲覧用ユーザーは削除できません</p>
                     @else
                      <button type="submit" class="mt-2 btn btn-danger">アカウント削除</button>
                      @endif
                      </div>
                    </div>
                    </form>


                </div>
              </div>
            </div>
          </div>
        </div>
@endsection
