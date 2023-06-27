@extends('client.app')

@section('content')
    <div class="card">
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder fs-3 mb-1">Our Schdeule For <span
                        style="color:orange">{{ $date }}</span></span>
            </h3>
        </div>
        <div class="card-body py-3">
            <form method="get" action="{{ route('schedule') }}">
                <div class="row  align-items-center">
                    <div class="col-md-2">
                        <label class="form-label required"> Date</label>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">

                            <input class="form-control form-control-lg form-control-solid" type="date" name="date"
                                value="<?php echo $date; ?>" />
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="col text-center mt-1">
                            <button class="btn btn-primary btn-lg px-20 mt-1">Submit </button>
                        </div>
                    </div>
            </form>
        </div>
    </div>

    @if (count($schedules) > 0)
        @foreach ($schedules as $schedule)
            <div class="row schdeule-right-main col-md-10 col-12 col-sm-11 col-xs-12">
                <div class="schdeule-right-div col-md-2 col-2 col-sm-2" style="border-right:1px solid grey;">
                    {{ $schedule->session_time }}
                    <br>

                    @if ($schedule->duartion < 60)
                        {{ $schedule->duartion }} m
                    @else
                        {{ round($schedule->duartion / 60, 1) }} h
                    @endif
                </div>

                <div class="client-center-div col-md-6 col-md-4 col-7 col-sm-5">
                    {{ $schedule->name }}
                    <br>
                    <i class="fa fa-smile-o" aria-hidden="true"></i>
                    #{{ $schedule->coaches->name }}
                </div>

                {{-- <div class="client-left-div col-md-3 col-2 col-sm-5">
                    <i class="fa fa-bars" style="color:red"> </i>
                </div> --}}
            </div>
        @endforeach
    @else
        <div class="client-borderd-div col-md-11 col-11 col-sm-11 m-5 col-xs-12 " style="color:black !important">
            No Records Found For {{ $date }}
        </div>
    @endif
@endsection
