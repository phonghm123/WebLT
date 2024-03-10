<?php
	session_start();
	include('../../../admincp/config/connect.php');

	if(isset($_POST['redirect'])) {
		$id_khachhang = $_SESSION['id_khachhang'];
		$code_order = rand(0,9999); // random từ 0 đến 4 số
		$cart_pay = $_POST['payment'];
		$insert_cart = "INSERT INTO tbl_giohang(id_khachhang, code_cart, cart_status, cart_payment) VALUES ('$id_khachhang', '$code_order', 1, '$cart_pay')";
		$cart_query = mysqli_query($connect, $insert_cart);

		if($cart_query) {
			// Thêm giỏ hàng chi tiết
			foreach($_SESSION['cart'] as $key => $value) {
				$id_sanpham = $value['id'];
				$soluong = $value['soluong'];
				
				$insert_order_details = "INSERT INTO tbl_cart_detail(id_sanpham, code_cart, soluongmua) VALUES ('$id_sanpham', '$code_order', '$soluong')";
				mysqli_query($connect, $insert_order_details);
				
				// Cập nhật số lượng sản phẩm trong cơ sở dữ liệu
				$update_product_quantity = "UPDATE tbl_sanpham SET soluong = soluong - $soluong WHERE id_sanpham = '$id_sanpham'";

				mysqli_query($connect, $update_product_quantity);
				
			}
			
		

			header('Location: ../../../index.php');
			exit(); 
		}
	}
?>
