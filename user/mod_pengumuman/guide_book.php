<?php $setting_kartu_ujian = fetch($koneksi, 'setting_kartu_ujian', ['id_setting_kartu' => 1]); ?>
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
                            <h5>DOWNLOAD TATA CARA PPDB MAN 1 NGANJUK</h5>
                            <p>Kepada Seluruh Pendaftar Peserta Didik Baru di <b>MAN 1 NGANJUK</b> Wajib mendownload dan membaca <b>Tata Cara PPDB</b> Untuk Info Lebih Lanjut Tekan Tombol dibawah !!!</p>
                            <br>
                            <div class="row">
                                <div class="col-sm-12 col-md-auto mb-2">
                                    <button type="button" class="btn btn-outline-success" data-toggle="modal" onclick="myFunctiondownload()">
                                        <i class="fas fa-cloud-download-alt"></i> Download Tata Cara PPDB
                                    </button>
                                </div>
                                <script>
                                    function myFunctiondownload() {
                                    window.open("<?php echo $setting_kartu_ujian['filebook']; ?>");
                                    }
                                </script>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

