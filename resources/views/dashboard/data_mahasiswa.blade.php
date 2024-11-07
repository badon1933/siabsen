@extends('layouts.dashboard')

@section('content')
    <x-content_header page-title="Data Mahasiswa" />

    <div class="app-content"> <!--begin::Container-->
        <div class="container-fluid"> <!--begin::Row-->
            <div class="row">
                <div class="col-12"> <!-- Default box -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Mahasiswa</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-primary">
                                    <i class="bi bi-plus-square fs-6"></i>
                                    Tambah Mahasiswa
                                </button>
                                <button type="button" class="btn btn-success">
                                    <i class="bi bi-file-earmark-plus fs-6"></i>
                                    Import Mahasiswa
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row g-1 align-items-center justify-content-between">
                                <div class="col-12 col-md-3 col-lg-3">
                                    <div class="form-floating">
                                        <select class="form-select" id="tahun_ajaran"
                                            aria-label="Floating label select example">
                                            <option selected>Pilih tahun ajaran</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                        <label for="tahun_ajaran">Tahun ajaran</label>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3 col-lg-3">
                                    <div class="form-floating">
                                        <select class="form-select" id="tahun_ajaran"
                                            aria-label="Floating label select example">
                                            <option selected>Pilih program studi</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                        <label for="tahun_ajaran">Program studi</label>
                                    </div>
                                </div>
                                <div
                                    class="col-12 col-md-3 col-lg-3 offset-md-3 offset-lg-3 text-md-end text-lg-end text-sm-center">
                                    <button type="button" class="btn btn-warning">
                                        <i class="bi bi-file-earmark-arrow-down"></i>
                                        Export Data Mahasiswa
                                    </button>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover table-striped align-middle">
                                    <thead>
                                        <th>No.</th>
                                        <th>NPM</th>
                                        <th>Nama Lengkap</th>
                                        <th>Program Studi</th>
                                        <th></th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>15523049</td>
                                            <td>Muhammad Ramadhan Firdaus</td>
                                            <td>S1 Informatika</td>
                                            <td>
                                                <a href="#" class="badge text-bg-info d-inline-block"
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    data-bs-title="Detail mahasiswa">
                                                    <i class="bi bi-info-circle"></i>
                                                </a href="#">
                                                <a href="#" class="badge text-bg-warning d-inline-block"
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    data-bs-title="Edit mahasiswa">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a href="#">
                                                <a href="#" class="badge text-bg-danger d-inline-block"
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    data-bs-title="Hapus ahasiswa">
                                                    <i class="bi bi-trash-fill"></i>
                                                </a href="#">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div> <!-- /.card-body -->
                    </div> <!-- /.card -->
                </div>
            </div> <!--end::Row-->
        </div> <!--end::Container-->
    </div> <!--end::App Content-->
@endsection
