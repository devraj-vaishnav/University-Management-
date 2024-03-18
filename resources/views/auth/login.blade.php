
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>Login </title>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.png">

    <link rel="stylesheet" href="{{asset('asset/style.css')}}">

</head>

<body class="login-area">

   <!-- Preloader -->
    <div id="preloader">
        <div class="lds-hourglass"></div>
    </div>

    <!-- ======================================
    ******* Page Wrapper Area Start **********
    ======================================= -->
    <div class="main-content- bg-overlay-white bg-img h-100vh" style="background-image: url({{asset('asset/img/bg-img/11.jpg')}})">
        <div class="container h-100">
            <div class="row h-100 justify-content-center align-items-center">
                <div class="col-md-7 col-lg-5 mx-auto">
                    <!-- Middle Box -->
                    <div class="middle-box">
                        <div class="card">
                            <div class="card-body p-4">
                                <h4 class="font-22">Sign In</h4>
                                <p class="text-muted mb-4">Sign in to continue.</p>

                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                    <div class="form-group">
                                        <label class="float-left" for="emailaddress">Email address</label>
                                        <input class="form-control" type="email" id="emailaddress" name="email" value="{{ old('email') }}" placeholder="Enter your email">
                                    </div>

                                    <div class="form-group">
                                        <a href="forget-password.html" class="text-muted float-right"><small>Forgot your password?</small></a>
                                        <label class="float-left" for="password">Password</label>
                                        <input class="form-control" type="password" required="" name="password" id="password" placeholder="Enter your password">
                                    </div>

                                    <div class="form-group mb-3">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="checkbox-signin" checked>
                                            <label class="custom-control-label" for="checkbox-signin">Remember me</label>
                                        </div>
                                    </div>

                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-primary btn-block" type="submit"> Log In </button>
                                    </div>

                                </form>
                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ======================================
    ********* Page Wrapper Area End ***********
    ======================================= -->

    <!-- Must needed plugins to the run this Template -->
    <script src="{{asset('asset/js/jquery.min.js')}}"></script>
    <script src="{{asset('asset/js/popper.min.js')}}"></script>
    <script src="{{asset('asset/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('asset/js/bundle.js')}}"></script>

    <!-- Active JS -->
    <script src="{{asset('asset/js/default-assets/active.js')}}"></script>

</body>


<!-- Mirrored from demo.riktheme.com/xvito/top-menu-modren/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 26 Aug 2023 05:18:55 GMT -->
</html>