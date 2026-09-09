<?php
include('koneksi.php');

//saat menggunakan POST
//$data = json_decode(file_get_contents('php://input'), true);

$query="SELECT * FROM pengguna where del = 0";
$stmt = mysqli_prepare($conn, $query);

if ($stmt) {
    if (mysqli_stmt_execute($stmt)) {
        $result = mysqli_stmt_get_result($stmt);

        if(mysqli_num_rows($result)>0){
            $datas = array();
            while($row = mysqli_fetch_assoc($result)){
                $datas[]=$row;
                //echo 'nama'. $row['nama']. '<br>';
            }
            echo json_encode(['STATUS'=>'BERHASIL', 'PESAN'=>'','DATA'=>$datas]);
        }else{
            // echo 'Data Kosong';
            echo json_encode(['STATUS'=>'GAGAL','PESAN'=>'DATA KOSONG','DATA'=>[]]);
        }
    } else {
        echo json_encode(['STATUS'=>'GAGAL', 'PESAN'=>'MASALAH KONEKSI','DATA'=>[]]);
    }

} else {
echo json_encode(['STATUS'=>'GAGAL', 'PESAN'=>'MASALAH KONEKSI','DATA'=>[]]);
}
?>