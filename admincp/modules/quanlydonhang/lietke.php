<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
    $sql_lietke_dh="SELECT * FROM tbl_giohang ,tbl_dangky  WHERE tbl_giohang.id_khachhang=tbl_dangky.id_khachhang ORDER BY id_cart DESC";
    $result_lietke_dh= mysqli_query($connect,$sql_lietke_dh);
?>
<h1  style="font-family: 'Times New Roman', Times, serif;">Danh sách đơn hàng của người dùng</h1>
<table class="table table-striped" style="border-bottom: 2px solid black;font-family: 'Times New Roman', Times, serif;"> 
     <tr>
         <td>ID</td>
         <td>Mã đơn hàng</td>
         <td>Tên khách hàng</td>
         <td>Địa chỉ</td>
         <td>Tài khoản</td>
         <td>Hình thức thanh toán</td>
         <td>Điện thoại</td>
         <td>Tinh Trạng </td>
         <td colspan="2">Quản lý </td>
     </tr>
     <?php
    $i=0;
    while($row=mysqli_fetch_array($result_lietke_dh)){
        $i++;
    
     ?>
     <tr>
         <td><?php echo $i ?></td>
         <td><?php echo $row['code_cart'] ?></td>
         <td><?php echo $row['hovaten']?></td>
         <td><?php echo $row['diachi']?></td>
         <td><?php echo $row['taikhoan']?></td>
         <td><?php echo $row['cart_payment']?></td>
         <td><?php echo $row['sodienthoai']?></td>
         <td>
    	<?php if($row['cart_status']==1){
    		echo '<a class="btn btn-warning" href="modules/quanlydonhang/xuly.php?code='.$row['code_cart'].'">Đơn hàng mới</a>';
    	}else{
    		echo '<a class="btn btn-info">Đã hoàn thành</a>';
    	}
    	?>
    </td>
         <td>
            <a class="btn btn-primary" href="index.php?action=quanlydonhang&query=xemdonhang&code=<?php echo $row['code_cart']?>">Xem đơn hàng</a>|
           
            <td style="border: 2px solid black;">
    <a class="btn btn-danger" href="javascript:void(0);" onclick="deleteOrder(<?php echo $row['code_cart']?>);">Xóa</a>
</td>
         </td>
     </tr>
     
     <?php
    }
    ?>
     <iframe src="modules/quanlydonhang/thongke.php" width="100%" height="100px"></iframe>
 </table>
 <script>function deleteOrder(id) {
    Swal.fire({
        title: 'Bạn có chắc chắn muốn xóa đơn hàng này?',
        text: "Bạn sẽ không thể hoàn tác hành động này!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Có, xóa nó!'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = "modules/quanlydonhang/xuly.php?iddonhang=" + id;
        }
    })
}</script>

