<?php 

if(isset($_POST["kirim"])){
    if( tambah_pemasukan($_POST) > 0){ ?>
        <script>
            swal('Selamat','Data berhasil ditambahkan','success');
            setTimeout(function () {
                document.location.href = "index.php?view=pemasukan";
            }, 1500);
        </script>
    <?php }else{ ?>
        <script>
            swal('Maaf','Data gagal ditambahkan','warning');
            document.location.href = "index.php?view=pemasukan";
        </script>
    <?php }
}
?>
<h1 style="text-align: center;">Form Pemasukan</h1>
<br>
<div class="form">
    <form action="" method="post">
        <label for="tanggal_masuk">Tanggal Masuk :</label>
        <input type="date" id="tanggal_masuk" name="tanggal_masuk" placeholder="Tanggal Masuk" required>
        <label for="total_pemasukan">Total Pemasukan :</label>
        <input type="number" id="total_pemasukan" name="total_pemasukan" placeholder="Total Pemasukan" required>
        <label for="keterangan">keterangan :</label>
        <textarea name="keterangan" id="keterangan"></textarea>
        <button name="kirim" class="button-primary">Kirim</button>
    </form>
</div>
<div class="margin-bottom"></div>