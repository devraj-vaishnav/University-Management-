@section('title','Edit Product')
@extends('admin.layout.app')
@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h5 class="mb-0">Edit Product</h5>

                            <div class="page-title-right">
                                <a class="btn btn-primary" href="{{route('product.index')}}">Back <i
                                        class=""></i></a>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <form class="needs-validation" method="post" action="{{route('product.update',$product->id)}}">
                                    @method('PUT')
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="validationCustom02"> Name <span
                                                        class="text-danger">*</span></label>
                                                <input type="text"
                                                       class="form-control border-warning" value="{{$product->name}}" name="name"
                                                       id="validationCustom02"
                                                       required>
                                                <span class="text-danger">{{$errors->first('name')}}</span>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="validationCustom02">Code <span
                                                        class="text-danger">*</span></label>
                                                <input type="text"
                                                       class="form-control border-warning" value="{{$product->code}}" name="code"
                                                       id="validationCustom02"
                                                       required>
                                                <span class="text-danger">{{$errors->first('code')}}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="validationCustom02">HSN Code <span
                                                        class="text-danger">*</span></label>
                                                <input type="text"
                                                       class="form-control border-warning" value="{{$product->hsn_code}}" name="hsn_code"
                                                       id="validationCustom02"
                                                       required>
                                                <span class="text-danger">{{$errors->first('hsn_code')}}</span>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="validationCustom02">Buying Price<span
                                                        class="text-danger">*</span></label>
                                                <input type="number"
                                                       class="form-control border-warning" value="{{$product->buying_price}}" name="buying_price"
                                                       id="validationCustom02">
                                                <span class="text-danger">{{$errors->first('buying_price')}}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="validationCustom02">Selling Price<span
                                                        class="text-danger">*</span></label>
                                                <input type="number"
                                                       class="form-control border-warning" value="{{$product->selling_price}}" name="selling_price"
                                                       id="validationCustom02">
                                                <span class="text-danger">{{$errors->first('selling_price')}}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="validationCustom02">Quantity<span
                                                        class="text-danger">*</span></label>
                                                <input type="number"
                                                       class="form-control border-warning" value="{{$product->quantity}}" name="quantity"
                                                       id="validationCustom02">
                                                <span class="text-danger">{{$errors->first('quantity')}}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="validationCustom02">Description<span
                                                        class="text-danger">*</span></label>
                                                <textarea type="text"
                                                          class="form-control border-warning"  name="description"
                                                          id="validationCustom02"
                                                          required>{{$product->description}}</textarea>
                                                <span class="text-danger">{{$errors->first('description')}}</span>
                                            </div>
                                        </div>

                                    </div>
                                    <button class="btn btn-warning" type="submit">Submit</button>
                                </form>
                            </div>
                        </div>
                        <!-- end card -->
                    </div> <!-- end col -->

                </div>
            </div> <!-- container-fluid -->
        </div>
@endsection


