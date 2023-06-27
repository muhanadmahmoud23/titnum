<?php
$notificationCount = \App\Models\Notification::count();
?>

<div class="nav-mobile">


    <div class="hidden-lg hidden-md visible-sm visible-xs d-flex justify-content-between ">
        <a style="font-size:2rem; font-weight:700; padding-left:1rem">{{ Auth::user()->name }}</a>
        <i class="fa fa-align-justify" aria-hidden="true" style="color: black;"></i>

        <ul class="menu">
            <li class="images"><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('schedule') }}">My schedule</a></li>
            <li><a href="{{ route('paidServices') }}">My paid services</a></li>
            <li><a href="{{ route('book_services') }}"> Book your seat</a></li>
            <li><a href="{{ route('notifications') }}">Notifiacations <span class="border rounded p-1"
                        style="background-color:#ed145b">{{ $notificationCount }} </span></a></li>
            <li><a href="{{ route('profile') }}">My profile</a></li>
            <li><a href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
            </li>
            <li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>

    </div>

</div>


<div class="col-3 nav-desktop">
    <aside class="sidebar col-lg-12 col-md-12 col-xs-12 mb-12">
        <div class="dynamicDiv" id="dd.0.4.0">
            <div class="sidebar-wrapper">
                <nav>
                    <ul class="nolist hidden-sm hidden-xs">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('schedule') }}">My Schedule</a></li>
                        <li><a href="{{ route('paidServices') }}">My paid services</a></li>
                        <li><a href="{{ route('book_services') }}"> Book your seat</a></li>
                        <li><a href="{{ route('notifications') }}">Notifications
                                <span class="border rounded p-3"
                                    style="background-color:#ed145b">{{ $notificationCount }} </span></a></li>
                        <hr>
                        <li><a href="{{ route('profile') }}">My Profile</a></li>

                        <li><a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>

                    </ul>
                </nav>
            </div><!-- .sidebar-wrapepr -->
        </div>
    </aside>
</div>

<script>
    jQuery(document).ready(function($) {
        $('#sub-menu').on('change', function() {
            var url = $(this).val(); // get selected value
            if (url) { // require a URL
                window.location = url; // redirect
            }
            return false;
        });
        $('.fa-align-justify').on('click', function(e) {
            if (!$(e.target).is('.fa-align-justify')) {
                $(".menu").removeClass("menu-hide");
            }
            $(".menu").toggleClass("menu-hide");
        })
    });
</script>
