@extends('layouts.app')
@section('title', 'payment')
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
                                        @error('client_id')
                                            <small class="form-text text-danger">{{ $message }}</small><br>
                                        @enderror
                                        @error('session_id')
                                            <small class="form-text text-danger">{{ $message }}</small><br>
                                        @enderror
                                    </div>
                                </div>
                            </h3>
                        </div>
                        <div class="card-body py-3">
                            {!! Form::open(['route' => 'session-payment.store', 'files' => true]) !!}
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
                                    {!! Form::label('session', __('session'), ['class' => 'required form-label']) !!}
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        {!! Form::select('session_id', $sessions, null, [
                                            'class' => 'form-control form-control-lg form-control-solid',
                                            'required',
                                        ]) !!}
                                    </div>
                                </div>

                            </div>

                            <div class="row mb-10">
                                <div class="col text-center">
                                    <button class="btn btn-primary ">@lang('save')</button>
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
                            {!! Form::open(['route' => 'clientExcel', 'files' => true, 'method' => 'post']) !!}
                            @csrf
                            <div class="mb-12 align-items-center">
                                <div class="col-md-3">
                                    {!! Form::label('Excel', __('Import From Excel'), ['class' => 'required form-label']) !!}
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        {!! Form::file('Excel', null, [
                                            'class' => 'form-control form-control-lg form-control-solid',
                                            'accept' => '.xlsx, .xls, .csv',
                                        ]) !!}
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="col text-center">
                                        <button class="btn btn-primary ">@lang('import')</button>
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
                    <h2 push-left>Payments</h2>
                </div>

                <div class="card-body">

                    <table class="table table-bordered table-striped " id="datatables-example">
                        <thead class="thead-dark">
                            <tr>
                                <th>Name</th>
                                <th>Client Name</th>
                                <th>Session Nmae</th>
                                <th>Coach Name</th>
                                <th>Date</th>
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

                        ajax: "{{ route('session-payment.index') }}",
                        columns: [{
                                data: 'membership_id',
                                name: 'name'

                            },
                            {
                                data: 'client_name',
                                name: 'client_name'

                            },
                            {
                                data: 'session_name',
                                name: 'session_name'

                            },
                            {
                                data: 'coach_name',
                                name: 'coach_name'

                            },
                            {
                                data: 'created_at',
                                name: 'created_at'

                            },
                        ]
                    });
                });
            </script>
        </div>
    </body>

@endsection
