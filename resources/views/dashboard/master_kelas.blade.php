@extends('layouts.dashboard')

@section('content')
    <x-content_header page-title="Data Master Kelas" />

    <div class="app-content"> <!--begin::Container-->
        <div class="container-fluid"> <!--begin::Row-->
            <div class="row">
                <div class="col-12"> <!-- Default box -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Master Kelas</h3>
                            <div class="card-tools">
                                <x-modal-button type="button" btn-type="primary" target-modal="tambahMasterKelasModal">
                                    <i class="bi bi-plus-square fs-6"></i>
                                    Tambah Master Kelas
                                </x-modal-button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-striped align-middle">
                                    <thead>
                                        <th>No.</th>
                                        <th>Nama Kelas</th>
                                        <th>Program Studi</th>
                                        <th>Periode</th>
                                        <th></th>
                                    </thead>
                                    <tbody>
                                        @foreach ($master_kelas as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->nama }}</td>
                                                <td>{{ $item->program_studi->nama }}</td>
                                                <td>{{ $item->periode->nama }}</td>
                                                <td>
                                                    <a href="#" class="badge text-bg-info d-inline-block"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        data-bs-title="Detail mahasiswa">
                                                        <i class="bi bi-info-circle"></i>
                                                    </a href="#">
                                                    <x-modal-trigger type="badge" color="warning"
                                                        target-modal="editMasterKelas_{{ $item->id }}">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </x-modal-trigger>
                                                    <x-modal-trigger type="badge" color="danger"
                                                        target-modal="deleteMasterKelas_{{ $item->id }}">
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

        {{-- Modal Tambah Master Kelas --}}
        <x-modal-form modal-id="tambahMasterKelasModal" modal-title="Tambah Master Kelas" modal-type="form"
            form-action="master_kelas.store" spoof-method="" params="">
            <div class="form-floating my-1">
                <input type="text" class="form-control" id="nama" name="nama">
                <label for="nama">Nama Kelas</label>
            </div>
            <x-input-select title="Periode" name="periode_id" :options="$periode" :custom="false" />
            <x-input-select title="Program Studi" name="program_studi_id" :options="$program_studi" :custom="false" />
        </x-modal-form>

        {{-- Modal Edit Master Kelas --}}
        @foreach ($master_kelas as $mk)
            <x-modal-form modal-id="editMasterKelas_{{ $mk->id }}" modal-title="Edit Master Kelas" modal-type="form"
                form-action="master_kelas.update" spoof-method="PATCH" params="{{ $mk->id }}">
                <div class="form-floating my-1">
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $mk->nama }}">
                    <label for="nama">Nama Kelas</label>
                </div>
                <div class="form-floating my-1">
                    <select class="form-select" name="periode_id" id="periode_id">
                        @foreach ($periode as $p)
                            <option {{ $mk->periode->id == $p->id ? 'selected' : '' }} value="{{ $p->id }}">
                                {{ $p->nama }}
                            </option>
                        @endforeach
                    </select>
                    <label for="periode_id">Pilih Periode</label>
                </div>
                <div class="form-floating my-1">
                    <select class="form-select" name="program_studi_id" id="program_studi_id">
                        @foreach ($program_studi as $prodi)
                            <option {{ $mk->program_studi->id == $prodi->id ? 'selected' : '' }}
                                value="{{ $prodi->id }}">
                                {{ $prodi->nama }}
                            </option>
                        @endforeach
                    </select>
                    <label for="program_studi_id">Pilih Program Studi</label>
                </div>
            </x-modal-form>
        @endforeach

        {{-- Modal Hapus Master Kelas --}}
        @foreach ($master_kelas as $item)
            <x-modal-deletion modal-id="deleteMasterKelas_{{ $item->id }}" form-action="master_kelas.destroy"
                param="{{ $item->id }}">
            </x-modal-deletion>
        @endforeach
    </div> <!--end::App Content-->
@endsection
