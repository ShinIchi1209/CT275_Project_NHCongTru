<?php
session_start();
function register()
{
    if (!empty($_POST)) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $password = md5($password);
        $email = $_POST['email'];
        include("../db_connect.php");

        //thuc hien truy van du lieu - chen du lieu vao database 2 bang taikhoan va khachhang
        $checkemail = "SELECT * from taikhoan WHERE EMAIL='" . $email . "'  ";
        //echo $checkemail
        $query = "INSERT INTO taikhoan (TEN_DANG_NHAP,MAT_KHAU,EMAIL,STATUS)
                VALUE('" . $username . "','" . $password . "','" . $email . "','1')";
        $data = array();
        $data = mysqli_fetch_array(mysqli_query($conn, $checkemail));
        if ($data == null) {
            mysqli_query($conn, $query);
            echo 1;
            exit();
        } else {
            echo 0;
            exit();
        }

        //dong kêt nối
        $connect->close();
    }
}
register();
