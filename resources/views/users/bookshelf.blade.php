@extends('layouts.app')

@section('content')

<!-- <img class="" src="../../img/bs.jpg" alt=""> -->

<div class="container">
    <div class="row justify-content-center" style="position: relative;">

        <div class="col-md-12 mb-3 px-0" style="z-index:20;">
            <div class="card bookshelf">
              <div class="d-inline-flex">
               <div class="p-3 d-flex flex-column">
                 <img src="{{ asset('storage/profile_image/' .$user->profile_image) }}" class="rounded-circle" width="100" height="100" alt="">
                 <div class="mt-3 d-flex flex-column">
                   <h4 class="mb-0 font-weight-bold">ユーザー名 : {{ $user->name }}</h4>
                   <span class="text-secondary">ユーザーID : {{ $user->id }}</span>
                 </div>
                </div>
                 <div class="p-3 d-flex flex-column justify-content-between">
                   <div class="d-flex">
                     <div>
                       @if ($user->id === Auth::user()->id)
                       <a href="{{ url('users/' .$user->id .'/edit') }}" class="btn btn-primary">プロフィールを編集する</a>
                       @else
                         @if ($is_following)
                           <form  action="{{ route('unfollow',$user->id) }}" method="post">
                             {{ csrf_field() }}
                             {{ method_field('DELETE') }}

                           <button type="submit" class="btn btn-danger mb-2">フォロー解除</button>
                         </form>
                       @else
                         <form action="{{ route('follow', $user->id) }}" method="POST">
                           {{ csrf_field() }}

                           <button type="submit" class="btn btn-primary mb-2">フォローする</button>
                         </form>
                         @endif

                         @if($is_followed)
                            <span class="mt-2 px-1 bg-secondary text-light mb-2">フォローされています</span>
                         @endif
                      @endif
                 </div>
                </div>
                <div class="d-flex justify-content-end">
                  <div class="p-2 d-flex flex-column align-items-center">
                    <p class="font-weight-bold">本の数</p>
                    <span>{{ $product_count }}</span>
                  </div>
                  <div class="p-2 d-flex flex-column align-items-center">
                    <p class="font-weight-bold">フォロー数</p>
                    <span>{{ $follow_count }}</span>
                </div>
                <div class="p-2 d-flex flex-column align-items-center">
                    <p class="font-weight-bold">フォロワー数</p>
                    <span>{{ $follower_count }}</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

<img src="../../img/bs.jpg" style="background-position: center center; background-repeat: no-repeat;
  background-size: cover; position:absolute;">
      <h1 class="col-md-12 mb-5 text-center text-white">{{ $user->name }}さんの本棚</h1>
        @if(isset($timelines))
          @foreach($timelines as $timeline)
            <div class="col-md-3 mb-3">
                  <a href="{{ url('products/' .$timeline->id) }}"><img src="{{ asset('storage/product_image/' .$timeline->product_image) }}" alt="" width="160" height="160" class="mt-5 d-block mx-auto img-fluid img-responsive thumbnail aligncenter size-full wp-image-425" style="cursor:pointer"></a>
            </div>
          @endforeach
        @endif
      </div>
    <div class="mt-5 d-flex justify-content-center">
      {{ $timelines->links() }}
    </div>
</div>
@endsection
