@section('title','Party Index')
@extends('admin.layout.app')
@push('header_script')

    <link href="{{asset('theme/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('theme/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}"
          rel="stylesheet" type="text/css"/>
    <link href="{{asset('theme/assets/libs/datatables.net-select-bs4/css/select.bootstrap4.min.css')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('theme/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css ')}}"
          rel="stylesheet" type="text/css"/>
    <link href="{{asset('theme/assets/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css"/>

@endpush
@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h5 class="mb-0">Parties</h5>

                            <div class="page-title-right">
                                <a class="btn btn-primary" href="{{route('party.create')}}">Add <i
                                        class=""></i></a>
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
                                        <th>Party Name</th>
                                        <th>Contact Person Name</th>
                                        <th>Person Contact Number</th>
                                        <th>Email Id</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>


                                    <tbody>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->


            </div> <!-- container-fluid -->
        </div>
        @endsection

        @push('footer_script')
            <script src="{{asset('theme/assets/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
            <script src="{{asset('theme/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
            <script
                src="{{asset('theme/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
            <script
                src="{{asset('theme/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>
            <script src="{{asset('theme/assets/libs/sweetalert2/sweetalert2.min.js')}}"></script>
            <script src="{{asset('theme/assets/js/pages/sweet-alerts.init.js')}}"></script>

            <script>
                $(function () {
                    $('#datatable').DataTable({
                        processing: true,
                        serverSide: true,
                        stateSave: true,
                        responsive: true,
                        ajax: {
                            url: '{{route('party.getData')}}',
                        },
                        columns: [
                            {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                            {data: 'party_name', name: 'party_name'},
                            {data: 'contact_person_name', name: 'contact_person_name'},
                            {data: 'contact_number', name: 'contact_number'},
                            {data: 'email_id', name: 'email_id'},
                            {data: 'action', name: 'action', orderable: false, searchable: false},
                        ]
                    });
                });

            </script>

            <script>
                function deleteIt(id) {
                    Swal.fire({
                        title: "Are you sure?",
                        text: "You won't be able to revert this!",
                        icon: "warning",
                        showCancelButton: !0,
                        confirmButtonText: "Yes, delete it!",
                        cancelButtonText: "No, cancel!",
                        confirmButtonClass: "btn btn-success mt-2",
                        cancelButtonClass: "btn btn-danger ml-2 mt-2",
                        buttonsStyling: !1,
                    }).then(function (e) {
                        if (e.value) {
                            $.ajax({
                                url: '{{ url('admin/party') }}/' + id,
                                type: 'delete',
                                dataType: "JSON",
                                data: {
                                    "_token": "{{ csrf_token() }}"
                                },
                                success: function () {
                                    $("#datatable").DataTable().draw(false);
                                }
                            });

                            Swal.fire({title: "Deleted!", text: "Your file has been deleted.", icon: "success"})
                        } else {
                            Swal.fire({
                                title: "Cancelled",
                                text: "Your imaginary file is safe :)",
                                icon: "error"
                            })
                        }
                    })
                }
            </script>
    @endpush

