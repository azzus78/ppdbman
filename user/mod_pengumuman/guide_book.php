<?php 
$jadwal = fetch($koneksi, 'berkas_formulir', ['id_berkas' => 1]);
$daful = fetch($koneksi, 'berkas_formulir', ['id_berkas' => 2]);
?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="activities">
                    <div class="activity">
                        <div class="activity-icon bg-primary text-white shadow-primary">
                        <i class="fas fa-bullhorn"></i>
                        </div>
                        <div class="activity-detail">
                            <h5>PETUNJUK PPDB MAN 1 NGANJUK <?= date('Y') ?></h5>
                            <p>Kepada Seluruh Pendaftar Peserta Didik Baru di <b>MAN 1 NGANJUK</b> Wajib mendownload dan membaca <b>Pelaksanaan & Daftar Ulang PPDB</b> Untuk Info Lebih Lanjut Tekan Tombol dibawah !!!</p>
                            <br>
                            <div class="row">
                                <div class="col-sm-12 col-md-auto mb-2">
                                    <button type="button" class="btn btn-outline-success" onclick="window.open('<?php echo './../admin/mod_jenis/' . $jadwal['link_berkas']; ?>')">
                                        <i class="fas fa-clipboard-check"></i> Jadwal Pelaksanaan
                                    </button>
                                </div>
                                <div class="col-sm-12 col-md-auto mb-2">
                                    <button type="button" class="btn btn-outline-danger" onclick="window.open('<?php echo './../admin/mod_jenis/' . $daful['link_berkas']; ?>')">
                                        <i class="fas fa-business-time"></i> Alur Daftar Ulang
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

