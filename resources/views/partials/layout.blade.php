<html>
    <head>
        <title>User Manager - @yield('title')</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="https://fonts.googleapis.com/css?family=Roboto|Roboto+Slab" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="{{url('css/style.css')}}" rel="stylesheet" type="text/css">
        @yield('style')
    </head>
    <body>
        <div id="app">
            <div class="header-container row">
                <div class="header-logo-container col-md-6">
                    <a href="#">
                        <h4><span class="logo-user">USER</span> <span class="logo-manager">MANAGER</span></h4>
                    </a>
                </div>
                <div class="col-md-6 text-right">
                    <a href="#">Logout</a>
                </div>
            </div>
            <div class="container">
                @yield('content')
            </div>
        </div>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="{{asset('js/app.js'}}"></script>
        @yield('script')
    </body>
</html