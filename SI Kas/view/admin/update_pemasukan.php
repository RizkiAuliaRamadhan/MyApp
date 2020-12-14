<?php 

$id = $_GET['id_pemasukan'];

$pemasukan = query("SELECT * FROM pemasukan WHERE id_pemasukan = $id")[0];

if(isset($_POST["kirim"])){
    if( update_pemasukan($_POST) > 0){ ?>
        <script>
            swal('Selamat','Data berhasil diubah','success');
            setTimeout(function () {
                document.location.href = "index.php?view=pemasukan";
            }, 1500);
        </script>
    <?php }else{ ?>
        <script>
            swal('Maaf','Data gagal diubah','warning');
            document.location.href = "index.php?view=pemasukan";
        </script>
    <?php }
}
?>
<h1 style="text-align: center;">Ubah Data Pemasukan</h1>
<br>
<div class="form">
    <form action="" method="post">
        <input type="hidden" name="id_pemasukan" value="<?= $pemasukan['id_pemasukan'] ?>">
        <label for="tanggal_masuk">Tanggal Masuk :</label>
        <input type="date" id="tanggal_masuk" name="tanggal_masuk" required value="<?= $pemasukan['tanggal_pemasukan'] ?>">
        <label for="total_pemasukan">Total Pemasukan :</label>
        <input type="number" id="total_pemasukan" name="total_pemasukan" placeholder="Total Pemasukan" required value="<?= $pemasukan['nominal'] ?>">
        <label for="keterangan">keterangan :</label>
        <textarea name="keterangan" id="keterangan"><?= $pemasukan['keterangan'] ?></textarea>
        <button name="kirim" class="button-primary">Kirim</button>
    </form>
</div>
<div class="margin-bottom"></div>