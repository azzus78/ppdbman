<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h4>Akun Anda Berhasil Dibuat !</h4>
            </div>
            <div class="card-body">
                <center>
                    <h3>Hai!, <?= $_GET['nama'] ?> </h3>
                    <h3><font color="blue">"AKUN ANDA BERHASIL DIBUAT"</font></h3>
                    <h5>Silahkan login Menggunakan NISN & Password Dibawah</h5>
                    <h5>untuk melengkapi berkas pendaftaran</h5>
                    <p>NISN : <b><font color="text-red"> <?= $_GET['user'] ?></font></b></p>
                    <p> PASSWORD : <b><font color="text-red"> <?= $_GET['pass'] ?></font></b></p>
                    <i><h5><font color="red">*MOHON DIINGAT JIKA PERLU SCREENSHOT*</font></h5></i>
                    <div class="activity-detail">
                    <p><button type="button" data-id="login" class="klikmenu btn btn-danger">Lanjut Login</button></p>
                    </div>
                <br>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('.klikmenu').click(function() {
            var menu = $(this).data('id');
            if (menu == "login") {
                $('#isi_load').load('login.php');
            }
        });
    });
</script>