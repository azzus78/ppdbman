<?php
require("../../config/database.php");
require("../../config/function.php");
require("../../config/functions.crud.php");
session_start();

$id = $_SESSION['id_siswa'];
$siswa = fetch($koneksi, 'daftar', ['id_daftar' => $id]);
$cek1p = mysqli_num_rows(mysqli_query($koneksi, "select * from daftar where
id_daftar         = '$siswa[id_daftar]' and
nik                is  null and 
jenkel             is  null and
jurusan1           is  null and
jurusan2           is  null and
keterampilan       is  null and
no_hp       is  null and
nisn       is  null and
tempat_lahir       is  null and
tgl_lahir       is  null and
nama       is  null and
agama              is  null
"));
$cek2p = mysqli_num_rows(mysqli_query($koneksi, "select * from daftar where
id_daftar         = '$siswa[id_daftar]' and
jenjang_sekolah              is  null and
status_sekolah                is  null and
asal_sekolah               is  null and
npsn_sekolah                   is  null and
kab_sekolah                  is  null
"));

if ($pg == 'cek') {
  $cek = rowcount($koneksi, 'kartu_ujian', ['nisn' => $siswa['nisn']]);
  $pesan = [
      'pesan' => 'gagal',
  ];
  if ($cek == 1) {
    $pesan = [
        'pesan' => 'ok',
        'id' => enkripsi($siswa['nisn'])
    ];
    echo json_encode($pesan);
  } else if ($cek1p == 0 && $cek2p == 0) {
    $data = [
      'nama'          => mysqli_escape_string($siswa['nama']), 
      'nisn'          => $siswa['nisn'],
      'password'      => $siswa['password'],
      'asal'          => mysqli_escape_string($siswa['asal_sekolah'])
    ];
    
    $exec = insert($koneksi, 'kartu_ujian', $data);
    if ($exec) {
      $kartu = fetch($koneksi, 'kartu_ujian', ['nisn' => $siswa['nisn']]);
      $id = $kartu['id_kartu'];
      $noCard = "21".sprintf("%03s", $id);
      $data = [
        'nomor_kartu'          => $noCard
      ];
      $exec = update($koneksi, 'kartu_ujian', $data, ['nisn' => $siswa['nisn']]);
      if ($exec) {
        $pesan = [
            'pesan' => 'ok',
            'id' => enkripsi($siswa['nisn'])
        ];
        echo json_encode($pesan);
      } else {
        echo json_encode($pesan);
      }
    } else {
      echo json_encode($pesan);
    }
  } else {
    echo json_encode($pesan);
  }
}
