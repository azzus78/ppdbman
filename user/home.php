<div class="section-header">
    <h1>Hai!, <?= $siswa['nama'] ?></h1>
    <div class="col-sm-12 col-md-auto mb-2">
        <!-- <button type="button" class="btn btn-outline-success" data-toggle="modal" onclick="myFunctiondownload()">
            <i class="fas fa-cloud-download-alt"></i> Download Tata Cara PPDB
        </button> -->
    </div>
    <script>
        function myFunctiondownload() {
        window.open("<?php echo $setting_kartu_ujian['filebook']; ?>");
        }
    </script>
</div>
<!-- <div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
                <i class="far fa-user"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Pendaftar</h4>
                </div>
                <div class="card-body">
                    <?= rowcount($koneksi, 'daftar') ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-danger">
                <i class="far fa-newspaper"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Daftar Ulang</h4>
                </div>
                <div class="card-body">
                    <?= rowcount($koneksi, 'daftar', ['status' => 1]) ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-warning">
                <i class="far fa-file"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Data Transaksi</h4>
                </div>
                <div class="card-body">
                    <?= rowcount($koneksi, 'bayar') ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-success">
                <i class="fas fa-circle"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Online Users</h4>
                </div>
                <div class="card-body">
                    <?= rowcount($koneksi, 'daftar', ['online' => 1]) ?>
                </div>
            </div>
        </div>
    </div>
</div> -->
<?php defined('BASEPATH') or die("ip anda sudah tercatat oleh sistem kami") ?>
<?php //$siswa = fetch($koneksi, 'daftar', ['id_daftar' => $user['id_daftar']]); 
?>
<?php
$cek1 = mysqli_num_rows(mysqli_query($koneksi, "select * from daftar where
 id_daftar         = '$siswa[id_daftar]' and
 nik                is  null and 
 jenkel             is  null and
 anak_ke            is  null and
 saudara            is  null and
 tinggi             is  null and
 berat              is  null and
 status_keluarga    is  null and
 baju               is  null and
 jurusan1           is  null and
 jurusan2           is  null and
 agama              is  null
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
 nik_wali                 is  null and
 nama_wali                     is  null and 
 tahun_lahir_wali                   is  null and
 pendidikan_wali              is  null and
 pekerjaan_wali                 is  null and
 penghasilan_wali              is  null and
 file_kk                    is  null
"));
$cek4 = mysqli_num_rows(mysqli_query($koneksi, "select * from daftar where
 id_daftar         = '$siswa[id_daftar]' and
 jenjang_sekolah              is  null and
 status_sekolah                is  null and
 asal_sekolah               is  null and
 npsn_sekolah                   is  null and
 kab_sekolah                  is  null and
 no_ujian                       is null 
"));
if ($cek1 <> 0 || $cek2 <> 0 || $cek3 <> 0 || $cek4 <> 0) { ?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        <span class="sr-only">Close</span>
    </button>
    Silahkan lengkapi data diri anda klik tombol ini untuk isi formulir 
    <?php if (!strcmp($siswa['jenis'], "PR")) { ?>
    <a class="btn btn-success" href="?pg=prestasi_formulir" role="button">Isi Formulir</a>
    <?php } else { ?>
    <a class="btn btn-success" href="?pg=formulir" role="button">Isi Formulir</a>
    <?php } ?>
</div>
<?php } ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="activities">
                    <?php $query = mysqli_query($koneksi, "SELECT * FROM pengumuman where jenis='2'");
                    while ($data = mysqli_fetch_array($query)) {
                    ?>
                        <div class="activity">
                            <div class="activity-icon bg-primary text-white shadow-primary">
                                <i class="fas fa-bullhorn"></i>
                            </div>
                            <div class="activity-detail">
                                <div class="mb-2">
                                    <span class="text-job text-primary"><?= $data['tgl'] ?></span>
                                    <span class="bullet"></span>
                                    <a class="text-job" href="#">View</a>

                                </div>
                                <h5><?= $data['judul'] ?></h5>
                                <p><?= $data['pengumuman'] ?></p>
                            </div>
                        </div>
                    <?php } ?>

                </div>
            </div>
        </div>

    </div>
</div>