
<!doctype html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="description" content="">

    <!-- Title -->
    <title>University Admin</title>

    <!-- Favicon -->
<link rel="icon" href="{{asset('asset/img/core-img/favicon.png')}}">

    <link rel="stylesheet" href="{{asset('asset/style.css')}}">

</head>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <div class="lds-hourglass"></div>
    </div>
  @include('admin.layouts.header')

    <!-- Mani Page -->
    @yield("main")

            <!-- end page title -->



        <!-- Footer Area -->
      @include('admin.layouts.footer')


    <!-- Must needed plugins to the run this Template -->
<script src="{{asset('asset/js/jquery.min.js')}}"></script>
<script src="{{asset('asset/js/popper.min.js')}}"></script>
<script src="{{asset('asset/js/bootstrap.min.js')}}"></script>
<script src="{{asset('asset/js/bundle.js')}}"></script>
<script src="{{asset('asset/js/vivus.min.js')}}"></script>
<script src="{{asset('asset/js/svg.animation.js')}}"></script>

    <!-- Inject JS -->
<script src="{{asset('asset/js/settings.js')}}"></script>
<script src="{{asset('asset/js/default-assets/active.js')}}"></script>

</body>


</html>
