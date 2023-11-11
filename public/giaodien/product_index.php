<style>
    .product-list {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    .product-item {
        width: 250px;
        height: 300px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        padding: 10px;
    }

    .product-img {
      width: 150px;
      height: 100px;
    }
</style>

<div class="product-list">
    
    <?php
        // Kết nối cơ sở dữ liệu
        

        // Truy vấn danh sách sản phẩm
        $query = "SELECT * FROM bestseller";
        $result = mysqli_query($conn, $query);

        // Hiển thị danh sách sản phẩm
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='product-item'>";
            echo "<h3>".$row['name']."</h3>";
            echo "<p>Giá: ".$row['price']."</p>";
            echo "<img src='images/product/".$row['image']."' class='product-img'>";
            echo "  <form action='product.php?id=".$row['id']."' method='post'>
                        <input type='submit' value='Xem chi tiết'>
                    </form>";
            echo "</div>";
        }

        // Đóng kết nối cơ sở dữ liệu
        //mysqli_close($conn);
    ?>
    </div>