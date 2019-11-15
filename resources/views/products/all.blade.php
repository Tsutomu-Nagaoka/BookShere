@extends('layouts.app')

@section('content')
<div class="container px-0">


<div class="jumbotron jumbotron-extend"  style="background: url(../img/main.jpg) no-repeat center center; background-size: cover;">
    <div class="container-fluid jumbotron-container">

        <h1 class="display-4 site-name text-light text-center mt-5 top-title" style="">仮想本棚</h1>
        <h3 class="site-name text-light text-center mt-5 top-title">読んだ本を本棚に飾り</h3>
        <h3 class="site-name text-light text-center top-title">おすすめの本を共有しよう</h3>
      </div>
    </div>



    <div class="row justify-content-center mx-0" style="background-color:#D2B48C;">

        <div class="col-md-8 mt-5 mb-4 text-center" style="z-index:20;">
          <button class="btn btn-light" type="button" name="button">@sortablelink('recommend','おすすめ度')</button>
          <button class="btn btn-light" type="button" name="button">@sortablelink('updated_at','投稿日時')</button>

        </div>

            <h1 class="col-md-12 text-center text-white top-title">共有本棚</h1>
            <h1 class="col-md-12 text-center text-white top-title">（すべての投稿）</h1>

        @foreach ($products as $product)
          <div class="col-md-3 col-6 mb-3">
                <a href="{{ url('products/' .$product->id) }}"><img src="{{ asset('storage/product_image/' .$product->product_image) }}"  alt="" width="200" height="200" class="mt-4 d-block mx-auto img-fluid img-responsive thumbnail aligncenter size-full " style="cursor:pointer"></a>
              </div>

      @endforeach
  </div>
    <div class="my-4 d-flex justify-content-center">
      {{ $products->links() }}
    </div>
    <div id="app">

      <example-component></example-component>
    </div>
</div>
</div>

@endsection
