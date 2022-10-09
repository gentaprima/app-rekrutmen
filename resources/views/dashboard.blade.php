@extends('master')
@section('title','Form Lamaran')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid mt-3">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Form Lamaran</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Form Lamaran</li>
                    </ol>
                </div><!-- /.col -->
                <p id="menu"></p>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->

    <section class="content">
        <div class="row">
            <section class="col-lg-12 ">
                <!-- Custom tabs (Charts with tabs)-->
                <div class="card m-2">
                    <div class="card-body" style="border-radius:20px !important;border:none;">
                        <h5 class="text-center mb-3 font-weight-bold">Data Pribadi Pelamar</h5>
                        <form action="/add-lowongan" method="post">
                            @csrf
                            <div class="form-group row">
                                <label for="" class="col-sm-2">Posisi yang dilamar</label>
                                <input type="text" class="form-control col-sm-10" name="posisi">
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2">Nama Lengkap</label>
                                <input type="text" class="form-control col-sm-10" name="nama">
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2">No KTP</label>
                                <input type="text" class="form-control col-sm-10" name="noKtp">
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2">Tempat Lahir</label>
                                <input type="text" class="form-control col-sm-10" name="tempatLahir">
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2">Tanggal Lahir</label>
                                <input type="date" class="form-control col-sm-10" name="tglLahir">
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2">Jenis Kelamin</label>
                                <select type="date" class="form-control col-sm-10" name="jk">
                                    <option value="">-- Pilih Jenis Kelamin --</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2">Agama</label>
                                <input type="text" class="form-control col-sm-10" name="agama">
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2">Golongan Darah</label>
                                <input type="text" class="form-control col-sm-10" name="golonganDarah">
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2">Alamat Tinggal</label>
                                <textarea type="text" class="form-control col-sm-10" rows="5" name="alamatTinggal"></textarea>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2">Alamat KTP</label>
                                <textarea type="text" class="form-control col-sm-10" rows="5" name="alamatKtp"></textarea>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2">No Telepon</label>
                                <input type="text" class="form-control col-sm-10" name="telp">
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2">Kontak Darurat</label>
                                <input type="text" class="form-control col-sm-10" name="kontak_darurat">
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2">Pendidikan Terakhir</label>
                                <div class="col-sm-10">
                                    <button type="button" data-toggle="modal" data-target="#pendidikanTerakhir" class="btn btn-outline-primary mb-3" style="float: right;">Tambah Pendidikan Terakhir</button>
                                    <table id="tableDataPendidikanTerakhir" class="table mt-2">
                                        <thead style="background-color: #007bff; color:#fff;">
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Jenjang Pendidikan Terakhir</th>
                                                <th scope="col">Nama Institusi</th>
                                                <th scope="col">Jurusan</th>
                                                <th scope="col">Tahun Lulus</th>
                                                <th scope="col">IPK</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>

                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2">Riwayat Pelatihan</label>
                                <div class="col-sm-10">
                                    <button type="button" data-toggle="modal" data-target="#riwayatPelatihan" class="btn btn-outline-primary mb-3" style="float: right;">Tambah Riwayat Pelatihan</button>
                                    <table id="tableDataRiwayatPelatihan" class="table mt-2">
                                        <thead style="background-color: #007bff; color:#fff;">
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Nama Kursus/Seminar</th>
                                                <th scope="col">Sertifikat (Ada/Tidak)</th>
                                                <th scope="col">Tahun</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>

                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2">Riwayat Pekerjaan</label>
                                <div class="col-sm-10">
                                    <button type="button" data-toggle="modal" data-target="#riwayatPekerjaan" class="btn btn-outline-primary mb-3" style="float: right;">Tambah Riwayat Pekerjaan</button>
                                    <table id="tableDataRiwayatPekerjaan" class="table mt-2">
                                        <thead style="background-color: #007bff; color:#fff;">
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Nama Perusahaan</th>
                                                <th scope="col">Posisi Terakhir</th>
                                                <th scope="col">Pendapatan Terakhir</th>
                                                <th scope="col">Tahun</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>

                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-2">Skill</label>
                                <input type="text" class="form-control col-sm-10" placeholder="PHP,Javascript, dan lain-lain" name="skill">
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-6">bersedia ditempatkan diseluruh kantor perusahaan</label>
                                <div class="col-sm-6">
                                    <input type="radio" value="Ya" name="bersediaDitempatkan">
                                    <label for="">Ya</label>
                                    <input type="radio" class="ml-3" value="Tidak" name="bersediaDitempatkan">
                                    <label for="">Tidak</label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2">Penghasilan yang diharapkan</label>
                                <input type="text" class="form-control col-sm-10"  name="gaji">
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-2"></label>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>


                        </form>
                    </div><!-- /.card-body -->
                </div>
                <!-- /.card -->


            </section>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="pendidikanTerakhir" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Pendidikan Terakhir</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="">
                        @csrf
                        <div class="form-group row">
                            <label for="" class="col-sm-2">Jenjang</label>
                            <input type="text" class="form-control col-sm-10" id="jenjang">
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2">Insitusi</label>
                            <input type="text" class="form-control col-sm-10" id="institusi">
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2">Jurusan</label>
                            <input type="text" class="form-control col-sm-10" id="jurusan">
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2">Tahun Lulus</label>
                            <input type="text" class="form-control col-sm-10" id="tahunLulusPendidikan">
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2">IPK</label>
                            <input type="text" class="form-control col-sm-10" id="ipk">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" id="closePendidikanTerakhir" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" onclick="savePendidikanTerakhir()" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="riwayatPekerjaan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Riwayat Pekerjaan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="">
                        <div class="form-group row">
                            <label for="" class="col-sm-2">Nama Perusahaan</label>
                            <input type="text" class="form-control col-sm-10" id="namaPerusahaan">
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2">Posisi Terakhir</label>
                            <input type="text" class="form-control col-sm-10" id="posisiTerakhir">
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2">Pendapatan Terakhir</label>
                            <input type="text" class="form-control col-sm-10" id="pendapatanTerakhir">
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2">Tahun</label>
                            <input type="text" class="form-control col-sm-10" id="tahunPekerjaan">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" id="closeRiwayatPekerjaan" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" onclick="saveRiwayatPekerjaan()" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="riwayatPelatihan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Riwayat Pelatihan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="">
                        <div class="form-group row">
                            <label for="" class="col-sm-2">Nama Kursus</label>
                            <input type="text" class="form-control col-sm-10" id="namaKursus">
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2">Sertifkat</label>
                            <input type="text" class="form-control col-sm-10" placeholder="Ada/Tidak" id="sertifikat">
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2">Tahun</label>
                            <input type="text" class="form-control col-sm-10" id="tahunPelatihan">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" id="closeRiwayatPelatihan" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" onclick="saveRiwayatPelatihan()" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function saveRiwayatPekerjaan() {
            var csrf_token = "<?php echo e(csrf_token()); ?>";
            var namaPerusahaan = document.getElementById("namaPerusahaan").value;
            var pendapatanTerakhir = document.getElementById("pendapatanTerakhir").value;
            var posisiTerakhir = document.getElementById("posisiTerakhir").value;
            var tahunPekerjaan = document.getElementById("tahunPekerjaan").value;

            if (namaPerusahaan == '' && pendapatanTerakhir == '' && posisiTerakhir == '' && tahunPekerjaan == '') {
                Toast.fire({
                    icon: 'error',
                    title: 'Data tidak boleh kosong !!'
                });
            }

            $.ajax({
                type: "POST",
                dataType: 'json',
                url: '/add-riwayat-pekerjaan',
                data: {
                    namaPerusahaan: namaPerusahaan,
                    pendapatanTerakhir: pendapatanTerakhir,
                    posisiTerakhir: posisiTerakhir,
                    tahunPekerjaan: tahunPekerjaan,
                    _token: csrf_token
                },
                success: function(response) {
                    if (response.status == true) {
                        loadDataRiwayatPekerjaan();
                    }
                }
            })
        }

        function loadDataRiwayatPekerjaan() {
            $("#closeRiwayatPekerjaan").click();
            $("#tableDataRiwayatPekerjaan  tbody").empty();
            $.ajax({
                url: `/get-riwayat-pekerjaan`,
                dataType: 'html',
                type: 'GET',
                success: function(responseData) {
                    let data = JSON.parse(responseData);
                    let k = 1;
                    console.log(data.data.length);
                    for (let i = 0; i < data.data.length; i++) {
                        var tr = $("<tr>");
                        tr.append("<td>" + k++ + "</td>");
                        tr.append("<td>" + data.data[i].nama_perusahaan + "</td>");
                        tr.append("<td>" + (data.data[i].posisi_terakhir) + "</td>");
                        tr.append("<td>" + (data.data[i].pendapatan_terakhir) + "</td>");
                        tr.append("<td>" + (data.data[i].tahun) + "</td>");
                        $("#tableDataRiwayatPekerjaan").append(tr);
                    }
                }
            })
        }

        function saveRiwayatPelatihan() {
            var csrf_token = "<?php echo e(csrf_token()); ?>";
            var namaKursus = document.getElementById("namaKursus").value;
            var sertifikat = document.getElementById("sertifikat").value;
            var tahunPelatihan = document.getElementById("tahunPelatihan").value;

            if (namaKursus == '' && sertifikat == '' && tahunPelatihan == '') {
                Toast.fire({
                    icon: 'error',
                    title: 'Data tidak boleh kosong !!'
                });
            }

            $.ajax({
                type: "POST",
                dataType: 'json',
                url: '/add-riwayat-pelatihan',
                data: {
                    namaKursus: namaKursus,
                    sertifikat: sertifikat,
                    tahunPelatihan: tahunPelatihan,
                    _token: csrf_token
                },
                success: function(response) {
                    if (response.status == true) {
                        loadDataRiwayatPelatihan();
                    }
                }
            })
        }

        function loadDataRiwayatPelatihan() {
            $("#closeRiwayatPelatihan").click();
            $("#tableDataRiwayatPelatihan  tbody").empty();
            $.ajax({
                url: `/get-riwayat-pelatihan`,
                dataType: 'html',
                type: 'GET',
                success: function(responseData) {
                    let data = JSON.parse(responseData);
                    let k = 1;
                    console.log(data.data.length);
                    for (let i = 0; i < data.data.length; i++) {
                        var tr = $("<tr>");
                        tr.append("<td>" + k++ + "</td>");
                        tr.append("<td>" + data.data[i].nama_kursus + "</td>");
                        tr.append("<td>" + (data.data[i].sertifikat) + "</td>");
                        tr.append("<td>" + (data.data[i].tahun) + "</td>");
                        $("#tableDataRiwayatPelatihan").append(tr);
                    }
                }
            })
        }

        function savePendidikanTerakhir() {

            var csrf_token = "<?php echo e(csrf_token()); ?>";
            var jenjang = document.getElementById("jenjang").value;
            var institusi = document.getElementById("institusi").value;
            var jurusan = document.getElementById("jurusan").value;
            var tahun_lulus = document.getElementById("tahunLulusPendidikan").value;
            var ipk = document.getElementById("ipk").value;

            if (jenjang == '' && institusi == '' && jurusan == '' && tahun_lulus == '' && ipk == '') {

                Toast.fire({
                    icon: 'error',
                    title: 'Data tidak boleh kosong !!'
                });
            }

            $.ajax({
                type: "POST",
                dataType: 'json',
                url: '/add-pendidikan-terakhir',
                data: {
                    jenjang: jenjang,
                    institusi: institusi,
                    jurusan: jurusan,
                    tahun_lulus: tahun_lulus,
                    ipk: ipk,
                    _token: csrf_token
                },
                success: function(response) {
                    if (response.status == true) {
                        loadDataPendidikan();
                    }
                }

            })



        }

        function loadDataPendidikan() {
            $("#closePendidikanTerakhir").click();
            $("#tableDataPendidikanTerakhir  tbody").empty();
            $.ajax({
                url: `/get-pendidikan-terakhir`,
                dataType: 'html',
                type: 'GET',
                success: function(responseData) {
                    let data = JSON.parse(responseData);
                    let k = 1;
                    console.log(data.data.length);
                    for (let i = 0; i < data.data.length; i++) {
                        var tr = $("<tr>");
                        tr.append("<td>" + k++ + "</td>");
                        tr.append("<td>" + data.data[i].jenjang + "</td>");
                        tr.append("<td>" + (data.data[i].nama_institusi) + "</td>");
                        tr.append("<td>" + (data.data[i].jurusan) + "</td>");
                        tr.append("<td>" + (data.data[i].tahun_lulus) + "</td>");
                        tr.append("<td>" + (data.data[i].ipk) + "</td>");
                        $("#tableDataPendidikanTerakhir").append(tr);
                    }
                }
            })
        }
    </script>

    @endsection