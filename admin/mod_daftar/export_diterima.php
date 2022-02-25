<?php
require("../../config/database.php");
// Skrip berikut ini adalah skrip yang bertugas untuk meng-export data tadi ke excell
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=pendaftar_diterima.xls");
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
                #
            </th>
            <th>No. Daftar</th>
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
            <th>Tahun Lahir</th>
            <th>Pendidikan</th>
            <th>Pekerjaan</th>
            <th>Penghasilan</th>
            <th>No Hp</th>
            <th>NIK Wali</th>
            <th>Nama Wali</th>
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
            <th>Total Nilai Per Semester</th>
            <th>Rata-Rata Nilai Per Semester</th>
            <th>Total Nilai Semester 3-5</th>
            <th>Rata-Rata Nilai Semester 3-5</th>
            <th>Prestasi</th>
            <th>Jenis Prestasi</th>
            <th>Nama Prestasi</th>
            <th>Peringkat Prestasi</th>
            <th>Tingkat Prestasi</th>
            <th>Status Pendaftaran</th>

        </tr>
    </thead>
    <tbody>
    <?php
        $query1 = mysqli_query($koneksi, "select * from daftar");
        $no = 0;
        $query2=mysqli_query($koneksi, 'select * from jurusan');
        while ($daftar = mysqli_fetch_array($query1)) {
            $no++;
            while ($jurusan=mysqli_fetch_array($query2)) {
                if ($daftar['jurusan1'] == $jurusan['id_jurusan']) {
                    $jurusan1 = $jurusan['nama_jurusan'];
                }
                if ($daftar['jurusan2'] == $jurusan['id_jurusan']) {
                    $jurusan2 = $jurusan['nama_jurusan'];
                }
            }
            $query3=mysqli_query($koneksi, 'select * from keterampilan');
            while ($keter=mysqli_fetch_array($query3)) {
                if ($daftar['keterampilan'] == $keter['id_keterampilan']) {
                    $keterampilan = $keter['nama_keterampilan'];
                }
            }
        ?>
            <tr>
                <td><?= $no; ?></td>
                <td><?= $daftar['no_daftar'] ?></td>
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
                <td><?= $daftar['tempat_lahir_ayah'] ?></td>
                <td><?= $daftar['ttl_ayah'] ?></td>
                <td><?= $daftar['pendidikan_ayah'] ?></td>
                <td><?= $daftar['pekerjaan_ayah'] ?></td>
                <td><?= $daftar['penghasilan_ayah'] ?></td>
                <td class="str"><?= $daftar['no_hp_ayah'] ?></td>
                <td class="str"><?= $daftar['nik_ibu'] ?></td>
                <td><?= $daftar['nama_ibu'] ?></td>
                <td><?= $daftar['tempat_lahir_ayah'] ?></td>
                <td><?= $daftar['ttl_ayah'] ?></td>
                <td><?= $daftar['pendidikan_ibu'] ?></td>
                <td><?= $daftar['pekerjaan_ibu'] ?></td>
                <td><?= $daftar['penghasilan_ibu'] ?></td>
                <td class="str"><?= $daftar['no_hp_ibu'] ?></td>
                <td class="str"><?= $daftar['nik_wali'] ?></td>
                <td><?= $daftar['nama_wali'] ?></td>
                <td><?= $daftar['tahun_lahir_wali'] ?></td>
                <td><?= $daftar['pendidikan_wali'] ?></td>
                <td><?= $daftar['pekerjaan_wali'] ?></td>
                <td><?= $daftar['penghasilan_wali'] ?></td>
                <td class="str"><?= $daftar['no_hp_wali'] ?></td>
                <td><?= $daftar['jenjang_sekolah'] ?></td>
                <td><?= $daftar['status_sekolah'] ?></td>
                <td><?= $daftar['asal_sekolah'] ?></td>
                <td class="str"><?= $daftar['npsn_sekolah'] ?></td>
                <td><?= $daftar['kab_sekolah'] ?></td>
                <td class="str"><?= $daftar['no_ujian'] ?></td>
                <td><?= $daftar['status_kartu'] ?></td>
                <td><?= $daftar['jenis_kartu'] ?></td>
                <td class="str"><?= $daftar['no_kartu'] ?></td>
                <td class="str"><?= $daftar['isikanvalue'] ?></td>
                <td class="str"><?= $daftar['isikanvalue'] ?></td>
                <td class="str"><?= $daftar['isikanvalue'] ?></td>
                <td class="str"><?= $daftar['isikanvalue'] ?></td>
                <td><?= $daftar['isikanvalue'] ?></td>
                <td><?= $daftar['isikanvalue'] ?></td>
                <td><?= $daftar['isikanvalue'] ?></td>
                <td><?= $daftar['isikanvalue'] ?></td>
                <td><?= $daftar['isikanvalue'] ?></td>
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