<?php
session_start();

// Kiểm tra xem người dùng đã đăng nhập chưa
if (!isset($_SESSION['username'])) {
    // Chưa đăng nhập, chuyển hướng về trang đăng nhập
    header('Location: index.php');
    exit();
}

// Hiển thị nội dung trang admin
echo "<h1>Trang Admin</h1>";
echo "<p>Xin chào, ".$_SESSION['username']."!</p>";
echo "<a href='logout.php'>Đăng xuất</a>";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Trang Admin</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            color: #333;
            text-align: center;
        }

        .admin-panel {
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 4px;
            padding: 20px;
        }

        .admin-panel h2 {
            color: #333;
            margin-bottom: 10px;
        }

        .admin-panel p {
            color: #666;
            line-height: 1.5;
        }

        .admin-button {
            display: inline-block;
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 4px;
        }

        .admin-button:hover {
            background-color: #0056b3;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
    <div class="container">
        <div class="admin-panel">
            <h2>Quản lý sản phẩm</h2>
            <div class="product">
                <?php
                    // Kết nối cơ sở dữ liệu
                    require_once '../db_connect.php';

                    // Truy vấn danh sách sản phẩm
                    $query = "SELECT * FROM products";
                    $result = mysqli_query($conn, $query);

                    // Hiển thị danh sách sản phẩm
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<div class='product'>";
                        echo "<h3>".$row['name']."</h3>";
                        echo "<p>Giá: ".$row['price']."</p>";
                        echo "<img src='../".$row['image']."'>";
                        echo "</div>";
                    }

                    // Đóng kết nối cơ sở dữ liệu
                    mysqli_close($conn);
                ?>
            </div>
        </div>
    </div>
</body>
</html>
