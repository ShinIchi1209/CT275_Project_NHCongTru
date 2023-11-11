<?php
session_start();

// Kiểm tra thông tin đăng nhập
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Kiểm tra thông tin đăng nhập trong cơ sở dữ liệu
    if ($username == 'admin' && $password == 'admin123') {
        // Đăng nhập thành công, lưu thông tin vào session
        $_SESSION['username'] = $username;

        // Chuyển hướng đến trang admin
        header('Location: admin.php');
        exit();
    } else {
        // Đăng nhập thất bại, hiển thị thông báo lỗi
        echo "Tên đăng nhập hoặc mật khẩu không đúng.";
    }
}
?>
