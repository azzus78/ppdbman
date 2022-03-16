<?php ob_start();
require "../../config/database.php";
require "../../config/function.php";
require "../../config/functions.crud.php";
include "../../assets/modules/phpqrcode/qrlib.php";
$siswa = fetch($koneksi, 'daftar', ['nisn' => dekripsi($_GET['id'])]);
$setting_kartu_ujian = fetch($koneksi, 'setting_kartu_ujian', ['id_setting_kartu' => 1]);
$kartu_ujian = fetch($koneksi, 'kartu_ujian', ['nisn' => dekripsi($_GET['id'])]);
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

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>

    <title>Kartu_<?= $siswa['nama'] ?></title>

    <!-- General CSS Files -->
    <!-- <link rel="stylesheet" href="../../assets/modules/bootstrap/css/bootstrap.min.css"> -->

    <style>
        @page { 
            margin: 0px;
            size: 12.6cm 7.9cm landscape;
        }

        body { 
            margin: 8px;
            height: 100%;
        }

        .container {
            gap: 36px;
            border:1px solid #000000;
            padding: 8px;
        }

        .headerText > p {
            margin: 0;
            font-size: 10px;
        }

        .headerText > p:nth-child(1) {
            font-size: 10px;
            font-weight: bold;
        }

        .headerText > p:nth-child(2) {
            font-size: 12px;
            font-weight: bold;
        }

        .headerText > p:nth-child(3) {
            font-size: 10px;
            font-weight: bold;
        }

        .header > p {
            margin: 0;
            font-size: 10px;
        }

        .header > p:nth-child(2) {
            font-size: 9px;
        }

        .mainContent {
            margin: 12px 0;
        }

        .mainContent > p {
            margin: 0;
            text-align: center;
            font-size: 14px;
        }

        .mainContent .nomor {
            margin: 8px auto;
            width: 50%;
            border:1px solid #E5E5E5;
            padding: 1px;
        }
        
        .mainContent .nomor > p {
            font-size: 18px;
            font-weight: bold;
            text-align: center;
            margin: 0;
        }
        
        .mainContent .nomor > p:nth-child(1) {
            background-color: #f0f0f0;
        }

        .user {
            margin: 0 auto;
            font-size: 12px;
            font-weight: bold;
        }

        .table {
            margin: 0 auto;
            font-size: 12px;
        }

        .footer {
            font-size: 12px;
        }

        .footer > p {
            margin: 0;
        }

        .footer > ol {
            margin: 0;
            padding-left: 16px;
        }
    </style>

</head>

<body>
    <div class="container">
        <center class="header">
            <table>
                <tr>
                    <td>
                        <img src="../../assets/img/logo/logoman.png" width="36" height"36" style="margin: 0;"/>
                    </td>
                    <td class="headerText">
                        <p>KARTU TES PPDB</p>
                        <p class="second">MADRASAH ALIYAH NEGERI (MAN) 1 NGANJUK</p>
                        <p>TAHUN AJARAN <?= $setting_kartu_ujian['tahun_ajaran'] ?></p>
                    </td>
                </tr>
            </table>
            <p>
                Alamat: Jl. KH. Abdul Fattah Ds. Nglawak Kec. Kertosono Kab. Nganjuk Jawa Timur. Telp: (0358)551547<br/>
                Website: www.man1nganjuk.sch.id Email: mansanganjuk@gmail.com
            </p>
        </center>
        <hr style="height: 1px; background-color: balck; width:100%;">
        <div class="mainContent">
            <p><strong>PESERTA TES PPDB</strong></p>
            <div class="nomor">
                <p>NOMOR</p>
                <p><?= $kartu_ujian['nomor_kartu'] ?></p>
            </div>
            <table class="user">
                <tr>
                    <td>Username</td>
                    <td>: <?= $kartu_ujian['nisn'] ?></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td>: <?= $kartu_ujian['password'] ?></td>
                </tr>
            </table>
            <table class="table">
                <tr>
                    <td>Nama</td>
                    <td>: <?= $siswa['nama'] ?></td>
                </tr>
                <tr>
                    <td>Asal Sekolah</td>
                    <td>: <?= $siswa['asal_sekolah'] ?></td>
                </tr>
                <tr>
                    <td>Hari/Tanggal Ujian</td>
                    <td>: <?= $setting_kartu_ujian['hari'] ?>, <?php echo date('d-m-Y', strtotime($setting_kartu_ujian['tanggal'])); ?></td>
                    
                </tr>
                <tr>
                    <td>Waktu Ujian</td>
                    <td>: <?= $setting_kartu_ujian['waktu_mulai'] ?> - <?= $setting_kartu_ujian['waktu_selesai'] ?> WIB</td>
                </tr>
            </table>
        </div>
        <div class="footer">
            <p>Catatan:</p>
            <ol>
                <li>Username & Password di Kartu ini untuk login ujian CBT</li>
                <li>Simpan dan jagalah kartu ini sebagai bukti hak ikut ujian tes masuk.</li>
            </ol>
        </div>
    </div>
</body>

</html>
<?php

$html = ob_get_clean();
require_once '../../vendor/autoload.php';

use Dompdf\Dompdf;

$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->render();
$dompdf->stream("Kartu_".$siswa['nama'].".pdf", array("Attachment" => false));
exit(0);
?>