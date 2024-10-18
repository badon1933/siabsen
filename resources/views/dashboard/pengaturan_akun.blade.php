@extends('layouts.dashboard')

@section('content')
    <x-content_header page-title="Pengaturan Akun" />

    <div class="app-content"> <!--begin::Container-->
        <div class="container-fluid"> <!--begin::Row-->
            <div class="row g-2">
                <div class="col-12 col-md-4 col-lg-4"> <!-- Default box -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Profil</h3>
                        </div>
                        <div class="card-body text-center">
                            <img src="../../../dist/assets/img/user2-160x160.jpg" class="rounded-circle shadow my-1"
                                alt="User Image">
                            <div class="form-floating my-1">
                                <input id="nama" type="text" class="form-control" value="{{ $user->name }}"
                                    disabled>
                                <label for="nama">Nama</label>
                            </div>
                            <div class="form-floating my-1">
                                <input id="npm" type="text" class="form-control" value="15523049" disabled>
                                <label for="npm">NPM</label>
                            </div>
                        </div> <!-- /.card-body -->
                    </div> <!-- /.card -->
                </div>
                <div class="col-12 col-md-8 col-lg-8"> <!-- Default box -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Ubah Password</h3>
                        </div>
                        <form action="{{ route('update_password') }}" method="post">
                            @csrf
                            <div class="card-body text-center">
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                @if (session('failed'))
                                    <div class="alert alert-danger">
                                        {{ session('failed') }}
                                    </div>
                                @endif
                                <div class="form-floating my-1">
                                    <input id="password_lama" name="password_lama" type="password"
                                        class="form-control @error('password_lama') is-invalid @enderror">
                                    <label for="password_lama">Password Lama</label>
                                    @error('password_lama')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-floating my-1">
                                    <input id="password_baru" name="password_baru" type="password"
                                        class="form-control @error('password_baru') is-invalid @enderror">
                                    <label for="password_baru">Password Baru</label>
                                    @error('password_baru')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-floating my-1">
                                    <input id="konfirmasi_password" name="konfirmasi_password" type="password"
                                        class="form-control @error('konfirmasi_password') is-invalid @enderror">
                                    <label for="konfirmasi_password">Konfirmasi Password</label>
                                    @error('konfirmasi_password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div> <!-- /.card-body -->
                            <div class="card-footer d-grid">
                                <button type="submit" class="btn btn-primary">Ubah Password</button>
                            </div>
                        </form>
                    </div> <!-- /.card -->
                </div>
            </div> <!--end::Row-->
        </div> <!--end::Container-->
    </div> <!--end::App Content-->
@endsection
