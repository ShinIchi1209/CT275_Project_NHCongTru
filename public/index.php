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
  
  <section>
    <?php require("giaodien/slide_show.php"); ?>

    <h2>Sản phẩm nổi bật</h2>
    <?php require("giaodien/product_top.php"); ?>
    
    <h2>Sản phẩm mới</h2>
    <?php require("giaodien/product_index.php"); ?>
    
  </section>

  <?php require("giaodien/footer.php") ?>
</body>
</html>
