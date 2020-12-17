<?php 

$id = $_GET['id'];

if(hapus_user($id) > 0){
    echo"
        <script>
            alert('Data berhasil dihapus');
            document.location.href='index.php?view=user';
        </script>
    ";
}else{
    echo"
        <script>
            alert('Data gagal dihapus !!');
            document.location.href='index.php?view=user';
        </script>
    ";
}