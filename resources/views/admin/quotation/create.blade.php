@section('title','Add Quotation')
@extends('admin.layout.app')
@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h5 class="mb-0">Add Quotation</h5>

                            <div class="page-title-right">
                                <a class="btn btn-primary" href="{{route('quotation.index')}}">Back <i
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
                                <form class="needs-validation" method="post" action="{{route('quotation.store')}}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="validationCustom02">Quotation No.<span
                                                        class="text-danger">*</span></label>
                                                <input type="number"
                                                       class="form-control  border-warning" name="quotation_no"
                                                       id="validationCustom02"
                                                       required>
                                                <span class="text-danger">{{$errors->first('quotation_no')}}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="validationCustom02">Quotation Date <span
                                                        class="text-danger">*</span></label>
                                                <input type="date"
                                                       class="form-control border-warning" name="quotation_date"
                                                       id="validationCustom02"
                                                       required>
                                                <span class="text-danger">{{$errors->first('quotation_date')}}</span>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group mb-4">
                                                <label for="validationCustom02">Select Party <span
                                                        class="text-danger">*</span></label>
                                                {!! Form::select('party_id', [''=>'select ']+$parties,old('party_id'),['class'=>'form-control border-warning','required']) !!}
                                                <span class="text-danger">{{$errors->first('party_id')}}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class=" mt-4">
                                                <div class="custom-control custom-checkbox mb-3">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="customCheck1">
                                                    <label class="custom-control-label" for="customCheck1">Ship
                                                        To</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 row" id="shipDataDetails" style="display: none;">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="validationCustom02">Ship Person Name<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control border-warning"
                                                           name="ship_person_name"
                                                           id="validationCustom02">
                                                    <span
                                                        class="text-danger">{{$errors->first('ship_person_name')}}</span>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="validationCustom02">Ship Person Contact<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" minlength="10" maxlength="10"
                                                           class="form-control number border-warning"
                                                           name="ship_person_contact"
                                                           id="validationCustom02">
                                                    <span
                                                        class="text-danger">{{$errors->first('ship_person_contact')}}</span>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="validationCustom02">Address<span
                                                            class="text-danger">*</span></label>
                                                    <textarea type="text" class="form-control border-warning " rows="1"
                                                              name="ship_address" id="validationCustom02"></textarea>
                                                </div>
                                            </div>
                                        </div>


                                        <table class="w-100">
                                            <tr>
                                                <th>Product<span
                                                        class="text-danger">*</span></th>
                                                <th>Description<span
                                                        class="text-danger">*</span></th>
                                                <th>Qty.<span
                                                        class="text-danger">*</span></th>
                                                <th>Rate<span
                                                        class="text-danger">*</span></th>
                                                <th>Amount<span
                                                        class="text-danger">*</span></th>
                                                <th class="">
                                                    <button class="btn btn-primary ms-5 float-end mt-1 " type="button"
                                                            id="button"><i class="fas fa-plus"></i></button>
                                                </th>
                                            </tr>
                                            <tr>
                                                <td>
                                                    {!! Form::select('product_id[]', [''=>'select ']+$products,old('product_id'),['class'=>'form-control border-warning','required']) !!}
                                                    <span class="text-danger">{{$errors->first('product_id')}}</span>
                                                </td>
                                                <td>
                                                     <textarea type="text" class="form-control border-warning " rows="1"
                                                               name="quotation_des[]"
                                                               id="validationCustom02"></textarea>
                                                </td>
                                                <td>
                                                    <input type="number"
                                                           class="form-control  border-warning" onchange="multiply()"
                                                           name="qty[]"
                                                           id="qty"
                                                           required>
                                                    <span class="text-danger">{{$errors->first('qty')}}</span>
                                                </td>
                                                <td>
                                                    <input type="number"
                                                           class="form-control  border-warning" onchange="multiply()"
                                                           name="rate[]"
                                                           id="rate"
                                                           required>
                                                    <span class="text-danger">{{$errors->first('rate')}}</span>
                                                </td>
                                                <td>
                                                    <input type="number"
                                                           class="form-control  border-warning" name="amount[]"
                                                           id="amount"
                                                           required>
                                                    <span class="text-danger">{{$errors->first('')}}</span>
                                                </td>

                                            </tr>
                                            <tbody id="multipleData">

                                            </tbody>
                                        </table>

                                    </div>

                                    <button class="btn btn-warning mt-2" type="submit">Submit</button>
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

            <script>
                $(document).ready(function () {
                    $('#customCheck1').change(function () {
                        if ($(this).is(':checked')) {
                            $('#shipDataDetails').show();
                        } else {
                            $('#shipDataDetails').hide();
                        }
                    });
                });
            </script>

            {{--        <script>--}}
            {{--            $(document).ready(function () {--}}
            {{--                $("#button").on('click', function () {--}}
            {{--                    let rowData = "<tr>";--}}

            {{--                    rowData += "<td>";--}}
            {{--                    rowData += `{!! Form::select('product_id[]', [''=>'select ']+$products, old('product_id'), ['class'=>'form-control border-warning', 'required']) !!}`;--}}
            {{--                    rowData += "<span class='text-danger'>{{ $errors->first('product_id') }}</span>";--}}
            {{--                    rowData += "</td>";--}}

            {{--                    rowData += "<td>";--}}
            {{--                    rowData += "<textarea type='text' class='form-control border-warning' rows='1' name='quotation_des[]' id='validationCustom02'></textarea>";--}}
            {{--                    rowData += "</td>";--}}

            {{--                    rowData += "<td>";--}}
            {{--                    rowData += "<input type='number' onchange='multiply()' class='form-control border-warning qty' name='qty[]' id='qty' required>";--}}
            {{--                    rowData += "<span class='text-danger'>{{$errors->first('')}}</span>";--}}
            {{--                    rowData += "</td>";--}}

            {{--                    rowData += "<td>";--}}
            {{--                    rowData += "<input type='number' onchange='multiply()' class='form-control border-warning rate' name='rate[]' id='rate' required>";--}}
            {{--                    rowData += "<span class='text-danger'>{{$errors->first('')}}</span>";--}}
            {{--                    rowData += "</td>";--}}

            {{--                    rowData += "<td>";--}}
            {{--                    rowData += "<input type='number' class='form-control border-warning amount' name='amount[]' id='amount' required >";--}}
            {{--                    rowData += "<span class='text-danger'>{{$errors->first('')}}</span>";--}}
            {{--                    rowData += "</td>";--}}

            {{--                    rowData += "<td>";--}}
            {{--                    rowData += "<button type='button' class='btn btn-danger delete-row'><i class='fa fa-trash'></i></button>";--}}
            {{--                    rowData += "</td>";--}}

            {{--                    rowData += "</tr>";--}}

            {{--                    $("#multipleData").append(rowData);--}}
            {{--                });--}}

            {{--                $(document).on('click', '.delete-row', function () {--}}
            {{--                    $(this).closest('tr').remove();--}}
            {{--                });--}}

            {{--                function multiply() {--}}
            {{--                }--}}
            {{--            });--}}


            {{--        </script>--}}

            <script>
                function multiply() {
                    var num1 = $("#qty").val();
                    var num2 = $("#rate").val();
                    var maltiply = parseInt(num1) * parseInt(num2);

                    $("#amount").val(Math.round(maltiply));
                }
            </script>
            <script>
                $(document).ready(function () {
                    // Function to add new row
                    $("#button").on('click', function () {
                        let rowData = "<tr>";

                        rowData += "<td>";
                        rowData += `{!! Form::select('product_id[]', [''=>'select ']+$products, old('product_id'), ['class'=>'form-control border-warning', 'required']) !!}`;
                        rowData += "<span class='text-danger'>{{ $errors->first('product_id') }}</span>";
                        rowData += "</td>";

                        rowData += "<td>";
                        rowData += "<textarea type='text' class='form-control border-warning' rows='1' name='quotation_des[]' id='validationCustom02'></textarea>";
                        rowData += "</td>";

                        rowData += "<td>";
                        rowData += "<input type='number' onchange='multiplyRow(this)' class='form-control border-warning qty' name='qty[]' required>";
                        rowData += "</td>";

                        rowData += "<td>";
                        rowData += "<input type='number' onchange='multiplyRow(this)' class='form-control border-warning rate' name='rate[]' required>";
                        rowData += "</td>";

                        rowData += "<td>";
                        rowData += "<input type='number' class='form-control border-warning amount' name='amount[]' readonly>";
                        rowData += "</td>";

                        rowData += "<td>";
                        rowData += "<button type='button' class='btn btn-danger delete-row'><i class='fa fa-trash'></i></button>";
                        rowData += "</td>";

                        rowData += "</tr>";

                        $("#multipleData").append(rowData);
                    });

                    // Function to delete row
                    $(document).on('click', '.delete-row', function () {
                        $(this).closest('tr').remove();
                    });
                });

                // Function to calculate row-wise multiplication
                function multiplyRow(row) {
                    var row = $(row).closest('tr');
                    var qty = $(row).find('.qty').val();
                    var rate = $(row).find('.rate').val();
                    var amount = qty * rate;
                    $(row).find('.amount').val(amount);

                    calculateTotal();
                }

            </script>


    @endpush
