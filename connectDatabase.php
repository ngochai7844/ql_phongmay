<?php
$server = 'localhost';
$user = 'root';
$pass = '';
$database = 'ql_phong_may';

$conn = new mysqLi($server, $user, $pass, $database);

if ($conn) {
echo "Kết nối thành công!";
} else {
    echo "Kết nối thất bại";
}