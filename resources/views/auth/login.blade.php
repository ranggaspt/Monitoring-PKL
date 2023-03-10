<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Auto Proctoring System</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('template/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('template/css/sb-admin-2.min.css')}}" rel="stylesheet">

</head>

<body style="background: #e2e8f0">
    <br>
    <br>
    <center>
        <img src="{{asset('images/logo text.png')}}" style="height: 80px;" alt="Image">
    </center>   
    

    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">

                        <div class="card shadow border-bottom-red">
                            <div class="card-header text-white font-weight-bold">
                                LOGIN
                            </div>

                            <div class="card-body">
                            @include('layouts.components.flash')
                                <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate="">
                                    @csrf
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input id="username" type="name" class="form-control rounded-pill @error('username') is-invalid @enderror" name="username" placeholder="Masukkan Username" value="{{ old('username') }}" tabindex="1" required autofocus>
                                        @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <div class="d-block">
                                            <label for="password" class="control-label @error('password') is-invalid @enderror">Password</label>
                                        </div>
                                        <input id="password" type="password" class="form-control rounded-pill" name="password" placeholder="Masukkan Password" tabindex="2" required>
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="remember" class="custom-control-input " tabindex="3" id="remember-me">
                                            <label class="custom-control-label" for="remember-me">Remember Me</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-lg btn-block btn-red" tabindex="4">
                                            Login
                                        </button>
                                    </div>
                                </form>
                                <hr>
                                {{-- <div class="text-center">
                                     <a class="small" href="{{ route('register') }}">Create an Account!</a>                                
                                </div> --}}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            @include('layouts.components.footerLogin')
        </section>
    </div>
    
</body>

</html>


