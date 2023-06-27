@extends('client.app')

@section('content')
    <div class="card">
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder fs-3 mb-1">Profile</span>
            </h3>
        </div>
    </div>


    <div class="col-md-11 col-11 col-sm-11 m-5 col-xs-12 profile-main-div">

        @if ($profile->status)
            <div class="row client-div main-div col-md-12 col-12 col-sm-12">
                <span class="black"> {{ $profile->status }} </span>
            </div>
        @endif

        <div class="row col-md-12 col-12 col-sm-12" style="background-color:#dddddd">GENERAL</div>

        <div class="row client-div col-md-12 col-12 col-sm-12">

            @if ($profile->name)
                <div>
                    <i class="fa fa-address-card-o" aria-hidden="true"></i>
                    <span class="black"> {{ $profile->name }}</span>
                </div>
            @endif

            @if ($profile->mobile)
                <div>
                    <i class="fa fa-mobile" aria-hidden="true"></i>
                    <span class="blue"> {{ $profile->mobile }}</span>
                </div>
            @endif

            @if ($profile->email)
                <div>
                    <i class="fa fa-envelope-open-o" aria-hidden="true"></i>
                    <span class="blue"> {{ $profile->email }}</span>
                </div>
            @endif

        </div>
        <div class="row col-md-12 col-12 col-sm-12" style="background-color:#dddddd">REGISTERED ADDRESS</div>
        <div class="row client-div col-md-12 col-12 col-sm-12">

            @if ($profile->created_at)
                <div>
                    <i class="fa fa-calendar-check-o" aria-hidden="true"></i>
                    <span class="black"> Member Since</span>
                    <span class="blue"> {{ $profile->created_at }} </span>
                </div>
            @endif

            @if ($profile->register)
                @if ($profile->register[0]->end_date)
                    <div>
                        <i class="fa fa-calendar-times-o" aria-hidden="true"></i>
                        <span class="black"> Renewal due on </span>
                        <span class="blue"> {{ $profile->register[0]->end_date }} </span>
                    </div>
                @endif

                <div style="font-size:1rem !important">
                    <i class="fa fa-share-square-o" style="font-size:1rem !important" aria-hidden="true"></i>
                    <span class="black"> To renew please contact the reception</span>
                </div>
            @endif

        </div>
    </div>
    <style>
        .profile-main-div {
            font-size: 1.3rem;
            color: black !important;
        }

        .profile-main-div .fa {
            color: black;
            font-size: 2rem !important;
            border-right: 1px solid grey;
            width: 5rem;
            margin-bottom: 1rem;
            padding:1rem;
        }

        .black {
            color: black !important
        }

        .blue {
            color: blue !important
        }
        span{
            padding-left:0.5rem
        }
    </style>
@endsection
