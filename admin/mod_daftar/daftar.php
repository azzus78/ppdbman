<!-- Modal -->
<div class="modal fade" id="tambahdata" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="form-tambah">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data Pendaftar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>NISN</label>
                        <input type="text" name="nisn" class="form-control nisn" required="">
                    </div>
                    <div class="form-group">
                        <label>Nama Pendaftar</label>
                        <input type="text" name="nama" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label for="jurusan">Pilihan Jurusan</label>
                        <select class="form-control" name="jurusan" id="jurusan" required>
                            <option value="">Pilih Jurusan</option>
                            <?php
                            $query = mysqli_query($koneksi, "select * from jurusan where status='1'");
                            while ($jurusan = mysqli_fetch_array($query)) {
                            ?>
                                <option value="<?= $jurusan['id_jurusan'] ?>"><?= $jurusan['id_jurusan'] ?> <?= $jurusan['nama_jurusan'] ?></option>
                            <?php } ?>

                        </select>
                    </div>
                    <div class="form-group">
                        <label>No HP</label>
                        <input type="text" name="nohp" class="form-control nohp" required="">
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

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Data Pendaftar</h4>
                <div class="card-header-action">
                    <button type="button" class="btn btn-outline-info" id="listSemua">
                        <i class="fas fa-table"></i> Semua Data
                    </button>
                    <button type="button" class="btn btn-outline-success" id="listPrestasi">
                        <i class="fas fa-award"></i> Data Prestasi
                    </button>
                    <button type="button" class="btn btn-outline-warning" id="listReguler">
                        <i class="fas fa-assistive-listening-systems"></i> Data Reguler
                    </button>
                    <button type="button" class="btn btn-outline-danger" id="listTahfidz">
                        <i class="fas fa-quran"></i> Data Tahfidz
                    </button>
                </div>
            </div>
            <div class="card-header">
                <div class="container-fluid text-right">
                <?php
                if (array_key_exists("list", $_GET)) {
                    if ($_GET['list'] == "PR") {
                        $donwload_excel_opt = "mod_daftar/export_excel.php?list=PR";
                    } else {
                        $donwload_excel_opt = "mod_daftar/export_excel.php?list=SB";
                    }
                } else {
                    $donwload_excel_opt = "mod_daftar/export_excel.php";
                }
                ?>
                <a class="btn btn-primary" href="<?= $donwload_excel_opt ?>" role="button"> <i  class="far fa-file-excel"></i> Download Excel</a>
                <button type="button" class="btn btn-icon icon-left btn-warning" data-toggle="modal" data-target="#tambahdata">
                    <i class="far fa-edit"></i> Tambah Data
                </button>
                <button type="button" class="btn btn-icon icon-left btn-danger" id="terima-semua">
                <i class="fas fa-layer-group"></i> Terima Semua</button>
                <button type="button" class="btn btn-icon icon-left btn-info" id="hapus-semua">
                <i class="fas fa-trash-alt"></i> Hapus Semua</button>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table style="font-size: 12px" class="table table-striped table-sm" id="table-1">
                        <thead>
                            <tr>
                                <th class="text-center">
                                    #
                                </th>
                                <th>No Daftar</th>
                                <th>NISN</th>
								<th>Password</th>
                                <th>Nama Pendaftar</th>
                                <th>No Hp</th>
                                <!-- <th>Bayar</th> -->
                                <th>Status</th>
                                <th>Jalur</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (array_key_exists("list", $_GET)) {
                                if ($_GET['list'] == "PR") {
                                    $query = mysqli_query($koneksi, "select * from daftar where jenis='PR'");
                                } else {
                                    $query = mysqli_query($koneksi, "select * from daftar where jenis='SB'");
                                }
                            } else {
                                $query = mysqli_query($koneksi, "select * from daftar");
                            }
                            $no = 0;
                            while ($daftar = mysqli_fetch_array($query)) {
                                $no++;
                                $bayar = mysqli_fetch_array(mysqli_query($koneksi, "select sum(jumlah) as total from bayar where id_daftar='$daftar[id_daftar]' "));
                            ?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    <td><?= $daftar['no_daftar'] ?></td>
                                    <td><?= $daftar['nisn'] ?></td>
									<td><?= $daftar['password'] ?></td>
                                    <td><?= $daftar['nama'] ?></td>
                                    <td>
                                        <i class="fab fa-whatsapp text-success   "></i>
                                        <a target="_blank" href="https://api.whatsapp.com/send?phone=62<?= $daftar['no_hp'] ?>&text=Terima%20kasih%20sudah%20mendaftar%20di%20MAN%201%20NGANJUK%2C%0AHarap%20segera%20mengisi%20formulir%20%2APENDAFTARAN%2A%20agar%20bisa%20diterima%20menjadi%20siswa%20baru%20di%20MAN%201%20NGANJUK%0AInfo%20lebih%20lanjut%20silahkan%20kunjungi%20website%20www.man1nganjuk.sch.id%0ASilahkan%20login%20dan%20lengkapi%20data%20formulirnya.%20%0AUsername%20%3A%20%2A<?= $daftar['nisn'] ?>%2A%0APassword%20%3A%20%2A<?= $daftar['password'] ?>%2A">
                                            <?= $daftar['no_hp'] ?></a>
                                    </td>
                                    <!-- <td>
                                        <?php
                                        if ($bayar['total'] <> 0) { ?>
                                            <a href="?pg=bayar&id=<?= enkripsi($daftar['id_daftar']) ?>">Rp <?= number_format($bayar['total'], 0, ",", "."); ?></a>
                                        <?php  } else {
                                        ?>
                                            <a href="?pg=bayar&id=<?= enkripsi($daftar['id_daftar']) ?>" type="button" class="badge badge-danger">belum</a>
                                        <?php }
                                        ?>
                                    </td> -->
                                    <td>
                                        <?php if ($daftar['status'] == 1) { ?>
                                            <span class="badge badge-success">diterima</span>
                                        <?php } elseif ($daftar['status'] == 2) { ?>
                                            <span class="badge badge-danger">Cadang </span>
                                        <?php } else { ?>
                                            <span class="badge badge-warning">pending</span>
                                        <?php } ?>
                                    </td>
                                    <!-- / -->
                                    <td>
                                        <?php $jenis = fetch($koneksi, 'jenis', ['nama_jenis' => 'PRESTASI']); 
                                        if ($daftar['jenis']  == $jenis['id_jenis']) { ?>
                                            <span class="badge badge-info">Prestasi</span>
                                        <?php } else if ($daftar['jenis']  == "TH") { ?>
                                            <span class="badge badge-danger">Tahfidz </span>
                                            <!-- <span class="badge badge-danger">Tahfidz </span> -->
                                        <?php } else { ?>
                                            <span class="badge badge-warning">Reguler </span>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <a data-toggle="tooltip" data-placement="top" title="" data-original-title="detail siswa" href="?pg=detail&id=<?= enkripsi($daftar['id_daftar']) ?>" class="btn btn-sm btn-success"><i class="fas fa-eye    "></i></a>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-edit<?= $no ?>">
                                            <i class="fas fa-edit    "></i>
                                        </button>
                                        <button data-id="<?= $daftar['id_daftar'] ?>" class="hapus btn-sm btn btn-danger"><i class="fas fa-trash    "></i></button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="modal-edit<?= $no ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <form id="form-edit<?= $no ?>">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Edit Data</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <input type="hidden" value="<?= $daftar['id_daftar'] ?>" name="id_daftar" class="form-control" required="">

                                                            <div class="form-group">
                                                                <div class="control-label">Pilih Status</div>
                                                                <div class="custom-switches-stacked mt-2">
                                                                    <label class="custom-switch">
                                                                        <input type="radio" name="status" value="0" class="custom-switch-input" checked>
                                                                        <span class="custom-switch-indicator"></span>
                                                                        <span class="custom-switch-description">Dipending</span>
                                                                    </label>
                                                                    <label class="custom-switch">
                                                                        <input type="radio" name="status" value="1" class="custom-switch-input">
                                                                        <span class="custom-switch-indicator"></span>
                                                                        <span class="custom-switch-description">Diterima</span>
                                                                    </label>
                                                                    <label class="custom-switch">
                                                                        <input type="radio" name="status" value="2" class="custom-switch-input">
                                                                        <span class="custom-switch-indicator"></span>
                                                                        <span class="custom-switch-description">Dicadangkan</span>
                                                                    </label>
                                                                    <?php if ($daftar['jenis'] == "PR") { ?>
                                                                    <label class="custom-switch">
                                                                        <input type="radio" name="status" value="3" class="custom-switch-input">
                                                                        <span class="custom-switch-indicator"></span>
                                                                        <span class="custom-switch-description">Pindahkan Reguler</span>
                                                                    </label>
                                                                    <?php } else { ?>
                                                                    <label class="custom-switch">
                                                                        <input type="radio" name="status" value="4" class="custom-switch-input">
                                                                        <span class="custom-switch-indicator"></span>
                                                                        <span class="custom-switch-description">Pindahkan Prestasi</span>
                                                                    </label>
                                                                    <?php } ?>
                                                                    <label class="custom-switch">
                                                                        <input type="radio" name="status" value="5" class="custom-switch-input">
                                                                        <span class="custom-switch-indicator"></span>
                                                                        <span class="custom-switch-description">Pindahkan Tahfidz</span>
                                                                    </label>
                                                                </div>
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
                                    </td>
                                </tr>
                                <script>
                                    $('#form-edit<?= $no ?>').submit(function(e) {
                                        e.preventDefault();
                                        $.ajax({
                                            type: 'POST',
                                            url: 'mod_daftar/crud_daftar.php?pg=status',
                                            data: $(this).serialize(),
                                            success: function(data) {
                                                var json = data;
                                                if (json == "ok") {
                                                    iziToast.success({
                                                        title: 'OKee!',
                                                        message: 'Status Berhasil diubah',
                                                        position: 'topRight'
                                                    });
                                                } else {
                                                    iziToast.error({
                                                        title: 'Gagal!',
                                                        message: json,
                                                        position: 'topRight'
                                                    });
                                                }
                                                setTimeout(function() {
                                                    window.location.reload();
                                                }, 2000);
                                                $('#modal-edit<?= $no ?>').modal('hide');
                                                //$('#bodyreset').load(location.href + ' #bodyreset');
                                            }
                                        });
                                        return false;
                                    });
                                </script>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var cleaveI = new Cleave('.nisn', {

        blocks: [10]

    });
    var cleaveI = new Cleave('.nohp', {
        blocks: [4, 4, 4, 5]
    });
    $('#listSemua').click(function() {
        var url = window.location.href;
        if (url.includes("list")) {
            var head = url.substr(0, url.length - 8);
            url = head;
        }
        window.location.href = url;
    });
    $('#listPrestasi').click(function() {
        var url = window.location.href;
        if (url.includes("list")) {
            var head = url.substr(0, url.length - 2);
            url = head + "PR";
        } else {
            url += '&list=PR'
        }
        window.location.href = url;
    });
    $('#listReguler').click(function() {
        var url = window.location.href;
        if (url.includes("list")) {
            var head = url.substr(0, url.length - 2);
            url = head + "SB";
        } else {
            url += '&list=SB'
        }
        window.location.href = url;
    });
    $('#form-tambah').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'mod_daftar/crud_daftar.php?pg=tambah',
            data: $(this).serialize(),
            beforeSend: function() {
                $('form button').on("click", function(e) {
                    e.preventDefault();
                });
            },
            success: function(data) {

                iziToast.success({
                    title: 'Mantap!',
                    message: 'data berhasil disimpan',
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
                    url: 'mod_daftar/crud_daftar.php?pg=hapus',
                    method: "POST",
                    data: 'id_daftar=' + id,
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

    $('#hapus-semua').on('click', function() {
        swal({
            title: 'Apakah Anda Yakin?',
            text: 'Akan menghapus keseluruhan dari data ini?!',
            icon: 'warning',
            buttons: true,
            dangerMode: true,
        }).then((result) => {
            if (result) {
                $.ajax({
                    url: 'mod_daftar/crud_daftar.php?pg=hapusSemua',
                    method: "POST",
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
    $('#terima-semua').on('click', function() {
        var t_element = document.getElementsByClassName("hapus");
        var id = [];
        for (var i = 0; i < t_element.length; i++) {
            id.push($(t_element[i]).data('id'));
        }
        console.log(id);
        swal({
            title: 'Apakah anda yakin?',
            text: 'Menerima semua siswa pada daftar tersebut!',
            icon: 'info',
            buttons: true,
        }).then((result) => {
            if (result) {
                $.ajax({
                    url: 'mod_daftar/crud_daftar.php?pg=statussemua',
                    method: "POST",
                    data: {id:id},
                    success: function(data) {
                        iziToast.success({
                            title: 'Okee!',
                            message: 'Siswa berhasil diterima',
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