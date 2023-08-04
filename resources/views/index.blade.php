@extends('layouts.frontend.app')

@section('content')

<!-- start banner Area -->
<section class="banner-area relative" id="home" data-parallax="scroll" data-image-src="{{asset('frontend/img/header-bg.jpg')}}">
  <div class="overlay-bg overlay"></div>
  <div class="container">
    <div class="row fullscreen">
      <div class="banner-content d-flex align-items-center col-lg-12 col-md-12">
        <h1>
          Welcome to SQLizer blog<br />
          <p>
            L<span style="font-size: 0.7em">earn</span> &nbsp;C<span style="font-size: 0.7em">reate</span>
            &nbsp;S<span style="font-size: 0.7em">hare</span>
          </p>
        </h1>
      </div>

      <div class="head-bottom-meta d-flex justify-content-between align-items-end col-lg-12">
        <div class="col-lg-6 flex-row d-flex meta-left no-padding">
          <a href="/login" class="genric-btn info circle arrow mr-md-auto">Visit Yotube <span class="lnr lnr-arrow-right"></span></a>
        </div>
        <div class="col-lg-6 flex-row d-flex meta-right no-padding justify-content-end">
          <div class="user-meta">
            <h4 class="text-white">SQLizer Group</h4>
            <p>
              <script>
                let t = new Date;
                document.write(t.toDateString());
              </script>
            </p>
          </div>
          <img class="img-fluid user-img" src="img/user.jpg" alt="" />
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End banner Area -->

<!-- Start category Area -->
<section class="category-area section-gap" id="news">
  <div class="container">
    <div class="row d-flex justify-content-center">
      <div class="menu-content pb-70 col-lg-8">
        <div class="title text-center">
          <h1 class="mb-10">Latest Posts from all categories</h1>
          <p>Find the Latest Post from all category.</p>
        </div>
      </div>
    </div>
    <div class="active-cat-carusel">
      @foreach ($posts as $post)
      <div class="item single-cat">
        <img src="{{asset('storage/post/'.$post->image)}}" alt="{{$post->image}}" style="width:300px;height:150px" />
        <p class="date" style="width:180px">{{$post->created_at->diffForHumans()}}</p>
        <h4><a href="{{route('post', $post->slug)}}">{{$post->title}}</a></h4>
      </div>
      @endforeach
    </div>
  </div>
</section>
<!-- End category Area -->

<section class="travel-area section-gap" id="travel">
  <div class="container">
    <div class="row d-flex justify-content-center">
      <div class="menu-content pb-70 col-lg-8">
        <div class="title text-center">
          <h1 class="mb-10">Hot topics of this Week</h1>
          <p>The posts which are most views in this week.</p>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row justify-content-center">
        @foreach ($posts as $post)
        <div class="single-posts col-lg-4 col-sm-4 mb-3">
          <img class="img-fluid" src="{{asset('storage/post/'.$post->image)}}" alt="{{$post->image}}" style="width:300px;height:150px">
          <div class="date mt-10 mb-10" style="width:280px">{{$post->created_at->diffForHumans()}}</div>
          <div class="detail">
            <a href="{{route('post', $post->slug)}}">
              <h4 class="pb-20">{{$post->title}}</h4>
            </a>
            <div>
              {!! Str::limit($post->body, 400) !!}
            </div>
            <div class="d-flex flex-row">
              <div class="p-2"><a href="javascript:void(0);" onclick=" toastr.info('To add to your favorite list you have to login first.', 'Info', { closeButton: true, progressBar: true, })"><i class="fa fa-heart-o" aria-hidden="true"></i><span> {{$post->likedUsers->count()}}</span></a></div>
              <div class="p-2"><i class="fa fa-comment-o" aria-hidden="true"></i><span> {{$post->comments->count()}}</span></div>
              <div class="p-2"><i class="fa fa-eye" aria-hidden="true"></i> <span>{{$post->view_count}}</span></div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</section>

<!-- Start team Area -->
<section class="team-area section-gap" id="about">
  <div class="container">
    <div class="row d-flex justify-content-center">
      <div class="col-md-8 col-xl-6 text-center mx-auto">
        <h3>Developer Team</h3>
        <p class="w-lg-50 style=text-align: center">
          This site was designed and developed by SQLizer group
        </p>
      </div>
    </div>
    <div class="row gy-4 row-cols-1 row-cols-md-2 row-cols-lg-3">
      <div class="col" style="width: 280px">
        <div class="card border-0 shadow-none">
          <div class="card-body d-flex align-items-center p-0">
            <img class="rounded-circle flex-shrink-0 me-3 fit-cover" width="130" height="130" src="frontend/img/team/kevin.jpg" />
            <div itemscope itemtype="https://schema.org/Person">
              <h6 class="fw-bold text-primary mb-0">
                <span itemprop="name">
                  <strong> Kevin Darby </strong></span>
              </h6>
            </div>
          </div>
        </div>
      </div>
      <div class="col" style="width: 289px">
        <div class="card border-0 shadow-none">
          <div class="card-body d-flex align-items-center p-0">
            <img class="rounded-circle flex-shrink-0 me-3 fit-cover" width="130" height="130" src="frontend/img/team//Nathaniel1.png" />
            <div itemscope itemtype="https://schema.org/Person">
              <h6 class="fw-bold text-primary mb-0">
                <span itemprop="name">
                  <strong> Nathaniel Kwok </strong>
                </span>
              </h6>
            </div>
          </div>
        </div>
      </div>
      <div class="col" style="width: 274px">
        <div class="card border-0 shadow-none">
          <div class="card-body d-flex align-items-center p-0">
            <img class="rounded-circle flex-shrink-0 me-3 fit-cover" width="130" height="130" src="frontend/img/team/Kim.png" />
            <div itemscope itemtype="https://schema.org/Person">
              <h6 class="fw-bold text-primary mb-0">
                <span itemprop="name"><strong>Piao Wenzhe</strong></span>
              </h6>
            </div>
          </div>
        </div>
      </div>
      <div class="col" style="width: 290px">
        <div class="card border-0 shadow-none">
          <div class="card-body d-flex align-items-center p-0">
            <img class="rounded-circle flex-shrink-0 me-3 fit-cover" width="130" height="130" src="frontend/img/team/hilal.jpg" />
            <div itemscope itemtype="https://schema.org/Person">
              <h6 class="fw-bold text-primary mb-0">
                <span itemprop="name">
                  <strong>Hilal Karappan</strong>
                </span>
              </h6>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
</section>
<!-- End team Area -->

@endsection