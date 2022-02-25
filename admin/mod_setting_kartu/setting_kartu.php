<?php defined('BASEPATH') or die("ip anda sudah tercatat oleh sistem kami") ?>
<div class="section-header">

    <button type="button" class="btn btn-icon icon-left btn btn-outline-warning" data-toggle="modal" data-target="#setting_kartu" style="margin:20px;">
        <i class="fas fa-cogs"></i> Setting Kartu Ujian
    </button>

    <!-- Modal Kartu Ujian -->
    <div class="modal fade" id="setting_kartu" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Setting Kartu Ujian</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="form-setting_kartu">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="hari">Hari</label>
                            <select class='form-control' name='hari' required>
                                <option value=''>Pilih Hari</option>";
                                <?php foreach ($hari as $val) { ?>
                                    <?php if ($siswa['tinggal'] == $val) { ?>
                                        <option value='<?= $val ?>' selected><?= $val ?> </option>
                                    <?php  } else { ?>
                                        <option value='<?= $val ?>'><?= $val ?> </option>
                                    <?php } ?>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tgl">Tanggal Ujian</label>
                            <input type="text" class="form-control datepicker" name="tgl" id="tgl" required>
                        </div>
                        <div class="form-group">
                            <label for="waktu">Waktu Ujian Mulai</label>
                            <input type="time" class="form-control uang" name="waktu_ujian_mulai" id="waktu_ujian_mulai" aria-describedby="helpwaktuujian" required><br>
                            <label for="waktu">Selesai</label>
                            <input type="time" class="form-control uang" name="waktu_ujian_selesai" id="waktu_ujian_selesai" aria-describedby="helpwaktuujian" required>
                        </div>
                        <div class="form-group">
                            <label for="url">Link Ujian CBT</label>
                            <input type="url" class="form-control uang" id="cbt" name="cbt"  placeholder="https://cbt.man1nganjuk.sch.id" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Data Setting Kartu</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="table-1">
                        <thead>
                            <tr>
                                <th class="text-center">
                                    #
                                </th>
                                <th>Hari</th>
                                <th>Tanggal Ujian</th>
                                <th>Waktu Mulai Ujian</th>
                                <th>Waktu Selesai Ujian</th>
                                <th>Link Ujian CBT</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = mysqli_query($koneksi, "select * from jurusan");
                            $no = 0;
                            while ($jurusan = mysqli_fetch_array($query)) {
                                $no++;
                            ?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    <td><?= $jurusan['id_jurusan'] ?></td>
                                    <td><?= $jurusan['nama_jurusan'] ?></td>
                                    <td><?= $jurusan['kuota'] ?></td>
                                    <td><?= $jurusan['kuota'] ?></td>
                                    <td><?= $jurusan['kuota'] ?></td>
                                </tr>
                            <?php }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('#form-tambah').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'mod_jurusan/crud_jurusan.php?pg=tambah',
            data: $(this).serialize(),
            success: function(data) {

                iziToast.success({
                    title: 'Mantap!',
                    message: 'Data Berhasil ditambahkan',
                    position: 'topRight'
                });
                setTimeout(function() {
                    window.location.reload();
                }, 2000);
                $('#tambahdata').modal('hide');
                //$('#bodyreset').load(location.href + ' #bodyreset');
            }
        });
        return false;
    });

    $('#table-1').on('click', '.hapus', function() {
        var id = $(this).data('id');
        console.log(id);
        swal({
            title: 'Are you sure?',
            text: 'Akan menghapus data ini!',
            icon: 'warning',
            buttons: true,
            dangerMode: true,
        }).then((result) => {
            if (result) {
                $.ajax({
                    url: 'mod_jurusan/crud_jurusan.php?pg=hapus',
                    method: "POST",
                    data: 'id_jurusan=' + id,
                    success: function(data) {
                        iziToast.error({
                            title: 'Horee!',
                            message: 'Data Berhasil dihapus',
                            position: 'topRight'
                        });
                        setTimeout(function() {
                            window.location.reload();
                        }, 2000);
                    }
                });
            }
        })

    });
</script>