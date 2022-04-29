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
                            <h5>TES CBT PPDB MAN 1 NGANJUK</h5>
                            <p>Kepada Seluruh Pendaftar Peserta Didik Baru di <b>MAN 1 NGANJUK</b> Wajib Mengikuti Tes <b>CBT</b> Untuk Info Lebih Lanjut Tekan Tombol dibawah !!!</p>
                            <br>
                            <div class="row">
                                <div class="col-sm-12 col-md-auto mb-2">
                                    <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#modelInfo">
                                        <i class="fas fa-info-circle"></i> Mapel Tes PPDB
                                    </button>
                                </div>
                                <div class="col-sm-12 col-md-auto mb-2">
                                    <button type="button" class="btn btn-outline-success" data-toggle="modal" onclick="myFunctiondownload()">
                                        <i class="fas fa-cloud-download-alt"></i> Download Tata Cara PPDB
                                    </button>
                                </div>
                                <div class="col-sm-12 col-md-auto mb-2">
                                    <button id="tombolCetakKartu" type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#">
                                        <i class="fas fa-print"></i> Cetak Kartu
                                    </button>
                                </div>
                                <!-- Button Ujian Belum Mulai -->
                                <!--<div class="col-sm-12 col-md-auto mb-2">-->
                                <!--    <button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#modelInfo2">-->
                                <!--        <i class="fas fa-chalkboard-teacher"></i> TES PPDB-->
                                <!--    </button>-->
                                <!--</div>-->
                                <script>
                                $(document).ready(function() {
                                    $('#tombolCetakKartu').click(function() {
                                        $.ajax({
                                            type: 'POST',
                                            url: 'mod_pengumuman/cek_kartu.php?pg=cek',
                                            beforeSend: function() {
                                                $('#tombolCetakKartu').prop('disabled', true);
                                            },
                                            success: function(data) {
                                                var json = $.parseJSON(data);
                                                $('#tombolCetakKartu').prop('disabled', false);
                                                if (json.pesan == 'ok') {
                                                    window.open('mod_pengumuman/print_kartu_ujian.php?id='+json.id, '_blank');
                                                } else {
                                                    swal({
                                                        title: 'Formulir Belum Lengkap!',
                                                        text: "Silahkan lengkapi Formulir Anda!!",
                                                        icon: 'warning',
                                                    });
                                                }
                                            }
                                        });
                                        return false;
                                    })
                                });
                                </script>
                                <script>
                                    function myFunctiondownload() {
                                    window.open("<?php echo $setting_kartu_ujian['filebook']; ?>");
                                    }
                                </script>
                                <!-- Buka Tes CBT PPDB -->
                                <?php
                                if ($setting_kartu_ujian['tanggal'] <= date('Y-m-d') && $setting_kartu_ujian['waktu_mulai'] <= date('H:i:s') && $setting_kartu_ujian['waktu_selesai'] >= date('H:i:s')) {
                                ?>
                                <div class="col-sm-12 col-md-auto mb-2">
                                   <a onclick="myFunction()"><button type="button" class="btn btn-outline-warning">
                                    <i class="fas fa-chalkboard-teacher"></i> Tes Penjurusan </button></a>
                                </div>
                                <?php } else { ?>
                                <div class="col-sm-12 col-md-auto mb-2">
                                   <a><button type="button" class="btn btn-outline-warning disabled">
                                    <i class="fas fa-chalkboard-teacher"></i> Tes Penjurusan </button></a>
                                </div>
                                <?php } ?>
                                <script>
                                   function myFunction() {
                                      window.open("<?php echo $setting_kartu_ujian['link']; ?>");
                                    }
                                </script>
                            </div>
                            <!-- Modal 1 -->
                            <div class="modal fade" id="modelInfo" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Info Mapel Tes PPDB</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <span>Untuk Tes PPDB Akan dilaksanakan pada tanggal <?php echo date('d-m-Y', strtotime($setting_kartu_ujian['tanggal'])); ?> dengan Mata Pelajaran Tes Sebagai berikut:<br>
                                                1. Matematika<br>
                                                2. Bahasa Indonesia<br>
                                                3. Bahasa Inggris<br>
                                                4. IPA (Ilmu Pengetahuan Alam)<br>
                                                5. IPS (Ilmu Pengetahuan Sosial)<br>
                                                6. PAI (Pendidikan Agama Islam)<br>
                                            </span>
                                        </div>
                                        
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Info Belum Mulai CBT PPDB -->
                            <!--<div class="modal fade" id="modelInfo2" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">-->
                            <!--    <div class="modal-dialog" role="document">-->
                            <!--        <div class="modal-content">-->
                            <!--            <div class="modal-header">-->
                            <!--                <h5 class="modal-title">Tahap Penerimaan Seleksi Jalur Reguler</h5>-->
                            <!--                <button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
                            <!--                    <span aria-hidden="true">&times;</span>-->
                            <!--                </button>-->
                            <!--            </div>-->
                            <!--            <div class="modal-body">-->
                            <!--                    1. Menggunakan Ujian Berbasis Komputer (CBT)<br>-->
                            <!--                    2. Pelaksanaanya Bisa Dikerjakan Dari Rumah <font color="red"><b>(Daring)</b><br></font>-->
                            <!--                    3. <font color="red">Ujian CBT PPDB Akan Kami Buka Pada Tanggal<b> 6 Juli <?= date('Y') ?></b></font><br>-->
                            <!--                    4. Silahkan Login Kembali Pada Tanggal Tersebut<br>-->
                            <!--                </span>-->
                            <!--            </div>-->
                            <!--            <div class="modal-footer">-->
                            <!--                <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>-->
                            <!--            </div>-->
                            <!--        </div>-->
                            <!--    </div>-->
                            <!--</div>-->
                            <!-- Modal 3 -->
                            <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Info Tes PPDB</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <span>
                                            </span>
                                        </div>
                                        
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal 4 Sementara CBT PPDB -->
                            <!--<div class="modal fade" id="modelId2" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">-->
                            <!--    <div class="modal-dialog" role="document">-->
                            <!--        <div class="modal-content">-->
                            <!--            <div class="modal-header">-->
                            <!--                <h5 class="modal-title">Info Ujian Tes PPDB</h5>-->
                            <!--                <button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
                            <!--                    <span aria-hidden="true">&times;</span>-->
                            <!--                </button>-->
                            <!--            </div>-->
                            <!--            <div class="modal-body">-->
                            <!--                <span>-->
                            <!--                </span>-->
                            <!--            </div>-->
                                        
                            <!--            <div class="modal-footer">-->
                            <!--                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>-->
                            <!--            </div>-->
                            <!--        </div>-->
                            <!--    </div>-->
                            <!--</div>-->
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

