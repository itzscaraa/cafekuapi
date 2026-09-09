<?php
include('koneksi.php');

//saat menggunakan POST
$data = json_decode(file_get_contents('php://input'), true);

$query ="INSERT INTO produk(namaproduk, harga, stok) VALUES (?,?,?)";

$stmt = mysqli_prepare($conn, $query);

if ($stmt) {
    $namaproduk=$data['namaproduk'];
    $harga=$data['harga'];
    $stok=$data['stok'];

    mysqli_stmt_bind_param($stmt,'sii',$namaproduk,$harga,$stok);

    if (mysqli_stmt_execute($stmt)) {
        echo json_encode(['STATUS'=>'BERHASIL', 'PESAN'=>'DATA BERHASIL DISIMPAN', 'DATA'=>[]]);
    }else{
        echo json_encode(['STATUS'=>'GAGAL', 'PESAN'=>'DATA GAGAL DISIMPAN','DATA'=>[]]);
    }
}else{
    echo json_encode(['STATUS'=>'GAGAL', 'PESAN'=>'MASALAH KONEKSI', 'DATA'=>[]]);
}
?>