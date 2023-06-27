@extends('layouts.app')
@section('title', 'register')
@section('content')

    <body>

        <div class="container mt-4">

            <div class="post d-flex flex-column-fluid create-form" id="kt_post">
                <div id="kt_content_container" class="container">
                    <div class="card">
                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bolder fs-3 mb-1">Add New @yield('title')</span>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        @error('membership_id')
                                            <small class="form-text text-danger">{{ $message }}</small><br>
                                        @enderror
                                        @error('name')
                                            <small class="form-text text-danger">{{ $message }}</small><br>
                                        @enderror
                                        @error('mobile')
                                            <small class="form-text text-danger">{{ $message }}</small><br>
                                        @enderror
                                        @error('status')
                                            <small class="form-text text-danger">{{ $message }}</small><br>
                                        @enderror
                                        @error('email')
                                            <small class="form-text text-danger">{{ $message }}</small><br>
                                        @enderror
                                    </div>
                                </div>
                            </h3>
                        </div>
                        <div class="card-body py-3">
                            {!! Form::open(['route' => 'register.store', 'files' => true]) !!}
                            <div class="mb-12 align-items-center">
                                <div class="col-md-1">
                                    {!! Form::label('client', __('client'), ['class' => 'required form-label']) !!}
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        {!! Form::select('client_id', $clients, null, [
                                            'class' => 'form-control form-control-lg form-control-solid',
                                            'required',
                                        ]) !!}
                                    </div>
                                </div>

                                <div class="col-md-1">
                                    {!! Form::label('Next Payment', __('Next Payment'), ['class' => 'required form-label']) !!}
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        {!! Form::date('next_date', null, ['class' => 'form-control form-control-lg form-control-solid']) !!}
                                    </div>
                                </div>

                                <div class="col-md-1">
                                    {!! Form::label('End Date', __('End Date'), ['class' => 'required form-label']) !!}
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        {!! Form::date('end_date', null, ['class' => 'form-control form-control-lg form-control-solid']) !!}
                                    </div>
                                </div>

                            </div>

                            <div class="row mb-10">
                                <div class="col text-center">
                                    <button class="btn btn-lg  btn btn-lg -primary ">@lang('save')</button>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>

                    </div>
                </div>
            </div>

            <div class="post d-flex flex-column-fluid excel-form" id="kt_post">
                <div id="kt_content_container" class="container">
                    <div class="card">
                        <div class="card-body py-3 pt-3">
                            {!! Form::open(['route' => 'clientImport', 'files' => true, 'method' => 'post']) !!}
                            @csrf
                            <div class="mb-12 align-items-center">
                                <div class="col-md-3">
                                    {!! Form::label('Excel', __('Import From Excel'), ['class' => 'required form-label']) !!}
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        {!! Form::file('file', null, [
                                            'class' => 'form-control form-control-lg form-control-solid',
                                            'accept' => '.xlsx, .xls, .csv',
                                        ]) !!}
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="col text-center">
                                        <button class="btn btn-lg  btn btn-lg -primary ">@lang('import')</button>
                                    </div>
                                </div>
                            </div>


                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="m-3">
                    <h2 push-left>register</h2>
                </div>

                <div class="card-body">

                    <table class="table table-bordered table-striped " id="datatables-example">
                        <thead class="thead-dark">
                            <tr>
                                <th>MemberShip Id</th>
                                <th>Name</th>
                                <th>Mobile</th>
                                <th>Email</th>
                                <th>Date</th>
                                <th>End Date</th>
                                <th>next_date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                    </table>

                </div>

            </div>

            <script type="text/javascript">
                $(document).ready(function() {
                    $('#datatables-example').DataTable({
                        processing: true,
                        serverSide: true,
                        dom: 'Blfrtip',
                        buttons: [{
                                extend: 'pdf',
                            },
                            {
                                extend: 'csv',
                            },
                            {
                                extend: 'excel',
                            }
                        ],

                        ajax: "{{ route('register.index') }}",
                        columns: [{
                                data: 'clients.membership_id',
                                name: 'membership_id'

                            },
                            {
                                data: 'clients.name',
                                name: 'name'

                            },
                            {
                                data: 'clients.mobile',
                                name: 'mobile'

                            },
                            {
                                data: 'clients.email',
                                name: 'email'

                            },
                            {
                                data: 'created_at',
                                name: 'first_date'

                            },
                            {
                                data: 'end_date',
                                name: 'end_date'

                            },
                            {
                                data: 'next_date',
                                name: 'next_date'

                            },
                            {
                                data: 'clients.status',
                                name: 'status'

                            },
                        ]
                    });
                });
            </script>
        </div>
    </body>

@endsection
