<html>
    <head>
		<style>
			.vien{
				border: 2px solid black;
			}
		</style>
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    </head>
    <body>
 <div class="container">
 <?php
    if(isset($_SESSION['id_khachhang'])){
?>
    <div class="arrow-steps clearfix">
        <div class="step "> <span> <a href="../../../index.php?quanly=giohang" >Giỏ hàng</a></span> </div>
         <div class="step"> <span><a href="index.php?quanly=vanchuyen" >Kiểm tra</a></span> </div>
        <div class="step current"> <span><a href="index.php?quanly=thongtinthanhtoan" >Thanh toán</a><span> </div>
       
    </div>
    <?php
  } 
  ?>
  	<form action="thanhtoan.php" method="POST">
	<div class="row">
  		<h5>Giỏ hàng của bạn</h5>
  	<table class="table table-striped" style="width:100%; border: 2px solid black;text-align: center;">
	<div>
		<tr>
        <th class="vien">ID</th>
        <th class="vien">Mã :</th>
        <th class="vien">Tên</th>
        <th class="vien">Hình</th>
        <th class="vien">Số lượng</th>
        <th class="vien">Giá :</th>
        <th class="vien">Thành tiền</th>   
		</tr>
    <?php
        if(isset($_SESSION['cart'])){
            $i=0;
            $tongtien=0;
            foreach($_SESSION['cart'] as $cart_item){
                $thanhtien = $cart_item['soluong'] * $cart_item['giasanpham'];
                $tongtien+=$thanhtien;
                $i++;
    ?>
        <tr>
            <td class="vien"><?php echo $i ?></td>
            <!-- ở đây lấy dữ liêu cart_item['masp'] từ themgiohang.php -->
            <td class="vien"><?php echo $cart_item['masp']?></td>
            <td class="vien"><?php echo $cart_item['tensanpham'] ?></td>
            <td class="vien"><img src="../../../admincp/modules/quanlysp/uploads/<?php echo $cart_item['hinhanh'] ?>" width="150px"></td>

            <td class="vien">
                <?php echo $cart_item['soluong'] ?>
            </td>

            <td class="vien"><?php echo number_format($cart_item['giasanpham'],0,',','.') . ' VNĐ'?></td>
            <td class="vien"><?php  echo number_format($thanhtien,0,',','.') . ' VNĐ' ?></td>
        </tr>


    <?php 
            }
    ?>

        <tr>
            <td colspan="8">
                <p style="float: left text-align: center;" class="btn btn-success"> Tổng tiền : <?php echo number_format($tongtien,0,',','.') . ' VNĐ'  ?></p>
                <div style="clear:both;"> </div>
		    </td>
		  </tr>
		  <?php	
		  }else{ 
		  ?>
		   <tr>
		    <td colspan="8"><p>Hiện tại giỏ hàng trống</p></td>
		   
		  </tr>
		  <?php
		  } 
		  ?>
		 
	</table>
  	</div>
  	<style type="text/css">
  		.col-md-4.hinhthucthanhtoan .form-check {
		    margin: 11px;
		}
  	</style>

  	<div class="col-md-4 hinhthucthanhtoan">
  		<h4>Phương thức thanh toán</h4>
  		<div class="form-check">
		  <input class="form-check-input" type="radio" name="payment" id="exampleRadios1" value="Tiền Mặt" checked>
		  <label class="form-check-label" for="exampleRadios1">
		    Tiền mặt(COD)
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" type="radio" name="payment" id="exampleRadios2" value="Chuyển Khoản">
		  <label class="form-check-label" for="exampleRadios2">
		    Chuyển khoản
		  </label>
		</div>
		<input type="submit" value="Thanh toán ngay" name="redirect"  class="btn btn-danger">
		
		</form>

		<p></p>
	
		<?php
		$tongtien = 0;
		foreach($_SESSION['cart'] as $key => $value){
			$thanhtien = $value['soluong']*$value['giasanpham'];
  			$tongtien+=$thanhtien;
		} 
		$tongtien_vnd = $tongtien;
		$tongtien_usd = round($tongtien/22667);
		?>
		<input type="hidden" name="" value="<?php echo $tongtien_usd ?>" id="tongtien">
		

		 </div>
		 	
		 </div>
<?php
	

?>
	
