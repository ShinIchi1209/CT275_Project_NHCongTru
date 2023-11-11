<!DOCTYPE html>
<html>
<head>
    <title>Trang Admin</title>
    <style>
        /* CSS code */
    </style>
</head>
<body>
    <div class="container">
        <h1>Trang Admin</h1>
        <?php
        session_start();
        if (isset($_SESSION['username'])) {
            // Hiển thị nội dung trang admin
            echo "<p>Xin chào, ".$_SESSION['username']."!</p>";
            echo "<a href='logout.php'>Đăng xuất</a>";
        } else {
            // Hiển thị form đăng nhập
            echo "<form action='login.php' method='POST'>";
            echo "<input type='text' name='username' placeholder='Tên đăng nhập' required><br>";
            echo "<input type='password' name='password' placeholder='Mật khẩu' required><br>";
            echo "<input type='submit' value='Đăng nhập'>";
            echo "</form>";
        }
        ?>
    </div>
</body>
</html>
