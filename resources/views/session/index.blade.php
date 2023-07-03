@extends('layouts.app')
@section('title', 'session')
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
                                        @error('name')
                                            <small class="form-text text-danger">{{ $message }}</small><br>
                                        @enderror
                                        @error('coach_id')
                                            <small class="form-text text-danger">{{ $message }}</small><br>
                                        @enderror
                                        @error('day')
                                            <small class="form-text text-danger">{{ $message }}</small><br>
                                        @enderror
                                        @error('session_time')
                                            <small class="form-text text-danger">{{ $message }}</small><br>
                                        @enderror
                                        @error('duartion')
                                            <small class="form-text text-danger">{{ $message }}</small><br>
                                        @enderror
                                        @error('applicable_from')
                                            <small class="form-text text-danger">{{ $message }}</small><br>
                                        @enderror
                                        @error('applicable_to')
                                            <small class="form-text text-danger">{{ $message }}</small><br>
                                        @enderror
                                    </div>
                                </div>
                            </h3>
                        </div>
                        <div class="card-body py-3">
                            {!! Form::open(['route' => 'session.store', 'files' => true]) !!}
                            <div class="mb-12 align-items-center">

                                <div class="col-md-1">
                                    {!! Form::label('Name', __('Name'), ['class' => 'required form-label']) !!}
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        {!! Form::text('name', null, ['class' => 'form-control form-control-lg form-control-solid']) !!}
                                    </div>
                                </div>

                                <div class="col-md-1">
                                    {!! Form::label('Coach', __('Coach'), ['class' => 'required form-label']) !!}
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        {!! Form::select('coach_id', $coaches, null, [
                                            'class' => 'form-control form-control-lg form-control-solid',
                                            'required',
                                        ]) !!}
                                    </div>
                                </div>

                                <div class="col-md-1">
                                    {!! Form::label('Day', __('Day'), ['class' => 'required form-label']) !!}
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        {!! Form::date('day', null, ['class' => 'form-control form-control-lg form-control-solid']) !!}
                                    </div>
                                </div>

                                <div class="col-md-1">
                                    {!! Form::label('Session_time', __('Session_time'), ['class' => 'required form-label']) !!}
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        {!! Form::time('session_time', null, ['class' => 'form-control form-control-lg form-control-solid']) !!}
                                    </div>
                                </div>

                                <div class="col-md-1">
                                    {!! Form::label('Duartion', __('Duartion'), ['class' => 'required form-label']) !!}
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        {!! Form::number('duartion', null, ['class' => 'form-control form-control-lg form-control-solid']) !!}
                                    </div>
                                </div>

                                <div class="col-md-1">
                                    {!! Form::label('Applicalble to', __('Applicalble to'), ['class' => 'required form-label']) !!}
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        {!! Form::date('applicable_to', null, ['class' => 'form-control form-control-lg form-control-solid']) !!}
                                    </div>
                                </div>


                                <div class="col-md-1">
                                    {!! Form::label('Applicalble From', __('Applicalble From'), ['class' => 'required form-label']) !!}
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        {!! Form::date('applicable_from', null, ['class' => 'form-control form-control-lg form-control-solid']) !!}
                                    </div>
                                </div>

                                <div class="col-md-1">
                                    {!! Form::label('Number of seats', __('Number of seats'), ['class' => 'required form-label']) !!}
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        {!! Form::number('seats', null, ['class' => 'form-control form-control-lg form-control-solid']) !!}
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
                    <div class="card row">
                        <div class="card-body py-3 pt-3 col-md-10">
                            {!! Form::open(['route' => 'Sessionimport', 'files' => true, 'method' => 'post']) !!}
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

                            <div class="col-md-2">
                                <a href="{{asset('assets/excelTemplete/Register.xlsx')}}"> <button class="btn-warning btn btn-lg">Register Excel Templete</button> </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="m-3">
                    <h2 push-left>Sessions</h2>
                </div>

                <div class="card-body">

                    <table class="table table-bordered table-striped " id="datatables-example">
                        <thead class="thead-dark">
                            <tr>
                                <th>Name</th>
                                <th>Coach Name</th>
                                <th>Day</th>
                                <th>Session Time</th>
                                <th>Duartion</th>
                                <th>Applicable From</th>
                                <th>Applicable To</th>
                                <th>Number of seats</th>
                                <th>Reserved</th>
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

                        ajax: "{{ route('session.index') }}",
                        columns: [{
                                data: 'name',
                                name: 'name'

                            },
                            {
                                data: 'coaches.name',
                                name: 'name'

                            },
                            {
                                data: 'day',
                                name: 'day'

                            },
                            {
                                data: 'session_time',
                                name: 'session_time'

                            },
                            {
                                data: 'duartion',
                                name: 'duartion'

                            },
                            {
                                data: 'applicable_from',
                                name: 'applicable_from'

                            },
                            {
                                data: 'applicable_to',
                                name: 'applicable_to'

                            },
                            {
                                data: 'seats',
                                name: 'seats'

                            },
                            {
                                data: 'reserved',
                                name: 'reserved'

                            },
                        ]
                    });
                });
            </script>
        </div>
    </body>

@endsection
