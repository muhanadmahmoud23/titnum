@extends('layouts.main')
@section('title','department')
@section('content')

    <div id="kt_content_container" class="container">
        <div class="card">
            <div class="card-header border-0 pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder fs-3 mb-1">Add New department</span>
                </h3>
            </div>
            <div class="card-body py-3">
                {!! Form::model($department, ['route' => ['department.update', $department->id], 'method' => 'put']) !!}
                    @csrf
                    <div class="row  align-items-center">
                        <div class="col-md-2">
                            <label class="form-label required"> Name</label>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                {!! Form::text('name', null, ['class' => 'form-control form-control-lg form-control-solid', 'required']) !!}
                                {!! Form::hidden('id', null, ['class' => 'form-control form-control-lg form-control-solid', 'required']) !!}
                            </div>
                        </div>
                        @error('name')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                <div class="row ">
                    <div class="col text-center mt-1">
                        <button class="btn btn-primary px-20 mt-1">Save </button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>

@endsection
