<!-- <div class="section-header">
    <h3>Detail Pendaftar</h3>
</div> -->
<?php defined('BASEPATH') or die("ip anda sudah tercatat oleh sistem kami") ?>
<?php 
$siswa = fetch($koneksi, 'daftar', ['id_daftar' => dekripsi($_GET['id'])]);
$jenis = fetch($koneksi, 'jenis', ['nama_jenis' => 'PRESTASI']); 
$prestasi = $siswa['jenis']  == $jenis['id_jenis'];
$jurusan1 = "-";
$jurusan2 = "-";
$keterampilan = "-";
$query=mysqli_query($koneksi, 'select * from jurusan');
while ($jurusan=mysqli_fetch_array($query)) {
    if ($siswa['jurusan1'] == $jurusan['id_jurusan']) {
        $jurusan1 = $jurusan['nama_jurusan'];
    }
    if ($siswa['jurusan2'] == $jurusan['id_jurusan']) {
        $jurusan2 = $jurusan['nama_jurusan'];
    }
}
$query=mysqli_query($koneksi, 'select * from keterampilan');
while ($keter=mysqli_fetch_array($query)) {
    if ($siswa['keterampilan'] == $keter['id_keterampilan']) {
        $keterampilan = $keter['nama_keterampilan'];
    }
} ?>
<div class="row">
    <div class="col-12 col-sm-12 col-lg-12">
        <div class="card author-box card-primary">
            <div class="card-header">
                <h4>Data Pendaftar</h4>
                <div class="card-header-action">
                    <a target="_blank" href="mod_daftar/print_daftar.php?id=<?= $_GET['id'] ?>" type="button" class="btn btn-success"><i class="fas fa-print    "></i> Cetak Formulir</a>
                </div>
                <a href="?pg=daftar"><button type="button" class="btn btn-warning" style="margin-left: 5px;">Kembali
                    <i class="fas fa-backward"></i>
                </button></a>
            </div>
            <div class="card-body">
                <div class="author-box-left">
                    <img id="myImg" class="rounded-circle author-box-picture" src="../user/mod_formulir/<?= $siswa['foto'] ?>">
                    <!-- <img alt="image" src="../user/mod_formulir/<?= $siswa['foto'] ?>" class="rounded-circle author-box-picture"> -->
                    <div class="clearfix"></div>
                    <!-- The Modal -->
                    <div id="myModal" class="dtlmdl">
                    <img class="mdlcntn" id="img01"><br>
                    <button class="cls btn btn-outline-secondary">Close</button>
                    <div id="caption"></div>
                    </div>

                    <script>
                        // Get the modal
                        var modal = document.getElementById("myModal");

                        // Get the image and insert it inside the modal - use its "alt" text as a caption
                        var img = document.getElementById("myImg");
                        var modalImg = document.getElementById("img01");
                        var captionText = document.getElementById("caption");
                        img.onclick = function(){
                        modal.style.display = "block";
                        modalImg.src = this.src;
                        captionText.innerHTML = this.alt;
                        }

                        // Get the <span> element that closes the modal
                        var button = document.getElementsByClassName("cls")[0];

                        // When the user clicks on <span> (x), close the modal
                        button.onclick = function() { 
                        modal.style.display = "none";
                        }
                    </script>
                    <br>
                    <div class="author-box-job">Status Pendaftaran</div>
                    <?php if ($siswa['status'] == 1) { ?>
                        <span class="badge badge-success">Diterima</span>
                    <?php } else { ?>
                        <span class="badge badge-success">Pending</span>
                    <?php } ?>
                </div>
                <div class="author-box-details">
                    <ul class="nav nav-pills" id="myTab3" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab3" data-toggle="tab" href="#home3" role="tab" aria-controls="home" aria-selected="true"><i class="fas fa-user    "></i> Data Diri</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab3" data-toggle="tab" href="#profile3" role="tab" aria-controls="profile" aria-selected="false"><i class="fas fa-user-friends    "></i> Orang Tua</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="sekolah-tab3" data-toggle="tab" href="#sekolah3" role="tab" aria-controls="sekolah" aria-selected="false"><i class="fas fa-school    "></i> Asal Sekolah</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pip-tab3" data-toggle="tab" href="#pip3" role="tab" aria-controls="pip" aria-selected="false"><i class="fas fa-edit    "></i> Informasi KKS/PKH/PKS/PIP/SKM</a>
                        </li>
                        <?php if ($prestasi) { ?>
                        <li class="nav-item">
                            <a class="nav-link" id="prestasi-tab3" data-toggle="tab" href="#prestasi3" role="tab" aria-controls="prestasi" aria-selected="false"><i class="fas fa-crown    "></i> Data Prestasi & Tahfidz</a>
                        </li>
                        <?php } ?>
                        <li class="nav-item">
                            <a class="nav-link" id="berkas-tab3" data-toggle="tab" href="#berkas3" role="tab" aria-controls="berkas" aria-selected="false"><i class="fas fa-archive    "></i> Berkas Pendaftaran</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent2">
                        <div class="tab-pane fade show active" id="home3" role="tabpanel" aria-labelledby="home-tab3">
                            <div class="table-responsiv">
                                <table class="table table-striped table-sm ">
                                    <tbody>
                                        <tr>
                                            <td align="right"><b>NISN</b></td>
                                            <td align="left"><?= $siswa['nisn'] ?></td>
                                        </tr>
                                        <tr>
                                            <td align="right"><b>NIK</b></td>
                                            <td align="left"><?= $siswa['nik'] ?></td>
                                        </tr>
                                        <tr>
                                            <td align="right"><b>Nama Lengkap</b></td>
                                            <td align="left"><?= $siswa['nama'] ?></td>
                                        </tr>
                                        <tr>
                                            <td align="right"><b>Tempat Tgl Lahir</b></td>
                                            <td align="left"><?= $siswa['tempat_lahir'] ?>, <?= $siswa['tgl_lahir'] ?></td>
                                        </tr>
                                        <tr>
                                            <td align="right"><b>Jenis Kelamin</b></td>
                                            <td align="left"><?= ($siswa['jenkel'] == 'L') ? "Laki-Laki" : "Perempuan"; ?></td>
                                        </tr>
                                        <tr>
                                            <td align="right"><b>Jurusan 1</b></td>
                                            <td align="left"><?= $jurusan1 ?></td>
                                        </tr>
                                        <tr>
                                            <td align="right"><b>Jurusan 2</b></td>
                                            <td align="left"><?= $jurusan2 ?></td>
                                        </tr>
                                        <tr>
                                            <td align="right"><b>Keterampilan</b></td>
                                            <td align="left"><?= $keterampilan ?></td>
                                        </tr>
                                        <tr>
                                            <td align="right"><b>No Handphone</b></td>
                                            <td align="left"><i class="fab fa-whatsapp text-success"></i> <?= $siswa['no_hp']  ?></td>
                                        </tr>
                                        <!-- asal sekolah -->
                                        <tr>
                                            <td align="right"><b>Alamat Siswa</b></td>
                                            <td align="left"><?= $siswa['alamat']  ?></td>
                                        </tr>
                                        <tr>
                                            <td align="right"><b>RT / RW</b></td>
                                            <td align="left"><?= $siswa['rt']  ?>, <?= $siswa['rw']  ?></td>
                                        </tr>
                                        <tr>
                                            <td align="right"><b>Desa</b></td>
                                            <td align="left"><?= $siswa['desa']  ?></td>
                                        </tr>
                                        <tr>
                                            <td align="right"><b>Kecamatan</b></td>
                                            <td align="left"><?= $siswa['kecamatan']  ?></td>
                                        </tr>
                                        <tr>
                                            <td align="right"><b>Kota / Kabupaten</b></td>
                                            <td align="left"><?= $siswa['kota']  ?></td>
                                        </tr>
                                        <tr>
                                            <td align="right"><b>Provinsi</b></td>
                                            <td align="left"><?= $siswa['provinsi']  ?></td>
                                        </tr>
                                        <tr>
                                            <td align="right"><b>Kode Pos</b></td>
                                            <td align="left"><?= $siswa['kode_pos']  ?></td>
                                        </tr>
                                        <tr>
                                            <td align="right"><b>Anak Ke</b></td>
                                            <td align="left"><?= $siswa['anak_ke']  ?></td>
                                        </tr>
                                        <tr>
                                            <td align="right"><b>Saudara</b></td>
                                            <td align="left"><?= $siswa['saudara']  ?></td>
                                        </tr>
                                        <tr>
                                            <td align="right"><b>Tinggi Badan (Cm)</b></td>
                                            <td align="left"><?= $siswa['tinggi']  ?></td>
                                        </tr>
                                        <tr>
                                            <td align="right"><b>Berat Badan (Kg)</b></td>
                                            <td align="left"><?= $siswa['berat']  ?></td>
                                        </tr>
                                        <tr>
                                            <td align="right"><b>Status Dalam Keluarga</b></td>
                                            <td align="left"><?= $siswa['status_keluarga']  ?></td>
                                        </tr>
                                        <tr>
                                            <td align="right"><b>Tinggal Bersama</b></td>
                                            <td align="left"><?= $siswa['tinggal']  ?></td>
                                        </tr>
                                        <tr>
                                            <td align="right"><b>Jarak Ke Sekolah (Meter)</b></td>
                                            <td align="left"><?= $siswa['jarak']  ?></td>
                                        </tr>
                                        <tr>
                                            <td align="right"><b>Waktu Tempuh (Menit)</b></td>
                                            <td align="left"><?= $siswa['waktu']  ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile3" role="tabpanel" aria-labelledby="profile-tab3">
                            <div class="table-responsive">
                                <table class="table table-striped table-sm ">
                                    <tbody>
                                        <tr>
                                            <td align="center" colspan="2"><i class="fas fa-user-friends"></i> <b>Data Lengkap Ayah</b></td>
                                        </tr>
                                        <tr>
                                            <td align="right"><b>KK</b></td>
                                            <td align="left"><i class="fas fa-id-card text-success"></i> <?= $siswa['no_kk'] ?></td>
                                        </tr>
                                        <tr>
                                            <td align="right"><b>NIK Ayah</b></td>
                                            <td align="left"><?= $siswa['nik_ayah'] ?></td>
                                        </tr>
                                        <tr>
                                            <td align="right"><b>Nama Lengkap Ayah</b></td>
                                            <td align="left"><?= $siswa['nama_ayah'] ?></td>
                                        </tr>
                                        <tr>
                                            <td align="right"><b>Tempat Lahir</b></td>
                                            <td align="left"><?= $siswa['tempat_ayah'] ?></td>
                                        </tr>
                                        <tr>
                                            <td align="right"><b>Tgl & Tahun Lahir</b></td>
                                            <td align="left"><?php echo date('d-m-Y', strtotime($siswa['tgl_lahir_ayah'])); ?></td>
                                        </tr>
                                        <tr>
                                            <td align="right"><b>Pendidikan Ayah</b></td>
                                            <td align="left"><?= $siswa['pendidikan_ayah']  ?></td>
                                        </tr>
                                        <tr>
                                            <td align="right"><b>Pekerjaan Ayah</b></td>
                                            <td align="left"> <?= $siswa['pekerjaan_ayah']  ?></td>
                                        </tr>
                                        <tr>
                                            <td align="right"><b>Penghasilan Ayah</b></td>
                                            <td align="left"><?= $siswa['penghasilan_ayah']  ?></td>
                                        </tr>
                                        <tr>
                                            <td align="right"><b>No Hp Ayah</b></td>
                                            <td align="left"><i class="fab fa-whatsapp text-success"></i> <?= $siswa['no_hp_ayah']  ?></td>
                                        </tr>
                                        <!-- DATA LENGKAP IBU -->
                                        <tr>
                                            <td align="center" colspan="2"><i class="fas fa-user-friends"></i> <b>Data Lengkap Ibu</b></td>
                                        </tr>
                                        <tr>
                                            <td align="right"><b>NIK Ibu</b></td>
                                            <td align="left"><i class="fas fa-id-card text-success"></i> <?= $siswa['nik_ibu'] ?></td>
                                        </tr>
                                        <tr>
                                            <td align="right"><b>Nama Lengkap Ibu</b></td>
                                            <td align="left"><?= $siswa['nama_ibu'] ?></td>
                                        </tr>
                                        <tr>
                                            <td align="right"><b>Tempat Lahir</b></td>
                                            <td align="left"><?= $siswa['tempat_ibu'] ?></td>
                                        </tr>
                                        <tr>
                                            <td align="right"><b>Tgl & Tahun Lahir</b></td>
                                            <td align="left"><?php echo date('d-m-Y', strtotime($siswa['tgl_lahir_ibu'])); ?></td>
                                        </tr>
                                        <tr>
                                            <td align="right"><b>Pendidikan Ibu</b></td>
                                            <td align="left"><?= $siswa['pendidikan_ibu']  ?></td>
                                        </tr>
                                        <tr>
                                            <td align="right"><b>Pekerjaan Ibu</b></td>
                                            <td align="left"> <?= $siswa['pekerjaan_ibu']  ?></td>
                                        </tr>
                                        <tr>
                                            <td align="right"><b>Penghasilan Ibu</b></td>
                                            <td align="left"><?= $siswa['penghasilan_ibu']  ?></td>
                                        </tr>
                                        <tr>
                                            <td align="right"><b>No Hp Ibu</b></td>
                                            <td align="left"><i class="fab fa-whatsapp text-success"></i> <?= $siswa['no_hp_ibu']  ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- / -->
                        <div class="tab-pane fade" id="sekolah3" role="tabpanel" aria-labelledby="sekolah-tab3">
                            <div class="table-responsiv">
                                <table class="table table-striped table-sm ">
                                    <tbody>
                                        <tr>
                                            <td align="center" colspan="2"><i class="fas fa-school"></i> <b>Asal Sekolah</b></td>
                                        </tr>
                                        <tr>
                                            <td align="right"><b>Jenjang Sekolah</b></td>
                                            <td align="left"><i class="fas fa-id-card text-success"></i> <?= $siswa['jenjang_sekolah'] ?></td>
                                        </tr>
                                        <tr>
                                            <td align="right"><b>Status Sekolah</b></td>
                                            <td align="left"><?= $siswa['status_sekolah'] ?></td>
                                        </tr>
                                        <tr>
                                            <td align="right"><b>Nama Sekolah</b></td>
                                            <td align="left"><?= $siswa['asal_sekolah'] ?></td>
                                        </tr>
                                        <tr>
                                            <td align="right"><b>NPSN</b></td>
                                            <td align="left"><?= $siswa['npsn_sekolah']  ?></td>
                                        </tr>
                                        <tr>
                                            <td align="right"><b>Kabupaten</b></td>
                                            <td align="left"> <?= $siswa['kab_sekolah']  ?></td>
                                        </tr>
                                        <tr>
                                            <td align="right"><b>Nomor Ujian</b></td>
                                            <td align="left"><?= $siswa['no_ujian']  ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- / -->
                        <div class="tab-pane fade" id="pip3" role="tabpanel" aria-labelledby="pip-tab3">
                            <div class="table-responsiv">
                                <table class="table table-striped table-sm ">
                                    <tbody>
                                        <tr>
                                            <td align="center" colspan="2"><i class="fas fa-address-card"></i> <b>KKS/PKH/PIP/SKM</b></td>
                                        </tr>
                                        <tr>
                                            <td align="right"><b>Status Penerima</b></td>
                                            <td align="left"><i class="fas fa-id-card text-success"></i> <?= $siswa['status_kartu'] ?></td>
                                        </tr>
                                        <tr>
                                            <td align="right"><b>Jenis Kartu</b></td>
                                            <td align="left"><?= $siswa['jenis_kartu'] ?></td>
                                        </tr>
                                        <tr>
                                            <td align="right"><b>Nomor Kartu</b></td>
                                            <td align="left"><?= $siswa['no_kartu'] ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- / -->
                        <?php if($prestasi) {
                            $datapres = fetch($koneksi, 'prestasi', ["id_daftar" => $siswa['id_daftar']]);
                        ?>
                        <div class="tab-pane fade" id="prestasi3" role="tabpanel" aria-labelledby="prestasi-tab3">
                            <div class="table-responsiv">
                                <table class="table table-striped table-sm ">
                                    <tbody>
                                        <tr>
                                            <td align="center" colspan="2"><i class="fas fa-crown"></i> <b>Data Prestasi & Tahfidz</b></td>
                                        </tr>
                                        <!-- <tr>
                                        <td align="center" colspan="2"><i class="fas fa-archive text-warning"></i><font color="green"> <b>NILAI SEMESTER 3</b></font></td>
                                        </tr>
                                        <tr>
                                            <td align="right"><b>MATEMATIKA</b></td>
                                            <td align="left"><?= $datapres['mat3'] ?></td>
                                        </tr>
                                        <tr>
                                            <td align="right"><b>BAHASA INDONESIA</b></td>
                                            <td align="left"><?= $datapres['bin3'] ?></td>
                                        </tr>
                                        <tr>
                                            <td align="right"><b>BAHASA INGGRIS</b></td>
                                            <td align="left"><?= $datapres['bing3'] ?></td>
                                        </tr>
                                        <tr>
                                            <td align="right"><b>IPA</b></td>
                                            <td align="left"><?= $datapres['ipa3'] ?></td>
                                        </tr>
                                        <tr>
                                            <td align="right"><b>IPS</b></td>
                                            <td align="left"><?= $datapres['ips3'] ?></td>
                                        </tr>
                                        <tr>
                                            <td align="right"><b><font color="green">TOTAL </b></font></td>
                                            <?php $totalsmt3 = $datapres['mat3'] + $datapres['bin3'] + $datapres['bing3'] + $datapres['ipa3'] + $datapres['ips3']; ?>
                                            <td align="left"><b><font color="green"><?= $totalsmt3 ?></b></font></td>
                                        </tr>
                                        <tr>
                                            <td align="center" colspan="2"><i class="fas fa-archive text-warning"></i><font color="green"> <b>NILAI SEMESTER 4</b></font></td>
                                        </tr>
                                        <tr>
                                            <td align="right"><b>MATEMATIKA</b></td>
                                            <td align="left"><?= $datapres['mat4'] ?></td>
                                        </tr>
                                        <tr>
                                            <td align="right"><b>BAHASA INDONESIA</b></td>
                                            <td align="left"><?= $datapres['bin4'] ?></td>
                                        </tr>
                                        <tr>
                                            <td align="right"><b>BAHASA INGGRIS</b></td>
                                            <td align="left"><?= $datapres['bing4'] ?></td>
                                        </tr>
                                        <tr>
                                            <td align="right"><b>IPA</b></td>
                                            <td align="left"><?= $datapres['ipa4'] ?></td>
                                        </tr>
                                        <tr>
                                            <td align="right"><b>IPS</b></td>
                                            <td align="left"><?= $datapres['ips4'] ?></td>
                                        </tr>
                                        <tr>
                                            <td align="right"><b><font color="green">TOTAL </b></font></td>
                                            <?php $totalsmt4 = $datapres['mat4'] + $datapres['bin4'] + $datapres['bing4'] + $datapres['ipa4'] + $datapres['ips4']; ?>
                                            <td align="left"><b><font color="green"><?= $totalsmt4 ?></b></font></td>
                                        </tr>
                                        <tr>
                                            <td align="center" colspan="2"><i class="fas fa-archive text-warning"></i><font color="green"> <b>NILAI SEMESTER 5</b></font></td>
                                        </tr>
                                        <tr>
                                            <td align="right"><b>MATEMATIKA</b></td>
                                            <td align="left"><?= $datapres['mat5'] ?></td>
                                        </tr>
                                        <tr>
                                            <td align="right"><b>BAHASA INDONESIA</b></td>
                                            <td align="left"><?= $datapres['bin5'] ?></td>
                                        </tr>
                                        <tr>
                                            <td align="right"><b>BAHASA INGGRIS</b></td>
                                            <td align="left"><?= $datapres['bing5'] ?></td>
                                        </tr>
                                        <tr>
                                            <td align="right"><b>IPA</b></td>
                                            <td align="left"><?= $datapres['ipa5'] ?></td>
                                        </tr>
                                        <tr>
                                            <td align="right"><b>IPS</b></td>
                                            <td align="left"><?= $datapres['ips5'] ?></td>
                                        </tr>
                                        <tr>
                                            <td align="right"><b><font color="green">TOTAL </b></font></td>
                                            <?php $totalsmt5 = $datapres['mat5'] + $datapres['bin5'] + $datapres['bing5'] + $datapres['ipa5'] + $datapres['ips5']; ?>
                                            <td align="left"><b><font color="green"><?= $totalsmt5 ?></b></font></td>
                                        </tr> -->
                                        <tr>
                                            <td align="right"><b>Sudah Hafal Berapa Juz</b></td>
                                            <td align="left"><?= $datapres['hafaljus'] ?></td>
                                        </tr>
                                        <tr>
                                            <td align="right"><b>Prestasi</b></td>
                                            <td align="left"><?= $datapres['tipe_prestasi'] ?></td>
                                        </tr>
                                        <?php if ($datapres['tipe_prestasi'] == "AKADEMIK") { ?>
                                        <tr>
                                            <td align="right"><b>Jenis Prestasi</b></td>
                                            <td align="left"><?= $datapres['jenis_prestasi'] ?></td>
                                        </tr>
                                        <?php } else { ?>
                                        <tr>
                                            <td align="right"><b>Nama Prestasi</b></td>
                                            <td align="left"><?= $datapres['nama_prestasi'] ?></td>
                                        </tr>
                                        <tr>
                                            <td align="right"><b>Peringkat Prestasi</b></td>
                                            <td align="left"><?= $datapres['peringkat_prestasi'] ?></td>
                                        </tr>
                                        <tr>
                                            <td align="right"><b>Tingkat Prestasi</b></td>
                                            <td align="left"><?= $datapres['tingkat_prestasi'] ?></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <?php } ?>
                        <!-- / -->
                        <div class="tab-pane fade" id="berkas3" role="tabpanel" aria-labelledby="berkas-tab3">
                            <div class="table-responsiv">
                                <table class="table table-striped table-sm">
                                    <tbody>
                                        <tr>
                                            <td align="center" colspan="2">
                                                <i class="fas fa-address-card"></i> <b>Ijazah/Akta</b>
                                                <a href="../user/mod_formulir/<?= $siswa['file_ijazah'] ?>" target="_blank"><button type="button" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></button></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="center" colspan="2"><i class="fas fa-address-card"></i> <b>Kartu Keluarga</b>
                                                <a href="../user/mod_formulir/<?= $siswa['file_kk'] ?>" target="_blank"><button type="button" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></button></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="center" colspan="2"><i class="fas fa-address-card"></i> <b>KKS/PKH/PKS/PIP/SKM</b>
                                                <a href="../user/mod_formulir/<?= $siswa['file_kartu'] ?>" target="_blank"><button type="button" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></button></a>
                                            </td>
                                        </tr>
                                        <!-- / -->
                                        <?php if ($prestasi) { ?>
                                        <tr>
                                            <td align="center" colspan="2"><i class="fas fa-address-card"></i> <b>Berkas Prestasi</b>
                                                <a href="../user/mod_formulir/<?= $datapres['file_prestasi'] ?>" target="_blank"><button type="button" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></button></a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                        <tr>
                                            <td align="center" colspan="2"><i class="fas fa-address-card"></i> <b>Berkas Tahfidz</b>
                                                <a href="../user/mod_formulir/<?= $datapres['file_tahfidz'] ?>" target="_blank"><button type="button" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></button></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="w-100 d-sm-none"></div>
                    <div class="float-right mt-sm-0 mt-3">
                        <a href="#" class="btn">View Posts <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>