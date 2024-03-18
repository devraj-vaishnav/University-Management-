
<!doctype html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="description" content="">

    <!-- Title -->
    <title>Chat-App Admin</title>

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
    <div class="main-panel">
        <div class="container-fluid">
            <!-- Start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex justify-content-between mb-30">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Nijar</a></li>
                                <li class="breadcrumb-item active">Blank Page</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="height-700"></div>
                </div>
            </div>
        </div>

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