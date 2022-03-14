<?php
session_start();
require("../../config/database.php");
require("../../config/function.php");
require("../../config/functions.crud.php");
session_start();
if (!isset($_SESSION['id_user'])) {
    die('Anda tidak diijinkan mengakses langsung');
}
if ($pg == 'ubah') {

    $data = [
        'judul'        => $_POST['judul'],
        'setting_kartu'   => addslashes($_POST['setting_kartu']),
        'jenis'        => $_POST['jenis']

    ];
    $id_setting_kartu = $_POST['id_setting_kartu'];
    update($koneksi, 'setting_kartu', $data, ['id_setting_kartu' => $id_setting_kartu]);
}
if ($pg == 'tambah') {
    $existing = mysqli_query($koneksi, "select * from setting_kartu_ujian");
    if (mysqli_num_rows($existing) > 0) {
        $data = [
            'hari'        => $_POST['hari'],
            'tanggal'   => $_POST['tgl'],
            'waktu_mulai'        => $_POST['waktu_ujian_mulai'],
            'waktu_selesai'      => $_POST['waktu_ujian_selesai'],
            'link'      => $_POST['cbt']
        ];
        $exec = update($koneksi, 'setting_kartu_ujian', $data, ['id_setting_kartu' => 1]);
        echo mysqli_error($koneksi);
    } else {
        $data = [
            'hari'        => $_POST['hari'],
            'tanggal'   => $_POST['tgl'],
            'waktu_mulai'        => $_POST['waktu_ujian_mulai'],
            'waktu_selesai'      => $_POST['waktu_ujian_selesai'],
            'link'      => $_POST['cbt']
        ];
        $exec = insert($koneksi, 'setting_kartu_ujian', $data);
        echo mysqli_error($koneksi);
    }
}
if ($pg == 'hapus') {
    $id_setting_kartu = $_POST['id_setting_kartu'];
    delete($koneksi, 'setting_kartu', ['id_setting_kartu' => $id_setting_kartu]);
}
