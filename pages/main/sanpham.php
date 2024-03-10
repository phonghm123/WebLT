<?php
 $sql_chitiet = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc  AND tbl_sanpham.id_sanpham='$_GET[id]' LIMIT 1";
 $query_chitiet = mysqli_query($connect, $sql_chitiet);
 while ($row_chitiet = mysqli_fetch_array($query_chitiet)) {
 ?>
<div class="warpper_deital" style="display: flex;">
   <div class="hinhanh_sanpham" style="width: 40%; height: 40%; margin-right: 20px">
      <h1 align="left">Chi tiết sản phẩm </h1>
      <img src="admincp/modules/quanlysp/uploads/<?php echo $row_chitiet['hinhanh'] ?>">
   </div>
   <form action="pages/main/giohang/themgiohang.php?idsanpham=<?php echo $row_chitiet['id_sanpham'] ?>" method="POST">
      <div class="chitiet_sanpham" style="margin-top: 80px;">

         <h2>
            <?php echo $row_chitiet['tensanpham'] ?>
         </h2>
         <p>Mã :
            <?php echo $row_chitiet['masanpham'] ?>
         </p>
         <p>Giá :
            <?php echo number_format($row_chitiet['giasanpham'], 0, ',', '.') . 'vnd' ?>
         </p>
         <p>Số lượng:
                <?php
                    if($row_chitiet['soluong'] > 0) {
                        echo $row_chitiet['soluong'];
                    } else {
                        echo "Hết hàng";
                    }
                ?>
            </p>
      <p>Danh mục :
         <?php echo $row_chitiet['tendanhmuc'] ?>
      </p>
     
         <p><input class="themgiohang" type="submit" name="themgiohang" value="Thêm Giỏ Hàng"></p>
      </div>
      <details>
 <p>Tóm tắt :
         <?php echo $row_chitiet['tomtat'] ?>
      </p>
      <p>Nội dung :
         <?php echo $row_chitiet['noidung'] ?>
      </p>
 </details>
   </form>
  
     
</div>

<?php
 }
 ?>