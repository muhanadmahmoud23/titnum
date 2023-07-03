@extends('layouts.app')
@section('title', 'notification')
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
                                        @error('client_id')
                                            <small class="form-text text-danger">{{ $message }}</small><br>
                                        @enderror
                                        @error('alert')
                                            <small class="form-text text-danger">{{ $message }}</small><br>
                                        @enderror
                                        @error('from')
                                            <small class="form-text text-danger">{{ $message }}</small><br>
                                        @enderror
                                        @error('to')
                                            <small class="form-text text-danger">{{ $message }}</small><br>
                                        @enderror
                                    </div>
                                </div>
                            </h3>
                        </div>
                        <div class="card-body py-3">
                            {!! Form::open(['route' => 'notification.store', 'files' => true]) !!}
                            <div class="mb-12 align-items-center">
                                <div class="col-md-1">
                                    {!! Form::label('name', __('name'), ['class' => 'required form-label']) !!}
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        {!! Form::text('name', null, ['class' => 'form-control form-control-lg form-control-solid']) !!}
                                    </div>
                                </div>

                                <div class="col-md-1">
                                    {!! Form::label('alert', __('alert'), ['class' => 'required form-label']) !!}
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        {!! Form::text('alert', null, ['class' => 'form-control form-control-lg form-control-solid']) !!}
                                    </div>
                                </div>

                                <div class="col-md-1">
                                    {!! Form::label('from', __('from'), ['class' => 'required form-label']) !!}
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        {!! Form::date('from', null, ['class' => 'form-control form-control-lg form-control-solid']) !!}
                                    </div>
                                </div>

                                <div class="col-md-1">
                                    {!! Form::label('to', __('to'), ['class' => 'required form-label']) !!}
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        {!! Form::date('to', null, ['class' => 'form-control form-control-lg form-control-solid']) !!}
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
                            {!! Form::open(['route' => 'Notificationimport', 'files' => true, 'method' => 'post']) !!}
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
                                <a href="{{asset('assets/excelTemplete/Notification.xlsx')}}"> <button class="btn-warning btn btn-lg">Notification Excel Templete</button> </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="m-3">
                    <h2 push-left>notification</h2>
                </div>

                <div class="card-body">

                    <table class="table table-bordered table-striped " id="datatables-example">
                        <thead class="thead-dark">
                            <tr>

                                <th>Name</th>
                                <th>Alert</th>
                                <th>Apllicable from</th>
                                <th>Apllicable To</th>
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

                        ajax: "{{ route('notification.index') }}",
                        columns: [
                            {
                                data: 'name',
                                name: 'name'
                            },
                            {
                                data: 'alert',
                                name: 'alert'
                            },
                            {
                                data: 'from',
                                name: 'from'
                            },
                            {
                                data: 'to',
                                name: 'to'
                            },
                        ]
                    });
                });
            </script>
        </div>
    </body>

@endsection
