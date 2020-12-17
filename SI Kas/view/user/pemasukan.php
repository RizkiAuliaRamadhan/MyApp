<?php
    $pemasukan = query("SELECT * FROM pemasukan ORDER BY tanggal_pemasukan ASC");

    if(isset($_POST['submit'])){
        $bulan = date($_POST['bulan']);
        $tahun = date($_POST['tahun']);
        if(!empty($bulan)){
            if(!empty($tahun)){
                $pemasukan = query("SELECT * FROM pemasukan WHERE MONTH(tanggal_pemasukan) = $bulan AND YEAR(tanggal_pemasukan) = $tahun");
            }else{
                $pemasukan = query("SELECT * FROM pemasukan WHERE MONTH(tanggal_pemasukan) = $bulan");
            }  
        }elseif(!empty($tahun)){
            $pemasukan = query("SELECT * FROM pemasukan WHERE YEAR(tanggal_pemasukan) = $tahun");
        }
    }else{
        $pemasukan = query("SELECT * FROM pemasukan ORDER BY tanggal_pemasukan ASC");
    }
?>
<h1 style="text-align: center;">Data Pemasukan</h1><br>
<div style="display: flex; justify-content: flex-start;">

    <form method="POST" action="" style="margin-left: 10px;">
       <label for="date1" style="font-size:13px;">Tampilkan transaksi bulan :</label>
       <select name="bulan" id="bulan">
            <option value="">Semua(bln)</option>
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
       <select name="tahun" id="bulan">
            <option value="">Semua(thn)</option>
                <?php 
                    $mulai = date('Y') - 2;
                    for($i = $mulai; $i < $mulai + 10; $i++ ):
                ?>
            <option value="<?= $i ?>"><?= $i ?></option>
                <?php endfor ?>
       </select>
       <button type="submit" name="submit" class="button-primary">Tampilkan</button>
    </form>

</div>
<div style="overflow-x:auto;">
    <table id="example">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Pemasukan</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <?php $i = 1; foreach($pemasukan as $p) : ?>
            <tbody>
                <tr>
                    <td><?= $i++ ?></td>
                    <td><?= $p['tanggal_pemasukan'] ?></td>
                    <td><?= number_format($p['nominal']) ?></td>
                    <td><?= $p['keterangan'] ?></td>
            </tbody>
        <?php endforeach ?>
    </table>
</div>