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
                                                <td>{{ $item->jenjang }}</td>
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
                                                        data-bs-toggle="modal"
                                                        data-bs-target="deleteProdi_{{ $item->id }}"
                                                        data-bs-title="Hapus ahasiswa">
                                                        <i class="bi bi-trash-fill"></i>
                                                    </a href="#">
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
        <x-modal modal-id="tambahProdiModal" modal-title="Tambah Prodi" modal-type="form" form-action="program_studi.store">
            <div class="form-floating my-1">
                <input type="text" class="form-control" id="nama" name="nama">
                <label for="nama">Nama prodi</label>
            </div>
            <div class="form-floating my-1">
                <input type="text" class="form-control" id="kode_prodi" name="kode_prodi">
                <label for="kode_prodi">Kode prodi</label>
            </div>
            <div class="form-floating my-1">
                <select class="form-select" id="jenjang" name="jenjang" aria-label="Floating label select example">
                    <option value="" style="display: none"></option>
                    <option value="D3">D3</option>
                    <option value="S1">DIV</option>
                    <option value="S1">S1</option>
                    <option value="Profesi">Profesi</option>
                </select>
                <label for="jenjang">Pilih Jenjang</label>
            </div>
        </x-modal>
        @foreach ($program_studi as $item)
            <x-modal-deletion modal-id="deleteProdi_{{ $item->id }}" form-action="program_studi.destroy"
                param="{{ $item->id }}">
                Apakah anda yakin ingin menghapus data ini? data yang sudah dihapus tidak dapat dikembalikan lagi.
            </x-modal-deletion>
        @endforeach
    </div> <!--end::App Content-->
@endsection