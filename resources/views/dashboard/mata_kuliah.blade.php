@extends('layouts.dashboard')

@section('content')
    <x-content_header page-title="Data Mata Kuliah" />

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
                            <h3 class="card-title">Data Mata Kuliah</h3>
                            <div class="card-tools">
                                <x-modal-button type="button" btn-type="primary" target-modal="tambahMatkulModal">
                                    <i class="bi bi-plus-square fs-6"></i>
                                    Tambah Mata Kuliah
                                </x-modal-button>
                                <x-modal-button type="button" btn-type="success" target-modal="importMatkulModal">
                                    <i class="bi bi-file-earmark-plus fs-6"></i>
                                    Import Mata Kuliah
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
                                                <td>{{ $item->program_studi->nama }}</td>
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
            <x-input-select title="Program Studi" name="kode_prodi" :options="$program_studi" :custom="true">
                <option selected style="display: none">Pilih salah satu Program Studi</option>
                @foreach ($program_studi as $item)
                    <option value="{{ $item->kode_prodi }}">{{ $item->nama }}</option>
                @endforeach
            </x-input-select>
        </x-modal-form>

        {{-- Modal Import Mata Kuliah --}}
        <div class="modal fade" id="importMatkulModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="importMatkulModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="importMatkulModalLabel">Import Mata Kuliah</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('mata_kuliah.import') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="my-1">
                                <input class="form-control" type="file" id="import_mata_kuliah"
                                    name="import_mata_kuliah">
                            </div>
                            <a href="{{ Storage::url('import_mata_kuliah.xlsx') }}"
                                class="badge text-bg-success d-inline-block text-decoration-none">
                                <i class="bi bi-download"></i>
                                Download Format
                            </a>
                            <a class="badge text-bg-primary d-inline-block text-decoration-none" data-bs-toggle="collapse"
                                href="#collapseKodeProdi" role="button" aria-expanded="false"
                                aria-controls="collapseExample">
                                <i class="bi bi-eye"></i>
                                Kode Program Studi
                            </a>
                            <x-collapse id="collapseKodeProdi">
                                <table class="table table-bordered table-hover table-striped">
                                    <thead>
                                        <th>Kode Prodi</th>
                                        <th>Program Studi</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($program_studi as $item)
                                            <tr>
                                                <td>{{ $item->kode_prodi }}</td>
                                                <td>{{ $item->nama }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </x-collapse>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- Modal Edit matkul --}}
        @foreach ($mata_kuliah as $mk)
            <x-modal-form modal-id="editMatkul_{{ $mk->id }}" modal-title="Edit Mata Kuliah" modal-type="form"
                form-action="mata_kuliah.update" spoof-method="PATCH" params="{{ $mk->id }}">
                <div class="form-floating my-1">
                    <input type="text" class="form-control" id="nama" name="nama"
                        value="{{ $mk->nama }}">
                    <label for="nama">Nama Mata Kuliah</label>
                </div>
                <div class="form-floating my-1">
                    <input type="text" class="form-control" id="kode_matkul" name="kode_matkul"
                        value="{{ $mk->kode_matkul }}">
                    <label for="kode_matkul">Kode Mata Kuliah</label>
                </div>
                <x-input-select title="Program Studi" name="kode_prodi" :options="$program_studi" :custom="true">
                    <option selected style="display: none">Pilih salah satu Program Studi</option>
                    @foreach ($program_studi as $item)
                        <option {{ $item->kode_prodi == $mk->kode_prodi ? 'selected' : '' }}
                            value="{{ $item->kode_prodi }}">{{ $item->nama }}</option>
                    @endforeach
                </x-input-select>
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
