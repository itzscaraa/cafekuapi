<?php 
$host='localhost';
$user='root';
$pass='';
$db='cafeku';
$port='3306';

$conn = mysqli_connect($host,$user,$pass,$db,$port);

if (mysqli_connect_errno()) {
    echo 'ada error'. mysqli_connect_error();
}else{
    echo 'berhasil';
}
?>