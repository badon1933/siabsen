@extends('layouts.auth')

@section('content')
    <div class="register-box"> <!-- /.register-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header">
                <a href="#" class="link-dark text-center link-offset-2 link-opacity-100 link-opacity-50-hover">
                    <h1 class="mb-0">
                        SI<b>ABSEN</b>
                    </h1>
                </a>
            </div>
            <div class="card-body register-card-body">
                <p class="register-box-msg">Registrasi akun SIABSEN</p>
                <form action="{{ route('register') }}" method="post">
                    @csrf
                    @if ($errors->any())
                        <ul>
                            @foreach ($errors->all as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="input-group mb-1">
                        <div class="form-floating"> <input id="registerFullName" type="text"
                                class="form-control @error('name') is-invalid @enderror" placeholder="" name="name">
                            <label for="registerFullName">Full Name</label>
                        </div>
                        <div class="input-group-text"> <span class="bi bi-person"></span> </div>
                        @error('name')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="input-group mb-1">
                        <div class="form-floating"> <input id="registerEmail" type="email"
                                class="form-control @error('email') is-invalid @enderror" placeholder="" name="email">
                            <label for="registerEmail">Email</label>
                        </div>
                        <div class="input-group-text"> <span class="bi bi-envelope"></span> </div>
                        @error('email')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="input-group mb-1">
                        <div class="form-floating"> <input id="registerPassword" type="password"
                                class="form-control @error('password') is-invalid @enderror" placeholder="" name="password">
                            <label for="registerPassword">Password</label>
                        </div>
                        <div class="input-group-text"> <span class="bi bi-lock-fill"></span> </div>
                        @error('password')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="input-group mb-1">
                        <div class="form-floating"> <input id="password_confirmation" type="password"
                                class="form-control @error('password_confirmation') is-invalid @enderror" placeholder=""
                                name="password_confirmation">
                            <label for="password_confirmation">Ulangi Password</label>
                        </div>
                        <div class="input-group-text"> <span class="bi bi-lock-fill"></span> </div>
                        @error('password_confirmation')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="d-grid my-3">
                        <button type="submit" class="btn btn-primary">Buat Akun</button>
                    </div>
                </form>
                <p class="mb-0">
                    Sudah punya akun? klik
                    <a href="{{ route('login') }}" class="link-primary text-center">
                        Login
                    </a>
                </p>
            </div> <!-- /.register-card-body -->
        </div>
    </div>
@endsection
