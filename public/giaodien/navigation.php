<?php
include("giaodien/cart.php");
include("giaodien/deliveryInfor.php");
?>
<nav class="navbar navbar-expand-lg navbar-light menu " id="navbar">

    <img src="images/Ilogo.png" class="navbar-brand img-fluid  ">

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link " href="index.php" style="color: #fff">TRANG CHỦ <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="all_product.php">
                    SẢN PHẨM</a>
            </li>
        </ul>
        <div class="nav-item icon right">
            <form action="giaodien/search.php" method="post">
                <input class="search" type="text" style="color: #333;" placeholder="Tìm Kiếm..." name="search_product">
                <button class="btn btn-outline-success my-2 my-sm-0 openBtn  " type="submit" name="search_submit"><i class="fa fa-search  text-light"></i></button>
            </form>
        </div>
        <div class="nav-item icon " style="margin-right: 5ex;" onclick="showCartContainer()">
            <a class="icon-button"><i class="fas fa-cart-plus"></i></a>
        </div>
    </div>
</nav>
<style>
    .search{
        margin-top: 3px;
    }
    .right{
        margin-left: 730px !important;
    }

    .container-fluid .menu {
        position: sticky;
        top: 0;
        padding: 0;
        background: #333;
        z-index: 8;

    }

    .container-fluid .menu .navbar-toggler {
        background-color: #eee;
        border: 2px solid #000;

    }

    .container-fluid nav a {
        font-size: 19px;
        font-weight: bold;
        font-family: Time new Roman;
        text-shadow: 0 0 1px #000000;
    }

    .container-fluid .menu .navbar-brand {
        width: 3.4%;
        margin: 0 2ex;
        color: #ff0000;

    }

    .container-fluid .menu .collapse,
    .container-fluid .menu .collapse .navbar-nav {
        padding: 0;
        margin: 0;

    }

    .container-fluid .menu .collapse .navbar-nav .nav-item {
        height: 100%;
        margin: 0 1.5ex;
    }

    .container-fluid .menu .collapse li.active {
        background-color: #ff0000;
    }

    .container-fluid .menu .collapse .navbar-nav .nav-item .nav-link {
        margin: 5px 0;
        color: #fff;
        font-family: Arial, Helvetica, sans-serif;

    }

    .container-fluid .menu .collapse ul {
        margin-top: 0;
        margin-bottom: 0;
    }

    .container-fluid .menu .collapse ul li a:hover {
        color: #fff;
    }

    .container-fluid nav div ul li:hover:not(.active) {
        background-color: #4CAF50;

    }


    .openBtn {
        cursor: pointer;
        border: 1px solid #000;
        border-radius: 3ex;
        float: right;
    }

    .fa-circle {
        font-size: 1ch;
        vertical-align: center;
        margin-right: 8px;
    }

    .container-fluid .menu .icon .icon-button i.fas {
        font-size: 3.3ex;
        margin: 0.6ex;
        text-shadow: none;
        color: #fff;

    }

    .container-fluid nav .icon .icon-button i.fas:hover {
        color: #ffff00;

    }

    .container-fluid nav div form button.btn {
        border-radius: 7ex;
        margin-right: 1ex;
    }
</style>