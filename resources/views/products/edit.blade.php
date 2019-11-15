@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
           <div class="card">
              <div class="card-haeder">Update</div>

              <div class="card-body">
                <form action="{{ route('products.update',['product' => $product]) }}" method="post">
                    @csrf
                    @method('PUT')

                    <div class="form-froup row mb-0">
                      <div class="col-md-12 p-3 w-100 d-flex">
                        <img src="{{ asset('storage/profile_image/' .$user->profile_image) }}" class="rounded-circle" width="50" height="50">
                        <div class="ml-2 d-flex flex-column">
                          <p class="mb-0">{{ $user->name }} </p>
                          <a href="{{ url('users/ .$user-id') }}" class="text-secondary">{{ $user->id}}</a>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <textarea name="text" class="form-control mb-3" required autocomplete="text" rows="4">{{ old('text') ? : $product->text }}</textarea>
                      </div>
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
