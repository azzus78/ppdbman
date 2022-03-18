<?php require "fungsi.php";
$cek1p = mysqli_num_rows(mysqli_query($koneksi, "select * from daftar where
id_daftar         = '$siswa[id_daftar]' and
nik                is  null and 
jenkel             is  null and
anak_ke            is  null and
saudara            is  null and
tinggi             is  null and
berat              is  null and
status_keluarga    is  null and
jurusan1           is  null and
jurusan2           is  null and
keterampilan       is  null and
agama              is  null
"));
$cek1 = mysqli_num_rows(mysqli_query($koneksi, "select * from daftar where
id_daftar         = '$siswa[id_daftar]' and
id_daftar         = '$siswa[id_daftar]' and
anak_ke            is  null and
saudara            is  null and
tinggi             is  null and
berat              is  null and
status_keluarga    is  null
"));
$cek2p = mysqli_num_rows(mysqli_query($koneksi, "select * from daftar where
id_daftar         = '$siswa[id_daftar]' and
jenjang_sekolah              is  null and
status_sekolah                is  null and
asal_sekolah               is  null and
npsn_sekolah                   is  null and
kab_sekolah                  is  null
"));
$cek2 = mysqli_num_rows(mysqli_query($koneksi, "select * from daftar where
id_daftar         = '$siswa[id_daftar]' and
alamat                 is  null and
rt                     is  null and 
rw                     is  null and
desa                   is  null and
kecamatan              is  null and
kota                   is  null and
provinsi               is  null and
kode_pos               is  null and
tinggal                is  null and
jarak                  is  null and
waktu                  is  null and
transportasi           is  null
"));
$cek3 = mysqli_num_rows(mysqli_query($koneksi, "select * from daftar where
id_daftar         = '$siswa[id_daftar]' and
no_kk              is  null and
nik_ayah                 is  null and
nama_ayah                     is  null and 
tempat_ayah                   is  null and
tgl_lahir_ayah                   is  null and
pendidikan_ayah              is  null and
pekerjaan_ayah                  is  null and
penghasilan_ayah              is  null and
nik_ibu                 is  null and
nama_ibu                     is  null and 
tempat_ibu                   is  null and
tgl_lahir_ibu                   is  null and
pendidikan_ibu              is  null and
pekerjaan_ibu                 is  null and
penghasilan_ibu              is  null and
file_kk                    is  null
"));
// $cek4 = mysqli_num_rows(mysqli_query($koneksi, "select * from daftar where
// id_daftar         = '$siswa[id_daftar]' and
// jenjang_sekolah              is  null and
// status_sekolah                is  null and
// asal_sekolah               is  null and
// npsn_sekolah                   is  null and
// kab_sekolah                  is  null and
// no_ujian                       is null 
// "));
$cek5 = mysqli_num_rows(mysqli_query($koneksi, "select * from daftar where
id_daftar         = '$siswa[id_daftar]' and
status_kartu              is  null and
jenis_kartu                 is  null and
no_kartu                     is  null and 
file_kartu                    is  null
")); 
$cek6 = mysqli_num_rows(mysqli_query($koneksi, "select * from prestasi where
id_daftar         = '$siswa[id_daftar]' and
mat3                is null and
bin3                is null and
bing3               is null and
ipa3                is null and
ips3                is null and
mat4                is null and
bin4                is null and
bing4               is null and
ipa4                is null and
ips4                is null and
mat5                is null and
bin5                is null and
bing5               is null and
ipa5                is null and
ips5                is null and
tipe_prestasi       is null
")); ?>
<div class="row">
    <div class="col-12 col-sm-8 col-lg-8">
        <div class="card author-box card-primary">
            <div class="card-header">
                <h4>Isi Formulir Prestasi dibawah</h4>
                <?php if ($cek1 == 0 && $cek2 == 0 && $cek3 == 0 && $cek6 == 0) { ?>
                <div class="card-header-action">
                    <a target="_blank" href="mod_formulir/print_daftar.php?id=<?= enkripsi($siswa['id_daftar']) ?>" type="button" class="btn btn-success"><i class="fas fa-print    "></i> Cetak Form</a>
                </div>
                <?php } ?>
            </div>
            <div class="card-body">
                <div class="author-box-left text-center">
                    <!-- <img alt="image" src="mod_formulir/<?= $siswa['foto'] ?>" class="rounded-circle author-box-picture">
                    <div class="container-fluid mt-3" style="width: 150px;"><p class="text-center" style="line-height: 120%;">Foto Formal Berseragam Ukuran 3X4</p></div>
                    <button type="button" class="btn btn-info btn-sm mb-2"  data-toggle="modal" data-target="#gantifoto">Upload Foto</button> -->
                    <!-- Modal  -->
                    <div class="modal fade" id="gantifoto" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Upload Foto Profil</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form id="form-ganti-foto">
                                    <div class="modal-body pb-0 mb-0">
                                        <div class="mb-2"><img alt="image" id="foto-profil-preview" src="mod_formulir/<?= $siswa['foto'] ?>" class="author-box-picture img-thumbnail" style="width: 200px;" draggable="false"></div>
                                        <div class="form-group text-left">
                                            <input type="file" class="form-control-file" id="foto_siswa" name="foto_siswa" accept="image/*" aria-describedby="file-foto-siswa" onchange="previewImage();" required>
                                            <small id="file-foto-siswa" class="form-text text-muted">Upload file JPG/PNG (Maks 1 MB)</small>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="author-box-job">Status Pendaftaran</div>
                    <?php if ($siswa['status'] == 1) { ?>
                        <span class="badge badge-success">Diterima</span>
                    <?php } else { ?>
                        <span class="badge badge-danger">On Process</span>
                    <?php } ?>
                </div>
                <div class="author-box-details">
                    <ul class="nav nav-pills" id="myTab3" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab3" data-toggle="tab" href="#home3" role="tab" aria-controls="home" aria-selected="true"><i class="fas fa-user    "></i> Data Diri</a>
                        </li>
                        <?php if ($siswa['status'] >= 1) { ?>
                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab3" data-toggle="tab" href="#contact3" role="tab" aria-controls="contact" aria-selected="false"><i class="fas fa-home    "></i> Alamat &amp; Sekolah</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab3" data-toggle="tab" href="#profile3" role="tab" aria-controls="profile" aria-selected="false"><i class="fas fa-user-friends    "></i> Orang Tua</a>
                        </li>
                        <?php } else if ($siswa['status'] == 0) { ?>
                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab3" data-toggle="tab" href="#contact3" role="tab" aria-controls="contact" aria-selected="false"><i class="fas fa-school    "></i> Asal Sekolah</a>
                        </li>
                        <?php } ?>
                        <!-- <li class="nav-item">
                            <a class="nav-link" id="sekolah-tab3" data-toggle="tab" href="#sekolah3" role="tab" aria-controls="sekolah" aria-selected="false"><i class="fas fa-school    "></i> Asal Sekolah</a>
                        </li> -->
                        <!-- <li class="nav-item">
                            <a class="nav-link" id="pip-tab3" data-toggle="tab" href="#pip3" role="tab" aria-controls="pip" aria-selected="false"><i class="fas fa-edit    "></i> Informasi KKS/PKH/PKS/PIP/SKM</a>
                        </li> -->
                        <?php
                        $jenis = fetch($koneksi, 'jenis', ['nama_jenis' => 'PRESTASI']); 
                        if ($siswa['jenis']  == $jenis['id_jenis']) { ?>
                        <li class="nav-item">
                            <a class="nav-link" id="prestasi-tab3" data-toggle="tab" href="#prestasi3" role="tab" aria-controls="prestasi" aria-selected="false"><i class="fas fa-crown    "></i> Data Prestasi</a>
                        </li>
                        <?php } ?>
                    </ul>
                    <div class="tab-content" id="myTabContent2">
                        <div class="tab-pane fade show active" id="home3" role="tabpanel" aria-labelledby="home-tab3">
                            <center><div><font color="#6495ED">Pasfoto Berseragam Ukuran 3X4</font></div> 
                                <img id="fotoProfilSiswa" alt="image" src="mod_formulir/<?= $siswa['foto'] ?>" class="rounded-circle author-box-picture" draggable="false">  <button type="button" class="btn btn-info btn-sm mb-0"  data-toggle="modal" data-target="#gantifoto">Upload Foto</button></center><br>
                            <form id="form-datadiri">
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No Pendaftaran</label>
                                    <div class="col-sm-12 col-md-5">
                                        <input type="text" name="no" class="form-control" value="<?= $siswa['no_daftar'] ?>" disabled>
                                    </div>
                                </div>
                                <!-- / -->
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Peminatan 1</label>
                                    <div class="col-sm-12 col-md-5">
                                        <select class='form-control' name='jurusan1' required>
                                            <option value=''>Pilih Peminatan 1</option>";
                                            <?php $query=mysqli_query($koneksi, 'select * from jurusan');
                                                while ($jurusan=mysqli_fetch_array($query)) { ?>
                                                <?php if ($siswa['jurusan1'] == $jurusan['id_jurusan']) { ?>
                                                    <option value='<?= $jurusan['id_jurusan'] ?>' selected><?= $jurusan['nama_jurusan'] ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $jurusan['id_jurusan'] ?>'><?= $jurusan['nama_jurusan'] ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Peminatan 2</label>
                                    <div class="col-sm-12 col-md-5">
                                        <select class='form-control' name='jurusan2' required>
                                            <option value=''>Pilih Peminatan 2</option>";
                                            <?php $query=mysqli_query($koneksi, 'select * from jurusan');
                                                while ($jurusan=mysqli_fetch_array($query)) { ?>
                                                <?php if ($siswa['jurusan2'] == $jurusan['id_jurusan']) { ?>
                                                    <option value='<?= $jurusan['id_jurusan'] ?>' selected><?= $jurusan['nama_jurusan'] ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $jurusan['id_jurusan'] ?>'><?= $jurusan['nama_jurusan'] ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Program Keterampilan</label>
                                    <div class="col-sm-12 col-md-5">
                                        <select class='form-control' name='keterampilan' required>
                                            <option value=''>Pilih Keterampilan</option>";
                                            <?php $query=mysqli_query($koneksi, 'select * from keterampilan');
                                                while ($keterampilan=mysqli_fetch_array($query)) { ?>
                                                <?php if ($siswa['keterampilan'] == $keterampilan['id_keterampilan']) { ?>
                                                    <option value='<?= $keterampilan['id_keterampilan'] ?>' selected><?= $keterampilan['nama_keterampilan'] ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $keterampilan['id_keterampilan'] ?>'><?= $keterampilan['nama_keterampilan'] ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <h5><i class="fas fa-home    "></i> Data Diri Siswa</h5>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">NISN</label>
                                    <div class="col-sm-12 col-md-4">
                                        <input type="text" name="nisn" class="form-control" maxlength="10" value="<?= $siswa['nisn'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">NIK</label>
                                    <div class="col-sm-12 col-md-5">
                                        <input type="text" name="nik" class="form-control" maxlength="16" value="<?= $siswa['nik'] ?>" required>
                                    </div>
                                </div>
                                <!-- No. KK -->
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Lengkap</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="nama" class="form-control" value="<?= $siswa['nama'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tempat Lahir</label>
                                    <div class="col-sm-12 col-md-5">
                                        <input type="text" name="tempat" class="form-control" value="<?= $siswa['tempat_lahir'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tgl Lahir</label>
                                    <div class="col-sm-12 col-md-4">
                                        <input type="text" name="tgllahir" class="form-control datepicker" value="<?= $siswa['tgl_lahir'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jenis Kelamin</label>
                                    <div class="col-sm-12 col-md-4">
                                        <select class='form-control' name='jenkel' required>
                                            <!-- <option value=''>Pilih Jenis Kelamin</option>"; -->
                                            <?php foreach ($jeniskelamin as $val => $key) { ?>
                                                <?php if ($siswa['jenkel'] == $val) { ?>
                                                    <option value='<?= $val ?>' selected><?= $key ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $val ?>'><?= $key ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Agama</label>
                                    <div class="col-sm-12 col-md-5">
                                        <select class='form-control' name='agama' required>
                                            <!-- <option value=''>Pilih Agama</option>"; -->
                                            <?php foreach ($agama as $val) { ?>
                                                <?php if ($siswa['agama'] == $val) { ?>
                                                    <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $val ?>'><?= $val ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No Whatsapp</label>
                                    <div class="col-sm-12 col-md-5">
                                        <input type="number" name="nohp" class="form-control" value="<?= $siswa['no_hp'] ?>" required>
                                    </div>
                                </div>
                                <?php if ($siswa['status'] >= 1) { ?>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Anak Ke</label>
                                    <div class="col-sm-12 col-md-3">
                                        <input type="number" name="anakke" class="form-control" value="<?= $siswa['anak_ke'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jumlah Saudara</label>
                                    <div class="col-sm-12 col-md-3">
                                        <input type="number" name="saudara" class="form-control" value="<?= $siswa['saudara'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tinggi Badan (Cm)</label>
                                    <div class="col-sm-12 col-md-3">
                                        <input type="number" name="tinggi" class="form-control" value="<?= $siswa['tinggi'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Berat Badan (Kg)</label>
                                    <div class="col-sm-12 col-md-3">
                                        <input type="number" name="berat" class="form-control" value="<?= $siswa['berat'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status Dalam Keluarga</label>
                                    <div class="col-sm-12 col-md-5">
                                        <input type="text" name="statuskeluarga" class="form-control" value="<?= $siswa['status_keluarga'] ?>" required>
                                    </div>
                                </div>
                                <?php } ?>
                                <div class="form-group">
                                    <p>*Harap isi data diri dengan sebenar-benarnya</p>
                                    <?php if ($siswa['status'] >= 1) { ?>
                                    <form method="post" enctype="multipart/form-data">
                                        <div>
                                            <label for="ijazah_akta">Upload Berkas Ijazah/Akte Lahir</label>
                                            <input type="file" class="form-control-file" id="ijazah_akta" name="ijazah_akta" accept="image/*" aria-describedby="file-ijazah-akta" required>
                                            <small id="file-ijazah-akta" class="form-text text-muted">Upload file JPG/PNG (Maks 2 Mb)</small>
                                        </div>
                                    </form>
                                    <?php } ?>
                                    <center><button id="btnsimpan" type="submit" class="btn btn-primary btn-lg mt-2">Simpan Data Diri</button></center>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="contact3" role="tabpanel" aria-labelledby="contact-tab3">
                            <form id="form-alamat">
                                <?php if ($siswa['status'] >= 1) { ?>
                                <h5><i class="fas fa-home    "></i> Data Alamat</h5>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Alamat</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="alamat" class="form-control" value="<?= $siswa['alamat'] ?>" placeholder="nama jalan / kampung" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">RT / RW</label>
                                    <div class="col-sm-6 col-md-3">
                                        <input type="number" name="rt" class="form-control" value="<?= $siswa['rt'] ?>" required>
                                    </div>
                                    <div class="col-sm-6 col-xs-6 col-md-3">
                                        <input type="number" name="rw" class="form-control" value="<?= $siswa['rw'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Desa</label>
                                    <div class="col-sm-12 col-md-5">
                                        <input type="text" name="desa" class="form-control" value="<?= $siswa['desa'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kecamatan</label>
                                    <div class="col-sm-12 col-md-5">
                                        <input type="text" name="kecamatan" class="form-control" value="<?= $siswa['kecamatan'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kabupaten / Kota</label>
                                    <div class="col-sm-12 col-md-5">
                                        <input type="text" name="kota" class="form-control" value="<?= $siswa['kota'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Provinsi</label>
                                    <div class="col-sm-12 col-md-5">
                                        <input type="text" name="provinsi" class="form-control" value="<?= $siswa['provinsi'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kode Pos</label>
                                    <div class="col-sm-12 col-md-4">
                                        <input type="number" name="kodepos" class="form-control" value="<?= $siswa['kode_pos'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tinggal Bersama</label>
                                    <div class="col-sm-12 col-md-5">
                                        <select class='form-control' name='tinggal' required>
                                            <option value=''>Pilih Tinggal</option>";
                                            <?php foreach ($jenistinggal as $val) { ?>
                                                <?php if ($siswa['tinggal'] == $val) { ?>
                                                    <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $val ?>'><?= $val ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jarak Ke Sekolah (Meter)</label>
                                    <div class="col-sm-12 col-md-3">
                                        <input type="number" name="jarak" class="form-control" value="<?= $siswa['jarak'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Berapa Menit Kesekolah</label>
                                    <div class="col-sm-12 col-md-3">
                                        <input type="number" name="waktu" class="form-control" value="<?= $siswa['waktu'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Transportasi</label>
                                    <div class="col-sm-12 col-md-5">
                                        <select class='form-control' name='transportasi' required>
                                            <option value=''>Pilih Transportasi</option>";
                                            <?php foreach ($transport as $val) { ?>
                                                <?php if ($siswa['transportasi'] == $val) { ?>
                                                    <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $val ?>'><?= $val ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <?php } ?>
                                <h5><i class="fas fa-school    "></i> Asal Sekolah</h5> 
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jenjang Sekolah</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class='form-control' name='jenjangsekolah' required>
                                            <option value=''>Pilih Jenjang Sekolah</option>";
                                            <?php foreach ($jenjangsekolah as $val) { ?>
                                                <?php if ($siswa['jenjang_sekolah'] == $val) { ?>
                                                    <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $val ?>'><?= $val ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status Sekolah</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class='form-control' name='statussekolah' required>
                                            <option value=''>Pilih Status Sekolah</option>";
                                            <?php foreach ($statussekolah as $val) { ?>
                                                <?php if ($siswa['status_sekolah'] == $val) { ?>
                                                    <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $val ?>'><?= $val ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Sekolah</label>
                                    <div class="col-sm-12 col-md-6">
                                        <input type="text" name="asalsekolah" class="form-control" value="<?= $siswa['asal_sekolah'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">NPSN</label>
                                    <div class="col-sm-12 col-md-4">
                                        <input type="text" name="npsn" class="form-control" maxlength="7" value="<?= $siswa['npsn_sekolah'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kabupaten</label>
                                    <div class="col-sm-12 col-md-5">
                                        <input type="text" name="kabsekolah" class="form-control" value="<?= $siswa['kab_sekolah'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nomor Ujian</label>
                                    <div class="col-sm-12 col-md-6">
                                        <input type="text" name="noujian" class="form-control" value="<?= $siswa['no_ujian'] ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <span><font color="red">*Untuk nomor ujian bila tidak ada boleh tidak diisi</font></span>
                                    <p>*Harap isi data alamat dan sekolah dengan sebenar-benarnya</p>
                                    <?php if ($siswa['status'] >= 1) { ?>
                                    <center><button id="btnsimpan" type="submit" class="btn btn-primary btn-lg mt-2">Simpan Data Alamat dan Sekolah</button></center>
                                    <?php } else { ?>
                                    <center><button id="btnsimpan" type="submit" class="btn btn-primary btn-lg mt-2">Simpan Data Sekolah</button></center>
                                    <?php } ?>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="profile3" role="tabpanel" aria-labelledby="profile-tab3">
                            <form id="form-orangtua">
                                <h5><i class="fas fa-user-check    "></i> Data Lengkap Ayah</h5>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No KK</label>
                                    <div class="col-sm-12 col-md-5">
                                        <input type="text" name="nokk" class="form-control" maxlength="16" value="<?= $siswa['no_kk'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">NIK Ayah</label>
                                    <div class="col-sm-12 col-md-5">
                                        <input type="text" name="nikayah" class="form-control" maxlength="16" value="<?= $siswa['nik_ayah'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Ayah</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="namaayah" class="form-control" value="<?= $siswa['nama_ayah'] ?>" required>
                                    </div>
                                </div>
                                <!-- tempat ayah -->
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tempat Lahir</label>
                                    <div class="col-sm-12 col-md-5">
                                        <input type="text" name="tempatlahirayah" class="form-control" value="<?= $siswa['tempat_ayah'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tgl & Tahun Lahir</label>
                                    <div class="col-sm-12 col-md-4">
                                        <input type="text" name="tgllahirayah" class="form-control datepicker" value="<?= $siswa['tgl_lahir_ayah'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Pendidikan</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class='form-control' name='pendidikan_ayah' required>
                                            <option value=''>Pilih Penghasilan</option>";
                                            <?php foreach ($pendidikan as $val) { ?>
                                                <?php if ($siswa['pendidikan_ayah'] == $val) { ?>
                                                    <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $val ?>'><?= $val ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Pekerjaan</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class='form-control' name='pekerjaan_ayah' required>
                                            <option value=''>Pilih Pekerjaan</option>";
                                            <?php foreach ($pekerjaan as $val) { ?>
                                                <?php if ($siswa['pekerjaan_ayah'] == $val) { ?>
                                                    <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $val ?>'><?= $val ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Penghasilan</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class='form-control' name='penghasilan_ayah' required>
                                            <option value=''>Pilih Penghasilan</option>";
                                            <?php foreach ($penghasilan as $val) { ?>
                                                <?php if ($siswa['penghasilan_ayah'] == $val) { ?>
                                                    <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $val ?>'><?= $val ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No HP Ayah</label>
                                    <div class="col-sm-12 col-md-5">
                                        <input type="text" name="nohpayah" class="form-control" maxlength="13" value="<?= $siswa['no_hp_ayah'] ?>">
                                    </div>
                                </div>
                                <h5><i class="fas fa-user-check    "></i> Data Lengkap ibu</h5>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">NIK ibu</label>
                                    <div class="col-sm-12 col-md-5">
                                        <input type="text" name="nikibu" class="form-control" maxlength="16" value="<?= $siswa['nik_ibu'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama ibu</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="namaibu" class="form-control" value="<?= $siswa['nama_ibu'] ?>" required>
                                    </div>
                                </div>
                                <!-- tempat ibu -->
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tempat Lahir</label>
                                    <div class="col-sm-12 col-md-5">
                                        <input type="text" name="tempatlahiribu" class="form-control" value="<?= $siswa['tempat_ibu'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tgl & Tahun Lahir</label>
                                    <div class="col-sm-12 col-md-4">
                                        <input type="text" name="tgllahiribu" class="form-control datepicker" value="<?= $siswa['tgl_lahir_ibu'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Pendidikan</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class='form-control' name='pendidikan_ibu' required>
                                            <option value=''>Pilih Penghasilan</option>";
                                            <?php foreach ($pendidikan as $val) { ?>
                                                <?php if ($siswa['pendidikan_ibu'] == $val) { ?>
                                                    <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $val ?>'><?= $val ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Pekerjaan</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class='form-control' name='pekerjaan_ibu' required>
                                            <option value=''>Pilih Pekerjaan</option>";
                                            <?php foreach ($pekerjaan as $val) { ?>
                                                <?php if ($siswa['pekerjaan_ibu'] == $val) { ?>
                                                    <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $val ?>'><?= $val ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Penghasilan</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class='form-control' name='penghasilan_ibu' required>
                                            <option value=''>Pilih Penghasilan</option>";
                                            <?php foreach ($penghasilan as $val) { ?>
                                                <?php if ($siswa['penghasilan_ibu'] == $val) { ?>
                                                    <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $val ?>'><?= $val ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No Hp Ibu</label>
                                    <div class="col-sm-12 col-md-5">
                                        <input type="text" name="nohpibu" class="form-control" maxlength="13" value="<?= $siswa['no_hp_ibu'] ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <p>*Harap isi data orang tua dengan sebenar-benarnya</p>
                                    <div>
                                        <label for="berkas_kk">Upload Berkas Kartu Keluarga (KK)*</label>
                                        <?php if ($cek3 == 0) { ?>
                                        <input type="file" class="form-control-file" id="berkas_kk" name="berkas_kk" accept="image/*" aria-describedby="file-berkas-kk" required>
                                        <?php } else { ?>
                                        <input type="file" class="form-control-file" id="berkas_kk" name="berkas_kk" accept="image/*" aria-describedby="file-berkas-kk" required>
                                        <?php } ?>
                                        <small id="file-berkas-kk" class="form-text text-muted">Upload file JPG/PNG (Maks 2 Mb)</small>
                                    </div>
                                </div>
                                <!-- tempat wali -->
                                <!-- <h5><i class="fas fa-user-check    "></i> Data Lengkap wali</h5>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">NIK wali</label>
                                    <div class="col-sm-12 col-md-5">
                                        <input type="text" name="nikwali" class="form-control" maxlength="16" value="<?= $siswa['nik_wali'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama wali</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="namawali" class="form-control" value="<?= $siswa['nama_wali'] ?>" required>
                                    </div>
                                </div> -->
                                <!-- <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tahun Lahir</label>
                                    <div class="col-sm-12 col-md-3">
                                        <input type="number" name="tahunlahirwali" class="form-control" value="<?= $siswa['tahun_lahir_wali'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Pendidikan</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class='form-control' name='pendidikan_wali' required>
                                            <option value=''>Pilih Penghasilan</option>";
                                            <?php foreach ($pendidikan as $val) { ?>
                                                <?php if ($siswa['pendidikan_wali'] == $val) { ?>
                                                    <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $val ?>'><?= $val ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Pekerjaan</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class='form-control' name='pekerjaan_wali' required>
                                            <option value=''>Pilih Pekerjaan</option>";
                                            <?php foreach ($pekerjaan as $val) { ?>
                                                <?php if ($siswa['pekerjaan_wali'] == $val) { ?>
                                                    <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $val ?>'><?= $val ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Penghasilan</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class='form-control' name='penghasilan_wali' required>
                                            <option value=''>Pilih Penghasilan</option>";
                                            <?php foreach ($penghasilan as $val) { ?>
                                                <?php if ($siswa['penghasilan_wali'] == $val) { ?>
                                                    <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $val ?>'><?= $val ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No HP wali</label>
                                    <div class="col-sm-12 col-md-5">
                                        <input type="text" name="nohpwali" class="form-control" maxlength="12" value="<?= $siswa['no_hp_wali'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <p>*Harap isi data orang tua dengan sebenar-benarnya</p>
                                    <form method="post" enctype="multipart/form-data">
                                        <div>
                                            <label for="berkas_kk">Upload Berkas Kartu Keluarga (KK)</label>
                                            <input type="file" class="form-control-file" id="berkas_kk" name="berkas_kk" accept="image/*" aria-describedby="file-berkas-kk" required>
                                            <small id="file-berkas-kk" class="form-text text-muted">Upload file JPG/PNG (Maks 600 Kb)</small>
                                        </div>
                                    </form>
                                    <center><button type="submit" class="btn btn-primary btn-lg mt-2">Simpan Data Orang Tua</button></center>
                                </div> -->
                                <h5><i class="fas fa-exclamation-triangle "></i> KKS/PKH/PIP/SKM <font color="red">Bagi Yang Punya</font></h5>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status Penerima</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class='form-control' name='statuskartu'>
                                            <option value=''>Pilih Status Penerima</option>";
                                            <?php foreach ($statuskartu as $val) { ?>
                                                <?php if ($siswa['status_kartu'] == $val) { ?>
                                                    <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $val ?>'><?= $val ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jenis Kartu</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class='form-control' name='jeniskartu'>
                                            <option value=''>Pilih Jenis Kartu</option>";
                                            <?php foreach ($jeniskartu as $val) { ?>
                                                <?php if ($siswa['jenis_kartu'] == $val) { ?>
                                                    <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $val ?>'><?= $val ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nomor Kartu</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="nokartu" class="form-control" value="<?= $siswa['no_kartu'] ?>">
                                    </div>
                                </div>
                                <!-- <div>
                                    <p>*Harap isi data kartu dengan sebenar-benarnya</p>
                                    <form method="post" enctype="multipart/form-data">
                                        <div>
                                            <label for="berkas_kartu">Upload Scan Kartu</label>
                                            <input type="file" class="form-control-file" id="berkas_kartu" name="berkas_kartu" accept="image/*" aria-describedby="file-berkas-kartu">
                                            <small id="file-berkas-kartu" class="form-text text-muted">Upload file JPG/PNG (Maks 600 Kb)</small>
                                        </div>
                                    </form>
                                    <center><button id="btnsimpan" type="submit" class="btn btn-primary btn-lg mt-2">Simpan Data Kartu</button></center>
                                </div> -->
                                <div class="form-group">
                                    <p>*Harap isi data kartu (jika punya) dengan sebenar-benarnya</p>
                                    <form method="post" enctype="multipart/form-data">
                                        <div>
                                            <label for="berkas_kartu">Upload Scan Kartu (Opsional)</label>
                                            <input type="file" class="form-control-file" id="berkas_kartu" name="berkas_kartu" accept="image/*" aria-describedby="file-berkas-kartu">
                                            <small id="file-berkas-kk" class="form-text text-muted">Upload file JPG/PNG (Maks 2 Mb)</small>
                                        </div>
                                    </form>
                                    <center><button type="submit" class="btn btn-primary btn-lg mt-2">Simpan Data Orang Tua dan Kartu</button></center>
                                </div>
                            </form>
                        </div>
                        <!-- Asal Sekolah/ -->
                        <!-- <div class="tab-pane fade" id="sekolah3" role="tabpanel" aria-labelledby="sekolah-tab3">
                            <form id="form-asal-sekolah">
                                <h5><i class="fas fa-school    "></i> Asal Sekolah</h5> 
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jenjang Sekolah</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class='form-control' name='jenjangsekolah' required>
                                            <option value=''>Pilih Jenjang Sekolah</option>";
                                            <?php foreach ($jenjangsekolah as $val) { ?>
                                                <?php if ($siswa['jenjang_sekolah'] == $val) { ?>
                                                    <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $val ?>'><?= $val ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status Sekolah</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class='form-control' name='statussekolah' required>
                                            <option value=''>Pilih Status Sekolah</option>";
                                            <?php foreach ($statussekolah as $val) { ?>
                                                <?php if ($siswa['status_sekolah'] == $val) { ?>
                                                    <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $val ?>'><?= $val ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Sekolah</label>
                                    <div class="col-sm-12 col-md-6">
                                        <input type="text" name="asalsekolah" class="form-control" value="<?= $siswa['asal_sekolah'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">NPSN</label>
                                    <div class="col-sm-12 col-md-4">
                                        <input type="text" name="npsn" class="form-control" maxlength="7" value="<?= $siswa['npsn_sekolah'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kabupaten</label>
                                    <div class="col-sm-12 col-md-5">
                                        <input type="text" name="kabsekolah" class="form-control" value="<?= $siswa['kab_sekolah'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nomor Ujian</label>
                                    <div class="col-sm-12 col-md-6">
                                        <input type="text" name="noujian" class="form-control" value="<?= $siswa['no_ujian'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <p>*Harap isi data sekolah dengan sebenar-benarnya</p>
                                    <center><button id="btnsimpan" type="submit" class="btn btn-primary btn-lg mt-2">Simpan Data Asal Sekolah</button></center>
                                </div>
                            </form>     
                        </div> -->
                        <!-- / -->
                        <!-- <div class="tab-pane fade" id="pip3" role="tabpanel" aria-labelledby="pip-tab3">
                            <form id="form-info-kartu">
                                <h5><i class="fas fa-exclamation-triangle "></i> KKS/PKH/PIP/SKM <font color="red">Bagi Yang Punya</font></h5>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status Penerima</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class='form-control' name='statuskartu'>
                                            <option value=''>Pilih Status Penerima</option>";
                                            <?php foreach ($statuskartu as $val) { ?>
                                                <?php if ($siswa['status_kartu'] == $val) { ?>
                                                    <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $val ?>'><?= $val ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jenis Kartu</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class='form-control' name='jeniskartu'>
                                            <option value=''>Pilih Jenis Kartu</option>";
                                            <?php foreach ($jeniskartu as $val) { ?>
                                                <?php if ($siswa['jenis_kartu'] == $val) { ?>
                                                    <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $val ?>'><?= $val ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nomor Kartu</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="nokartu" class="form-control" value="<?= $siswa['no_kartu'] ?>" required>
                                    </div>
                                </div>
                                <div>
                                    <p>*Harap isi data kartu dengan sebenar-benarnya</p>
                                    <form method="post" enctype="multipart/form-data">
                                        <div>
                                            <label for="berkas_kartu">Upload Scan Kartu</label>
                                            <input type="file" class="form-control-file" id="berkas_kartu" name="berkas_kartu" accept="image/*" aria-describedby="file-berkas-kartu">
                                            <small id="file-berkas-kartu" class="form-text text-muted">Upload file JPG/PNG (Maks 600 Kb)</small>
                                        </div>
                                    </form>
                                    <center><button id="btnsimpan" type="submit" class="btn btn-primary btn-lg mt-2">Simpan Data Kartu</button></center>
                                </div>
                            </form>
                        </div> -->
                        <!-- / -->
                        <div class="tab-pane fade" id="prestasi3" role="tabpanel" aria-labelledby="prestasi-tab3">
                            <?php
                            $prestasi = fetch($koneksi, 'prestasi', ['id_daftar' => $siswa['id_daftar']]);
                            ?>
                            <form id="form-prestasi">
                                <h5><i class="fas fa-crown"></i> Nilai Rapor Semester 3-5</h5><br>
                                <center><span><b><font color="red">Masukkan Nilai Pengetahuan *</font></b></span></center><br>
                                <center><h6>Nilai Rapor Semester 3</h6></center>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">MATEMATIKA</label>
                                    <div class="col-sm-12 col-md-4">
                                        <input type="number" name="mat3" class="form-control" maxlength="10" value="<?= $prestasi['mat3'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">BAHASA INDONESIA</label>
                                    <div class="col-sm-12 col-md-4">
                                        <input type="number" name="bin3" class="form-control" maxlength="10" value="<?= $prestasi['bin3'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">BAHASA INGGRIS</label>
                                    <div class="col-sm-12 col-md-4">
                                        <input type="number" name="bing3" class="form-control" maxlength="10" value="<?= $prestasi['bing3'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">IPA</label>
                                    <div class="col-sm-12 col-md-4">
                                        <input type="number" name="ipa3" class="form-control" maxlength="10" value="<?= $prestasi['ipa3'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">IPS</label>
                                    <div class="col-sm-12 col-md-4">
                                        <input type="number" name="ips3" class="form-control" maxlength="10" value="<?= $prestasi['ips3'] ?>" required>
                                    </div>
                                </div>
                                <br>
                                <center><h6>Nilai Rapor Semester 4</h6></center>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">MATEMATIKA</label>
                                    <div class="col-sm-12 col-md-4">
                                        <input type="number" name="mat4" class="form-control" maxlength="10" value="<?= $prestasi['mat4'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">BAHASA INDONESIA</label>
                                    <div class="col-sm-12 col-md-4">
                                        <input type="number" name="bin4" class="form-control" maxlength="10" value="<?= $prestasi['bin4'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">BAHASA INGGRIS</label>
                                    <div class="col-sm-12 col-md-4">
                                        <input type="number" name="bing4" class="form-control" maxlength="10" value="<?= $prestasi['bing4'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">IPA</label>
                                    <div class="col-sm-12 col-md-4">
                                        <input type="number" name="ipa4" class="form-control" maxlength="10" value="<?= $prestasi['ipa4'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">IPS</label>
                                    <div class="col-sm-12 col-md-4">
                                        <input type="number" name="ips4" class="form-control" maxlength="10" value="<?= $prestasi['ips4'] ?>" required>
                                    </div>
                                </div>
                                <br>
                                <center><h6>Nilai Rapor Semester 5</h6></center>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">MATEMATIKA</label>
                                    <div class="col-sm-12 col-md-4">
                                        <input type="number" name="mat5" class="form-control" maxlength="10" value="<?= $prestasi['mat5'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">BAHASA INDONESIA</label>
                                    <div class="col-sm-12 col-md-4">
                                        <input type="number" name="bin5" class="form-control" maxlength="10" value="<?= $prestasi['bin5'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">BAHASA INGGRIS</label>
                                    <div class="col-sm-12 col-md-4">
                                        <input type="number" name="bing5" class="form-control" maxlength="10" value="<?= $prestasi['bing5'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">IPA</label>
                                    <div class="col-sm-12 col-md-4">
                                        <input type="number" name="ipa5" class="form-control" maxlength="10" value="<?= $prestasi['ipa5'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">IPS</label>
                                    <div class="col-sm-12 col-md-4">
                                        <input type="number" name="ips5" class="form-control" maxlength="10" value="<?= $prestasi['ips5'] ?>" required>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Prestasi</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class='form-control' id="tipePrestasi" name='tipeprestasi'>
                                            <option value=''>Pilih Prestasi</option>";
                                            <?php foreach ($jenis_prestasi as $val) { ?>
                                                <?php if ($prestasi['tipe_prestasi'] == $val) { ?>
                                                    <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $val ?>'><?= $val ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <script type="text/javascript">
                                $(document).ready(function() {
                                    $("#tipePrestasi").change(function() {
                                        var tipe = $(this).val();
                                        if (tipe == "AKADEMIK") {
                                            $("#berkas_prestasi").prop('required', true);
                                            $("#uploadPrestasi").prop('hidden', false);
                                            $("#isiTipePrestasi").html(`
                                                <div class="form-group row mb-2">
                                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jenis Prestasi</label>
                                                    <div class="col-sm-12 col-md-7">
                                                        <select class='form-control' name='jenisprestasi' required>
                                                            <option value=''>Pilih Jenis Prestasi</option>";
                                                            <?php foreach ($jenis_prestasi_akademik as $val) { ?>
                                                                <?php if ($prestasi['jenis_prestasi'] == $val) { ?>
                                                                    <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                                <?php  } else { ?>
                                                                    <option value='<?= $val ?>'><?= $val ?> </option>
                                                                <?php } ?>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            `);
                                        } else if (tipe == "NON AKADEMIK") {
                                            $("#berkas_prestasi").prop('required', true);
                                            $("#uploadPrestasi").prop('hidden', false);
                                            $("#isiTipePrestasi").html(`
                                                <div class="form-group row mb-2">
                                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Prestasi</label>
                                                    <div class="col-sm-12 col-md-7">
                                                        <input type="text" name="namaprestasi" class="form-control" value="<?= $prestasi['nama_prestasi'] ?>" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-2">
                                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Peringkat Prestasi</label>
                                                    <div class="col-sm-12 col-md-7">
                                                        <select class='form-control' name='peringkatprestasi' required>
                                                            <option value=''>Pilih Peringkat Prestasi</option>";
                                                            <?php foreach ($peringkatprestasi as $val) { ?>
                                                                <?php if ($prestasi['peringkat_prestasi'] == $val) { ?>
                                                                    <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                                <?php  } else { ?>
                                                                    <option value='<?= $val ?>'><?= $val ?> </option>
                                                                <?php } ?>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-2">
                                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tingkat Prestasi</label>
                                                    <div class="col-sm-12 col-md-7">
                                                        <select class='form-control' name='tingkatprestasi' required>
                                                            <option value=''>Pilih Tingkat Prestasi</option>";
                                                            <?php foreach ($tingkatprestasi as $val) { ?>
                                                                <?php if ($prestasi['tingkat_prestasi'] == $val) { ?>
                                                                    <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                                <?php  } else { ?>
                                                                    <option value='<?= $val ?>'><?= $val ?> </option>
                                                                <?php } ?>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            `);
                                        } else {
                                            $("#berkas_prestasi").prop('required', false);
                                            $("#uploadPrestasi").prop('hidden', true);
                                            $("#isiTipePrestasi").html(`<div></div>`);
                                        }
                                    });
                                });
                                </script>
                                <div id="isiTipePrestasi"></div>
                                <div class="form-group">
                                    <p>*Harap isi data prestasi dengan sebenar-benarnya</p>
                                    <form method="post" enctype="multipart/form-data">
                                        <div id="uploadPrestasi" hidden>
                                            <label for="berkas_prestasi">Upload Bukti Prestasi <font color="red">Akademik/Non Akademik</font></label>
                                            <input type="file" class="form-control-file" id="berkas_prestasi" name="berkas_prestasi" accept="image/*,application/pdf" aria-describedby="file-berkas-prestasi">
                                            <small id="file-berkas-prestasi" class="form-text text-muted">Upload file PDF/JPG/PNG (Maks 2 Mb)</small>
                                        </div>
                                    </form>
                                    <center><button type="submit" class="btn btn-primary btn-lg mt-2">Simpan Data Prestasi</button></center>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-4 col-lg-4">
        <div class="card author-box card-primary">
            <div class="card-header">
                <h4>Progres Pengisian Formulir</h4>
                <div class="card-header-action">
                </div>
            </div>
            <div class="card-body">
                <div class="activities">
                    <div class="activity">
                        <div class="activity-icon bg-primary text-white shadow-primary">
                            1
                        </div>
                        <div class="activity-detail">
                            <h5>Data Diri Siswa</h5>
                            <?php if (($cek1 <> 0 && $siswa['status'] >= 1) || $cek1p <> 0) { ?>
                                <p><span class="badge badge-danger"><i class="fas fa-times-circle"></i> Belum Lengkap</span></p>
                            <?php } else { ?>
                                <p><span class="badge badge-success"><i class="fas fa-check-circle"></i> Lengkap</span></p>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="activities">
                    <div class="activity">
                        <div class="activity-icon bg-primary text-white shadow-primary">
                            2
                        </div>
                        <div class="activity-detail">
                            <?php if ($siswa['status'] >= 1) { ?>
                            <h5>Alamat &amp; Sekolah</h5>
                            <?php } else { ?>
                            <h5>Data Sekolah</h5>
                            <?php } ?>
                            <?php if (($cek2 <> 0 && $siswa['status'] >= 1) || $cek2p <> 0) { ?>
                                <p><span class="badge badge-danger"><i class="fas fa-times-circle"></i> Belum Lengkap</span></p>
                            <?php } else { ?>
                                <p><span class="badge badge-success"><i class="fas fa-check-circle"></i> Lengkap</span></p>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <?php if ($siswa['status'] >= 1) { ?>
                <div class="activities">
                    <div class="activity">
                        <div class="activity-icon bg-primary text-white shadow-primary">
                            3
                        </div>
                        <div class="activity-detail">
                            <h5>Data Orang Tua</h5>
                            <?php if ($cek3 <> 0) { ?>
                                <p><span class="badge badge-danger"><i class="fas fa-times-circle"></i> Belum Lengkap</span></p>
                            <?php } else { ?>
                                <p><span class="badge badge-success"><i class="fas fa-check-circle"></i> Lengkap</span></p>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <!--/ -->
                <!-- <div class="activities">
                    <div class="activity">
                        <div class="activity-icon bg-primary text-white shadow-primary">
                            4
                        </div>
                        <div class="activity-detail">
                            <h5>Asal Sekolah</h5>
                            <?php if ($cek4 <> 0) { ?>
                                <p><span class="badge badge-danger"><i class="fas fa-times-circle"></i> Belum Lengkap</span></p>
                            <?php } else { ?>
                                <p><span class="badge badge-success"><i class="fas fa-check-circle"></i> Lengkap</span></p>
                            <?php } ?>
                        </div>
                    </div>
                </div> -->
                <!-- / -->
                <div class="activities">
                    <div class="activity">
                        <div class="activity-icon bg-primary text-white shadow-primary">
                            4
                        </div>
                        <div class="activity-detail">
                            <h5>Informasi Kartu</h5>
                            <?php if ($cek5 <> 0) { ?>
                                <p><span class="badge badge-danger"><i class="fas fa-times-circle"></i> Belum Lengkap</span></p>
                            <?php } else { ?>
                                <p><span class="badge badge-success"><i class="fas fa-check-circle"></i> Lengkap</span></p>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <!-- / -->
                <div class="activities">
                    <div class="activity">
                        <div class="activity-icon bg-primary text-white shadow-primary">
                        <?php if ($siswa['status'] >= 1) { ?>
                            5
                        <?php } else { ?>
                            3
                        <?php } ?>
                        </div>
                        <div class="activity-detail">
                            <h5>Data Prestasi</h5>
                            <?php if ($cek6 <> 0) { ?>
                                <p><span class="badge badge-danger"><i class="fas fa-times-circle"></i> Belum Lengkap</span></p>
                            <?php } else { ?>
                                <p><span class="badge badge-success"><i class="fas fa-check-circle"></i> Lengkap</span></p>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('.form-control').keyup(function(event) {

        $(this).val($(this).val().toUpperCase());
    });
      $(document).ready(function() {
        $('#form-datadiri').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: 'mod_formulir/crud_prestasi_formulir.php?pg=simpandatadiri',
                data: new FormData(this),
                processData: false,
                contentType: false,
                cache: false,
                beforeSend: function() {
                    $('#btnsimpan').prop('disabled', true);
                },
                success: function(data) {
                    var json = data;
                    $('#btnsimpan').prop('disabled', false);
                    if (json == 'ok') {
                        iziToast.success({
                            title: 'Terima Kasih!',
                            message: 'Data berhasil disimpan',
                            position: 'topCenter'
                        });
                        // location.reload();
                    } else {
                        iziToast.error({
                            title: 'Maaf!',
                            message: json,
                            position: 'topCenter'
                        });
                    }
                    //$('#bodyreset').load(location.href + ' #bodyreset');
                }
            });
            // setTimeout(function () { 
            //     location.reload(true); 
            // }, 2000);
            return false;
        });
        $('#form-alamat').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: 'mod_formulir/crud_prestasi_formulir.php?pg=simpanalamat',
                data: $(this).serialize(),
                beforeSend: function() {
                    $('#btnsimpan').prop('disabled', true);
                },
                success: function(data) {
                    var json = data;
                    $('#btnsimpan').prop('disabled', false);
                    if (json == 'ok') {
                        iziToast.success({
                            title: 'Terima Kasih!',
                            message: 'Data berhasil disimpan',
                            position: 'topCenter'
                        });

                    } else {
                        iziToast.error({
                            title: 'Maaf!',
                            message: json,
                            position: 'topCenter'
                        });
                    }
                    //$('#bodyreset').load(location.href + ' #bodyreset');
                }
            });
            return false;
        });
        $('#form-asal-sekolah').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: 'mod_formulir/crud_prestasi_formulir.php?pg=simpanasalsekolah',
                data: $(this).serialize(),
                beforeSend: function() {
                    $('#btnsimpan').prop('disabled', true);
                },
                success: function(data) {
                    var json = data;
                    $('#btnsimpan').prop('disabled', false);
                    if (json == 'ok') {
                        iziToast.success({
                            title: 'Terima Kasih!',
                            message: 'Data berhasil disimpan',
                            position: 'topCenter'
                        });

                    } else {
                        iziToast.error({
                            title: 'Maaf!',
                            message: json,
                            position: 'topCenter'
                        });
                    }
                    //$('#bodyreset').load(location.href + ' #bodyreset');
                }
            });
            return false;
        });
        $('#form-orangtua').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: 'mod_formulir/crud_prestasi_formulir.php?pg=simpanortu',
                data: new FormData(this),
                processData: false,
                contentType: false,
                cache: false,
                beforeSend: function() {
                    $('#btnsimpan').prop('disabled', true);
                },
                success: function(data) {
                    var json = data;
                    $('#btnsimpan').prop('disabled', false);
                    if (json == 'ok') {
                        iziToast.success({
                            title: 'Terima Kasih!',
                            message: 'Data berhasil disimpan',
                            position: 'topCenter'
                        });

                    } else {
                        iziToast.error({
                            title: 'Maaf!',
                            message: json,
                            position: 'topCenter'
                        });
                    }
                    //$('#bodyreset').load(location.href + ' #bodyreset');
                }
            });
            return false;
        });
        $('#form-info-kartu').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: 'mod_formulir/crud_prestasi_formulir.php?pg=simpaninfokartu',
                data: new FormData(this),
                processData: false,
                contentType: false,
                cache: false,
                beforeSend: function() {
                    $('#btnsimpan').prop('disabled', true);
                },
                success: function(data) {
                    var json = data;
                    $('#btnsimpan').prop('disabled', false);
                    if (json == 'ok') {
                        iziToast.success({
                            title: 'Terima Kasih!',
                            message: 'Data berhasil disimpan',
                            position: 'topCenter'
                        });
                    } else {
                        iziToast.error({
                            title: 'Maaf!',
                            message: json,
                            position: 'topCenter'
                        });
                    }
                    //$('#bodyreset').load(location.href + ' #bodyreset');
                }
            });
            return false;
        });
        $('#form-ganti-foto').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: 'mod_formulir/crud_prestasi_formulir.php?pg=gantifoto',
                data: new FormData(this),
                processData: false,
                contentType: false,
                cache: false,
                success: function(data) {
                    iziToast.success({
                        title: 'Baguss!',
                        message: 'Foto Berhasil diganti',
                        position: 'topRight'
                    });
                    setTimeout(function() {
                        window.location.reload();
                    }, 1000);
                    $('#gantifoto').modal('hide');
                    //$('#bodyreset').load(location.href + ' #bodyreset');
                }
            });
            return false;
        });
        $('#form-prestasi').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: 'mod_formulir/crud_prestasi_formulir.php?pg=simpanprestasi',
                data: new FormData(this),
                processData: false,
                contentType: false,
                cache: false,
                beforeSend: function() {
                    $('#btnsimpan').prop('disabled', true);
                },
                success: function(data) {
                    iziToast.success({
                        title: 'Baguss!',
                        message: 'Prestasi Berhasil ditambahkan',
                        position: 'topRight'
                    });
                    setTimeout(function() {
                        window.location.reload();
                    }, 1000);
                    //$('#bodyreset').load(location.href + ' #bodyreset');
                }
            });
            return false;
        });
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                $('#foto-profil-preview').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        function fileSizeValidation(file, batas) {
            if (file.files.length > 0) {
                for (const i = 0; i < file.files.length; i++) {
                    const size = file.files.item(i).size;
                    const fileN = Math.round((size/1024));
                    if (fileN >= batas) {
                        swal({
                            title: 'Melebihi batas!!',
                            text: `File melebihi ${batas} KB, kompres file dulu!`,
                            icon: 'warning',
                            // buttons: true,
                        });
                        return false;
                    } else {
                        return true;
                    }
                }
            }
        }
        $("#ijazah_akta").change(function() {
            if (!fileSizeValidation(this, 2000)) {
                $("#ijazah_akta").replaceWith($("#ijazah_akta").val('')).clone(true);
            }
        });
        $("#berkas_kk").change(function() {
            if (!fileSizeValidation(this, 2000)) {
                $("#berkas_kk").replaceWith($("#berkas_kk").val('')).clone(true);
            }
        });
        $("#berkas_kartu").change(function() {
            if (!fileSizeValidation(this, 2000)) {
                $("#berkas_kartu").replaceWith($("#berkas_kartu").val('')).clone(true);
            }
        });
        $("#berkas_prestasi").change(function() {
            if (!fileSizeValidation(this, 2000)) {
                $("#berkas_prestasi").replaceWith($("#berkas_prestasi").val('')).clone(true);
            }
        });
        $("#foto_siswa").change(function() {
            if (!fileSizeValidation(this, 1000)) {
                $("#foto_siswa").replaceWith($("#foto_siswa").val('')).clone(true);
            } else {
                readURL(this);
            }
        });
    });
</script>