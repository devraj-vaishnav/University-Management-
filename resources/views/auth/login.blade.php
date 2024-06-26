

<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Login </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('theme/assets/images/favicon.ico')}}">

    <!-- Bootstrap Css -->
    <link href="{{asset('theme/assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{asset('theme/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{asset('theme/assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />

</head>

<body class="auth-body-bg">
<div class="home-btn d-none d-sm-block">
</div>
<div>
    <div class="container-fluid p-0">
        <div class="row no-gutters">
            <div class="col-lg-4">
                <div class="authentication-page-content p-4 d-flex align-items-center min-vh-100">
                    <div class="w-100">
                        <div class="row justify-content-center">
                            <div class="col-lg-9">
                                <div>
                                    <div class="text-center">
                                        <div>
                                            <h4 class="bold text-warning">UNITECH</h4>
                                        </div>

                                        <h4 class="font-size-18 mt-4">Welcome Back !</h4>
                                        <p class="text-muted">Sign in to continue to .</p>
                                    </div>

                                    <div class="p-2 mt-5">
                                        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                            @csrf
                                            <div class="form-group auth-form-group-custom mb-4">
                                                <i class="ri-user-2-line text-warning auti-custom-input-icon"></i>
                                                <label for="username">Email</label>
                                                <input type="email" class="form-control" value="{{old('email')}}" name="email" id="username" placeholder="Enter Email ">
                                                <span class="text-danger">{{$errors->first('email')}}</span>
                                            </div>

                                            <div class="form-group auth-form-group-custom mb-4">
                                                <i class="ri-lock-2-line bg-color text-warning auti-custom-input-icon" ></i>
                                                <label for="userpassword">Password</label>
                                                <input type="password" name="password" class="form-control" id="userpassword" placeholder="Enter password">
                                                <span class="text-danger">{{$errors->first('password')}}</span>
                                            </div>

                                            <div class="mt-4 text-center">
                                                <button class="btn btn-warning w-md waves-effect waves-light" type="submit">Log In</button>
                                            </div>
                                        </form>
                                    </div>


                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="authentication-bg">
                    <div class="bg-overlay"></div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- JAVASCRIPT -->
<script src="{{asset('theme/assets/libs/jquery/jquery.min.js')}}"></script>
<script src="{{asset('theme/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('theme/assets/libs/metismenu/metisMenu.min.js')}}"></script>
<script src="{{asset('theme/assets/libs/simplebar/simplebar.min.js')}}"></script>
<script src="{{asset('themeassets/libs/node-waves/waves.min.js/')}}"></script>

<script src="{{asset('theme/assets/js/app.js')}}"></script>

</body>

</html>
