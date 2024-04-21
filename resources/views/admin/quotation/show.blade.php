@section('title','Quotation Product Index')
@extends('admin.layout.app')
@push('header_script')


    <link href="{{asset('theme/assets/libs/datatables.net-select-bs4/css/select.bootstrap4.min.css')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('theme/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css ')}}"
          rel="stylesheet" type="text/css"/>

@endpush
@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h5 class="mb-0">Quotation Product</h5>

                            <div class="page-title-right">
                                <a class="btn btn-primary" href="{{route('quotation.index')}}">Back</a>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                       style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                    <tr>
                                        <th>S.No.</th>
                                        <th>Product</th>
                                        <th>Description</th>
                                        <th>Qty.</th>
                                        <th>Rate</th>
                                        <th>Amount</th>
                                                                                <th>Action</th>
                                    </tr>
                                    </thead>


                                    <tbody>
                                    @foreach($allQutProducts as $key=>$allQutProduct)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$allQutProduct->name}}</td>
                                            <td>{{$allQutProduct->quotation_des}}</td>
                                            <td>{{$allQutProduct->qty}}</td>
                                            <td>{{$allQutProduct->rate}}</td>
                                            <td>{{$allQutProduct->amount}}</td>
                                            <td> <a href="{{url("quotation/delete/$allQutProduct->id")}}">
                                                    <i class="fa fa-trash btn btn-danger "></i></a></td>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->


            </div> <!-- container-fluid -->
        </div>
        @endsection



