<?php ob_start();
require "../../config/database.php";
require "../../config/function.php";
require "../../config/functions.crud.php";
include "../../assets/modules/phpqrcode/qrlib.php";
$siswa = fetch($koneksi, 'daftar', ['id_daftar' => dekripsi($_GET['id'])]);
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
}
// $tempdir = "../../temp/"; //Nama folder tempat menyimpan file qrcode
// if (!file_exists($tempdir)) //Buat folder bername temp
//     mkdir($tempdir);

// //isi qrcode jika di scan
// $codeContents = $bayar['id_bayar'] . '-' . $siswa['nama'];

// //simpan file kedalam temp
// //nilai konfigurasi Frame di bawah 4 tidak direkomendasikan

// QRcode::png($codeContents, $tempdir . $id_bayar . '.png', QR_ECLEVEL_L, 3, 6);

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>

    <title>FORMULIR PPDB MAN 1 NGANJUK_<?= $siswa['nama'] ?></title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="../../assets/modules/bootstrap/css/bootstrap.min.css">


</head>

<body>
    <h3><?= $setting['nama_sekolah'] ?></h3>
    <p><small> <?= $setting['alamat'] ?></small></p>
    <hr>
    <center>
        <h4><u>Formulir Pendaftaran Siswa Baru MAN 1 NGANJUK Tahun <?= date('Y') ?></u></h4>
        <p>No. Pendaftaran : <?= $siswa['no_daftar'] ?> </p>
    </center>

    <div class="table-responsiv">
        <table style="font-size: 12px" class="table table-striped table-bordered table-sm ">
            <tbody>
                <tr>
                    <th width="90">FOTO SISWA</th>
                    <td align="center" colspan="2"><b>DATA PRIBADI SISWA</b></td>
                </tr>
                <tr>
                    <td rowspan="4"><img src="../../user/mod_formulir/<?= $siswa['foto'] ?>" width="120"></td>
                    <td><b>NISN</b></td>
                    <td><?= $siswa['nisn'] ?></td>
                </tr>

                <tr>

                    <td><b>Nama Lengkap</b></td>
                    <td align="left"><?= $siswa['nama'] ?></td>
                </tr>
                <tr>
                    <td><b>Tempat Tgl Lahir</b></td>
                    <td align="left"><?= $siswa['tempat_lahir'] ?>, <?= $siswa['tgl_lahir'] ?></td>
                </tr>
                <tr>
                    <td><b>Jenis Kelamin</b></td>
                    <td align="left"><?= ($siswa['jenkel'] == 'L') ? "Laki-Laki" : "Perempuan"; ?></td>
                </tr>

            </tbody>
        </table>
        <table style="font-size: 12px" class="table table-striped table-bordered table-sm">
            <tbody>
            <!-- / -->
                <tr>
                    <td style="width: 150px"><b>Jurusan / Peminatan 1</b></td>
                    <td align="left"><?= $jurusan1 ?></td>
                    <td style="width: 150px"><b>Jurusan / Peminatan 2</b></td>
                    <td align="left"><?= $jurusan2 ?></td>
                </tr>
                <tr>
                    <td style="width: 150px"><b>No NIK</b></td>
                    <td align="left"><?= $siswa['nik']  ?></td>
                    <td><b>Anak Ke</b></td>
                    <td align="left"><?= $siswa['anak_ke']  ?></td>
                </tr>
                <tr>
                    <td><b>Agama</b></td>
                    <td align="left"><?= $siswa['agama'] ?></td>
                    <td><b>Saudara</b></td>
                    <td align="left"><?= $siswa['saudara']  ?></td>
                </tr>
                <tr>
                    <td><b>No Handphone</b></td>
                    <td align="left"><i class="fab fa-whatsapp text-success"></i> <?= $siswa['no_hp']  ?></td>
                    <td><b>Tinggi Badan (Cm)</b></td>
                    <td align="left"><?= $siswa['tinggi']  ?></td>
                </tr>
                <tr>
                    <td><b>Alamat Siswa</b></td>
                    <td align="left"><?= $siswa['alamat']  ?></td>
                    <td><b>Berat Badan (Kg)</b></td>
                    <td align="left"><?= $siswa['berat']  ?></td>
                </tr>
                <tr>
                    <td><b>RT / RW</b></td>
                    <td align="left"><?= $siswa['rt']  ?> <?= $siswa['rw']  ?></td>
                    <td><b>Status Dalam Keluarga</b></td>
                    <td align="left"><?= $siswa['status_keluarga']  ?></td>
                </tr>
                <tr>
                    <td><b>Desa</b></td>
                    <td align="left"><?= $siswa['desa']  ?></td>
                    <td><b>Tinggal Bersama</b></td>
                    <td align="left"><?= $siswa['tinggal']  ?></td>
                </tr>
                <tr>
                    <td><b>Kecamatan</b></td>
                    <td align="left"><?= $siswa['kecamatan']  ?></td>
                    <td><b>Jarak KeSekolah (Meter)</b></td>
                    <td align="left"><?= $siswa['jarak']  ?></td>
                </tr>
                <tr>
                    <td><b>Kota / Kabupaten</b></td>
                    <td align="left"><?= $siswa['kota']  ?></td>
                    <td><b>Waktu Tempuh (Menit)</b></td>
                    <td align="left"><?= $siswa['waktu']  ?></td>
                </tr>
                <tr>
                    <td><b>Provinsi</b></td>
                    <td align="left"><?= $siswa['provinsi']  ?></td>
                    <td><b>Transportasi</b></td>
                    <td align="left"><?= $siswa['transportasi']  ?></td>
                </tr>
                <tr>
                    <td><b>Kode Pos</b></td>
                    <td align="left"><?= $siswa['kode_pos']  ?></td>
                    <td><b>Keterampilan</b></td>
                    <td align="left"><?= $keterampilan  ?></td>
                </tr>
            </tbody>
        </table>
        <!-- / -->
        <table>
            <tbody>
                <tr>
                <td><b>No. Kartu Keluarga: </b></td>
                <td align="left"><?= $siswa['no_kk']  ?></td>
                </tr>
            </tbody>
        </table>
        <table style="font-size: 12px" class="table table-bordered table-striped table-sm ">
            <tbody>
                <tr>
                    <td align="center" style="width: 150px"><i class="fas fa-user-friends"></i> <b>Data Orang Tua</b></td>
                    <td align="center"><i class="fas fa-user-friends"></i> <b>Data Ayah</b></td>
                    <td align="center"><i class="fas fa-user-friends"></i> <b>Data Ibu</b></td>
                    <td align="center"><i class="fas fa-user-friends"></i> <b>Data Wali</b></td>
                </tr>
                <tr>
                    <td><b>NIK</b></td>
                    <td align="left"><i class="fas fa-id-card text-success"></i> <?= $siswa['nik_ayah'] ?></td>
                    <td align="left"><i class="fas fa-id-card text-success"></i> <?= $siswa['nik_ibu'] ?></td>
                    <td align="left"><i class="fas fa-id-card text-success"></i> <?= $siswa['nik_wali'] ?></td>
                </tr>
                <tr>
                    <td><b>Nama Lengkap</b></td>
                    <td align="left"><?= $siswa['nama_ayah'] ?></td>
                    <td align="left"><?= $siswa['nama_ibu'] ?></td>
                    <td align="left"><?= $siswa['nama_wali'] ?></td>
                </tr>
                <!-- / -->
                <tr>
                    <td><b>Tahun Lahir</b></td>
                    <td align="left"><?= $siswa['tahun_lahir_ayah']  ?></td>
                    <td align="left"><?= $siswa['tahun_lahir_ibu']  ?></td>
                    <td align="left"><?= $siswa['tahun_lahir_wali']  ?></td>
                </tr>
                <tr>
                    <td><b>Pendidikan</b></td>
                    <td align="left"><?= $siswa['pendidikan_ayah']  ?></td>
                    <td align="left"><?= $siswa['pendidikan_ibu']  ?></td>
                    <td align="left"><?= $siswa['pendidikan_wali']  ?></td>
                </tr>
                <tr>
                    <td><b>Pekerjaan</b></td>
                    <td align="left"> <?= $siswa['pekerjaan_ayah']  ?></td>
                    <td align="left"> <?= $siswa['pekerjaan_ibu']  ?></td>
                    <td align="left"> <?= $siswa['pekerjaan_wali']  ?></td>
                </tr>
                <tr>
                    <td><b>Penghasilan</b></td>
                    <td align="left"><?= $siswa['penghasilan_ayah']  ?></td>
                    <td align="left"><?= $siswa['penghasilan_ibu']  ?></td>
                    <td align="left"><?= $siswa['penghasilan_wali']  ?></td>
                </tr>
                <tr>
                    <td><b>No Hp</b></td>
                    <td align="left"><i class="fab fa-whatsapp text-success"></i> <?= $siswa['no_hp_ayah']  ?></td>
                    <td align="left"><i class="fab fa-whatsapp text-success"></i> <?= $siswa['no_hp_ibu']  ?></td>
                    <td align="left"><i class="fab fa-whatsapp text-success"></i> <?= $siswa['no_hp_wali']  ?></td>
                </tr>
            </tbody>
        </table><br>
        <!-- / -->
        <h4>Asal Sekolah</h4>
        <table style="font-size: 12px" class="table table-striped table-bordered table-sm">
            <tbody>
                <tr>
                    <td style="width: 150px"><b>Jenjang</b></td>
                    <td align="left"><?= $siswa['jenjang_sekolah']  ?></td>
                </tr>
                <tr>
                    <td><b>Status Sekolah</b></td>
                    <td align="left"><?= $siswa['status_sekolah']  ?></td>
                </tr>
                <tr>
                    <td style="width: 150px"><b>Nama Sekolah</b></td>
                    <td align="left"><?= $siswa['asal_sekolah']  ?></td>
                </tr>
                <tr>
                    <td><b>NPSN</b></td>
                    <td align="left"><?= $siswa['npsn_sekolah']  ?></td>
                </tr>
                <tr>
                    <td><b>Kabupaten</b></td>
                    <td align="left"><?= $siswa['kab_sekolah']  ?></td>
                </tr>
                <tr>
                <td><b>Nomor Ujian</b></td>
                    <td align="left"><?= $siswa['no_ujian']  ?></td>
                </tr>
                </tbody>
        </table>
        <!-- / -->
        <h4>Informasi Kartu</h4>
        <table style="font-size: 12px" class="table table-striped table-bordered table-sm">
            <tbody>
                <tr>
                    <td style="width: 150px"><b>Status Penerima</b></td>
                    <td align="left"><?= $siswa['status_kartu']  ?></td>
                </tr>
                <tr>
                    <td><b>Jenis Kartu</b></td>
                    <td align="left"><?= $siswa['jenis_kartu']  ?></td>
                </tr>
                <tr>
                    <td style="width: 150px"><b>Nomor Kartu</b></td>
                    <td align="left"><?= $siswa['no_kartu']  ?></td>
                </tr>
            </tbody>
        </table>
        <h4>Data Nilai Rapor</h4>
        <?php if($siswa['jenis'] == "PR") {
            $datapres = fetch($koneksi, 'prestasi', ["id_daftar" => $siswa['id_daftar']]);
        ?>
        <table style="font-size: 12px" class="table table-bordered table-striped table-sm ">
            <tbody>
                <tr>
                    <td align="center" style="width: 150px"><i class="fas fa-user-friends"></i> <b>Data Mata Pelajaran</b></td>
                    <td align="center"><i class="fas fa-user-friends"></i> <b>Nilai Semester 3</b></td>
                    <td align="center"><i class="fas fa-user-friends"></i> <b>Nilai Semester 4</b></td>
                    <td align="center"><i class="fas fa-user-friends"></i> <b>Nilai Semester 5</b></td>
                </tr>
                <tr>
                    <td><b>MATEMATIKA</b></td>
                    <td align="center"><i class="fas fa-id-card text-success"></i> <?= $datapres['mat3'] ?></td>
                    <td align="center"><i class="fas fa-id-card text-success"></i> <?= $datapres['mat4'] ?></td>
                    <td align="center"><i class="fas fa-id-card text-success"></i> <?= $datapres['mat5'] ?></td>
                </tr>
                <tr>
                    <td><b>BAHASA INDONESIA</b></td>
                    <td align="center"><?= $datapres['bin3'] ?></td>
                    <td align="center"><?= $datapres['bin4'] ?></td>
                    <td align="center"><?= $datapres['bin5'] ?></td>
                </tr>
                <!-- / -->
                <tr>
                    <td><b>BAHASA INGGRIS</b></td>
                    <td align="center"><?= $datapres['bing3']  ?></td>
                    <td align="center"><?= $datapres['bing4']  ?></td>
                    <td align="center"><?= $datapres['bing5']  ?></td>
                </tr>
                <tr>
                    <td><b>IPA</b></td>
                    <td align="center"><?= $datapres['ipa3']  ?></td>
                    <td align="center"><?= $datapres['ipa4']  ?></td>
                    <td align="center"><?= $datapres['ipa5']  ?></td>
                </tr>
                <tr>
                    <td><b>IPS</b></td>
                    <td align="center"> <?= $datapres['ips3']  ?></td>
                    <td align="center"> <?= $datapres['ips4']  ?></td>
                    <td align="center"> <?= $datapres['ips5']  ?></td>
                </tr>
                <tr>
                    <td><b>TOTAL</b></td>
                    <?php $totalsmt3 = $datapres['mat3'] + $datapres['bin3'] + $datapres['bing3'] + $datapres['ipa3'] + $datapres['ips3']; ?>
                        <td align="center"><b><font color="green"><?= $totalsmt3 ?></b></font></td>
                    <?php $totalsmt4 = $datapres['mat4'] + $datapres['bin4'] + $datapres['bing4'] + $datapres['ipa4'] + $datapres['ips4']; ?>
                        <td align="center"><b><font color="green"><?= $totalsmt4 ?></b></font></td>
                    <?php $totalsmt5 = $datapres['mat5'] + $datapres['bin5'] + $datapres['bing5'] + $datapres['ipa5'] + $datapres['ips5']; ?>
                        <td align="center"><b><font color="green"><?= $totalsmt5 ?></b></font></td>
                </tr>
            </tbody>
        </table>
        <?php if ($datapres['tipe_prestasi'] <> null) { ?>
        <h4>Prestasi</h4>
        <table style="font-size: 12px" class="table table-striped table-bordered table-sm">
            <tbody>
            <tr>
                    <td style="width: 150px"><b>Prestai</b></td>
                    <td align="left"><?= $datapres['tipe_prestasi']  ?></td>
                </tr>
                <tr>
                    <td style="width: 150px"><b>Jenis Prestasi</b></td>
                    <td align="left"><?= $datapres['jenis_prestasi']  ?></td>
                </tr>
                <tr>
                    <td style="width: 150px"><b>Nama Prestasi</b></td>
                    <td align="left"><?= $datapres['nama_prestasi']  ?></td>
                </tr>
                <tr>
                    <td style="width: 150px"><b>Peringkat Prestasi</b></td>
                    <td align="left"><?= $datapres['peringkat_prestasi']  ?></td>
                </tr>
                <tr>
                    <td><b>Tingkat Prestasi</b></td>
                    <td align="left"><?= $datapres['tingkat_prestasi']  ?></td>
                </tr>
            </tbody>
        </table>
        <?php } ?>
        <?php } ?>
        <table style="font-size: 12px">
            <tbody>
                <tr>
                    <i align="center" colspan="2">Print Date : <?= date('Y-m-d H:i:s') ?></i>
                </tr>
            </tbody>
        </table>
        <h4 style="page-break-before: always;">Ijazah/Akta</h4>
        <table style="font-size: 12px" class="table table-sm">
            <tbody>
                <tr>
                    <td class="text-center"><img src="../../user/mod_formulir/<?= $siswa['file_ijazah'] ?>" width="600"></td>
                </tr>
            </tbody>
        </table>
        <h4 style="page-break-before: always;">Kartu Keluarga</h4>
        <table style="font-size: 12px" class="table table-sm">
            <tbody>
                <tr>
                    <td class="text-center"><img src="../../user/mod_formulir/<?= $siswa['file_kk'] ?>" width="600"></td>
                </tr>
            </tbody>
        </table>
        <h4 style="page-break-before: always;">Kartu (PIP/KKS/PKH/SKM)</h4>
        <table style="font-size: 12px" class="table table-sm">
            <tbody>
                <tr>
                    <td class="text-center"><img src="../../user/mod_formulir/<?= $siswa['file_kartu'] ?>" width="600"></td>
                </tr>
            </tbody>
        </table>
        <!-- <?php $jenis = fetch($koneksi, 'jenis', ['nama_jenis' => 'PRESTASI']); 
        if ($siswa['jenis']  == $jenis['id_jenis']) { ?>
        <h4 style="page-break-before: always;">Bukti Prestasi</h4>
        <table style="font-size: 12px" class="table table-sm">
            <tbody>
                <tr>
                    <td class="text-center"><img src="../../user/mod_formulir/<?= $siswa['file_prestasi'] ?>" width="600"></td>
                </tr>
            </tbody>
        </table>
        <?php } ?> -->
    </div>
</body>

</html>
<?php

$html = ob_get_clean();
require_once '../../vendor/autoload.php';

use Dompdf\Dompdf;

$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream("dompdf_out.pdf", array("Attachment" => false));
exit(0);
?>