@extends('layouts.dashboard')

@section('content')
    <x-content_header page-title="Data Dosen" />

    <div class="app-content"> <!--begin::Container-->
        <div class="container-fluid"> <!--begin::Row-->
            <div class="row">
                <div class="col-12"> <!-- Default box -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Dosen</h3>
                            <div class="card-tools">
                                <x-modal-button type="button" btn-type="primary" target-modal="tambahDosenModal">
                                    <i class="bi bi-plus-square fs-6"></i>
                                    Tambah Dosen
                                </x-modal-button>
                                <x-modal-button type="button" btn-type="success" target-modal="importDosenModal">
                                    <i class="bi bi-file-earmark-plus fs-6"></i>
                                    Import Dosen
                                </x-modal-button>
                                <x-modal-button type="button" btn-type="warning" target-modal="tambahDosenModal">
                                    <i class="bi bi-file-earmark-arrow-down fs-6"></i>
                                    Export Dosen
                                </x-modal-button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-striped align-middle">
                                    <thead>
                                        <th>No.</th>
                                        <th>NIDN</th>
                                        <th>Nama Lengkap</th>
                                        <th></th>
                                    </thead>
                                    <tbody>
                                        @foreach ($dosen as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->nidn }}</td>
                                                <td>{{ $item->nama }}</td>
                                                <td>
                                                    <a href="#" class="badge text-bg-info d-inline-block"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        data-bs-title="Detail Dosen">
                                                        <i class="bi bi-info-circle"></i>
                                                    </a href="#">
                                                    <a href="#" class="badge text-bg-warning d-inline-block"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        data-bs-title="Edit Dosen">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </a href="#">
                                                    <a href="#" class="badge text-bg-danger d-inline-block"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        data-bs-title="Hapus ahasiswa">
                                                        <i class="bi bi-trash-fill"></i>
                                                    </a href="#">
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $dosen->links() }}
                            </div>
                        </div> <!-- /.card-body -->
                    </div> <!-- /.card -->
                </div>
            </div> <!--end::Row-->
        </div> <!--end::Container-->

        {{-- Modal Tambah Dosen --}}
        <x-modal-form modal-id="tambahDosenModal" modal-title="Tambah Dosen" modal-type="form" form-action="dosen.store"
            spoof-method="" params="">
            <div class="form-floating my-1">
                <input type="text" class="form-control" id="nidn" name="nidn">
                <label for="nidn">NIDN</label>
            </div>
            <div class="form-floating my-1">
                <input type="text" class="form-control" id="nama" name="nama">
                <label for="nama">Nama Dosen</label>
            </div>
        </x-modal-form>

        {{-- Modal Import Dosen --}}
        <x-modal-form modal-id="importDosenModal" modal-title="Import Dosen" modal-type="form" form-action="dosen.store"
            spoof-method="" params="">
            <div class="my-1">
                <input class="form-control" type="file" id="importDosen" name="importDosen">
            </div>
            <a href="#" class="badge text-bg-success d-inline-block text-decoration-none">
                Download Format
            </a>
        </x-modal-form>

    </div> <!--end::App Content-->
@endsection
