<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="activities">
                    <?php $query = mysqli_query($koneksi, "SELECT * FROM tes where jenis='2'");
                    while ($data = mysqli_fetch_array($query)) {
                    ?>
                    <?php } ?>
                    <div class="activity">
                        <div class="activity-icon bg-primary text-white shadow-primary">
                            <i class="fas fa-bullhorn"></i>
                        </div>
                        <div class="activity-detail">
                            <div class="mb-2">
                                <span class="text-job text-primary"><?= $data['tgl'] ?></span>
                                <span class="bullet"></span>
                                <a class="text-job" href="#">View</a>

                            </div>
                            <h5>TES CBT PPDB MAN 1 NGANJUK</h5>
                            <p>Kepada Seluruh Pendaftar di <b>MAN 1 NGANJUK</b> Wajib Mengikuti Tes <b>CBT</b> yang dilaksanakan pada tanggal 10-Mei-2021</p>
                            <center>
                            <div class="card-footer">
                            <a <button id='btntes' type="submit" class="btn btn-lg btn-warning" target="_blank" href="https://cbt.man1nganjuk.com"><font color="black">TES PPDB</font></a></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>