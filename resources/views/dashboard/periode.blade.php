@extends('layouts.dashboard')

@section('content')
    <x-content_header page-title="Data Periode" />

    <div class="app-content"> <!--begin::Container-->
        <div class="container-fluid"> <!--begin::Row-->
            <div class="row">
                <div class="col-12"> <!-- Default box -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Periode</h3>
                            <div class="card-tools">
                                <x-modal-button type="button" btn-type="primary" target-modal="tambahPeriodeModal">
                                    <i class="bi bi-plus-square fs-6"></i>
                                    Tambah Periode
                                </x-modal-button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-striped align-middle">
                                    <thead>
                                        <th>No.</th>
                                        <th>Nama Periode</th>
                                        <th></th>
                                    </thead>
                                    <tbody>
                                        @foreach ($periode as $item)
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
                                                        target-modal="editPeriode_{{ $item->id }}">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </x-modal-trigger>
                                                    <x-modal-trigger type="badge" color="danger"
                                                        target-modal="deletePeriode_{{ $item->id }}">
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

        {{-- Modal Tambah Periode --}}
        <x-modal-form modal-id="tambahPeriodeModal" modal-title="Tambah Periode" modal-type="form"
            form-action="periode.store" spoof-method="" params="">
            <div class="form-floating my-1">
                <input type="text" class="form-control" id="nama" name="nama">
                <label for="nama">Nama Periode</label>
            </div>
        </x-modal-form>

        {{-- Modal Edit Periode --}}
        @foreach ($periode as $item)
            <x-modal-form modal-id="editPeriode_{{ $item->id }}" modal-title="Edit Periode" modal-type="form"
                form-action="periode.update" spoof-method="PATCH" params="{{ $item->id }}">
                <div class="form-floating my-1">
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $item->nama }}">
                    <label for="nama">Nama Periode</label>
                </div>
            </x-modal-form>
        @endforeach

        {{-- Modal Hapus Periode --}}
        @foreach ($periode as $item)
            <x-modal-deletion modal-id="deletePeriode_{{ $item->id }}" form-action="periode.destroy"
                param="{{ $item->id }}">
            </x-modal-deletion>
        @endforeach
    </div> <!--end::App Content-->
@endsection
