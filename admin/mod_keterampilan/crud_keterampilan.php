<?php
require("../../config/database.php");
require("../../config/function.php");
require("../../config/functions.crud.php");
session_start();
if (!isset($_SESSION['id_user'])) {
    die('Anda tidak diijinkan mengakses langsung');
}
if ($pg == 'ubah') {
    $status = (isset($_POST['status'])) ? 1 : 0;
    $data = [
        'nama_keterampilan' => $_POST['nama'],
        'kuota'             => $_POST['kuota'],
        'status'            => $status
    ];
    $id_keterampilan = $_POST['id_keterampilan'];
    update($koneksi, 'keterampilan', $data, ['id_keterampilan' => $id_keterampilan]);
}
if ($pg == 'tambah') {
    $data = [
        'id_keterampilan'     => $_POST['id_keterampilan'],
        'nama_keterampilan'   => $_POST['nama'],
        'kuota'          => $_POST['kuota'],
        'status'         => 1
    ];
    $exec = insert($koneksi, 'keterampilan', $data);
    echo $exec;
}
if ($pg == 'hapus') {
    $id_keterampilan = $_POST['id_keterampilan'];
    delete($koneksi, 'keterampilan', ['id_keterampilan' => $id_keterampilan]);
}
