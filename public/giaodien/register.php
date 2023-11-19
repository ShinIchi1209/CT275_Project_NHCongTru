<?php
session_start();
if (isset($_SESSION['mail_error']) && !empty($_SESSION['mail_error'])) $checkmail =  $_SESSION['mail_error'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="icon" href="../images/Ilogo.png" type="image/png" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Đăng Ký Tài Khoản </title>
  <link rel="stylesheet" type="text/css" href="../css/register.css">
  <script src="../js/validate.js"> </script>
  <script src="https://code.jquery.com/jquery-3.5.0.min.js"></script>
  </body>
  <div class="main">

    <form action="#" method="post" class="form" id="form-1">
      <h3 class="heading">Đăng Ký Tài Khoản</h3>
      <p class="desc"></p>

      <div class="spacer"></div>

      <div class="form-group">
        <label for="username" class="form-label">Họ và Tên:</label>
        <input id="username" name="username" type="text" placeholder="VD: Minh Trung" class="form-control">
        <span class="form-message" id="user-error" style="color:red"></span>
      </div>

      <div class="form-group">
        <label for="email" class="form-label">Email:</label>
        <input id="email" name="email" type="text" placeholder="VD: email@domain.com" class="form-control">
        <span class="form-message" id="email-error" style="color:red"></span>
      </div>

      <div class="form-group">
        <label for="pwd" class="form-label">Mật Khẩu:</label>
        <input id="password" name="password" type="password" placeholder="Nhập mật khẩu" class="form-control">
        <span class="form-message" id="pass-error" style="color:red"></span>
      </div>
      <div class="form-group">
        <label for="password_confirmation" class="form-label">Nhập lại Mật Khẩu</label>
        <input id="password_confirmation" name="password_confirmation" placeholder="Nhập lại mật khẩu" type="password" class="form-control">
        <span class="form-message" id="pass-confir-error" style="color:red"></span>
      </div>

      <button type="button" id="register_submit" name="register_submit" class="form-submit2">Đăng Ký</button>
      <form action='login.php' method='post' class="d-flex justify-content-center align-items-center">
        <input type='submit' value='Quay Lại' class="more-button">
      </form>
    </form>



  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      Validator({
        form: '#form-1',
        formGroupSelector: '.form-group',
        errorSelector: '.form-message',
        rules: [
          Validator.isRequired('#username', 'Vui lòng nhập tên đầy đủ của bạn'),
          Validator.isEmail('#email'),
          Validator.minLength('#password', 5),
          Validator.isRequired('#password_confirmation'),
          Validator.isConfirmed('#password_confirmation', function() {
            return document.querySelector('#form-1 #password').value;
          }, 'Mật khẩu nhập lại không chính xác')
        ],
      });
    });
  </script>
  <script type="text/javascript">
    $(document).ready(function() {
      $("#email").change(function() {
        var email_error = $("#email-error");
        email_error.html("");
        $.ajax({
          url: 'check_mail_register.php',
          method: 'POST',
          data: $('#form-1').serialize(),
          success: function(response) {
            console.log(response);
            if (response == 0) {
              email_error.html("Email đã được đăng ký.Vui lòng chọn Email khác");
            } else email_error.html("");

          }

        })

      });

    });
  </script>

  <script type="text/javascript">
    $(document).ready(function() {
      $("#register_submit").click(function() {
        var username = $("#username").val();
        var email = $("#email").val();
        var password = $("#password").val();
        var password_confirmation = $("#password_confirmation").val();
        var error = $("#error");
        var pass_error = $("#pass-confir-error");
        var pass_confir_error = $("#pass-error");
        var user_error = $("#user-error");
        var email_error = $("#email-error");

        user_error.html("");
        email_error.html("");
        pass_error.html("");
        pass_confir_error.html("");

        if (username == "") {
          user_error.html("Tên người dùng không được để trống");
          return false;
        }
        if (email == "") {
          email_error.html("Email không được để trống");
          return false;
        }
        if (password == "") {
          pass_error.html("Mật khẩu không được để trống");
          return false;
        }
        if (password_confirmation == "") {
          pass_confir_error.html("Mật khẩu xác nhận không được để trống");
          return false;
        }
        $.ajax({
          url: './action_register.php',
          method: 'POST',
          data: $('#form-1').serialize(),
          success: function(response) {
            console.log(response);
            if (response == 1) {
              alert("Đăng Ký Thành Công !!! ");
              window.location = "login.php";
            } else {
              email_error.html("Email đã được đăng ký.Vui lòng chọn Email khác");
            }
          }
        })
      });
    });
  </script>

  </body>

</html>