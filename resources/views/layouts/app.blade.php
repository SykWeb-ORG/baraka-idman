<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>@yield('title')</title>

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="{{asset("fontawesome-free-5.10.0-web/css/all.min.css")}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset("css/bootstrap.min.css")}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{asset("css/style.css")}}" rel="stylesheet">
</head>
<body>
    <div class="alert showAlert hide d-none">
        <span class="fas fa-check"></span>
        <span class="msg"></span>
        <span class="close-btn" id="close-btn">
            <span class="fas fa-times"></span>
        </span>
    </div>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        @include('layouts.partials.sidebar')

        <!-- Content Start -->
        <div class="content">
            @include('layouts.partials.topbar')
            @yield('content_page')
            @if ($errors->any())
                <div class="alert-danger mt-3 mx-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @include('layouts.partials.footer')
        </div>
        <!-- Content End -->

        {{-- <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a> --}}
    </div>



    <!-- JavaScript Libraries -->
    <script src="{{asset("js/jquery-3.4.1.min.js")}}"></script>
    <script src="{{asset("js/bootstrap.bundle.min.js")}}"></script>
    <script src="{{asset("js/waypoints/waypoints.min.js")}}"></script>
    <script src="{{asset("js/waypoints/waypoints.min.js")}}"></script>

    <!-- Template Javascript -->
    <script src="{{asset("js/main.js")}}"></script>
    <script src="{{asset("jsApi/axios-app.js")}}"></script>
    <script src="{{asset("jsApi/app.js")}}"></script>

    @yield('custom_scripts')
    @if (session('msg'))
        <script id="script-alert">
            alertMsg("{{session('msg')}}");
            setTimeout(() => {
                $("script#script-alert").remove();
            }, 100);
        </script>
    @endif
</body>
</html>