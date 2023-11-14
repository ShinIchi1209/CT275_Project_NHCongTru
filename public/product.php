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

    <div class="container">
        <div class="product">
            <div class="product-image">
                <?php
                    // Kết nối cơ sở dữ liệu
                    require_once 'db_connect.php';

                    // Lấy thông tin sản phẩm từ URL
                    $product_id = $_GET['id'];
                    $query = "SELECT * FROM products WHERE id = $product_id";
                    $result = mysqli_query($conn, $query);
                    $row = mysqli_fetch_assoc($result);

                    // Hiển thị thông tin chi tiết sản phẩm
                    echo "<img src='images/product/".$row['image']."' alt='Product Image'>";
                    
                    // Đóng kết nối cơ sở dữ liệu
                    mysqli_close($conn);
                ?>
            </div>
            <div class="product-details">
                <h1 class="product-title"><?php echo $row['name']; ?></h1>
                <p class="product-price">Giá: <?php echo number_format($row['price']); ?> VND</p>
                <form action="cart.php" method="post">
                    <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                    <div class="quantity">
                        <label for="quantity">Số lượng:</label>
                        <input type="number" name="quantity" id="quantity" value="1" min="1">
                    </div>
                    <button type="submit" class="add-to-cart">Thêm vào giỏ hàng</button>
                </form>
            </div>
        </div>
    </div>
    
    <?php require("giaodien/footer.php") ?>
</body>
</html>
