@extends('layouts.dashboard')

@section('content')
    <x-content_header page-title="Kelas Mendatang" />

    <div class="app-content"> <!--begin::Container-->
        <div class="container-fluid"> <!--begin::Row-->
            <div class="row row-cols-md-4 row-cols-1 g-3 justify-content-center">
                <div class="col"> <!-- Default box -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Senin</h3>
                        </div>
                        <div class="card-body">
                            <table>
                                <tr>
                                    <th>Dosen Pengampu</th>
                                    <td>:</td>
                                    <td>
                                        <ol>
                                            <li>Daris Yolandasari</li>
                                            <li>Armiyanti</li>
                                        </ol>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Pertemuan ke</th>
                                    <td>:</td>
                                    <td>1</td>
                                </tr>
                                <tr>
                                    <th>Jam Kuliah</th>
                                    <td>:</td>
                                    <td>08.00 - 10.00</td>
                                </tr>
                            </table>
                        </div> <!-- /.card-body -->
                        <div class="card-footer d-grid">
                            <x-modal-button btn-type="primary" target-modal="absenMasukModal">
                                Terlambat
                            </x-modal-button>
                        </div> <!-- /.card-footer-->
                    </div> <!-- /.card -->
                </div>
                <div class="col"> <!-- Default box -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Asuhan Kebidanan Komunitas</h3>
                        </div>
                        <div class="card-body">
                            <table>
                                <tr>
                                    <th>Dosen Pengampu</th>
                                    <td>:</td>
                                    <td>
                                        <ol>
                                            <li>Daris Yolandasari</li>
                                            <li>Armiyanti</li>
                                        </ol>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Pertemuan ke</th>
                                    <td>:</td>
                                    <td>1</td>
                                </tr>
                                <tr>
                                    <th>Jam Kuliah</th>
                                    <td>:</td>
                                    <td>08.00 - 10.00</td>
                                </tr>
                            </table>
                        </div> <!-- /.card-body -->
                        <div class="card-footer d-grid">
                            <button class="btn btn-success" disabled>Sudah Absen</button>
                        </div> <!-- /.card-footer-->
                    </div> <!-- /.card -->
                </div>
                <div class="col"> <!-- Default box -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Asuhan Kebidanan Komunitas</h3>
                        </div>
                        <div class="card-body">
                            <table>
                                <tr>
                                    <th>Dosen Pengampu</th>
                                    <td>:</td>
                                    <td>
                                        <ol>
                                            <li>Daris Yolandasari</li>
                                            <li>Armiyanti</li>
                                        </ol>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Pertemuan ke</th>
                                    <td>:</td>
                                    <td>1</td>
                                </tr>
                                <tr>
                                    <th>Jam Kuliah</th>
                                    <td>:</td>
                                    <td>08.00 - 10.00</td>
                                </tr>
                            </table>
                        </div> <!-- /.card-body -->
                        <div class="card-footer d-grid">
                            <x-modal-button btn-type="secondary" target-modal="absenMasukModal">
                                Terlambat
                            </x-modal-button>
                        </div> <!-- /.card-footer-->
                    </div> <!-- /.card -->
                </div>
                <div class="col"> <!-- Default box -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Asuhan Kebidanan Komunitas</h3>
                        </div>
                        <div class="card-body">
                            <table>
                                <tr>
                                    <th>Dosen Pengampu</th>
                                    <td>:</td>
                                    <td>
                                        <ol>
                                            <li>Daris Yolandasari</li>
                                            <li>Armiyanti</li>
                                        </ol>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Pertemuan ke</th>
                                    <td>:</td>
                                    <td>1</td>
                                </tr>
                                <tr>
                                    <th>Jam Kuliah</th>
                                    <td>:</td>
                                    <td>08.00 - 10.00</td>
                                </tr>
                            </table>
                        </div> <!-- /.card-body -->
                        <div class="card-footer d-grid">
                            <button class="btn btn-danger" disabled>Tidak Hadir</button>
                        </div> <!-- /.card-footer-->
                    </div> <!-- /.card -->
                </div>
                <div class="col"> <!-- Default box -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Asuhan Kebidanan Komunitas</h3>
                        </div>
                        <div class="card-body">
                            <table>
                                <tr>
                                    <th>Dosen Pengampu</th>
                                    <td>:</td>
                                    <td>
                                        <ol>
                                            <li>Daris Yolandasari</li>
                                            <li>Armiyanti</li>
                                        </ol>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Pertemuan ke</th>
                                    <td>:</td>
                                    <td>1</td>
                                </tr>
                                <tr>
                                    <th>Jam Kuliah</th>
                                    <td>:</td>
                                    <td>08.00 - 10.00</td>
                                </tr>
                            </table>
                        </div> <!-- /.card-body -->
                        <div class="card-footer d-grid">
                            <button class="btn btn-primary" disabled>Belum Dimulai</button>
                        </div> <!-- /.card-footer-->
                    </div> <!-- /.card -->
                </div>
                <div class="col"> <!-- Default box -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Asuhan Kebidanan Komunitas</h3>
                        </div>
                        <div class="card-body">
                            <table>
                                <tr>
                                    <th>Dosen Pengampu</th>
                                    <td>:</td>
                                    <td>
                                        <ol>
                                            <li>Daris Yolandasari</li>
                                            <li>Armiyanti</li>
                                        </ol>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Pertemuan ke</th>
                                    <td>:</td>
                                    <td>1</td>
                                </tr>
                                <tr>
                                    <th>Jam Kuliah</th>
                                    <td>:</td>
                                    <td>08.00 - 10.00</td>
                                </tr>
                            </table>
                        </div> <!-- /.card-body -->
                        <div class="card-footer d-grid">
                            <button class="btn btn-info" disabled>Izin</button>
                        </div> <!-- /.card-footer-->
                    </div> <!-- /.card -->
                    <x-modal modal-id="absenMasukModal" modal-title="Absen Masuk">
                        <div class="d-grid">
                            <button class="btn btn-danger">Ambil Foto</button>
                            <p class="my-2 text-center">atau</p>
                            <button class="btn btn-success">Ambil Lokasi</button>
                        </div>
                    </x-modal>
                </div>
            </div> <!--end::Row-->
        </div> <!--end::Container-->
    </div> <!--end::App Content-->
@endsection
