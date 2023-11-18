<style>
	html {
		scroll-behavior: smooth;
	}

	.link {
		padding: 10px 15px;
		background: transparent;
		border: #bccfd8 1px solid;
		border-left: 0px;
		cursor: pointer;
		color: #607d8b
	}

	.disabled {
		cursor: not-allowed;
		color: #bccfd8;
	}

	.current {
		background: #bccfd8;
	}

	.first {
		border-left: #bccfd8 1px solid;
	}

	#pagination {
		margin-top: 20px;

		padding-top: 30px;
		border-top: #F0F0F0 1px solid;
	}

	#pagination a {
		text-decoration: none;
	}

	#paginationWrapper {
		width: 100%;
		text-align: center
	}

	.dotSign {
		padding: 10px 13px;
		background: none;
		border-right: #bccfd8 1px solid;
	}

	.all-product .title_search {
		margin: 2% 0;
	}

	.all-product .title_search .keyword_search {
		font-weight: bold;
		font-size: 30px;
		font-family: 'Times New Roman', Times, serif;
		color: #123cf7;
		transition-delay: 5s;
		text-shadow: 2px 2px 5px #eedaeb;
		width: 40%;
		margin-left: 30%;
		margin-right: 30%;
	}

	.all-product .title_search .keyword_search strong {
		color: #ff0000;
		font-size: 32px;
	}

	.all-product .no_result_search {
		width: 40%;
		margin: 0 30%;
		text-shadow: 1px 1px #717171;
		color: #ffcc00;
		outline: #ff0000;
		font-weight: bold;
	}

	.back-button {
		margin-top: 50px;
		display: inline-block;
		padding: 10px 20px;
		font-size: 16px;
		text-decoration: none;
		color: #fff;
		background-color: #3498db;
		border-radius: 5px;
		transition: background-color 0.3s;
	}

	.back-button:hover {
		background-color: #2980b9;
	}

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
          width: 400px;
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

        .product-price {
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
<!DOCTYPE html>
<html>

<head>
	<link rel="icon" href="../images/Ilogo.png" type="image/png" />
	<title>Gear Tech</title>
	<link rel="stylesheet" type="text/css" href="index.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" />

</head>

<body>
	<div class="container-fluid  ">
		<a href="javascript:history.back()" class="back-button">Quay lại</a>
		<?php
		include("../db_connect.php");
		if (isset($_POST['search_submit'])) {
			$tukhoa = $_POST['search_product'];
			$query2 = " SELECT * from products WHERE tensp LIKE '%$tukhoa%' GROUP BY tensp ORDER BY price ASC";
		}
		$img = "";
		$title_result = "";
		if (mysqli_fetch_array(mysqli_query($conn, $query2)) == null) {
			$img = "../images/no-result.png";
			$title_result = "KHÔNG TÌM THẤY SẢN PHẨM  ";
		}


		?>
		<script>
			function getresult(url) {
				$.ajax({
					url: url,
					type: "GET",
					data: {
						rowcount: $("#rowcount").val()
					},
					success: function(data) {
						$("#pagination-result").html(data);
					}
				});
			}
		</script>
		<div class="ads-grid py-sm-5 py-4 all-product ">
			<div class="title_search ">
				<span class="keyword_search">TÌM KIẾM THEO TỪ KHOÁ: <strong><?php echo $tukhoa ?></strong></span>
			</div>
			<h1 class="no_result_search"><?php echo $title_result ?> </h1>
			<div class="product-list ">
				<?php
				$result = mysqli_query($conn, $query2);

				// Hiển thị danh sách sản phẩm
				while ($row = mysqli_fetch_assoc($result)) {
					echo "<div class='product-box'>";
					echo "<img src='../images/product/" . $row['image'] . "' alt='Product Image' class='product-image'>";
					echo "<h3 class='product-title'>" . $row['tensp'] . "</h3>";
					echo "<p class='product-price'>Giá: " . number_format($row['price']) . " VND</p>";
					echo "<form action='../product.php?id=" . $row['id'] . "' method='post'>
                        <input type='submit' value='Xem chi tiết' class='product-button'>
                    </form>";
					echo "</div>";
				}
				?>

			</div>
		</div>
		<?php require("footer.php") ?>
	</div>