<?php
$jenis_data = fetch($koneksi, 'jenis', ['id_jenis' => $jenis]);
?>
<center>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="activities">
                    <div class="activity-detail">
                        <div>
                            <h3 style="color: #06628c;">Oops! Halaman Tidak Ditemukan</h3></br>
                            <img src="../assets/img/404.png" class="img-fluid" alt="Responsive image" draggable="false">
                        </div></br>
                        <h3 style="color: #06628c;">Mohon Maaf Pengisian Formulir Jalur <?= $jenis_data['nama_jenis'] ?> Telah Selesai</h3></br>
                        <a href="."><button type="button" class="btn btn-icon icon-left btn-dark">Kembali ke Beranda <i class="fas fa-home"></i></button></a>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>
</center>
