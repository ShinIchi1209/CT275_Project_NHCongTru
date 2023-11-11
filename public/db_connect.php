<?php
    // Kết nối cơ sở dữ liệu
    $conn = mysqli_connect("localhost", "root", "", "geartech");

    // Kiểm tra kết nối
    if (!$conn) {
        die("Kết nối cơ sở dữ liệu thất bại: " . mysqli_connect_error());
    }
?>
