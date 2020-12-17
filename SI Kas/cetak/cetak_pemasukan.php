<?php
    include "../config/session.php";
    include "../config/config.php";

    $pemasukan = query("SELECT * FROM pemasukan ORDER BY tanggal_pemasukan ASC");

    if(isset($_POST['cetak'])){
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/style.css">
    <title>Cetak Pemasukan</title>
</head>
<body>
<div style="overflow-x:auto;">
    <table border="1">
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
                </tr>
            </tbody>
        <?php endforeach ?>
    </table>
</div>
<script>
    window.print();
</script>
<script src="../src/formatRupiah.js"></script>
</body>
</html>