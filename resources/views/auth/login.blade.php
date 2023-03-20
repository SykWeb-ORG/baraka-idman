<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Login</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <style>
        img {
            height: 200px;
            width: 200px;
        }
    </style>
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sign In Start -->
        <div class="container-fluid">
            <div class="row align-items-center justify-content-center">
                {{-- <div class="container row">
                    <div class="col-4" style="height: inherit;">
                        <div class="rounded p-4 p-sm-5 mx-3 pos_login">
                            <img src="{{asset("images/sante-ministere.jpeg")}}" alt="" class="logo-login">
                        </div>
                    </div>
                    <div class="col-4" style="height: inherit;">
                        <div class="rounded p-4 p-sm-5 mx-3 pos_login">
                            <img src="{{asset("images/baraka-idman.jpeg")}}" alt="" class="logo-login">
                        </div>
                    </div>
                    <div class="col-4" style="height: inherit;">
                        <div class="rounded p-4 p-sm-5 mx-3 pos_login">
                            <img src="{{asset("images/3amala.jpeg")}}" alt="" class="logo-login">
                        </div>
                    </div>
                </div> --}}
                {{-- <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4" style="height: inherit;">
                    <div class="rounded p-4 p-sm-5 mx-3 pos_login">
                        <img src="{{asset("images/sante-ministere.jpeg")}}" alt="" class="logo-login">
                    </div>
                </div> --}}
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="top-pictures">
                        <div class="rounded p-4 p-sm-5 pos_login">
                            <img src="{{ asset('images/sante-ministere.png') }}" alt=""
                                class="logo-login">
                        </div>
                        <div class="rounded p-4 p-sm-5 pos_login">
                            <img src="{{ asset('images/baraka-idman.png') }}" alt=""
                                class="logo-login">
                        </div>
                        <div class="rounded p-4 p-sm-5 pos_login">
                            <img src="{{ asset('images/3amala.png') }}" alt="" class="logo-login">
                        </div>
                    </div>
                    <form action="{{ route('login') }}" method="post">
                        @csrf
                        <div class="bg-light rounded p-sm-4 mx-3">
                            {{-- <img src="{{ asset('images/baraka-idman.jpeg') }}" alt="" class="logo-login"> --}}
                            <div class="d-flex flex-column align-items-center justify-content-between mb-1 mt-6">
                                <h3 id="Sign-title">Sign In</h3>
                            </div>
                            <div class="form-floating mb-3 matricule" id="matricule-input">
                                <input type="number" class="form-control" id="floatingMat" name="matricule"
                                placeholder="123456">
                                <label for="floatingMat">Matricule Number</label>
                            </div>
                            <div class="form-floating mb-3" id="email-input">
                                <input type="email" class="form-control" id="floatingInput" name="email"
                                    placeholder="name@example.com">
                                <label for="floatingInput">Email address</label>
                            </div>
                            <div class="form-floating mb-4" id="passw-input">
                                <input type="password" class="form-control" id="floatingPassword" name="password"
                                    placeholder="Password">
                                <label for="floatingPassword">Password</label>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <a href="#" id="log-inter" onclick="interveantLogin()">T'es un intervenant?</a>
                            </div>
                            <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Sign In</button>
                        </div>
                    </form>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if ($msg = session()->get('msg'))
                        <div class="alert alert-{{ session()->get('status') }} alert-dismissible fade show"
                            role="alert">
                            <i class="fas {{ session()->get('icon') }}"></i> {{ $msg }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>;
                    @endif
                </div>
                {{-- <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4" style="height: inherit;">
                    <div class="rounded p-4 p-sm-5 mx-3 pos_login">
                        <img src="{{asset("images/3amala.jpeg")}}" alt="" class="logo-login">
                    </div>
                </div> --}}
            </div>
        </div>
        <!-- Sign In End -->
    </div>

    <!-- JavaScript Libraries -->
    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
