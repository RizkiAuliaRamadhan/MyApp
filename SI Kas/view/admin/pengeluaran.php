<?php
    $pengeluaran = query("SELECT * FROM pengeluaran ORDER BY tanggal_pengeluaran ASC");

    if(isset($_POST['submit'])){
        $bulan = date($_POST['bulan']);
        if(!empty($bulan)){
            $pengeluaran = query("SELECT * FROM pengeluaran WHERE MONTH(tanggal_pengeluaran) = $bulan");
        }else{
            $pengeluaran = query("SELECT * FROM pengeluaran ORDER BY tanggal_pengeluaran ASC");
        }
    }else{
        $pengeluaran = query("SELECT * FROM pengeluaran ORDER BY tanggal_pengeluaran ASC");
    }
?>
<h1 style="text-align: center;">Data Pengeluaran</h1><br>
<div style="display: flex; justify-content: flex-start;">
    <a href="index.php?view=tambah_pengeluaran" class="button-primary">Tambah Pengeluaran</a>

    <form method="POST" action="" style="margin-left: 10px;">
       <label for="date1" style="font-size:13px;">Tampilkan transaksi bulan :</label>
       <select name="bulan" id="bulan">
            <option value="">Semua</option>
            <option value="1">Januari</option>
            <option value="2">Februari</option>
            <option value="3">Maret</option>
            <option value="4">April</option>
            <option value="5">Mei</option>
            <option value="6">Juni</option>
            <option value="7">Juli</option>
            <option value="8">Agustus</option>
            <option value="9">September</option>
            <option value="10">Oktober</option>
            <option value="11">November</option>
            <option value="12">Desember</option>
       </select>
       <button type="submit" name="submit" class="button-primary">Tampilkan</button>
    </form>

    <form method="POST" action="cetak/cetak_pengeluaran.php"target="_blank" style="margin-left: 10px;">
       <label for="date1" style="font-size:13px;">Cetak transaksi bulan :</label>
       <select name="bulan" id="bulan">
            <option value="">Semua</option>
            <option value="1">Januari</option>
            <option value="2">Februari</option>
            <option value="3">Maret</option>
            <option value="4">April</option>
            <option value="5">Mei</option>
            <option value="6">Juni</option>
            <option value="7">Juli</option>
            <option value="8">Agustus</option>
            <option value="9">September</option>
            <option value="10">Oktober</option>
            <option value="11">November</option>
            <option value="12">Desember</option>
       </select>
       <button type="submit" name="cetak" class="button-primary">Cetak</button>
    </form>

</div>
<div style="overflow-x:auto;">
    <table id="example">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>pengeluaran</th>
                <th>Keterangan</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <?php $i = 1; foreach($pengeluaran as $p) : ?>
            <tbody>
                <tr>
                    <td><?= $i++ ?></td>
                    <td><?= $p['tanggal_pengeluaran'] ?></td>
                    <td><?= number_format($p['nominal']) ?></td>
                    <td><?= $p['keterangan'] ?></td>
                    <td>
                        <a href="index.php?view=update_pengeluaran&id_pengeluaran=<?= $p['id_pengeluaran'] ?>">Edit</a> |
                        <a href="index.php?view=hapus_pengeluaran&id_pengeluaran=<?= $p['id_pengeluaran']?>" onclick="return confirm('yakin mau dihapus?')" style="color: red;">Hapus</a>
                    </td>
                </tr>
            </tbody>
        <?php endforeach ?>
    </table>
</div>