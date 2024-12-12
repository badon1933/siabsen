@extends('layouts.dashboard')

@section('content')
    <x-content_header page-title="Data Mahasiswa" />

    <div class="app-content"> <!--begin::Container-->
        <div class="container-fluid"> <!--begin::Row-->
            <div class="row">
                <div class="col-12"> <!-- Default box -->
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Mahasiswa</h3>
                            <div class="card-tools">
                                <x-modal-trigger type="button" color="primary" target-modal="tambahMahasiswa">
                                    <i class="bi bi-plus-square fs-6"></i>
                                    Tambah Mahasiswa
                                </x-modal-trigger>
                                <x-modal-trigger type="button" color="success" target-modal="importMahasiswa">
                                    <i class="bi bi-file-earmark-plus fs-6"></i>
                                    Import Mahasiswa
                                </x-modal-trigger>
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
                                    <a href="{{ route('mahasiswa.export') }}" class="btn btn-warning">
                                        <i class="bi bi-file-earmark-arrow-down"></i>
                                        Export Data Mahasiswa
                                    </a>
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
                                        @foreach ($mahasiswa as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->npm }}</td>
                                                <td>{{ $item->nama_lengkap }}</td>
                                                <td>{{ $item->program_studi->nama }}</td>
                                                <td>
                                                    <a href="#" class="badge text-bg-info d-inline-block"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        data-bs-title="Detail mahasiswa">
                                                        <i class="bi bi-info-circle"></i>
                                                    </a href="#">
                                                    <x-modal-trigger type="badge" color="warning"
                                                        target-modal="editMahasiswa_{{ $item->id }}">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </x-modal-trigger>
                                                    <x-modal-trigger type="badge" color="danger"
                                                        target-modal="deleteMahasiswa_{{ $item->id }}">
                                                        <i class="bi bi-trash-fill"></i>
                                                    </x-modal-trigger>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div> <!-- /.card-body -->
                    </div> <!-- /.card -->
                </div>
            </div> <!--end::Row-->
        </div> <!--end::Container-->

        {{-- Modal Tambah Mahasiswa --}}
        <x-modal-form modal-id="tambahMahasiswa" modal-title="Tambah Mahasiswa" modal-type="form"
            form-action="mahasiswa.store" spoof-method="" params="">
            <div class="form-floating my-1">
                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap">
                <label for="nama_lengkap">Nama Lengkap</label>
            </div>
            <div class="form-floating my-1">
                <input type="text" class="form-control" id="npm" name="npm">
                <label for="npm">NPM</label>
            </div>
            <div class="form-floating my-1">
                <input type="text" class="form-control" id="email" name="email">
                <label for="email">Email</label>
            </div>
            <x-input-select title="Program Studi" name="program_studi_id" :options="$program_studi" :custom="false" />
        </x-modal-form>

        {{-- Modal Import Mahasiswa --}}
        <div class="modal fade" id="importMahasiswa" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="importMahasiswaLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="importMahasiswaLabel">Import Mahasiswa</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('mahasiswa.import') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="my-1">
                                <input class="form-control" type="file" id="import_mahasiswa"
                                    name="import_mahasiswa">
                            </div>
                            <a href="{{ Storage::url('import_mhs.xlsx') }}"
                                class="badge text-bg-success d-inline-block text-decoration-none">
                                <i class="bi bi-download"></i>
                                Download Format
                            </a>
                            <a href="#" class="badge text-bg-primary d-inline-block text-decoration-none">
                                <i class="bi bi-eye"></i>
                                ID Program Studi
                            </a>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        {{-- Modal Edit Mahasiswa --}}
        @foreach ($mahasiswa as $item)
            <x-modal-form modal-id="editMahasiswa_{{ $item->id }}" modal-title="Edit Mahasiswa" modal-type="form"
                form-action="mahasiswa.update" spoof-method="PATCH" params="{{ $item->id }}">
                <div class="form-floating my-1">
                    <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap"
                        value="{{ $item->nama_lengkap }}">
                    <label for="nama_lengkap">Nama Lengkap</label>
                </div>
                <div class="form-floating my-1">
                    <input type="text" class="form-control" id="npm" name="npm"
                        value="{{ $item->npm }}">
                    <label for="npm">NPM</label>
                </div>
                <div class="form-floating my-1">
                    <input type="text" class="form-control" id="email" name="email"
                        value="{{ $item->email }}">
                    <label for="email">Email</label>
                </div>
                <x-input-select title="Program Studi" name="program_studi_id" :options="$program_studi" :custom="true">
                    @foreach ($program_studi as $prodi)
                        <option {{ $item->program_studi->id == $prodi->id ? 'selected' : '' }}
                            value="{{ $prodi->id }}">
                            {{ $prodi->nama }}</option>
                    @endforeach
                </x-input-select>
            </x-modal-form>
        @endforeach

        {{-- Modal Delete Mahasiswa --}}
        @foreach ($mahasiswa as $item)
            <x-modal-deletion modal-id="deleteMahasiswa_{{ $item->id }}" form-action="mahasiswa.destroy"
                param="{{ $item->id }}" />
        @endforeach
    </div> <!--end::App Content-->
@endsection
