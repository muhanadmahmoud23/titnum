@extends('layouts.app')
@section('title', 'coaches')
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
                            {!! Form::open(['route' => 'coache.store', 'files' => true]) !!}
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
                                    {!! Form::label('mobile', __('mobile'), ['class' => 'required form-label']) !!}
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        {!! Form::text('mobile', null, ['class' => 'form-control form-control-lg form-control-solid']) !!}
                                    </div>
                                </div>

                                <div class="col-md-1">
                                    {!! Form::label('email', __('email'), ['class' => 'required form-label']) !!}
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        {!! Form::text('email', null, ['class' => 'form-control form-control-lg form-control-solid']) !!}
                                    </div>
                                </div>
                            </div>
                            {!! Form::hidden('status', 1, []) !!}

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
                            {!! Form::open(['route' => 'Coachimport', 'files' => true, 'method' => 'post']) !!}
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
                                <a href="{{asset('assets/excelTemplete/Coach.xlsx')}}"> <button class="btn-warning btn btn-lg">Coach Excel Templete</button> </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="m-3">
                    <h2 push-left>coaches</h2>
                </div>

                <div class="card-body">

                    <table class="table table-bordered table-striped " id="datatables-example">
                        <thead class="thead-dark">
                            <tr>
                                <th>Full Name</th>
                                <th>Mobile</th>
                                <th>Status</th>
                                <th>Email</th>
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

                        ajax: "{{ route('coache.index') }}",
                        columns: [
                            {
                                data: 'name',
                                name: 'name'
                            },
                            {
                                data: 'mobile',
                                name: 'mobile'
                            },
                            {
                                data: 'status',
                                name: 'status'
                            },
                            {
                                data: 'email',
                                name: 'email'
                            },
                        ]
                    });
                });
            </script>
        </div>
    </body>

@endsection
