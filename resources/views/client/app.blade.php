@include('layouts.head')

<body class="gym-background">
    <div id="app" class="row">
        @include('layouts.sidebar')


        <main class="py-4 sidebar-mobile">
            @include('layouts.alert')
            @yield('content')
        </main>
    </div>
</body>

@include('layouts.footer')

</html>
