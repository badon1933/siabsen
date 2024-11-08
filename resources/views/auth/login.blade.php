@extends('layouts.auth')

@section('content')
    <div class="login-box">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <a href="#" class="link-dark text-center link-offset-2 link-opacity-100 link-opacity-50-hover">
                    <h1 class="mb-0">
                        SI<b>ABSEN</b>
                    </h1>
                </a>
            </div>
            <div class="card-body login-card-body">
                <p class="login-box-msg">Masuk ke halaman SIABSEN</p>
                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="input-group mb-1">
                        <div class="form-floating">
                            <input id="loginEmail" name="email" type="email" class="form-control" placeholder="">
                            <label for="loginEmail">Email</label>
                        </div>
                        <div class="input-group-text">
                            <span class="bi bi-envelope"></span>
                        </div>
                    </div>
                    <div class="input-group mb-1">
                        <div class="form-floating">
                            <input id="loginPassword" name="password" type="password" class="form-control" placeholder="">
                            <label for="loginPassword">Password</label>
                        </div>
                        <div class="input-group-text"> <span class="bi bi-lock-fill"></span> </div>
                    </div>
                    <input type="hidden" name="timezone" id="timezone">
                    <div class="d-grid my-3">
                        <button type="submit" class="btn btn-primary">Sign in</button>
                    </div>
                </form>
                <p class="mb-0">
                    Belum punya akun? klik
                    <a href="{{ route('register') }}" class="text-center">
                        Register
                    </a>
                </p>
            </div> <!-- /.login-card-body -->
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.13/moment-timezone-with-data.js"></script>
    <script type="text/javascript">
        let timezone = moment.tz.guess();
        document.getElementById('timezone').value = timezone;
    </script>
@endsection
