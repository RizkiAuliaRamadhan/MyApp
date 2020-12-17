<?php 
    $user = query("SELECT * FROM user");
?>

<h1 style="text-align: center;">Data User</h1>
<a href="registrasi.php" class="button-primary">Tambah User</a>
<br><br>
<div style="overflow-x:auto;">
    <table id="example">
        <thead>
            <tr>
                <th>No</th>
                <th>Username</th>
                <th>Level</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <?php $i = 1; foreach($user as $u) : ?>
            <tbody>
                <tr>
                    <td><?= $i++ ?></td>
                    <td><?= $u['username'] ?></td>
                    <td><?= $u['level'] ?></td>
                    <td>
                        <a href="index.php?view=hapus_user&id=<?= $u['id'] ?>" onclick="return confirm('yakin mau dihapus?')" style="color: red;">Hapus</a>
                    </td>
                </tr>
            </tbody>
        <?php endforeach ?>
    </table>
</div>