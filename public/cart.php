<?php
session_start();
include("db_connect.php");

?>


<!DOCTYPE html>
<html>
<head>
  <title>Gear Tech</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" />

</head>
<body>
    <?php require("giaodien/header.php") ?>
    <?php require("giaodien/navigation.php") ?>

    <?php

        // Kiểm tra nếu giỏ hàng chưa được khởi tạo, tạo mới giỏ hàng
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }

        // Kiểm tra nếu có sản phẩm được thêm vào giỏ hàng
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $product_id = $_POST['product_id'];
            $quantity = $_POST['quantity'];

            // Thêm sản phẩm vào giỏ hàng
            $_SESSION['cart'][$product_id] = $quantity;
        }

        // Lấy thông tin sản phẩm từ giỏ hàng
        $product_ids = array_keys($_SESSION['cart']);
        $product_ids_string = implode(",", $product_ids);
        $query = "SELECT * FROM products WHERE id IN ($product_ids_string)";
        $result = mysqli_query($conn, $query);
        if (!$result) {
            die("Lỗi truy vấn: " . mysqli_error($conn));
        };

        // Hiển thị thông tin giỏ hàng
        while ($row = mysqli_fetch_assoc($result)) {
            $product_id = $row['id'];
            $quantity = $_SESSION['cart'][$product_id];

            echo "<div class='cart-item'>";
            echo "<h3>".$row['name']."</h3>";
            echo "<p>Giá: ".$row['price']."</p>";
            echo "<p>Số lượng: ".$quantity."</p>";
            echo "</div>";
        }

        // Đóng kết nối cơ sở dữ liệu
        mysqli_close($conn);
    ?>
    <?php require("giaodien/footer.php") ?>
</body>
</html>
