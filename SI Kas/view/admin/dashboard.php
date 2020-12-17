<?php 

$pemasukan = query("SELECT SUM(nominal) FROM pemasukan")[0];
$pengeluaran = query("SELECT SUM(nominal) FROM pengeluaran")[0];
$saldo = $pemasukan['SUM(nominal)'] - $pengeluaran['SUM(nominal)'];

$bln = date('m');
$tahun = date('Y');
$pemasukan_bln = query("SELECT SUM(nominal) FROM pemasukan WHERE MONTH(tanggal_pemasukan) = $bln AND YEAR(tanggal_pemasukan) = $tahun")[0];
$pengeluaran_bln = query("SELECT SUM(nominal) FROM pengeluaran WHERE MONTH(tanggal_pengeluaran) = $bln AND YEAR(tanggal_pengeluaran) = $tahun")[0];

$pemasukan_thn = query("SELECT SUM(nominal) FROM pemasukan WHERE YEAR(tanggal_pemasukan) = $tahun")[0];
$pengeluaran_thn = query("SELECT SUM(nominal) FROM pengeluaran WHERE YEAR(tanggal_pengeluaran) = $tahun")[0];

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
<div class="flex">
    <div class="card-info2">
        <p>Pemasukan Tahun Ini</p>
        <p>Rp. <?= number_format($pemasukan_thn['SUM(nominal)']) ?></p>
    </div>
    <div class="card-warning">
        <p>Pengeluaran Tahun Ini</p>
        <p>Rp. <?= number_format($pengeluaran_thn['SUM(nominal)']) ?></p>
    </div>
</div>
<div class="margin-bottom"></div>