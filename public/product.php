<!DOCTYPE html>
<html>

<head>
    <title>Gear Tech</title>
    <link rel="icon" href="images/Ilogo.png" type="image/png" />
    <link rel="stylesheet" type="text/css" href="index.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" />
</head>

<body>
    <div class="container-fluid  ">
        <?php require("giaodien/header.php") ?>
        <?php require("giaodien/navigation.php") ?>
    </div>

    <?php
    // Kết nối cơ sở dữ liệu
    require_once 'db_connect.php';

    // Lấy thông tin sản phẩm từ URL
    $product_id = $_GET['id'];
    $query = "SELECT * FROM products WHERE id = $product_id";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);


    // Đóng kết nối cơ sở dữ liệu
    mysqli_close($conn);
    ?>

    <?php
    $sum = $row['soluong'];
    if ($sum > 0) {
        $checksoluong = "Còn Hàng";
        $notification = "";
        $disableQuanlity = "";
        $disable = "";
    } else {
        $checksoluong = "Hết Hàng";
        $disable = "disabled";
        $notification = "Sản Phẩm Đã Hết! Xin Quý Khách Vui Lòng Chọn Sản Phẩm Khác !";
        $disableQuanlity = "disabled";
    }

    ?>

    <div class="detail">
        <div style="margin: 30px 0;" class="row chitiet">
            <div class="col-md-6 col-sm-12 images" style="padding-right: 5ex;">
                <div class="wrap" style="padding-right: 5ex;">
                    <img id="myImgDetail" class="item img-fluid" src="images/product/<?php echo $row['image'] ?>" id="img-product-detail">
                </div>
            </div>
            <div class="col-md-6 col-sm-12" style="padding-right: 6ex;">
                <div class="text-center titleproduct"><?php echo $row['name'] ?></div>
                <div class="price-chitiet">
                    <span>Giá bán:</span>
                    <strong style="color: red;font-size: 29px"> <?php echo number_format($row['price']); ?> VNĐ</strong>
                </div>
                <div class="possibility-chitiet">
                    <span style="    color: #5F4C0B;font-weight: bold;">Tình trạng:</span>
                    <strong class="warn"><?php echo $checksoluong ?></strong>( Còn: <?php echo $sum ?> sản phẩm )
                </div>
                <hr style=" boder: 2ex solid rgb(19, 17, 17); margin: 2ex 3px;">
                <div class="details">
                    <span style="text-decoration: underline;">Điểm nổi bật</span>
                    <p> <?php echo $row['description'] ?> </p>
                </div>
                <div class="qty-chitiet">
                    <label class="qty-name font-weight-bold">SỐ LƯỢNG: </label>
                    <div class="buttons_added">
                        <input <?php echo $disableQuanlity; ?> style="cursor: pointer;" class="minus is-form" type="button" value="-" onclick="adjustQuanlity(this)">
                        <input <?php echo $disableQuanlity; ?> aria-label="quantity" id="txQuanlity_detail" class="input-qty" min="1" name="quanlity" type="number" value=1 onchange="validateQuanlity(this)">
                        <input <?php echo $disableQuanlity; ?> style="cursor: pointer;" class="plus is-form" type="button" value="+" onclick="adjustQuanlity(this)">
                    </div>
                </div>
                </form>
                <div class=" button-chitiet row">
                    <button type="button" <?php echo $disable ?> id="btAddCart" class="btn btn-outline-primary col-md-4  col-sm-12" value="add" style="float: left;" onclick="checkQuanlity()"><a style="    font-weight: bold;text-decoration: none;color: #3B0B39"> Thêm Vào Giỏ Hàng</a> </button>
                </div>

                <span class="sold-out"><?php echo $notification ?> </span>
                </br></br>
            </div>
        </div>
    </div>

    <?php require("giaodien/footer.php") ?>

    <script>
        function adjustQuanlity(obj) {
            var op = obj.value;
            var MAX = parseInt(<?php echo $row['soluong'] ?>);
            var txQuanlity = document.getElementById("txQuanlity_detail");
            if (op == '+') {
                if (txQuanlity.value < MAX)
                    txQuanlity.value++;
                else
                    alert("Số lượng đã đạt tối đa");
            } else
            if (txQuanlity.value > 0)
                txQuanlity.value--;
            if (document.getElementById("txQuanlity_detail").value == 0)
                document.getElementById("btAddCart").disabled = "disabled";
            else
                document.getElementById("btAddCart").disabled = "";
        }
    </script>

    <style>
        /*detail*/
        .container-fluid .detail {
            padding: 3ex;
            justify-content: center;
            text-align: justify;
        }

        .container-fluid .chitiet {
            width: 1300px;
            margin: auto;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 2ex;
        }

        .container-fluid .chitiet .warn {
            color: #1f1cfd;
            font-size: 18px;
        }

        .container-fluid .chitiet .wrap .row {
            margin-top: 2ex;
        }

        .container-fluid .chitiet .wrap .row img {
            border: 2px solid #555;
            width: 90%;

        }

        .container-fluid .chitiet .images {
            padding-right: 8ex;
            width: auto;
            height: auto;
        }

        .container-fluid .chitiet .wrap .item {
            border: 1px solid #ddd;
            box-shadow: 2px 2px 5px #ddd;

        }

        .container-fluid .chitiet .wrap .row img:hover {
            box-shadow: 3px 3px 30px #eee;
        }


        .details {
            margin: 0 0 4%;
        }

        .buttons_added {
            margin-bottom: 2%;
        }

        .size-chitiet {
            margin-bottom: 2%;
        }

        .ega-swatch__heading {
            display: inline-block;
            margin-right: 32px;
            margin-top: 1%;
            font-size: 16px;
            color: #0E1C22;
            opacity: 0.6;
            font-weight: normal;
            vertical-align: top;
        }

        .ega-swatch__element {
            margin: 8px 12px 0 0;
        }

        .btn-chitiet {
            width: 4%;
            cursor: pointer;
        }

        .wrap {
            position: relative;
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
        }

        .item {
            width: 100%;
            height: 500px;
            margin: 0 15px;
            position: relative;
            overflow: hidden;
        }

        .img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
        }

        /*nút tăng giảm số lượng css */
        /* <![CDATA[ */
        .buttons_added {
            opacity: 1;
            display: inline-block;
            display: -ms-inline-flexbox;
            display: inline-flex;
            white-space: nowrap;
            vertical-align: top;

        }

        .is-form {
            overflow: hidden;
            position: relative;
            background-color: #f9f9f9;
            height: 2.2rem;
            width: 1.9rem;
            padding: 0;
            text-shadow: 1px 1px 1px #fff;
            border: 1px solid #ddd;
        }

        .is-form:focus,
        .input-text:focus {
            outline: none;
        }

        .is-form.minus {
            border-radius: 4px 0 0 4px;
        }

        .is-form.plus {
            border-radius: 0 4px 4px 0;
        }

        .input-qty {
            height: 2.2rem;
            text-align: center;
            font-size: 1rem;
            display: inline-block;
            vertical-align: top;
            margin: 0px;
            border-top: 1px solid black;
            border-bottom: 1px solid black;
            border-left: 1px solid black;
            border-right: 1px solid black;
            padding: 0px;
        }

        .input-qty::-webkit-outer-spin-button,
        .input-qty::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* ]]> */
        .qty-name {
            display: inline-block;
            margin-right: 32px;
            font-size: 16px;
            color: #0E1C22;
            opacity: 0.6;
            font-weight: normal;
            vertical-align: top;
            margin-top: 8px;
        }

        .select-size {
            width: auto;
            font-weight: bold;
            margin-top: -2%;
            margin-bottom: 3%;

        }

        /*image-details*/
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .column {
            float: left;
            width: 25%;
            padding: 10px;
        }

        .column img {
            opacity: 0.8;
            cursor: pointer;
        }

        .column img:hover {
            opacity: 1;
        }

        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        .container {
            position: relative;
            display: none;
        }

        #imgtext {
            position: absolute;
            bottom: 15px;
            left: 15px;
            color: white;
            font-size: 20px;
        }

        .closebtn {
            position: absolute;
            top: 100px;
            right: 105px;
            color: white;
            font-size: 35px;
            cursor: pointer;
        }

        .btn-outline-dark {
            font-weight: bold;
            margin-right: 3px;
            justify-content: center;
            padding: 0 4px 0 2px;
            border-radius: 3px;
        }

        .titleproduct {
            font-size: 4ex;
            font-family: 'Times New Roman', Times, serif;
            font-weight: bold;
        }

        .sold-out {
            color: #ff0000;
            font-weight: bold;
            font-size: 18px;
        }
    </style>
</body>

</html>