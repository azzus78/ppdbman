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
        'petugas_man'   => addslashes($_POST['petugas_man']),
    ];
    $id_petugas_man = $_POST['id_petugas_man'];
    update($koneksi, 'petugas_man', $data);
}
if ($pg == 'tambah') {
    $existing = mysqli_query($koneksi, "select * from petugas_komite");
    if (mysqli_num_rows($existing) > 0) {
        $data = [
            'nama_petugas'        => $_POST['petugas_komite_man']
        ];
        $exec = update($koneksi, 'petugas_komite', $data);
        echo mysqli_error($koneksi);
    } else {
        $data = [
            'nama_petugas'        => $_POST['petugas_komite_man']
        ];
        $exec = insert($koneksi, 'petugas_komite', $data);
        echo mysqli_error($koneksi);
    }
}
if ($pg == 'hapus') {
    $id_setting_kartu = $_POST['id_setting_kartu'];
    delete($koneksi, 'setting_kartu', ['id_setting_kartu' => $id_setting_kartu]);
}
