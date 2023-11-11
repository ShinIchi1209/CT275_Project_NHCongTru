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

    <div class="product">
        <?php
            // Kết nối cơ sở dữ liệu
            require_once 'db_connect.php';

            // Lấy thông tin sản phẩm từ URL
            $product_id = $_GET['id'];
            $query = "SELECT * FROM products WHERE id = $product_id";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_assoc($result);

            // Hiển thị thông tin chi tiết sản phẩm
            echo "<h1>".$row['name']."</h1>";
            echo "<p>Giá: ".$row['price']."</p>";
            echo "<img src='images/product/".$row['image']."'>";

            // Đóng kết nối cơ sở dữ liệu
            mysqli_close($conn);
        ?>
        <form action="cart.php" method="post">
        <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
        <input type="number" name="quantity" value="1" min="1">
        <input type="submit" value="Thêm vào giỏ hàng">
    </form>
    </div>
    
    <?php require("giaodien/footer.php") ?>
</body>
</html>
