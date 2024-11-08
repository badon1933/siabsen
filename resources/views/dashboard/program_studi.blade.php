@extends('layouts.dashboard')

@section('content')
    <x-content_header page-title="Data Program Studi" />

    <div class="app-content"> <!--begin::Container-->
        <div class="container-fluid"> <!--begin::Row-->
            <div class="row">
                <div class="col-12"> <!-- Default box -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Program Studi</h3>
                            <div class="card-tools">
                                <x-modal-button type="button" btn-type="primary" target-modal="tambahProdiModal">
                                    <i class="bi bi-plus-square fs-6"></i>
                                    Tambah Program Studi
                                </x-modal-button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-striped align-middle">
                                    <thead>
                                        <th>No.</th>
                                        <th>Program Studi</th>
                                        <th>Kode Prodi</th>
                                        <th>Jenjang</th>
                                        <th></th>
                                    </thead>
                                    <tbody>
                                        @foreach ($program_studi as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->nama }}</td>
                                                <td>{{ $item->kode_prodi }}</td>
                                                <td>{{ $item->jenjang->nama }}</td>
                                                <td>
                                                    <a href="#" class="badge text-bg-info d-inline-block"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        data-bs-title="Detail mahasiswa">
                                                        <i class="bi bi-info-circle"></i>
                                                    </a href="#">
                                                    <x-modal-trigger type="badge" color="warning"
                                                        target-modal="editProdi_{{ $item->id }}">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </x-modal-trigger>
                                                    <x-modal-trigger type="badge" color="danger"
                                                        target-modal="deleteProdi_{{ $item->id }}">
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

        {{-- Modal Tambah Prodi --}}
        <x-modal-form modal-id="tambahProdiModal" modal-title="Tambah Prodi" modal-type="form"
            form-action="program_studi.store" spoof-method="" params="">
            <div class="form-floating my-1">
                <input type="text" class="form-control" id="nama" name="nama">
                <label for="nama">Nama prodi</label>
            </div>
            <div class="form-floating my-1">
                <input type="text" class="form-control" id="kode_prodi" name="kode_prodi">
                <label for="kode_prodi">Kode prodi</label>
            </div>
            <div class="form-floating my-1">
                <select class="form-select" id="jenjang_id" name="jenjang_id" aria-label="Floating label select example">
                    <option value="" style="display: none"></option>
                    @foreach ($jenjang as $item)
                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                    @endforeach
                </select>
                <label for="jenjang">Pilih Jenjang</label>
            </div>
        </x-modal-form>

        {{-- Modal Edit Prodi --}}
        @foreach ($program_studi as $item)
            <x-modal-form modal-id="editProdi_{{ $item->id }}" modal-title="Tambah Prodi" modal-type="form"
                form-action="program_studi.update" spoof-method="PATCH" params="{{ $item->id }}">
                <div class="form-floating my-1">
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $item->nama }}">
                    <label for="nama">Nama prodi</label>
                </div>
                <div class="form-floating my-1">
                    <input type="text" class="form-control" id="kode_prodi" name="kode_prodi"
                        value="{{ $item->kode_prodi }}">
                    <label for="kode_prodi">Kode prodi</label>
                </div>
                <div class="form-floating my-1">
                    <select class="form-select" id="jenjang" name="jenjang" aria-label="Floating label select example">
                        <option value="" style="display: none"></option>
                        @foreach ($jenjang as $item)
                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                        @endforeach
                    </select>
                    <label for="jenjang">Pilih Jenjang</label>
                </div>
            </x-modal-form>
        @endforeach

        @foreach ($program_studi as $item)
            <x-modal-deletion modal-id="deleteProdi_{{ $item->id }}" form-action="program_studi.destroy"
                param="{{ $item->id }}">
                <p>Apakah anda yakin ingin menghapus data ini?</p>
                <small class="text-danger">
                    Data yang sudah dihapus tidak dapat dikembalikan lagi.
                </small>
            </x-modal-deletion>
        @endforeach
    </div> <!--end::App Content-->
@endsection
