@extends('layouts.frontend.app')
@section('content')
<!-- Start banner Area -->
<section class="top-section-area" style="padding-top:20px;padding-bottom:10px">
  <div class="container">
    <div class="row align-items-center d-flex">
      <div class="col-lg-8 top-left">
        <ul>
          <li>
            <a href="#">Home</a
            ><span class="lnr lnr-arrow-right"></span>
          </li>
          <li><a href="#">Categories</a></li>
        </ul>
      </div>
    </div>
  </div>
</section>
<!-- End banner Area -->
<!-- About Generic Start -->
    <div class="main-wrapper">
      <!-- Start fashion Area -->
      <section class="fashion-area section-gap" id="fashion">
        <div class="container">
          <div class="row">
           @foreach ($categories as $category)
           <div class="col-lg-3 col-md-6 single-fashion">
            <img style="height:80px;width:120px" class="img-fluid" src="{{asset('storage/category/'.$category->image)}}" alt="{{$category->image}}" />
            <p class="date">{{$category->created_at->format('D, d M Y H:i')}}</p>
            <a href="{{route('category.post',$category->slug)}}"><h4>{{$category->name}}</h4></a>
          </div>
           @endforeach
          </div>
        </div>
      </section>
      <!-- End fashion Area -->
    </div>
@endsection
