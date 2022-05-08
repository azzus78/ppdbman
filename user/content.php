<?php defined('BASEPATH') or die("ip anda sudah tercatat oleh sistem kami") ?>
<?php
$jenis_data = fetch($koneksi, 'jenis', ['id_jenis' => $jenis]);
if ($pg == '') {
    include "home.php";
} elseif ($pg == 'formulir') {
    if ($jenis_data['status_form']) {
        include "mod_formulir/formulir.php";
    } else {
        include "mod_formulir/block.php";
    }
} elseif ($pg == 'prestasi_formulir') {
    if ($jenis_data['status_form']) {
        include "mod_formulir/prestasi_formulir.php";
    } else {
        include "mod_formulir/block.php";
    }
} elseif ($pg == 'detail') {
    include "mod_formulir/detail.php";  //Modul Detail Pendaftaran
} elseif ($pg == 'bayar') {
    include "mod_bayar/bayar.php";
} elseif ($pg == 'pengumuman') {
    include "mod_pengumuman/pengumuman.php";
} elseif ($pg == 'user') {
    include "mod_user/user.php";
} elseif ($pg == 'setting') {
    include "mod_setting/setting.php";
} elseif ($pg == 'tahfidz_formulir') {
    if ($jenis_data['status_form']) {
        include "mod_formulir/tahfidz_formulir.php";
    } else {
        include "mod_formulir/block.php";
    }
} elseif ($pg == 'guide_book') {
    include "mod_pengumuman/guide_book.php";
} elseif ($pg == 'block') {
    include "mod_formulir/block.php";
}
