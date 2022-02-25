<?php
require "config/database.php";
require "config/function.php";
require "config/functions.crud.php";
session_start();

if ($pg == 'simpan') {
    include_once 'securimage/securimage.php';
    $securimage = new Securimage();
    $cekPrestasi = strcmp($_POST['jenis'], "PR");
    if ($securimage->check($_POST['kodepengaman']) == false) {
        $pesan = [
            'pesan' => 'KODE CAPTCHA SALAH'
        ];
        echo json_encode($pesan);
    } else {
        $query = "SELECT max(no_daftar) as maxKode FROM daftar";
        $hasil = mysqli_query($koneksi, $query);
        $data  = mysqli_fetch_array($hasil);
        $kodedaftar = $data['maxKode'];
        $noUrut = (int) substr($kodedaftar, 13, 3);
        $noUrut++;
        $char = "PPDBM1NGK" . date('Y');
        $newID = $char . sprintf("%03s", $noUrut);
        $nama = mysqli_escape_string($koneksi, ucwords(strtolower($_POST['nama'])));
        $data = [
            'no_daftar' => $newID,
            'jenis' => $_POST['jenis'],
            'nisn' => $_POST['nisn'],
            'nama' => $nama,
            'no_hp' => $_POST['nohp'],
            'password' => $_POST['password'],
            'foto' => 'foto_siswa/default.png'
        ];
        $cek = rowcount($koneksi, 'daftar', ['nisn' => $_POST['nisn']]);
        if ($cek == 0) {
            $exec = insert($koneksi, 'daftar', $data);
            $namapendek = explode(" ", $nama);

            if (!$cekPrestasi) {
                $siswa = fetch($koneksi, 'daftar', ['nisn' => $_POST['nisn']]);
                $dataPrestasi = [
                    'id_daftar' => $siswa['id_daftar']
                ];
                insert($koneksi, 'prestasi', $dataPrestasi);
            }

            $pesan = [
                'pesan' => 'ok',
                'user' => $_POST['nisn'],
                'pass' => $_POST['password'],
                'nama' => $namapendek[0]
            ];
            echo json_encode($pesan);
        } else {
            $pesan = [
                'pesan' => 'NISN sudah ada'
            ];
            echo json_encode($pesan);
        }
    }
}
if ($pg == 'login') {

    $username = mysqli_escape_string($koneksi, $_POST['username']);
    $password = mysqli_escape_string($koneksi, $_POST['password']);
    $siswaQ = mysqli_query($koneksi, "SELECT * FROM daftar WHERE nisn='$username'");
    if ($username <> "" and $password <> "") {
        if (mysqli_num_rows($siswaQ) == 0) {
            $data = [
                'pesan' => 'Anda belum terdaftar silahkan melakukan pendaftaran!'
            ];
            echo json_encode($data);
        } else {
            $siswa = mysqli_fetch_array($siswaQ);
            //$ceklogin=mysqli_num_rows(mysqli_query($koneksi, "select * from login where id_siswa='$siswa[id_siswa]'"));

            if ($password <> $siswa['password']) {
                $data = [
                    'pesan' => 'Password Salah !'
                ];
                echo json_encode($data);
            } else {
                //if($ceklogin==0){
                $_SESSION['id_siswa'] = $siswa['id_daftar'];
                mysqli_query($koneksi, "UPDATE daftar set online='1' where id_daftar='$siswa[id_daftar]'");
                $data = [
                    'pesan' => 'ok'
                ];
                echo json_encode($data);
            }
        }
    }
}
