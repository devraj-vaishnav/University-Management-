@section('title','Admin Profile')
@extends('admin.layout.app')
@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0"></h4>

                            <div class="page-title-right">

                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->
                <div class="row">
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Edit Profile</h4>

                                <form action="{{route('profile.update',$user->id)}}" method="post">
                                    @csrf

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="formrow-firstname-input" class="form-label">User
                                                    Name <span class="text-danger">*</span></label>
                                                <input type="text" value="{{$user->name}}" name="name" required
                                                       class="form-control" id="formrow-firstname-input">
                                                <span class="text-danger">{{$errors->first('name')}}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="formrow-email-input" class="form-label">Email ID <span
                                                        class="text-danger">*</span></label>
                                                <input type="email" value="{{$user->email}}" name="email" required
                                                       class="form-control" id="formrow-email-input">
                                                <span class="text-danger">{{$errors->first('email')}}</span>
                                            </div>
                                        </div>

                                    </div>

                                    <div>
                                        <button type="submit" class="btn btn-warning w-md">Update</button>
                                    </div>
                                </form>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->

                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Change Password</h4>

                                <form action="{{route('profile.password',$user->id)}}" method="post">
                                    @csrf
                                    <div class="row mb-4">
                                        <label for="horizontal-password-input"
                                               class="col-sm-3 col-form-label">Old Password <span
                                                class="text-danger">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="password" name="old_password" required class="form-control"
                                                   id="horizontal-password-input">
                                            <span class="text-danger">{{$errors->first('old_password')}}</span>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label for="horizontal-password-input"
                                               class="col-sm-3 col-form-label"> New Password <span
                                                class="text-danger">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="password" name="password" required class="form-control"
                                                   id="horizontal-password-input">
                                            <span class="text-danger">{{$errors->first('password')}}</span>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label for="horizontal-password-input"
                                               class="col-sm-3 col-form-label">Confirm Password <span
                                                class="text-danger">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="password" name="password_confirmation" required
                                                   class="form-control" id="horizontal-password-input">
                                            <span class="text-danger">{{$errors->first('password_confirmation')}}</span>
                                        </div>
                                    </div>

                                    <div class="row justify-content-end">
                                        <div class="col-sm-9">
                                            <div>
                                                <button type="submit" class="btn btn-warning  w-md">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->
                </div>


            </div> <!-- container-fluid -->
        </div>
@endsection
