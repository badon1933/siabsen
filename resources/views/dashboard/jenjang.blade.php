@extends('layouts.dashboard')

@section('content')
    <x-content_header page-title="Data Jenjang" />

    <div class="app-content"> <!--begin::Container-->
        <div class="container-fluid"> <!--begin::Row-->
            <div class="row">
                <div class="col-12"> <!-- Default box -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Jenjang</h3>
                            <div class="card-tools">
                                <x-modal-button type="button" btn-type="primary" target-modal="tambahJenjangModal">
                                    <i class="bi bi-plus-square fs-6"></i>
                                    Tambah Jenjang
                                </x-modal-button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-striped align-middle">
                                    <thead>
                                        <th>No.</th>
                                        <th>Nama Jenjang</th>
                                        <th></th>
                                    </thead>
                                    <tbody>
                                        @foreach ($jenjang as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->nama }}</td>
                                                <td>
                                                    <a href="#" class="badge text-bg-info d-inline-block"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        data-bs-title="Detail mahasiswa">
                                                        <i class="bi bi-info-circle"></i>
                                                    </a href="#">
                                                    <x-modal-trigger type="badge" color="warning"
                                                        target-modal="editJenjang_{{ $item->id }}">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </x-modal-trigger>
                                                    <x-modal-trigger type="badge" color="danger"
                                                        target-modal="deleteJenjang_{{ $item->id }}">
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

        {{-- Modal Tambah Jenjang --}}
        <x-modal-form modal-id="tambahJenjangModal" modal-title="Tambah Jenjang" modal-type="form"
            form-action="jenjang.store" spoof-method="" params="">
            <div class="form-floating my-1">
                <input type="text" class="form-control" id="nama" name="nama">
                <label for="nama">Nama Jenjang</label>
            </div>
        </x-modal-form>

        {{-- Modal Edit Jenjang --}}
        @foreach ($jenjang as $item)
            <x-modal-form modal-id="editJenjang_{{ $item->id }}" modal-title="Edit Jenjang" modal-type="form"
                form-action="jenjang.update" spoof-method="PATCH" params="{{ $item->id }}">
                <div class="form-floating my-1">
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $item->nama }}">
                    <label for="nama">Nama Jenjang</label>
                </div>
            </x-modal-form>
        @endforeach

        {{-- Modal Hapus Jenjang --}}
        @foreach ($jenjang as $item)
            <x-modal-deletion modal-id="deleteJenjang_{{ $item->id }}" form-action="jenjang.destroy"
                param="{{ $item->id }}">
                <p>Apakah anda yakin ingin menghapus data ini?</p>
                <small class="text-danger">
                    Data yang sudah dihapus tidak dapat dikembalikan lagi.
                </small>
            </x-modal-deletion>
        @endforeach
    </div> <!--end::App Content-->
@endsection
