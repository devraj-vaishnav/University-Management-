@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

{{--@section('title','index Page')--}}
{{--@extends('admin.layout.app')--}}
{{--@section('content')--}}
{{--    <div class="main-content">--}}

{{--        <div class="page-content">--}}
{{--            <div class="container-fluid">--}}

{{--                <!-- start page title -->--}}
{{--                <div class="row">--}}
{{--                    <div class="col-12">--}}
{{--                        <div class="page-title-box d-flex align-items-center justify-content-between">--}}
{{--                            <h5 class="mb-0">Dashboard</h5>--}}

{{--                            <div class="page-title-right">--}}

{{--                            </div>--}}

{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <!-- end page title -->--}}

{{--            </div> <!-- container-fluid -->--}}
{{--        </div>--}}
{{--        <!-- End Page-content -->--}}

{{--@endsection--}}
