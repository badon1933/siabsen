@extends('layouts.dashboard')

@section('content')
    <x-content_header page-title="Data Mata Kuliah" />

    <div class="app-content"> <!--begin::Container-->
        <div class="container-fluid"> <!--begin::Row-->
            <div class="row">
                <div class="col-12"> <!-- Default box -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Mata Kuliah</h3>
                            <div class="card-tools">
                                <x-modal-button type="button" btn-type="primary" target-modal="tambahMatkulModal">
                                    <i class="bi bi-plus-square fs-6"></i>
                                    Tambah Mata Kuliah
                                </x-modal-button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-striped align-middle">
                                    <thead>
                                        <th>No.</th>
                                        <th>Mata Kuliah</th>
                                        <th>Kode Mata Kuliah</th>
                                        <th>Program Studi</th>
                                        <th></th>
                                    </thead>
                                    <tbody>
                                        @foreach ($mata_kuliah as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->nama }}</td>
                                                <td>{{ $item->kode_matkul }}</td>
                                                <td>
                                                    {{ $item->program_studi->jenjang->nama }} -
                                                    {{ $item->program_studi->nama }}
                                                </td>
                                                <td>
                                                    <a href="#" class="badge text-bg-info d-inline-block"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        data-bs-title="Detail mahasiswa">
                                                        <i class="bi bi-info-circle"></i>
                                                    </a href="#">
                                                    <x-modal-trigger type="badge" color="warning"
                                                        target-modal="editMatkul_{{ $item->id }}">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </x-modal-trigger>
                                                    <x-modal-trigger type="badge" color="danger"
                                                        target-modal="deleteMatkul_{{ $item->id }}">
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

        {{-- Modal Tambah Matkul --}}
        <x-modal-form modal-id="tambahMatkulModal" modal-title="Tambah Mata Kuliah" modal-type="form"
            form-action="mata_kuliah.store" spoof-method="" params="">
            <div class="form-floating my-1">
                <input type="text" class="form-control" id="nama" name="nama">
                <label for="nama">Nama Mata Kuliah</label>
            </div>
            <div class="form-floating my-1">
                <input type="text" class="form-control" id="kode_matkul" name="kode_matkul">
                <label for="kode_matkul">Kode Mata Kuliah</label>
            </div>
            <x-input-select title="Program Studi" name="program_studi_id" :options="$program_studi" :custom="false" />
        </x-modal-form>

        {{-- Modal Edit matkul --}}
        @foreach ($mata_kuliah as $mk)
            <x-modal-form modal-id="editMatkul_{{ $mk->id }}" modal-title="Edit Mata Kuliah" modal-type="form"
                form-action="mata_kuliah.update" spoof-method="PATCH" params="{{ $mk->id }}">
                <div class="form-floating my-1">
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $mk->nama }}">
                    <label for="nama">Nama Mata Kuliah</label>
                </div>
                <div class="form-floating my-1">
                    <input type="text" class="form-control" id="kode_matkul" name="kode_matkul"
                        value="{{ $mk->kode_matkul }}">
                    <label for="kode_matkul">Kode Mata Kuliah</label>
                </div>
                <div class="form-floating my-1">
                    <select class="form-select" id="program_studi_id" name="program_studi_id"
                        aria-label="Floating label select example">
                        @foreach ($program_studi as $p)
                            <option {{ $mk->program_studi->id == $p->id ? 'selected' : '' }} value="{{ $p->id }}">
                                {{ $p->jenjang->nama }} - {{ $p->nama }}
                            </option>
                        @endforeach
                    </select>
                    <label for="program_studi_id">Pilih Program Studi</label>
                </div>
            </x-modal-form>
        @endforeach

        @foreach ($mata_kuliah as $item)
            <x-modal-deletion modal-id="deleteMatkul_{{ $item->id }}" form-action="mata_kuliah.destroy"
                param="{{ $item->id }}">
                <p>Apakah anda yakin ingin menghapus data ini?</p>
                <small class="text-danger">
                    Data yang sudah dihapus tidak dapat dikembalikan lagi.
                </small>
            </x-modal-deletion>
        @endforeach
    </div> <!--end::App Content-->
@endsection
