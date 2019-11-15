@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <h3 class="col-md-8 mb-3 text-center text-muted">本棚に飾る（新規投稿）</h3>

        <div class="col-md-8">
           <div class="card">

              <div class="card-body">
                <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-froup row mb-0">
                      <div class="col-md-12 p-3 w-100 d-flex">
                        <img src="{{ asset('storage/profile_image/' .$user->profile_image) }}" class="rounded-circle" width="50" height="50">
                        <div class="ml-2 d-flex flex-column">
                          <p class="mb-0">{{ $user->name }} </p>
                          <a href="{{ url('users/ .$user-id') }}" class="text-secondary">{{ $user->id}}</a>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <textarea placeholder="タイトル" name="title" class="form-control mb-3" required autocomplete="title" rows="1">{{ old('title') }}</textarea>
                        <textarea placeholder="著者" name="author" class="form-control mb-3" required autocomplete="author" rows="1">{{ old('author') }}</textarea>
                        <select name="category" class="form-control mb-3">
                         @foreach(config('category') as $key => $category)
                          @if(old('category') == $key)
                          <option value="{{ $key }}" selected="selected">{{ $category['label'] }}</option>
                          @else
                          <option value="{{ $key }}">{{ $category['label'] }}</option>
                          @endif
                         @endforeach
                          </select>
                        <select name="recommend" class="form-control mb-3">
                         @foreach(config('recommend') as $key => $recommend)
                          @if(old('recommend') == $recommend['label'])
                          <option value="{{ $recommend['label'] }}" selected="selected">{{ $recommend['label'] }}</option>
                          @else
                          <option value="{{ $recommend['label'] }}">{{ $recommend['label'] }}</option>
                          @endif
                         @endforeach
                          </select>
                        <textarea placeholder="メモ・感想・紹介文などを自由に入力してください" name="text" class="form-control mb-3" required autocomplete="text" rows="4">{{ old('text') }}</textarea>
                      </div>

                      <div class="form-group row align-items-center">
                        <label for="product_image" class="col-md-4 col-form-label text-md-right">本の画像</label>

                        <div class="col-md-6 d-flex align-items-center">
                          <input type="file" name="product_image" class="@error('product_image') is-invalid @enderror" autocomplete="product_image">

                        </div>
                      </div>
                      @error('product_image')
                        <div class="alert alert-danger text-center">
                          <strong>ファイルをご確認ください</strong>
                        </div>
                      @enderror
                    </div>

                    <div class="form-group row mb-0">
                      <div class="col-md-12 text-right">
                      <button type="submit" class="btn btn-primary">確定</button>
                      </div>
                    </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection
