<?php
    include "../../config/connect.php";

 
    $sql_thongke = "SELECT SUM(tbl_cart_detail.soluongmua * tbl_sanpham.giasanpham) AS tongdoanhthu
                    FROM tbl_cart_detail
                    INNER JOIN tbl_giohang ON tbl_cart_detail.code_cart = tbl_giohang.code_cart
                    INNER JOIN tbl_sanpham ON tbl_cart_detail.id_sanpham = tbl_sanpham.id_sanpham
                    WHERE tbl_giohang.cart_status = 0";
    $result_thongke = mysqli_query($connect, $sql_thongke);
    $row_thongke = mysqli_fetch_array($result_thongke);
    $tongdoanhthu = $row_thongke['tongdoanhthu'];

  
    $tongdoanhthu_formatted = number_format($tongdoanhthu, 0, '.', ',');

   
    echo "<h1>Thống kê doanh thu</h1>";
    echo "<p>Tổng thu nhập: <span style='font-weight: bold;'>" . $tongdoanhthu_formatted . "</span> VND</p>";
?>