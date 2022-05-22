<?php
require("../../config/database.php");
require "../../config/function.php";
require "../../config/functions.crud.php";
// Skrip berikut ini adalah skrip yang bertugas untuk meng-export data tadi ke excell

$prestasi = false;
$tahfidz = false;
$all = false;
if (array_key_exists("list", $_GET)) {
    if ($_GET['list'] == "PR") {
        $query_excel = "select * from daftar where jenis='PR'";
        $excel_file_name = "dataprestasi_pendaftar.xls";
        $prestasi = true;
    } else if ($_GET['list'] == "TH") {
        $query_excel = "select * from daftar where jenis='TH'";
        $excel_file_name = "datatahfidz_pendaftar.xls";
        $tahfidz = true;
    } else {
        $query_excel = "select * from daftar where jenis='SB'";
        $excel_file_name = "datareguler_pendaftar.xls";
    }
} else {
    $query_excel = "select * from daftar";
    $excel_file_name = "datasemua_pendaftar.xls";
    $all = true;
}

header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=".$excel_file_name);
session_start();
if (!isset($_SESSION['id_user'])) {
    die('Anda tidak diijinkan mengakses langsung');
}
?>
<style>
    .str {
        mso-number-format: \@;
    }
</style>
<table style="font-size: 12px" class="table table-striped table-sm" id="table-1">
    <thead>
        <tr>
            <th class="text-center">
                No
            </th>
            <th>No. Daftar</th>
            <th>Jalur Daftar</th>
            <th>Password</th>
            <th>NISN</th>
            <th>Nama Lengkap</th>
            <th>Jenis Kelamin</th>
            <th>Tempat</th>
            <th>Tanggal Lahir</th>
            <th>Jurusan 1</th>
            <th>Jurusan 2</th>
            <th>Keterampilan</th>
            <th>NIK</th>
            <th>Agama</th>
            <th>No HP</th>
            <th>Alamat</th>
            <th>RT</th>
            <th>RW</th>
            <th>Desa</th>
            <th>Kecamatan</th>
            <th>Kab/Kota</th>
            <th>Kode Pos</th>
            <th>Anak Ke</th>
            <th>Saudara</th>
            <th>Tinggi</th>
            <th>Berat</th>
            <th>Status Keluarga</th>
            <th>Tinggal</th>
            <th>Jarak</th>
            <th>Waktu</th>
            <th>Transportasi</th>
            <th>No KK</th>
            <th>NIK Ayah</th>
            <th>Nama Ayah</th>
            <th>Tempat Lahir</th>
            <th>Tgl & Tahun Lahir</th>
            <th>Pendidikan</th>
            <th>Pekerjaan</th>
            <th>Penghasilan</th>
            <th>No Hp</th>
            <th>NIK Ibu</th>
            <th>Nama Ibu</th>
            <th>Tempat Lahir</th>
            <th>Tgl & Tahun Lahir</th>
            <th>Pendidikan</th>
            <th>Pekerjaan</th>
            <th>Penghasilan</th>
            <th>No Hp</th>
            <th>Jenjang</th>
            <th>Status Sekolah</th>
            <th>Nama Sekolah</th>
            <th>NPSN Asal</th>
            <th>Kabupaten</th>
            <th>Nomor Ujian</th>
            <th>Status Penerima</th>
            <th>Jenis Kartu</th>
            <th>Nomor Kartu</th>
            <!-- <th>Total Nilai Semester 3</th>
            <th>Total Nilai Semester 4</th>
            <th>Total Nilai Semester 5</th> -->
            <?php if ($all || $tahfidz) { ?>
                <th>Sudah Hafal Berapa Juz</th>
            <?php } ?>
            <?php if ($all || $tahfidz || $prestasi) { ?>
                <th>Prestasi</th>
                <th>Jenis Prestasi</th>
                <th>Nama Prestasi</th>
                <th>Peringkat Prestasi</th>
                <th>Tingkat Prestasi</th>
            <?php } ?>
            <th>Status Pendaftaran</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $query1 = mysqli_query($koneksi, $query_excel);
        $no = 0;
        $query2=mysqli_query($koneksi, 'select * from jurusan');
        while ($daftar = mysqli_fetch_array($query1)) {
            $prestasi = false;
            $tahfidz = false;
            $no++;
            $jurusan1 = '';
            if ($daftar['jurusan1'] == "1IPA") {
                $jurusan1 = "MIPA";
            } else if ($daftar['jurusan1'] == "2IPS") {
                $jurusan1 = "IPS";
            } else if ($daftar['jurusan1'] == "3BB") {
                $jurusan1 = "BAHASA DAN BUDAYA";
            } else if ($daftar['jurusan1'] == "4AGM") {
                $jurusan1 = "KEAGAMAAN";
            }

            $jurusan2 = '';
            if ($daftar['jurusan2'] == "1IPA") {
                $jurusan2 = "MIPA";
            } else if ($daftar['jurusan2'] == "2IPS") {
                $jurusan2 = "IPS";
            } else if ($daftar['jurusan2'] == "3BB") {
                $jurusan2 = "BAHASA DAN BUDAYA";
            } else if ($daftar['jurusan2'] == "4AGM") {
                $jurusan2 = "KEAGAMAAN";
            }
            $query3=mysqli_query($koneksi, 'select * from keterampilan');
            $keterampilan = '';
            while ($keter=mysqli_fetch_array($query3)) {
                if ($daftar['keterampilan'] == $keter['id_keterampilan']) {
                    $keterampilan = $keter['nama_keterampilan'];
                }
            }
            if ($daftar['jenis'] == "PR") {
                $datapres = fetch($koneksi, 'prestasi', ['id_daftar' => $daftar['id_daftar']]);
                $prestasi = true;
            } else if ($daftar['jenis'] == "TH") {
                $datapres = fetch($koneksi, 'tahfidz', ['id_daftar' => $daftar['id_daftar']]);
                $tahfidz = true;
            }
        ?>
            <tr>
            <td><?= $no; ?></td>
                <td><?= $daftar['no_daftar'] ?></td>
                <?php if ($daftar['jenis'] == "PR") {?>
                <td>Prestasi</td>
                <?php } else if ($daftar['jenis'] == "TH") {?>
                <td>Tahfidz</td>
                <?php } else {?>
                <td>Reguler</td>
                <?php }?>
				<td><?= $daftar['password'] ?></td>
                <td class="str"><?= $daftar['nisn'] ?></td>
                <td><?= $daftar['nama'] ?></td>
                <td><?= $daftar['jenkel'] ?></td>
                <td><?= $daftar['tempat_lahir'] ?></td>
                <td><?= $daftar['tgl_lahir'] ?></td>
                <td><?= $jurusan1 ?></td>
                <td><?= $jurusan2 ?></td>
                <td><?= $keterampilan ?></td>
                <td class="str"><?= $daftar['nik'] ?></td>
                <td><?= $daftar['agama'] ?></td>
                <td class="str">
                    <i class="fab fa-whatsapp text-success   "></i>
                    <a target="_blank" href="https://api.whatsapp.com/send?phone=62<?= $daftar['no_hp'] ?>"><?= $daftar['no_hp'] ?></a>
                </td>
                <td><?= $daftar['alamat'] ?></td>
                <th class="str"><?= $daftar['rt'] ?></th>
                <td class="str"><?= $daftar['rw'] ?></td>
                <td><?= $daftar['desa'] ?></td>
                <td><?= $daftar['kecamatan'] ?></td>
                <td><?= $daftar['kota'] ?></td>
                <td><?= $daftar['kode_pos'] ?></td>
                <td><?= $daftar['anak_ke'] ?></td>
                <td><?= $daftar['saudara'] ?></td>
                <td><?= $daftar['tinggi'] ?></td>
                <td><?= $daftar['berat'] ?></td>
                <td><?= $daftar['status_keluarga'] ?></td>
                <td><?= $daftar['tinggal'] ?></td>
                <td class="str"><?= $daftar['jarak'] ?></td>
                <td class="str"><?= $daftar['waktu'] ?></td>
                <td><?= $daftar['transportasi'] ?></td>
                <td class="str"><?= $daftar['no_kk'] ?></td>
                <td class="str"><?= $daftar['nik_ayah'] ?></td>
                <td><?= $daftar['nama_ayah'] ?></td>
                <td><?= $daftar['tempat_ayah'] ?></td>
                <td><?= $daftar['tgl_lahir_ayah'] ?></td>
                <td><?= $daftar['pendidikan_ayah'] ?></td>
                <td><?= $daftar['pekerjaan_ayah'] ?></td>
                <td><?= $daftar['penghasilan_ayah'] ?></td>
                <td class="str"><?= $daftar['no_hp_ayah'] ?></td>
                <td class="str"><?= $daftar['nik_ibu'] ?></td>
                <td><?= $daftar['nama_ibu'] ?></td>
                <td><?= $daftar['tempat_ibu'] ?></td>
                <td><?= $daftar['tgl_lahir_ibu'] ?></td>
                <td><?= $daftar['pendidikan_ibu'] ?></td>
                <td><?= $daftar['pekerjaan_ibu'] ?></td>
                <td><?= $daftar['penghasilan_ibu'] ?></td>
                <td class="str"><?= $daftar['no_hp_ibu'] ?></td>
                <td><?= $daftar['jenjang_sekolah'] ?></td>
                <td><?= $daftar['status_sekolah'] ?></td>
                <td><?= $daftar['asal_sekolah'] ?></td>
                <td class="str"><?= $daftar['npsn_sekolah'] ?></td>
                <td><?= $daftar['kab_sekolah'] ?></td>
                <td class="str"><?= $daftar['no_ujian'] ?></td>
                <td><?= $daftar['status_kartu'] ?></td>
                <td><?= $daftar['jenis_kartu'] ?></td>
                <td class="str"><?= $daftar['no_kartu'] ?></td>
                <!-- <?php $totalsmt3 = $datapres['mat3'] + $datapres['bin3'] + $datapres['bing3'] + $datapres['ipa3'] + $datapres['ips3']; ?>
                <td class="str" align="center"><b><font color="green"><?= $totalsmt3 ?></font></b></td>
                <?php $totalsmt4 = $datapres['mat4'] + $datapres['bin4'] + $datapres['bing4'] + $datapres['ipa4'] + $datapres['ips4']; ?>
                <td class="str" align="center"><b><font color="green"><?= $totalsmt4 ?></font></b></td>
                <?php $totalsmt5 = $datapres['mat5'] + $datapres['bin5'] + $datapres['bing5'] + $datapres['ipa5'] + $datapres['ips5']; ?>
                <td class="str" align="center"><b><font color="green"><?= $totalsmt5 ?></font></b></td> -->
                <?php if ($tahfidz) { ?>
                <td><?= $datapres['jumlah_jus'] ?></td>
                <?php } else if ($all) { ?>
                <td></td>
                <?php } ?>
                <?php if ($prestasi || $tahfidz) { ?>
                <td><?= $datapres['tipe_prestasi'] ?></td>
                <td><?= $datapres['jenis_prestasi'] ?></td>
                <td><?= $datapres['nama_prestasi'] ?></td>
                <td><?= $datapres['peringkat_prestasi'] ?></td>
                <td><?= $datapres['tingkat_prestasi'] ?></td>
                <?php } else if ($all) { ?>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <?php } ?>
                <td>
                    <?php if ($daftar['status'] == 1) { ?>
                        <span class="badge badge-success">diterima</span>
                    <?php } elseif ($daftar['status'] == 2) { ?>
                        <span class="badge badge-danger">Cadang </span>
                    <?php } else { ?>
                        <span class="badge badge-warning">pending</span>
                    <?php } ?>
                </td>
            </tr>

        <?php }
        ?>


    </tbody>
</table>