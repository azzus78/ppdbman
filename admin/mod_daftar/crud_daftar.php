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
    $nama = str_replace("'", "`", $_POST['nama']);
    $data = [
        'nisn' => $_POST['nisn'],
        'nama' => ucwords(strtolower($nama)),
        'asal_sekolah' => $_POST['asal'],
        'no_hp' => str_replace(" ", "", $_POST['nohp']),
        'status' => $status
    ];
    $id_daftar = $_POST['id_daftar'];
    update($koneksi, 'daftar', $data, ['id_daftar' => $id_daftar]);
}
if ($pg == 'tambah') {
    $nama = str_replace("'", "`", $_POST['nama']);
    $sekolah = fetch($koneksi, 'sekolah', ['npsn' => $_POST['asal']]);
    $data = [
        'nisn' => $_POST['nisn'],
        'nama' => ucwords(strtolower($nama)),
        'jurusan' => $_POST['jurusan'],
        'no_hp' => str_replace(" ", "", $_POST['nohp']),
        'foto' => 'default.png'
    ];
    $exec = insert($koneksi, 'daftar', $data);
    echo mysqli_error($koneksi);
}
if ($pg == 'hapus') {
    $id_daftar = $_POST['id_daftar'];
    delete($koneksi, 'daftar', ['id_daftar' => $id_daftar]);
}
if ($pg == 'hapusSemua') {
    $command = 'DELETE FROM bayar WHERE bayar.id_daftar IN (
        SELECT daftar.id_daftar FROM daftar
    )';
    $exec = mysqli_query($koneksi, $command);
    if (!$exec) {
        return "NO";
    }
    $command = 'DELETE FROM kartu_ujian WHERE kartu_ujian.nisn IN (
        SELECT daftar.nisn FROM daftar
    )';
    $exec = mysqli_query($koneksi, $command);
    if (!$exec) {
        return "NO";
    }
    $command = 'DELETE FROM prestasi WHERE prestasi.id_daftar IN (
        SELECT daftar.id_daftar FROM daftar
    )';
    $exec = mysqli_query($koneksi, $command);
    if (!$exec) {
        return "NO";
    }
    $command = 'DELETE FROM tahfidz WHERE tahfidz.id_daftar IN (
        SELECT daftar.id_daftar FROM daftar
    )';
    $exec = mysqli_query($koneksi, $command);
    if (!$exec) {
        return "NO";
    }
    delete($koneksi, 'daftar');
}
//membatalkan proses daftar ulang
if ($pg == 'batal') {

    $data = [
        'status' => 0
    ];
    $where = [
        'id_daftar' => $_POST['id_daftar']
    ];
    update($koneksi, 'daftar', $data, $where);
    delete($koneksi, 'bayar', $where);
}
if ($pg == 'status') {
    $siswa = fetch($koneksi, 'daftar', ["id_daftar" => $_POST['id_daftar']]);
    $where = [
        'id_daftar' => $_POST['id_daftar']
    ];
    if ($_POST['status'] == 3) {
        $jenis = fetch($koneksi, 'jenis', ["nama_jenis" => "REGULER"]);
        $data = [
            'jenis' => $jenis['id_jenis']
        ];
        update($koneksi, 'daftar', $data, $where);
        echo "ok";
    } else if ($_POST['status'] == 4) {
        $jenis = fetch($koneksi, 'jenis', ["nama_jenis" => "PRESTASI"]);
        $exist = mysqli_num_rows(mysqli_query($koneksi, "select * from prestasi where id_daftar='$siswa[id_daftar]'"));
        if ($exist <> 0) {
            $data = [
                'jenis' => $jenis['id_jenis']
            ];
            update($koneksi, 'daftar', $data, $where);
            echo "ok";
        } else {
            echo "Siswa ini tidak berasal dari Jalur Prestasi";
        }
    } else {
        $status = (isset($_POST['status'])) ? $_POST['status'] : 0;
        $data = [
            'status' => $status
        ];
        update($koneksi, 'daftar', $data, $where);
        echo "ok";
    }
}
if ($pg == 'statussemua') {
    $status = 1;
    $data = [
        'status' => $status
    ];
    $ids = $_POST['id'];
    foreach ($ids as $id) {
        $where = [
            'id_daftar' => $id
        ];
        update($koneksi, 'daftar', $data, $where);
    }
}
