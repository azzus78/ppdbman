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
    $data = [
        'judul'        => $_POST['judul'],
        'setting_kartu'   => addslashes($_POST['setting_kartu']),
        'jenis'        => $_POST['jenis'],
        'id_user'      => $_SESSION['id_user']
    ];
    $exec = insert($koneksi, 'setting_kartu', $data);
    echo mysqli_error($koneksi);
}
if ($pg == 'hapus') {
    $id_setting_kartu = $_POST['id_setting_kartu'];
    delete($koneksi, 'setting_kartu', ['id_setting_kartu' => $id_setting_kartu]);
}
