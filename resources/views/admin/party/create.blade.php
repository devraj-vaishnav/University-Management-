@section('title','Add Party')
@extends('admin.layout.app')
@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h5 class="mb-0">Add Party</h5>

                            <div class="page-title-right">
                                <a class="btn btn-primary" href="{{route('party.index')}}">Back <i
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
                                <form class="needs-validation" method="post" action="{{route('party.store')}}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="validationCustom02">Party Name <span
                                                        class="text-danger">*</span></label>
                                                <input type="text"
                                                       class="form-control  border-warning" name="party_name"
                                                       id="validationCustom02"
                                                       required>
                                                <span class="text-danger">{{$errors->first('party_name')}}</span>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="validationCustom02">Contact Person Name <span
                                                        class="text-danger">*</span></label>
                                                <input type="text"
                                                       class="form-control border-warning" name="contact_person_name"
                                                       id="validationCustom02"
                                                       required>
                                                <span class="text-danger">{{$errors->first('contact_person_name')}}</span>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="validationCustom02">Person Contact Number <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" minlength="10" maxlength="10"
                                                       class="form-control number border-warning " name="contact_number"
                                                       id="validationCustom02"
                                                       required>
                                                <span class="text-danger">{{$errors->first('contact_number')}}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="validationCustom02">Email Id <span class="text-danger">*</span></label>
                                                <input type="email" class="form-control border-warning" name="email_id"
                                                       id="validationCustom02"
                                                       required>
                                                <span class="text-danger">{{$errors->first('email_id')}}</span>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="validationCustom02">GST Number<span
                                                        class="text-danger">*</span></label>
                                                <input type="text"
                                                       class="form-control border-warning" name="gst_number"
                                                       id="validationCustom02">
                                                <span class="text-danger">{{$errors->first('gst_number')}}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="validationCustom02">Address<span
                                                        class="text-danger">*</span></label>
                                                <textarea type="text"
                                                       class="form-control border-warning" name="address"
                                                       id="validationCustom02"
                                                          required></textarea>
                                                <span class="text-danger">{{$errors->first('address')}}</span>
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

        @push('footer_script')
            <script>
                $('.number').keyup(function () {
                    if (/\D/g.test(this.value)) {
                        this.value = this.value.replace(/\D/g, '');
                    }
                });
            </script>
    @endpush
