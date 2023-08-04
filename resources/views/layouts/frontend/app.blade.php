<!DOCTYPE html>
<html lang="en" class="no-js">
  <head>
    <!-- Mobile Specific Meta -->
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/fav.png" />
    <!-- Author Meta -->
    <meta name="author" content="colorlib" />
    <!-- Meta Description -->
    <meta name="description" content="" />
    <!-- Meta Keyword -->
    <meta name="keywords" content="" />
    <!-- meta character set -->
    <meta charset="UTF-8" />
    <!-- Site Title -->
    <title>SQLizer Blogger</title>

    <link
      href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700"
      rel="stylesheet"
    />
    <!--
			CSS
			============================================= -->
    <link rel="stylesheet" href="{{asset('frontend/css/linearicons.css')}}" />
    <link rel="stylesheet" href="{{asset('frontend/css/font-awesome.min.css')}}" />
    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.css')}}" />
    <link rel="stylesheet" href="{{asset('frontend/css/owl.carousel.css')}}" />
    <link rel="stylesheet" href="{{asset('frontend/css/main.css')}}" />
    <style>
    @media only screen and (min-width: 790px) {
        .menu1{
            /* border: 1px solid #333; */
            margin-left: -5rem;
            }
        }
      .c1{
        color: #007bff;
      }
    </style>
    {{-- Fix Drop Down menu --}}
    <script>
        function dropMenu(){
        var dropmenu = document.getElementById('dropMenu');
            if (dropmenu.style.display === "none") {
                dropmenu.style.display = "block";
            } else {
                dropmenu.style.display = "none";
            }
            }
    </script>
  </head>
  <body>
    <!-- Start Header Area -->
    @include('layouts.frontend.partials.navbar')
    <!-- End Header Area -->
    @yield('content')

    <!-- start footer Area -->
    <footer style="background-color:black;text-align:center">
      <div class="container">
      <div class="row">
          <p class="col-lg-8 col-sm-12 footer-text"  >
            Copyright &copy;
            <script>
              document.write(new Date().getFullYear());
            </script>
            All rights reserved | This is made by
            <a href="" target="_blank">SQLizer group</a>
          </p>
        </div>
      </div>
    </footer>
    <!-- End footer Area -->

    <script src="{{asset('frontend/js/vendor/jquery-2.2.4.min.js')}}"></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
      integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
      crossorigin="anonymous"
    ></script>
    <script src="{{asset('frontend/js/vendor/bootstrap.min.js')}}"></script>
    <script src="{{asset('frontend/js/jquery.ajaxchimp.min.js')}}"></script>
    <script src="{{asset('frontend/js/parallax.min.js')}}"></script>
    <script src="{{asset('frontend/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('frontend/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('frontend/js/jquery.sticky.js')}}"></script>
    <script src="{{asset('frontend/js/main.js')}}"></script>
    @stack('footer')
  </body>
</html>
