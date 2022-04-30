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
        'nama_jenis' => $_POST['nama'],
        'status' => $status
    ];
    $id_jenis = $_POST['id_jenis'];
    update($koneksi, 'jenis', $data, ['id_jenis' => $id_jenis]);
}
if ($pg == 'tambah') {
    $data = [
        'id_jenis'     => $_POST['id_jenis'],
        'nama_jenis'   => $_POST['nama'],
        'status'         => 1
    ];
    $exec = insert($koneksi, 'jenis', $data);
    echo $exec;
}
if ($pg == 'jadwal') {
    delete($koneksi, 'berkas_formulir', ['id_berkas' => 1]);

    $logo = $_FILES['berkas_jadwal']['name'];
    $temp = $_FILES['berkas_jadwal']['tmp_name'];
    $ext = explode('.', $logo);
    $ext = end($ext);
    if (in_array($ext, ["pdf"])) {
        $dest = 'jadwal_' .time(). '.' . $ext;
        $upload = move_uploaded_file($temp,  $dest);
        if ($upload) {
          $data = [
            'id_berkas'       => 1,
            'link_berkas'     => $dest
          ];

          $exec = insert($koneksi, 'berkas_formulir', $data);
          if ($exec) {
              $pesan = [
                  'pesan' => 'ok'
              ];
              echo 'ok';
          } else {
              $pesan = [
                  'pesan' => mysqli_error($koneksi)
              ];
              echo mysqli_error($koneksi);
          }
        } else {
            echo "penyimpanan gagal dilakukan, ulangi lagi yak";
        }
    }
}
if ($pg == 'daful') {
    delete($koneksi, 'berkas_formulir', ['id_berkas' => 2]);

    $logo = $_FILES['berkas_daful']['name'];
    $temp = $_FILES['berkas_daful']['tmp_name'];
    $ext = explode('.', $logo);
    $ext = end($ext);
    if (in_array($ext, ["pdf"])) {
        $dest = 'daful_' .time(). '.' . $ext;
        $upload = move_uploaded_file($temp,  $dest);
        if ($upload) {
          $data = [
            'id_berkas'       => 2,
            'link_berkas'     => $dest
          ];

          $exec = insert($koneksi, 'berkas_formulir', $data);
          if ($exec) {
              $pesan = [
                  'pesan' => 'ok'
              ];
              echo 'ok';
          } else {
              $pesan = [
                  'pesan' => mysqli_error($koneksi)
              ];
              echo mysqli_error($koneksi);
          }
        } else {
            echo "penyimpanan gagal dilakukan, ulangi lagi yak";
        }
    }
}
if ($pg == 'hapus') {
    $id_jenis = $_POST['id_jenis'];
    delete($koneksi, 'jenis', ['id_jenis' => $id_jenis]);
}
