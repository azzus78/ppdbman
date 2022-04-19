<?php defined('BASEPATH') or die("ip anda sudah tercatat oleh sistem kami") ?>
<?php
$prestasiState = fetch($koneksi, 'jenis', ['nama_jenis' => "PRESTASI"]);
if ($pg == '') {
    include "home.php";
} elseif ($pg == 'formulir' && !$prestasi) {
    include "mod_formulir/formulir.php";
} elseif ($pg == 'prestasi_formulir' && $prestasi) {
    include "mod_formulir/prestasi_formulir.php";
    // if ($prestasiState['status'] == 1)
    //     include "mod_formulir/prestasi_formulir.php";
    // else
    //     include "block.php";
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
    include "mod_formulir/tahfidz_formulir.php";
}


