<style>
    .product-list {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        grid-gap: 20px;
    }

    .product-box {
        background-color: #f5f5f5;
        border-radius: 10px;
        padding: 20px;
        text-align: center;
    }

    .product-image {
        width: 100%;
        height: 300px;
        object-fit: cover;
        border-radius: 10px;
        margin-bottom: 20px;
    }

    .product-title {
        font-size: 24px;
        margin-bottom: 10px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .product-description {
        font-size: 16px;
        color: #888;
        margin-bottom: 20px;
    }

    .product-button {
        display: inline-block;
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    .product-button:hover {
        background-color: #0056b3;
    }
</style>

<div class="product-list">
    
    <?php
        $query = "SELECT * FROM products";
        $result = mysqli_query($conn, $query);

        // Hiển thị danh sách sản phẩm
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='product-box'>";          
            echo "<img src='images/product/".$row['image']."' alt='Product Image' class='product-image'>";
            echo "<h3 class='product-title'>".$row['name']."</h3>";          
            echo "<p class='product-description'>Giá: ".$row['price']."</p>";   
            echo "<form action='product.php?id=".$row['id']."' method='post'>
                        <input type='submit' value='Xem chi tiết' class='product-button'>
                    </form>";
            echo "</div>";
        }

    ?>
</div>
<form action='all_product.php' method='post' class="d-flex justify-content-center align-items-center">
    <input type='submit' value='Xem Thêm' class='product-button'>
</form>
