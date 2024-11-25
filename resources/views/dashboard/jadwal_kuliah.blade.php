@extends('layouts.dashboard')

@section('content')
    <x-content_header page-title="Jadwal Kuliah" />

    <div class="app-content"> <!--begin::Container-->
        <div class="container-fluid"> <!--begin::Row-->
            <div class="row mb-3">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Jadwal Kuliah</h3>
                            <div class="card-tools d-flex align-items-center">
                                <x-modal-button type="button" btn-type="primary" target-modal="tambahProdiModal">
                                    <i class="bi bi-plus-square fs-6"></i>
                                    Tambah Jadwal Kuliah
                                </x-modal-button>
                                <div class="form-floating mx-1">
                                    <select class="form-select" id="program_studi_id"
                                        aria-label="Floating label select example">
                                        <option selected style="display: none">Pilih Program Studi</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                    <label for="program_studi_id">Program Studi</label>
                                </div>
                                <div class="form-floating mx-1">
                                    <select class="form-select" id="kelas_id" aria-label="Floating label select example">
                                        <option selected style="display: none">Pilih Kelas</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                    <label for="kelas_id">Kelas</label>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-striped align-middle">
                                    <thead>
                                        <th>No.</th>
                                        <th>Program Studi</th>
                                        <th>Kelas</th>
                                        <th>Mata Kuliah</th>
                                        <th>Pertemuan</th>
                                        <th></th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1.</td>
                                            <td>Kebidanan</td>
                                            <td>A</td>
                                            <td>Pengantar Asuhan Kebidanan</td>
                                            <td>1</td>
                                            <td>
                                                <a href="#" class="badge text-bg-info d-inline-block"
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    data-bs-title="Detail mahasiswa">
                                                    <i class="bi bi-info-circle"></i>
                                                </a href="#">
                                                <x-modal-trigger type="badge" color="warning" target-modal="editProdi_">
                                                    <i class="bi bi-pencil-square"></i>
                                                </x-modal-trigger>
                                                <x-modal-trigger type="badge" color="danger" target-modal="deleteProdi_">
                                                    <i class="bi bi-trash-fill"></i>
                                                </x-modal-trigger>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div> <!-- /.card-body -->
                    </div> <!-- /.card -->
                </div>
            </div>
            <div class="row row-cols-lg-4 row-cols-md-2 row-cols-1 g-3 justify-content-center">
                <div class="col"> <!-- Default box -->
                    <div class="card">
                        <div class="card-header text-center">
                            <span class="fs-3 text-center">Senin</span>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Mata Kuliah</th>
                                        <th>Jam Kuliah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            Asuhan Kebidanan Komunitas
                                        </td>
                                        <td>
                                            08.00-09.00
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Asuhan Kebidanan Komunitas
                                        </td>
                                        <td>
                                            08.00-09.00
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Asuhan Kebidanan Komunitas
                                        </td>
                                        <td>
                                            08.00-09.00
                                        </td>
                                    </tr>
                                </tbody>

                            </table>
                        </div> <!-- /.card-body -->
                    </div> <!-- /.card -->
                </div>
                <div class="col"> <!-- Default box -->
                    <div class="card">
                        <div class="card-header text-center">
                            <span class="fs-3 text-center">Selasa</span>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Mata Kuliah</th>
                                        <th>Jam Kuliah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            Asuhan Kebidanan Komunitas
                                        </td>
                                        <td>
                                            08.00-09.00
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Asuhan Kebidanan Komunitas
                                        </td>
                                        <td>
                                            08.00-09.00
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Asuhan Kebidanan Komunitas
                                        </td>
                                        <td>
                                            08.00-09.00
                                        </td>
                                    </tr>
                                </tbody>

                            </table>
                        </div> <!-- /.card-body -->
                    </div> <!-- /.card -->
                </div>
                <div class="col"> <!-- Default box -->
                    <div class="card">
                        <div class="card-header text-center">
                            <span class="fs-3 text-center">Rabu</span>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Mata Kuliah</th>
                                        <th>Jam Kuliah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            Asuhan Kebidanan Komunitas
                                        </td>
                                        <td>
                                            08.00-09.00
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Asuhan Kebidanan Komunitas
                                        </td>
                                        <td>
                                            08.00-09.00
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Asuhan Kebidanan Komunitas
                                        </td>
                                        <td>
                                            08.00-09.00
                                        </td>
                                    </tr>
                                </tbody>

                            </table>
                        </div> <!-- /.card-body -->
                    </div> <!-- /.card -->
                </div>
                <div class="col"> <!-- Default box -->
                    <div class="card">
                        <div class="card-header text-center">
                            <span class="fs-3 text-center">Kamis</span>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Mata Kuliah</th>
                                        <th>Jam Kuliah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            Asuhan Kebidanan Komunitas
                                        </td>
                                        <td>
                                            08.00-09.00
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Asuhan Kebidanan Komunitas
                                        </td>
                                        <td>
                                            08.00-09.00
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Asuhan Kebidanan Komunitas
                                        </td>
                                        <td>
                                            08.00-09.00
                                        </td>
                                    </tr>
                                </tbody>

                            </table>
                        </div> <!-- /.card-body -->
                    </div> <!-- /.card -->
                </div>
                <div class="col"> <!-- Default box -->
                    <div class="card">
                        <div class="card-header text-center">
                            <span class="fs-3 text-center">Jum'at</span>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Mata Kuliah</th>
                                        <th>Jam Kuliah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            Asuhan Kebidanan Komunitas
                                        </td>
                                        <td>
                                            08.00-09.00
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Asuhan Kebidanan Komunitas
                                        </td>
                                        <td>
                                            08.00-09.00
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Asuhan Kebidanan Komunitas
                                        </td>
                                        <td>
                                            08.00-09.00
                                        </td>
                                    </tr>
                                </tbody>

                            </table>
                        </div> <!-- /.card-body -->
                    </div> <!-- /.card -->
                </div>
                <div class="col"> <!-- Default box -->
                    <div class="card">
                        <div class="card-header text-center">
                            <span class="fs-3 text-center">Sabtu</span>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Mata Kuliah</th>
                                        <th>Jam Kuliah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            Asuhan Kebidanan Komunitas
                                        </td>
                                        <td>
                                            08.00-09.00
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Asuhan Kebidanan Komunitas
                                        </td>
                                        <td>
                                            08.00-09.00
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Asuhan Kebidanan Komunitas
                                        </td>
                                        <td>
                                            08.00-09.00
                                        </td>
                                    </tr>
                                </tbody>

                            </table>
                        </div> <!-- /.card-body -->
                    </div> <!-- /.card -->
                </div>
            </div> <!--end::Row-->
        </div> <!--end::Container-->
    </div> <!--end::App Content-->
@endsection
