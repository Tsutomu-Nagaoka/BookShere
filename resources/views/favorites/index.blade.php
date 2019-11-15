@extends('layouts.app')

@section('content')
<div class="container px-0">

    <div class="row justify-content-center mx-0" style="background-color:#D2B48C;">

        <div class="col-md-8 mt-5 mb-4 text-center" style="z-index:20;">
          <button class="btn btn-light" type="button" name="button">@sortablelink('recommend','おすすめ度')</button>
          <button class="btn btn-light" type="button" name="button">@sortablelink('updated_at','投稿日時')</button>

        </div>

            <h1 class="col-md-12 text-center text-white top-title">いいね一覧</h1>

        @foreach ($favorites as $favorite)
          <div class="col-md-3 col-6 mb-3">
                <a href="{{ url('products/' .$favorite->product->id) }}"><img src="{{ asset('storage/product_image/' .$favorite->product->product_image) }}"  alt="" width="200" height="200" class="mt-4 d-block mx-auto img-fluid img-responsive thumbnail aligncenter size-full " style="cursor:pointer"></a>

              </div>

      @endforeach
  </div>
    <div class="my-4 d-flex justify-content-center">
      {{ $favorites->links() }}
    </div>
</div>


@endsection
