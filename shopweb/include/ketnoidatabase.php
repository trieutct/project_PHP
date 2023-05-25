<?php
$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "quanlysinhvien";
// Khởi tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);
    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }  
return $conn;
?>