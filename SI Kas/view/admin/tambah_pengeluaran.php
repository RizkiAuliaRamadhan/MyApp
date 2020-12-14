<?php 

if(isset($_POST["kirim"])){
    if( tambah_pengeluaran($_POST) > 0){ ?>
        <script>
            swal('Selamat','Data berhasil ditambahkan','success');
            setTimeout(function () {
                document.location.href = "index.php?view=pengeluaran";
            }, 1500);
        </script>
    <?php }else{ ?>
        <script>
            swal('Maaf','Data gagal ditambahkan','warning');
            document.location.href = "index.php?view=pengeluaran";
        </script>
    <?php }
}
?>
<h1 style="text-align: center;">Form Pengeluaran</h1>
<br>
<div class="form">
    <form action="#" method="post">
        <label for="tanggal_keluar">Tanggal Keluar</label>
        <input type="date" id="tanggal_keluar" name="tanggal_keluar" placeholder="Tanggal Keluar">
        <label for="total_pengeluaran">Total Pengeluaran</label>
        <input type="number" id="total_pengeluaran" name="total_pengeluaran" placeholder="Total Pengeluaran">
        <label for="keterangan">keterangan</label>
        <textarea name="keterangan" id="keterangan"></textarea>
        <button name="kirim" class="button-primary">Kirim</button>
    </form>
</div>
<div class="margin-bottom"></div>