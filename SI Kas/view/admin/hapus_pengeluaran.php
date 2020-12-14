<?php 

$id = $_GET['id_pengeluaran'];

if(hapus_pengeluaran($id) > 0){
    echo"
        <script>
            alert('Data berhasil dihapus');
            document.location.href='index.php?view=pengeluaran';
        </script>
    ";
}else{
    echo"
        <script>
            alert('Data gagal dihapus !!');
            document.location.href='index.php?view=pengeluaran';
        </script>
    ";
}