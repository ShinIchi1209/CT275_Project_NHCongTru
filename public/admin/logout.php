<?php
session_start();

// Xóa thông tin đăng nhập khỏi session
session_unset();
session_destroy();

// Chuyển hướng về trang đăng nhập
header('Location: index.php');
exit();
?>
