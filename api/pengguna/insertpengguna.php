<?php
include('koneksi.php');

//saat menggunakan POST
$data = json_decode(file_get_contents('php://input'), true);

$query ="INSERT INTO pengguna(nama, alamat, nohp) VALUES (?,?,?)";

$stmt = mysqli_prepare($conn, $query);

if ($stmt) {
    $nama=$data['nama'];
    $alamat=$data['alamat'];
    $nohp=$data['nohp'];

    mysqli_stmt_bind_param($stmt,'sss',$nama,$alamat,$nohp);

    if (mysqli_stmt_execute($stmt)) {
        echo json_encode(['STATUS'=>'BERHASIL', 'PESAN'=>'DATA BERHASIL DISIMPAN', 'DATA'=>[]]);
    }else{
        echo json_encode(['STATUS'=>'GAGAL', 'PESAN'=>'DATA GAGAL DISIMPAN','DATA'=>[]]);
    }
}else{
    echo json_encode(['STATUS'=>'GAGAL', 'PESAN'=>'MASALAH KONEKSI', 'DATA'=>[]]);
}
?>