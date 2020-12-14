<?php 
$id = $_GET['id_pengeluaran'];

$pengeluaran = query("SELECT * FROM pengeluaran WHERE id_pengeluaran = $id")[0];

if(isset($_POST["kirim"])){
    if( update_pengeluaran($_POST) > 0){ ?>
        <script>
            swal('Selamat','Data berhasil diubah','success');
            setTimeout(function () {
                document.location.href = "index.php?view=pengeluaran";
            }, 1500);
        </script>
    <?php }else{ ?>
        <script>
            swal('Maaf','Data gagal diubah','warning');
            document.location.href = "index.php?view=pengeluaran";
        </script>
    <?php }
}
?>
<h1 style="text-align: center;">Ubah Data Pengeluaran</h1>
<br>
<div class="form">
    <form action="#" method="post">
        <input type="hidden" name="id_pengeluaran" value="<?= $pengeluaran['id_pengeluaran'] ?>">
        <label for="tanggal_keluar">Tanggal Keluar</label>
        <input type="date" id="tanggal_keluar" name="tanggal_keluar" value="<?= $pengeluaran['tanggal_pengeluaran'] ?>">
        <label for="total_pengeluaran">Total Pengeluaran</label>
        <input type="number" id="total_pengeluaran" name="total_pengeluaran" placeholder="Total Pengeluaran" value="<?= $pengeluaran['nominal'] ?>">
        <label for="keterangan">keterangan</label>
        <textarea name="keterangan" id="keterangan"><?= $pengeluaran['keterangan'] ?></textarea>
        <button name="kirim" class="button-primary">Kirim</button>
    </form>
</div>
<div class="margin-bottom"></div>