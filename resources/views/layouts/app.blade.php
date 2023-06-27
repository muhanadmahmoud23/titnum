@include('layouts.head')

<body class="gym-background">
    <div id="app">
        @include('layouts.navbar')

        <main class="py-4 col-12">
            @include('layouts.alert')
            @yield('content')
        </main>
    </div>
</body>

@include('layouts.footer')

</html>
