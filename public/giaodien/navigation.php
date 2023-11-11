
<style>
    nav {
        background-color: #222222;
    }

    nav ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
    }

    nav ul li {
        display: inline-block;
    }

    nav ul li a {
        display: block;
        padding: 10px 20px;
        text-decoration: none;
        color: #dddd;
    }

    nav ul li a:hover {
        background-color: #4CAF50;
    }
    nav ul li.search input {
    padding: 5px;
    border: none;
    border-radius: 3px;
    }

    nav ul li.cart {
        position: relative;
    }

    nav ul li.cart a {
        display: block;
        padding: 10px 20px;
        text-decoration: none;
        color: #dddd;
    }

    nav ul li.cart a:hover {
        background-color: #4CAF50;
    }

    nav ul li.cart i {
        margin-right: 5px;
    }
    nav ul li.right {
        float: right;
    }
</style>


<nav>
    <ul>
        <li><a href="index.php">Trang chủ</a></li>
        <li><a href="all_product.php">Sản phẩm</a></li>
        <li><a href="#">Giới thiệu</a></li>
        <li><a href="#">Liên hệ</a></li>
        <li class="search ">
            <input type="text" placeholder="Tìm kiếm">
        </li>
        <li class="cart right">
            <a href="cart.php"><i class="fas fa-shopping-cart"></i></a>
        </li>
    </ul>
</nav>

