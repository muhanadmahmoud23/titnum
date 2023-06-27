@extends('client.app')

@section('content')

    <div class="card">
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder fs-3 mb-1">Notifiacations</span>
            </h3>
        </div>
    </div>

    @if (count($notifications) > 0)
        @foreach ($notifications as $notification)
            <div class="client-borderd-div col-md-11 col-11 col-sm-11 m-5 col-xs-12">
                <div class="row col-md-12 col-12 col-sm-12">
                    <div class="client-right-div col-md-1 col-2 col-sm-2">
                        <i class="fa fa-bars" style="red"> </i>
                    </div>

                    <div class="client-center-div col-md-10 col-md-4 col-10 col-sm-10">
                        {{ $notification->name }}
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <div class="client-borderd-div col-md-11 col-11 col-sm-11 m-5 col-xs-12 " style="color:black !important">
            No Notifations Found
        </div>
    @endif
@endsection
