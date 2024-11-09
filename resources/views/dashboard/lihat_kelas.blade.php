@extends('layouts.dashboard')

@section('content')
    <x-content_header page-title="Pengantar Asuhan Kebidanan - Kelas A" />

    <div class="app-content"> <!--begin::Container-->
        <div class="container-fluid"> <!--begin::Row-->
            <div class="row g-2">
                <div class="col-12 col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Informasi Kelas</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped align-middle">
                                    <tr>
                                        <th>Mata Kuliah</th>
                                        <td>Pengantar Asuhan Kebidanan</td>
                                    </tr>
                                    <tr>
                                        <th>Dosen Pengampu</th>
                                        <td>Daris Yolanda Sari</td>
                                    </tr>
                                    <tr>
                                        <th>Jam Kelas</th>
                                        <td>8.00 - 8.40 (WIB)</td>
                                    </tr>
                                    <tr>
                                        <th>Pertemuan Ke</th>
                                        <td>1</td>
                                    </tr>
                                </table>
                            </div>
                        </div> <!-- /.card-body -->
                    </div> <!-- /.card -->
                </div>
                <div class="col-12 col-md-8"> <!-- Default box -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Daftar Hadir Mahasiswa</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-striped align-middle">
                                    <thead>
                                        <th>No.</th>
                                        <th>NPM</th>
                                        <th>Nama</th>
                                        <th>Kehadiran</th>
                                        <th>Bukti</th>
                                        <th>Opsi</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1.</td>
                                            <td>15523049</td>
                                            <td>Muhammad Ramadhan Firdaus</td>
                                            <td>
                                                <span class="badge text-bg-primary">Hadir</span>
                                            </td>
                                            <td>
                                                <a href="#" class="badge text-bg-success">
                                                    <i class="bi bi-image"></i>
                                                </a>
                                            </td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>2.</td>
                                            <td>15523050</td>
                                            <td>Muhammad Ramadhan Firdaus</td>
                                            <td>
                                                <span class="badge text-bg-danger">Tidak Hadir</span>
                                            </td>
                                            <td>-</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>3.</td>
                                            <td>15523050</td>
                                            <td>Muhammad Ramadhan Firdaus</td>
                                            <td>
                                                <span class="badge text-bg-warning">Terlambat</span>
                                            </td>
                                            <td>
                                                <a href="#" class="badge text-bg-success">
                                                    <i class="bi bi-geo-alt-fill"></i>
                                                </a>
                                            </td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>4.</td>
                                            <td>15523050</td>
                                            <td>Muhammad Ramadhan Firdaus</td>
                                            <td>
                                                <span class="badge text-bg-secondary">Belum Hadir</span>
                                            </td>
                                            <td>-</td>
                                            <td>
                                                <a href="#" class="badge text-bg-dark text-decoration-none">
                                                    Ajukan Izin
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>5.</td>
                                            <td>15523050</td>
                                            <td>Muhammad Ramadhan Firdaus</td>
                                            <td>
                                                <span class="badge text-bg-info">Izin</span>
                                            </td>
                                            <td>-</td>
                                            <td>
                                                <a href="#" class="badge text-bg-light text-decoration-none">
                                                    Batalkan Izin
                                                </a>
                                            </td>
                                        </tr>
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
            <div class="form-floating my-1">
                <select class="form-select" id="program_studi_id" name="program_studi_id"
                    aria-label="Floating label select example">
                    <option value="" style="display: none"></option>
                    @foreach ($program_studi as $item)
                        <option value="{{ $item->id }}">
                            {{ $item->jenjang->nama }} - {{ $item->nama }}
                        </option>
                    @endforeach
                </select>
                <label for="program_studi_id">Pilih Program Studi</label>
            </div>
        </x-modal-form>

        {{-- Modal Edit matkul --}}
        @foreach ($mata_kuliah as $item)
            <x-modal-form modal-id="editMatkul_{{ $item->id }}" modal-title="Edit Mata Kuliah" modal-type="form"
                form-action="mata_kuliah.update" spoof-method="PATCH" params="{{ $item->id }}">
                <div class="form-floating my-1">
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $item->nama }}">
                    <label for="nama">Nama Mata Kuliah</label>
                </div>
                <div class="form-floating my-1">
                    <input type="text" class="form-control" id="kode_matkul" name="kode_matkul"
                        value="{{ $item->kode_matkul }}">
                    <label for="kode_matkul">Kode Mata Kuliah</label>
                </div>
                <div class="form-floating my-1">
                    <select class="form-select" id="program_studi_id" name="program_studi_id"
                        aria-label="Floating label select example">
                        <option value="" style="display: none"></option>
                        @foreach ($program_studi as $item)
                            <option value="{{ $item->id }}">
                                {{ $item->jenjang->nama }} - {{ $item->nama }}
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
