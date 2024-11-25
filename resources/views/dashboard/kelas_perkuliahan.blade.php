@extends('layouts.dashboard')

@section('content')
    <x-content_header page-title="Data Kelas Perkuliahan" />

    <div class="app-content"> <!--begin::Container-->
        <div class="container-fluid"> <!--begin::Row-->
            <div class="row">
                <div class="col-12"> <!-- Default box -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Kelas Perkuliahan</h3>
                            <div class="card-tools">
                                <x-modal-button type="button" btn-type="primary" target-modal="tambahKelasPerkuliahanModal">
                                    <i class="bi bi-plus-square fs-6"></i>
                                    Tambah Kelas Perkuliahan
                                </x-modal-button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-striped align-middle">
                                    <thead>
                                        <th>No.</th>
                                        <th>Mata Kuliah</th>
                                        <th>Program Studi</th>
                                        <th>Kelas</th>
                                        <th>Dosen Pengampu</th>
                                        <th></th>
                                    </thead>
                                    <tbody>
                                        @foreach ($kelas_perkuliahan as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <a href="{{ route('kelas_perkuliahan.show', 1) }}"
                                                        class="text-decoration-none">
                                                        {{ $item->mata_kuliah->nama }}
                                                    </a>
                                                </td>
                                                <td>{{ $item->master_kelas->program_studi->nama }}</td>
                                                <td>{{ $item->master_kelas->nama }}</td>
                                                <td>
                                                    @if ($item->dosen != null)
                                                        @foreach ($item->dosen as $item)
                                                            <span>{{ $item->nama }}{{ $loop->last ? '' : ',' }}</span>
                                                        @endforeach
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                                <td>
                                                    <x-modal-trigger type="badge" color="warning"
                                                        target-modal="editKelasPerkuliahan_{{ $item->id }}">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </x-modal-trigger>
                                                    <x-modal-trigger type="badge" color="danger"
                                                        target-modal="deleteKelasPerkuliahan_{{ $item->id }}">
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

        {{-- Modal Tambah Kelas Perkuliahan --}}
        <x-modal-form modal-id="tambahKelasPerkuliahanModal" modal-title="Tambah Kelas Perkuliahan" modal-type="form"
            form-action="kelas_perkuliahan.store" spoof-method="" params="">
            <x-input-select title="Kelas" name="master_kelas_id" :options="$master_kelas" :custom="false" />
            <x-input-select title="Mata Kuliah" name="mata_kuliah_id" :options="$mata_kuliah" :custom="false" />
        </x-modal-form>

        {{-- Modal Edit Kelas Perkuliahan --}}
        @foreach ($kelas_perkuliahan as $kp)
            <x-modal-form modal-id="editKelasPerkuliahan_{{ $kp->id }}" modal-title="Edit Kelas Perkuliahan"
                modal-type="form" form-action="kelas_perkuliahan.update" spoof-method="PATCH" params="{{ $kp->id }}">
                <x-input-select title="Kelas" name="master_kelas_id" :options="$master_kelas" :custom="true">
                    @foreach ($master_kelas as $mkelas)
                        <option {{ $kp->master_kelas->id == $mkelas->id ? 'selected' : '' }} value="{{ $mkelas->id }}">
                            {{ $mkelas->nama }}
                        </option>
                    @endforeach
                </x-input-select>
                <x-input-select title="Mata Kuliah" name="mata_kuliah_id" :options="$mata_kuliah" :custom="true">
                    @foreach ($mata_kuliah as $matkul)
                        <option {{ $kp->mata_kuliah->id == $matkul->id ? 'selected' : '' }} value="{{ $matkul->id }}">
                            {{ $matkul->nama }}
                        </option>
                    @endforeach
                </x-input-select>
            </x-modal-form>
        @endforeach

        {{-- Modal Hapus Kelas Perkuliahan --}}
        @foreach ($kelas_perkuliahan as $item)
            <x-modal-deletion modal-id="deleteKelasPerkuliahan_{{ $item->id }}" form-action="kelas_perkuliahan.destroy"
                param="{{ $item->id }}">
            </x-modal-deletion>
        @endforeach
    </div> <!--end::App Content-->
@endsection
