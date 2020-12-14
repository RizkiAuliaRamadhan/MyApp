<?php
    include "../config/session.php";
    include "../config/config.php";

    $pengeluaran = query("SELECT * FROM pengeluaran ORDER BY tanggal_pengeluaran ASC");

    if(isset($_POST['cetak'])){
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/style.css">
    <title>Cetak Pengeluaran</title>
</head>
<body>
<div style="overflow-x:auto;">
    <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Pengeluaran</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <?php $i = 1; foreach($pengeluaran as $p) : ?>
            <tbody>
                <tr>
                    <td><?= $i++ ?></td>
                    <td><?= $p['tanggal_pengeluaran'] ?></td>
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