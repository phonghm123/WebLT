<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang đăng ký</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles -->
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            padding-top: 30px;
        }
        .card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .card-header {
            background-color: #007bff;
            color: #fff;
            border-radius: 20px 20px 0 0;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
		
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>Trang đăng ký</h3>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="hovaten">Họ và tên</label>
                                <input type="text" class="form-control" id="hovaten" name="hovaten">
                            </div>
                            <div class="form-group">
                                <label for="taikhoan">Tài khoản</label>
                                <input type="text" class="form-control" id="taikhoan" name="taikhoan">
                            </div>
                            <div class="form-group">
                                <label for="matkhau">Mật khẩu</label>
                                <input type="password" class="form-control" id="matkhau" name="matkhau">
                            </div>
                            <div class="form-group">
                                <label for="rematkhau">Nhập lại mật khẩu</label>
                                <input type="password" class="form-control" id="rematkhau" name="rematkhau">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email">
                            </div>
                            <div class="form-group">
                                <label for="dienthoai">Điện thoại</label>
                                <input type="text" class="form-control" id="dienthoai" name="dienthoai">
                            </div>
                            <div class="form-group">
                                <label for="diachi">Địa chỉ</label>
                                <textarea class="form-control" id="diachi" name="diachi" rows="2"></textarea>
                            </div>
							<td><a href="index.php?quanly=dangnhap">Đăng nhập nếu có tài khoản</a></td>
                            <button type="submit" class="btn btn-primary btn-block" name="dangky">Đăng ký</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
		

		
	</tr>
</table>

</form>
<div>
<?php
	if(isset($_POST['dangky'])) {
		$tenkhachhang = $_POST['hovaten'];
		$taikhoan = $_POST['taikhoan'];
		$matkhau = ($_POST['matkhau']);
		$rematkhau = ($_POST['rematkhau']);
		$email = $_POST['email'];
		$dienthoai = $_POST['dienthoai'];
		$diachi = $_POST['diachi'];
	
		
		$sql_check = "SELECT * FROM tbl_dangky WHERE taikhoan='$taikhoan'";
		$result_check = mysqli_query($connect, $sql_check);
	
		
		if(mysqli_num_rows($result_check) > 0) {
			echo '<script>alert("Tài khoản đã tồn tại!");</script>';
		} 
		
		elseif($matkhau != $rematkhau) {
			echo '<script>alert("Mật khẩu chưa trùng!");</script>';
		} 
		
		else {
			$sql_dangky = "INSERT INTO tbl_dangky(hovaten, taikhoan, matkhau, sodienthoai, email, diachi) 
							VALUES ('$tenkhachhang', '$taikhoan', '$matkhau', '$dienthoai', '$email', '$diachi')";
			$query_dangky = mysqli_query($connect, $sql_dangky);
	
			if ($query_dangky) {
                echo '<script>alert("Bạn đã đăng ký thành công!");</script>';}
            //     $_SESSION['dangky'] = $taikhoan;
            //     $_SESSION['email'] = $email;
            //     $_SESSION['id_khachhang'] = mysqli_insert_id($connect);
              
            // }
            
	
	
			}
		}
			


		
	
	
?>
</div>