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
@php
use App\Models\Participant;
     $jumlahRow = Participant::all()->count();
        $number = $jumlahRow + 1;
        $date = new DateTime();
        $timeNow = $date->format('dmy');
        $noreg = "REG-" . $timeNow . "-" . $number;
@endphp

<body style="background: #e2e8f0">
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">

                        <div class="card shadow border-bottom-orange">
                            <div class="card-header ">
                                <h5 class="text-white font-weight-bold mt-2">REGISTER</h5>
                            </div>

                            <div class="card-body">
                            @include('layouts.components.flash')

                                <form method="POST" action="{{ route('register') }}" class="needs-validation" novalidate="">
                                    @csrf
                                    <div class="form-group{{ $errors->has('no_reg') ? ' has-error' : '' }}">
                                        <label for="no_reg" class="col-md-4 control-label">Nomor Registrasi</label>
                                        <input id="no_reg" type="text" class="form-control" name="no_reg" readonly value="{{$noreg}}" required>
                                        @if ($errors->has('no_reg'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('no_reg') }}</strong>
                                        </span>
                                        @endif
                                    </div>


                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Masukkan name" value="{{ old('name') }}" tabindex="1" required autofocus>
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" placeholder="Masukkan Username" value="{{ old('username') }}" tabindex="2" required autofocus>
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
                                        <input id="password" type="password" class="form-control" name="password" tabindex="3" required placeholder="Masukkan Password" autocomplete="new-password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <div class="d-block">
                                            <label for="password-confirm" class="control-label @error('password-confirm') is-invalid @enderror">Konfirmasi Password</label>
                                        </div>
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password" placeholder="Konfirmasi Password"  tabindex="4" required>
                                        @error('password-confirm')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-orange btn-lg btn-block" tabindex="4">
                                            Register
                                        </button>
                                    </div>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="{{ route('login') }}">Already have an Account? Login</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>
</body>

</html>
