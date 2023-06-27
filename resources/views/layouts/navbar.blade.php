<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container-fluid">
            <div class="">
                <a href="{{ route('home') }}"> <img src="{{ asset('assets/images/logo.png') }}" class="logo-img" style="border:1px solid grey; border-radius:10px;"/> </a>
            </div>


        @if (Auth::user())
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav col-md-9" >
                    <a href="#" class="nav-item nav-link active" style="color:white">Welcome Back, <a id="navbarDropdown"
                            class="nav-link" href="#" role="button" data-bs-toggle="dropdown" style="color:white"
                            aria-haspopup="true" aria-expanded="false" v-pre>

                            {{ Auth::user()->name }}

                        </a>
                    </a>
                </div>

                <div class="navbar-nav" style="color:white">
                    <div class="text-align-right" style=" text-align: right;">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                    </a>
                </div>
            </div>

        @endif
    </div>
</nav>
