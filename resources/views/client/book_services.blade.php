@extends('client.app')

@section('content')
    <div class="card">
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder fs-3 mb-1">Book Services</span>
            </h3>
        </div>
    </div>

    @if (count($services) > 0)
        @foreach ($services as $service)
            @if ((int) $service->seats - (int) $service->reserved > 0)
                <div class="client-borderd-div col-md-11 col-11 col-sm-11 m-5 col-xs-12">
                    <div class="row col-12">
                        <div class="client-right-div col-md-1 col-1 col-sm-2">
                            <i class="fa fa-bars" aria-hidden="true"></i>
                        </div>

                        <div class="client-center-div col-md-7 col-md-4 col-6 col-sm-5">
                            <i>With Coach: {{ $service->coaches->name }}</i>
                        </div>

                        <div class="client-left-div col-md-4 col-5 col-sm-5">
                            <i>{{ date('M-d', strtotime($service->day)) }} at {{ $service->session_time }}</i>
                        </div>
                    </div>


                    <div class="row col-12">
                        <div class="client-right-div col-md-1 col-1 col-sm-2">
                        </div>
                        <div class="client-center-div col-md-7 col-md-4 col-6 col-sm-5">
                            <i>{{ $service->name }}</i>
                        </div>
                    </div>

                    <div class="row col-12">
                        <div class="client-right-div col-md-1 col-1 col-sm-2">
                            <i class="fa fa-users" aria-hidden="true"></i>
                        </div>

                        <div class="client-center-div col-md-7 col-md-4 col-6 col-sm-5">
                            <i>Remaining seats: {{ (int) $service->seats - (int) $service->reserved }}</i>
                        </div>

                        <div class="client-left-div col-md-4 col-5 col-sm-5">
                            <form action="{{ route('book_services') }}" method="get">
                                <input hidden name="id" value="{{ $service->id }}">
                                <button etype="submit" class="btn btn-danger">Book Now</button>
                            </form>
                        </div>
                    </div>
                </div>
                @endif
            @endforeach
        @else
            <div class="client-borderd-div col-md-11 col-11 col-sm-11 m-5 col-xs-12 " style="color:black !important">
                No Records Found
            </div>
        @endif
    @endsection
