<?php 

$id = $_GET['id_pemasukan'];

if(hapus_pemasukan($id) > 0){
    echo"
        <script>
            alert('Data berhasil dihapus');
            document.location.href='index.php?view=pemasukan';
        </script>
    ";
}else{
    echo"
        <script>
            alert('Data gagal dihapus !!');
            document.location.href='index.php?view=pemasukan';
        </script>
    ";
}