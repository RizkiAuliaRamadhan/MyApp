<?php 

$pemasukan = query("SELECT SUM(nominal) FROM pemasukan")[0];
$pengeluaran = query("SELECT SUM(nominal) FROM pengeluaran")[0];
$saldo = $pemasukan['SUM(nominal)'] - $pengeluaran['SUM(nominal)'];

$bln = date('m');
$pemasukan_bln = query("SELECT SUM(nominal) FROM pemasukan WHERE MONTH(tanggal_pemasukan) = $bln")[0];
$pengeluaran_bln = query("SELECT SUM(nominal) FROM pengeluaran WHERE MONTH(tanggal_pengeluaran) = $bln")[0];

?>
<h1 style="text-align: center;">Selamat Datang <?= ucfirst($_SESSION["username"]);?></h1>
<div class="flex">    
    <div class="card-info">
        <p>Saldo</p>
        <p>Rp. <?= number_format($saldo) ?></p>
    </div>
</div>
<div class="flex">
    <div class="card-info2">
        <p>Tot. Pemasukan</p>
        <p>Rp. <?= number_format($pemasukan['SUM(nominal)']) ?></p>
    </div>
    <div class="card-warning">
        <p>Tot. Pengeluaran</p>
        <p>Rp. <?= number_format($pengeluaran['SUM(nominal)']) ?></p>
    </div>
</div>
<div class="flex">
    <div class="card-info2">
        <p>Pemasukan Bulan Ini</p>
        <p>Rp. <?= number_format($pemasukan_bln['SUM(nominal)']) ?></p>
    </div>
    <div class="card-warning">
        <p>Pengeluaran Bulan Ini</p>
        <p>Rp. <?= number_format($pengeluaran_bln['SUM(nominal)']) ?></p>
    </div>
</div>
<div class="margin-bottom"></div>