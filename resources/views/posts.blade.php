@extends('layouts.frontend.app')
@section('content')

<!-- Start top-section Area -->
<section class="top-section-area" style="padding-top:20px;padding-bottom:10px">
  <div class="container">
    <div class="row align-items-center d-flex">
      <div class="col-lg-8 top-left">
        <ul>
          <li>
            <a href="#">Home</a><span class="lnr lnr-arrow-right"></span>
          </li>
          <li><a href="#">Posts</a></li>
        </ul>
      </div>
    </div>
  </div>
</section>


<!-- End top-section Area -->
<div class="post-wrapper pt-100">
  <!-- Start post Area -->
  <section class="post-area">
    <div class="container">
      <div class="row justify-content-center d-flex">
        <div class="col-lg-8">
          <div class="top-posts pt-50">
            <div class="container">
              <div class="row justify-content-center">
                @if($posts->count() >0)
                @foreach ($posts as $post)
                <div class="single-posts col-lg-6 col-sm-6">
                  <img class="img-fluid" src="{{asset('storage/post/'.$post->image)}}" alt="{{$post->image}}" style="width:400px;height:200px" />
                  <div class="date mt-10 mb-10" style="width:280px">{{$post->created_at->diffForHumans()}}</div>
                  <div class="detail">
                    <a href="{{route('post', $post->slug)}}">
                      <h4 class="pb-5">
                        {{$post->title}}
                      </h4>
                    </a>
                    <div>
                      {!! Str::limit($post->body, 400) !!}
                    </div>
                    <div class="d-flex flex-row">
                      <div class="p-2">
                        <i class="fa fa-heart-o" aria-hidden="true"></i>
                        <a href="#">{{$post->likedUsers->count()}} Likes</a>
                      </div>
                      <div class="p-2">
                        <i class="ml-20 fa fa-comment-o" aria-hidden="true"></i>
                        <a href="#">{{$post->comments->count()}} Comments</a>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
                @else
                <h3>No post availabe</h3>
                @endif
                <div class="justify-content-center d-flex mt-5">
                  {{ $posts->links()}}
                </div>
              </div>
            </div>
          </div>
        </div>
        @include('layouts.frontend.partials.sidebar')
      </div>
    </div>
  </section>
  <!-- End post Area -->
</div>
@endsection