<?php 

$connect = mysqli_connect("localhost","root","","app_kas");

//menampikan data
function query($query){
    global $connect;

    $result = mysqli_query($connect, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

//menambah data pemasukan
function tambah_pemasukan($data){
    global $connect;

    $keterangan = htmlspecialchars($data["keterangan"]);
    $nominal = htmlspecialchars($data["total_pemasukan"]);
    $tanggal_masuk = htmlspecialchars($data["tanggal_masuk"]);

    $query = "INSERT INTO pemasukan
                VALUES
                ('','$nominal','$keterangan','$tanggal_masuk')
                ";
    mysqli_query($connect, $query);   

    return mysqli_affected_rows($connect);
}

//menambah data pengeluaran
function tambah_pengeluaran($data){
    global $connect;

    $keterangan = htmlspecialchars($data["keterangan"]);
    $nominal = htmlspecialchars($data["total_pengeluaran"]);
    $tanggal_keluar = htmlspecialchars($data["tanggal_keluar"]);

    $query = "INSERT INTO pengeluaran
                VALUES
                ('','$nominal','$keterangan','$tanggal_keluar')
                ";
    mysqli_query($connect, $query);  
    
    return mysqli_affected_rows($connect);
}

//hapus data pemasukan
function hapus_pemasukan($id){
    global $connect;

    mysqli_query($connect,"DELETE FROM pemasukan WHERE id_pemasukan = $id ");

    return mysqli_affected_rows($connect);
}

//hapus data pengeluaran
function hapus_pengeluaran($id){
    global $connect;

    mysqli_query($connect,"DELETE FROM pengeluaran WHERE id_pengeluaran = $id ");

    return mysqli_affected_rows($connect);
}

function update_pemasukan($data){
    global $connect;

    $id = $data['id_pemasukan'];
    $keterangan = htmlspecialchars($data["keterangan"]);
    $nominal = htmlspecialchars($data["total_pemasukan"]);
    $tanggal_masuk = htmlspecialchars($data["tanggal_masuk"]);

    $query = "UPDATE pemasukan SET
                keterangan = '$keterangan',nominal = '$nominal',tanggal_pemasukan = '$tanggal_masuk' WHERE id_pemasukan = $id ";
    mysqli_query($connect, $query);   

    return mysqli_affected_rows($connect);
}

function update_pengeluaran($data){
    global $connect;

    $id = $data['id_pengeluaran'];
    $keterangan = htmlspecialchars($data["keterangan"]);
    $nominal = htmlspecialchars($data["total_pengeluaran"]);
    $tanggal_pengeluaran = htmlspecialchars($data["tanggal_keluar"]);

    $query = "UPDATE pengeluaran SET
                keterangan = '$keterangan',nominal = '$nominal',tanggal_pengeluaran = '$tanggal_pengeluaran' WHERE id_pengeluaran = $id ";
    mysqli_query($connect, $query);   

    return mysqli_affected_rows($connect);
}

