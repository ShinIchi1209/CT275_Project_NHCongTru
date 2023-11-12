<!DOCTYPE html>
<html>
<head>
    <style>
        .slider-container {
            width: 100%;
            overflow: hidden;
            position: relative;
        }
        
        .slider {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }
        
        .product {
            flex: 0 0 480px;
            margin-right: 10px;
            background-color: #f2f2f2;
            padding: 20px;
        }
        
        .arrow {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 40px;
            height: 40px;
            background-color: #4CAF50;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
        }
        
        .arrow-left {
            left: 10px;
        }
        
        .arrow-right {
            right: 10px;
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
        .product-img {
            width: 100%;
            height: 300px;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="slider-container">
        <div class="slider">
            <?php
                $query = "SELECT * FROM bestseller";
                $result = mysqli_query($conn, $query);

                // Hiển thị danh sách sản phẩm
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<div class='product'>";
                    echo "<h3 class='product-title'>".$row['name']."</h3>";
                    echo "<p class='product-description'>Giá: ".$row['price']."</p>";
                    echo "<img src='images/product/".$row['image']."' class='product-img'>";
                    echo "  <form action='product.php?id=".$row['id']."' method='post'>
                                <input class='product-button' type='submit' value='Xem chi tiết'>
                            </form>";
                    echo "</div>";
                }
            ?>
            <form action='all_product.php' method='post' class="d-flex justify-content-center align-items-center">
            <input type='submit' value='Xem Thêm' class="product-button">
            </form>
        </div>
        <div class="arrow arrow-left">&lt;</div>
        <div class="arrow arrow-right">&gt;</div>

    </div>
    
    
    
    <script>
        const slider = document.querySelector('.slider');
        const arrowLeft = document.querySelector('.arrow-left');
        const arrowRight = document.querySelector('.arrow-right');
        const productWidth = document.querySelector('.product').offsetWidth;
        let currentPosition = 0;
        
        arrowLeft.addEventListener('click', () => {
            if (currentPosition > 0) {
                currentPosition -= productWidth + 20;
            } else {
                currentPosition = slider.scrollWidth - slider.offsetWidth;
            }
            slider.style.transform = `translateX(-${currentPosition}px)`;
        });
        
        arrowRight.addEventListener('click', () => {
            const sliderWidth = slider.offsetWidth;
            const maxPosition = slider.scrollWidth - sliderWidth;
            
            if (currentPosition < maxPosition) {
                currentPosition += productWidth + 20;
            } else {
                currentPosition = 0;
            }
            slider.style.transform = `translateX(-${currentPosition}px)`;
        });
    </script>
</body>
</html>
