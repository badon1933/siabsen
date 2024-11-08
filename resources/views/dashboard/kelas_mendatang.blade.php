@extends('layouts.dashboard')

@section('content')
    <x-content_header page-title="Kelas Mendatang" />

    <div class="app-content"> <!--begin::Container-->
        <div class="container-fluid"> <!--begin::Row-->
            @if (session('success'))
                <div class="alert alert-success text-center" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('failed'))
                <div class="alert alert-danger text-center" role="alert">
                    {{ session('failed') }}
                </div>
            @endif
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
                                    <td>08.00 - 10.00 (WIB/WIT/WITA)</td>
                                </tr>
                            </table>
                        </div> <!-- /.card-body -->
                        <div class="card-footer d-grid">
                            <x-modal-button btn-type="primary" target-modal="absenMasukModal">
                                Absen Masuk
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
                </div>
            </div> <!--end::Row-->
        </div> <!--end::Container-->
        <x-modal modal-id="absenMasukModal" modal-title="Absen Masuk" modal-type="form" form-action="absen.store">
            {{-- webcamJS --}}
            <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.min.js"></script>

            {{-- leafletJS --}}
            <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
            <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

            <style>
                #webcamContainer {
                    display: none;
                }

                .toggleCamera {
                    display: block !important;
                }

                .webcamCapture,
                .webcamCapture video,
                .webcamCapture img {
                    display: inline-block;
                    width: 100% !important;
                    height: 100% !important;
                }

                #mapContainer {
                    display: none;
                }

                #map {
                    height: 200px;
                }

                .toggleMap {
                    display: block !important;
                }
            </style>
            <div class="d-grid">
                <p class="text-center" id="tulisanAtau">Pilih salah satu</p>
                <button type="button" class="btn btn-primary" id="tombolAbsenFoto">
                    <i class="bi bi-camera-fill"></i>
                    Foto
                </button>
                <p class="my-2 text-center" id="tulisanAtau">atau</p>
                <button type="button" class="btn btn-secondary" id="tombolAbsenLokasi">
                    <i class="bi bi-geo-alt-fill"></i>
                    Lokasi
                </button>
            </div>

            <div class="my-2 text-center" id="webcamContainer">
                <div id="webcam" class="webcamCapture"></div>
                <div id="webcam_result" class="webcamCapture"></div>
                <button type="button" id="tombolAmbilFoto" class="btn btn-primary my-2">
                    Ambil Foto
                </button>
            </div>

            <div class="my-2" id="mapContainer">
                <div id="map">
                </div>
            </div>

            <input type="hidden" class="image" name="image" id="image">
            <input type="hidden" id="location" name="location">

            <script language="JavaScript">
                /* Absen Kamera */
                Webcam.set({
                    height: 300,
                    width: 400,
                    image_format: 'jpeg',
                    jpeg_quality: 80
                })

                const webcamContainer = document.getElementById('webcamContainer');
                const webcam = document.getElementById('webcam');
                const webcam_result = document.getElementById('webcam_result');
                const tombolAmbilFoto = document.getElementById('tombolAmbilFoto');
                const tombolAbsenFoto = document.getElementById('tombolAbsenFoto');

                tombolAbsenFoto.addEventListener('click', function() {
                    Webcam.attach('#webcam')
                    webcamContainer.classList.toggle('toggleCamera')
                })

                tombolAmbilFoto.addEventListener('click', function(e) {
                    e.preventDefault();
                    Webcam.snap(function(data_uri) {
                        document.getElementById('webcam_result').innerHTML = '<img class="img-fluid" src="' +
                            data_uri + '"/>';
                        document.getElementById('image').value = data_uri
                    });
                })

                /* Absen Lokasi */

                let lokasi = document.getElementById('location')
                const mapContainer = document.getElementById('mapContainer');
                const tombolAbsenLokasi = document.getElementById('tombolAbsenLokasi');
                const map = document.getElementById('map');

                tombolAbsenLokasi.addEventListener('click', function() {
                    if (navigator.geolocation) {
                        navigator.geolocation.getCurrentPosition(successCallback, errorCallback);
                    }
                    mapContainer.classList.toggle('toggleMap')
                })

                function successCallback(position) {
                    lokasi.value = position.coords.latitude + ', ' + position.coords.longitude
                    let map = L.map('map').setView([position.coords.latitude, position.coords.longitude], 13)
                    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        maxZoom: 19,
                        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                    }).addTo(map);

                    let marker = L.marker([position.coords.latitude, position.coords.longitude]).addTo(map);

                    var circle = L.circle([-6.520432989689656, 107.44896262887767], {
                        color: 'red',
                        fillColor: '#f03',
                        fillOpacity: 0.5,
                        radius: 250
                    }).addTo(map);
                }

                function errorCallback() {
                    alert('Sepertinya ada masalah, silakan gunakan metode absen yang lain.')
                }
            </script>
        </x-modal>
    </div> <!--end::App Content-->
@endsection
