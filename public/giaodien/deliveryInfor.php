<?php 
	$checkPay=0;
	$connect =new mysqli("localhost","root","","geartech");
	$connect -> set_charset("utf8");
	require_once("dbcontroller.php");
	$db_handle = new DBController();		


	if(isset($_POST["delivery"])){	//ghi du lieu xuong database
		date_default_timezone_set('Asia/Ho_Chi_Minh');	
		$dateBuy=date("Y-m-d h:i:s");
		$queryHD="INSERT INTO ordersp(MA_TK, diachi, sdt, tongtien, ngaylap)";
		$queryHD.=" VALUES('" .$idUser. "', '" .$_POST["address_delInfor"]. "', '" .$_POST["phone_delInfor"]. "', '" .$total_price. "', '" .$dateBuy. "')"; 
		$checkPay=mysqli_query($connect,$queryHD);
		$getIDnew=$db_handle->runQuery("SELECT idorder FROM `ordersp` ORDER BY `ordersp`.`idorder` DESC");
		$IDnew=$getIDnew[0]["idorder"];
		foreach($_SESSION["cart_item"] as $k=>$v){
			$getInventory=$db_handle->runQuery("SELECT soluong FROM products WHERE id='".$_SESSION["cart_item"][$k]["id"]."'");
			$inventory=$getInventory[0]["soluong"];
			$newQuanlity=$inventory-$_SESSION["cart_item"][$k]["quanlity"];
			$totalprice=($_SESSION["cart_item"][$k]["price"]+$discount[$k]["price"])*$_SESSION["cart_item"][$k]["quanlity"];
			mysqli_query($connect,"UPDATE products SET soluong=$newQuanlity WHERE id='".$_SESSION["cart_item"][$k]["id"]."'");
		}
	}
?>
<style>
	#delInfor_container{
		width:25%;
		height:270px;
		background-color:white;
		box-shadow:0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
		margin:110px 0 0 37.5%;
		position:fixed;
		z-index:11;
		display:none;
		top:150px;
	}
	#delInfor_container input[type=text]{
		width:90%;
	}
	#delInfor_XSign{
		position:absolute;
		margin-left:97%;
		cursor:pointer
	}
	#delInfor_title{
		width:100%;
		height:50px;
		background-color:#09F;
		color:white;
		text-align:center;
		position:relative
	}
	#btPay{
		background-color:#09F; 
		color:white; 
		border:solid 2px black
	}
	#btPay:active{
		background-color:blue;
	}	
</style>
<script>
	function checkDelInfor(){
		var address, phone;
		address=document.getElementById("txAddress_delInfor").value;
		phone=document.getElementById("txPhone_delInfor").value;
		if(address==""){
			alert("Vui lòng nhập địa chỉ");
			return 0;
		}
		if(phone==""){
			alert("Vui lòng nhập số điện thoại");
			return 0;
		}
		var patt=/^\d+/;
		if(!phone.match(patt)){
			alert("Số điện thoại không hợp lệ");
			return 0;
		}
		delInfor_form.submit();
	}
	function hideDelInfor(){
		document.getElementById("delInfor_container").style.display="none";
	}
</script>
<div id="delInfor_container">
	<div id="delInfor_title">
    	<div id="delInfor_XSign" onclick="hideDelInfor()">X</div>
    	<h5 style="color:white; line-height:50px">THÔNG TIN GIAO HÀNG</h5>
    </div>
    <div style="text-align:left; margin-left:30px">
        <form id="delInfor_form" action="<?php echo  $_SERVER['REQUEST_URI']; ?>" method="post">
        	<input type="hidden" name="delivery" value="1">
            <div style="margin-top:20px"><b>Địa chỉ:</b></div>
            <input id="txAddress_delInfor" name="address_delInfor" type="text" >
            <div style="margin-top:10px"><b>Số điện thoại:</b></div>		
            <input id="txPhone_delInfor" name="phone_delInfor" type="text" > 
      	</form>
    </div>
    <div style="margin-top:25px; text-align:center">
        	<button id="btPay" onClick="checkDelInfor()" >Thanh toán</button>
    </div>
</div>
<script>
	function loadInfor(){
		var address, phone;
		address="<?php
			if(isset($_SESSION['customer_name']))
				echo $address;
		?>";
		phone="<?php 
			if(isset($_SESSION['customer_name']))
				echo $phone;
		?>";
		document.getElementById("txAddress_delInfor").value=address;
		document.getElementById("txPhone_delInfor").value=phone;
	}
	loadInfor();
	if(<?php echo "$checkPay"?>)
		alert("Cảm ơn quý khách đã mua hàng");
</script>
