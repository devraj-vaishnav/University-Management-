@extends('admin/layouts/app')
@section('tital', 'College Details ')
@section('main')
    <div class="main-panel">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex justify-content-between mb-30">
                        <div class="page-title-right">
                            {{-- <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Nijar</a></li>
                                <li class="breadcrumb-item active">Blank Page</li>
                            </ol> --}}
                            <a href="{{route('admin/college/create')}}" class="
                            btn btn-primary">add</a>
                        </div>
                    </div>
                </div>
            </div>
          
            <div class="row">
                <div class="col-12">
                    <div class="height-700"></div>
                </div>
            </div>
        </div>
@endsection
