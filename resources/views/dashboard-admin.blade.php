@extends('master')
@section('title','Data Pelamar')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid mt-3">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Pelamar</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Data Pelamar</li>
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
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Tempat & Tgl Lahir</th>
                                    <th>Posisi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($dataPelamar as $row)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$row->nama}}</td>
                                    <td>{{$row->tempat_lahir}}, {{$row->tgl_lahir}}</td>
                                    <td>{{$row->posisi}}</td>
                                    <td>
                                        <center>
                                            <button class="btn btn-default btn-sm" onclick="detailPelamar('{{$row->id_biodata}}')" data-toggle="modal" data-target="#modalDetail" style="border: none;"><i class="fa fa-eye"></i></button>
                                            <a href="/form-update-lamaran/{{$row->id_biodata}}" class="btn btn-default btn-sm" style="border: none;"><i class="fa fa-edit"></i></a>
                                            <a href="/delete-lowongan/{{$row->id_users}}" class="btn btn-default btn-sm" style="border: none;"><i class="fa fa-trash"></i></a>
                                        </center>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div><!-- /.card-body -->
                </div>
                <!-- /.card -->


            </section>
        </div>
    </section>

    <div class="modal fade" id="modalDetail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Pelamar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="" class="col-sm-2">Posisi yang dilamar</label>
                        <input readonly type="text" class="form-control col-sm-10" id="posisi">
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2">Nama Lengkap</label>
                        <input readonly type="text" class="form-control col-sm-10" id="nama">
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2">No KTP</label>
                        <input readonly type="text" class="form-control col-sm-10" id="noKtp">
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2">Tempat Lahir</label>
                        <input readonly type="text" class="form-control col-sm-10" id="tempatLahir">
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2">Tanggal Lahir</label>
                        <input readonly type="text" class="form-control col-sm-10" id="tglLahir">
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2">Jenis Kelamin</label>
                        <input type="text" readonly id="jk" class="form-control col-sm-10">
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2">Agama</label>
                        <input readonly type="text" class="form-control col-sm-10" id="agama">
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2">Golongan Darah</label>
                        <input readonly type="text" class="form-control col-sm-10" id="golonganDarah">
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2">Alamat Tinggal</label>
                        <textarea readonly type="text" class="form-control col-sm-10" rows="5" id="alamatTinggal"></textarea>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2">Alamat KTP</label>
                        <textarea readonly type="text" class="form-control col-sm-10" rows="5" id="alamatKtp"></textarea>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2">No Telepon</label>
                        <input readonly type="text" class="form-control col-sm-10" id="telp">
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2">Kontak Darurat</label>
                        <input readonly type="text" class="form-control col-sm-10" id="kontak_darurat">
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2">Pendidikan Terakhir</label>
                        <div class="col-sm-10">

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
                        <input readonly type="text" class="form-control col-sm-10" placeholder="PHP,Javascript, dan lain-lain" id="skill">
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-6">bersedia ditempatkan diseluruh kantor perusahaan</label>
                        <div class="col-sm-6">
                            <input readonly type="text" class=" form-control" id="bersediaDitempatkan">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2">Penghasilan yang diharapkan</label>
                        <input readonly type="text" class="form-control col-sm-10" id="gaji">
                    </div>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function detailPelamar(id) {
            $.ajax({
                url: `/get-detail-pelamar/${id}`,
                type: 'get',
                dataType: 'json',
                success: function(respone) {
                    let dataBiodata = respone.dataBiodata;
                    let dataLowongan = respone.dataLowongan;
                    let dataRiwayatPekerjaan = respone.dataRiwayatPekerjaan;
                    let dataRiwayatPelatihan = respone.dataRiwayatPelatihan;
                    let dataPendidikanTerakhir = respone.dataPendidikanTerakhir;

                    document.getElementById("posisi").value = dataBiodata.posisi
                    document.getElementById("nama").value = dataBiodata.nama
                    document.getElementById("noKtp").value = dataBiodata.no_ktp
                    document.getElementById("tempatLahir").value = dataBiodata.tempat_lahir
                    document.getElementById("tglLahir").value = dataBiodata.tgl_lahir
                    document.getElementById("jk").value = dataBiodata.jk
                    document.getElementById("agama").value = dataBiodata.agama
                    document.getElementById("golonganDarah").value = dataBiodata.golongan_darah
                    document.getElementById("alamatTinggal").value = dataBiodata.alamat_tinggal
                    document.getElementById("alamatKtp").value = dataBiodata.alamat_ktp
                    document.getElementById("kontak_darurat").value = dataBiodata.kontak_darurat
                    document.getElementById("skill").value = dataLowongan.skill
                    document.getElementById("gaji").value = dataLowongan.gaji
                    document.getElementById("bersediaDitempatkan").value = dataLowongan.bersedia_ditempatkan

                    // riwayat pekerjaan
                    let k = 1;
                    $("#tableDataRiwayatPekerjaan  tbody").empty();
                    for (let i = 0; i < respone.dataRiwayatPekerjaan.length; i++) {
                        var tr = $("<tr>");
                        tr.append("<td>" + k++ + "</td>");
                        tr.append("<td>" + respone.dataRiwayatPekerjaan[i].nama_perusahaan + "</td>");
                        tr.append("<td>" + (respone.dataRiwayatPekerjaan[i].posisi_terakhir) + "</td>");
                        tr.append("<td>" + (respone.dataRiwayatPekerjaan[i].pendapatan_terakhir) + "</td>");
                        tr.append("<td>" + (respone.dataRiwayatPekerjaan[i].tahun) + "</td>");
                        $("#tableDataRiwayatPekerjaan").append(tr);
                    }

                    let j = 1;
                    $("#tableDataRiwayatPelatihan  tbody").empty();
                    for (let i = 0; i < respone.dataRiwayatPelatihan.length; i++) {
                        var tr = $("<tr>");
                        tr.append("<td>" + j++ + "</td>");
                        tr.append("<td>" + respone.dataRiwayatPelatihan[i].nama_kursus + "</td>");
                        tr.append("<td>" + (respone.dataRiwayatPelatihan[i].sertifikat) + "</td>");
                        tr.append("<td>" + (respone.dataRiwayatPelatihan[i].tahun) + "</td>");
                        $("#tableDataRiwayatPelatihan").append(tr);
                    }

                    let l = 1;
                    $("#tableDataPendidikanTerakhir  tbody").empty();
                    for (let i = 0; i < respone.dataPendidikanTerakhir.length; i++) {
                        var tr = $("<tr>");
                        tr.append("<td>" + l++ + "</td>");
                        tr.append("<td>" + respone.dataPendidikanTerakhir[i].jenjang + "</td>");
                        tr.append("<td>" + (respone.dataPendidikanTerakhir[i].nama_institusi) + "</td>");
                        tr.append("<td>" + (respone.dataPendidikanTerakhir[i].jurusan) + "</td>");
                        tr.append("<td>" + (respone.dataPendidikanTerakhir[i].tahun_lulus) + "</td>");
                        tr.append("<td>" + (respone.dataPendidikanTerakhir[i].ipk) + "</td>");
                        $("#tableDataPendidikanTerakhir").append(tr);
                    }
                }
            })
        }
    </script>

    @endsection