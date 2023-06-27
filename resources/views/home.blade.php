@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card container">
                    <div class="card-body gym-background center row">

                        <a href="{{ route('register.index') }}"><button
                                class="col-12 col-md-12 border border border-dark rounded btn btn-lg home-buttons">Register</button></a>

                        <a href="{{ route('session-payment.index') }}"><button
                                class="col-12 col-md-12 border border border-dark rounded btn btn-lg home-buttons">Sessions
                                Payment</button></a>

                        <a href="{{ route('clients.index') }}"><button
                                class="col-12 col-md-12 border border border-dark rounded btn btn-lg home-buttons">Clients</button></a>

                        <a href="{{ route('coache.index') }}"><button
                                class="col-12 col-md-12 border border border-dark rounded btn btn-lg home-buttons">Coaches</button></a>

                        <a href="{{ route('session.index') }}"><button
                                class="col-12 col-md-12 border border border-dark rounded btn btn-lg home-buttons">Sessions</button></a>


                        <a href="{{ route('notification.index') }}"><button
                                class="col-12 col-md-12 border border border-dark rounded btn btn-lg home-buttons">Notifications
                            </button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
