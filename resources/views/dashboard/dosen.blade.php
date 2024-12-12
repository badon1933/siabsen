@extends('layouts.dashboard')

@section('content')
    <x-content_header page-title="Data Dosen" />

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
                                                    <x-modal-trigger type="badge" color="warning"
                                                        target-modal="editDosen_{{ $item->id }}">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </x-modal-trigger>
                                                    <x-modal-trigger type="badge" color="danger"
                                                        target-modal="deleteDosen_{{ $item->id }}">
                                                        <i class="bi bi-trash-fill"></i>
                                                    </x-modal-trigger>
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
            <div class="form-floating my-1">
                <input type="email" class="form-control" id="email" name="email">
                <label for="email">Email</label>
            </div>
        </x-modal-form>

        {{-- Modal Import Dosen --}}
        <div class="modal fade" id="importDosenModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="importDosenModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="importDosenModalLabel">Import Dosen</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('dosen.import') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="my-1">
                                <input class="form-control" type="file" id="import_dosen" name="import_dosen">
                            </div>
                            <a href="{{ Storage::url('import_dosen.xlsx') }}"
                                class="badge text-bg-success d-inline-block text-decoration-none">
                                <i class="bi bi-download"></i>
                                Download Format
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

        {{-- Modal Edit Dosen --}}
        @foreach ($dosen as $item)
            <x-modal-form modal-id="editDosen_{{ $item->id }}" modal-title="Edit Dosen" modal-type="form"
                form-action="dosen.update" spoof-method="PATCH" params="{{ $item->id }}">
                <div class="form-floating my-1">
                    <input type="text" class="form-control" id="nama" name="nama"
                        value="{{ $item->nama }}">
                    <label for="nama">Nama Lengkap (Tanpa Gelar)</label>
                </div>
                <div class="form-floating my-1">
                    <input type="text" class="form-control" id="nidn" name="nidn"
                        value="{{ $item->nidn }}">
                    <label for="nidn">NIDN</label>
                </div>
                <div class="form-floating my-1">
                    <input type="text" class="form-control" id="email" name="email"
                        value="{{ $item->email }}">
                    <label for="email">Email</label>
                </div>
            </x-modal-form>
        @endforeach

        {{-- Modal Delete Dosen --}}
        @foreach ($dosen as $item)
            <x-modal-deletion modal-id="deleteDosen_{{ $item->id }}" form-action="dosen.destroy"
                param="{{ $item->id }}" />
        @endforeach

    </div> <!--end::App Content-->
@endsection
