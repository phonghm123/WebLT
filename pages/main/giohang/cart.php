
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">


<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<h1>Giỏ hàng</h1>
<h2 class="btn btn-success">
    <?php
    if (isset($_SESSION['dangky'])) {
        echo 'xin chào: ' . '<span style="color:white">' . $_SESSION['dangky'] . '</span>';
    }
    ?>
</h2>

<?php
if (isset($_SESSION['cart'])) {
?>

<table class="table table-striped" style="border-collapse: collapse;">
    <thead>
        <tr>
            <th style="border: 1px solid black;">ID</th>
            <th style="border: 1px solid black;">Mã</th>
            <th style="border: 1px solid black;">Tên</th>
            <th style="border: 1px solid black;">Hình</th>
            <th style="border: 1px solid black;">Số lượng</th>
            <th style="border: 1px solid black;">Giá</th>
            <th style="border: 1px solid black;">Thành tiền</th>
            <th style="border: 1px solid black;">Chức năng</th>
        </tr>
    </thead>
    <tbody>
    <?php
    $i = 0;
    $tongtien = 0;
    foreach ($_SESSION['cart'] as $cart_item) {
        $thanhtien = $cart_item['soluong'] * $cart_item['giasanpham'];
        $tongtien += $thanhtien;
        $i++;
    ?>
        <tr>
            <td style="border: 1px solid black;"><?php echo $i ?></td>
            <td style="border: 1px solid black;"><?php echo $cart_item['masp'] ?></td>
            <td style="border: 1px solid black;"><?php echo $cart_item['tensanpham'] ?></td>
            <td style="border: 1px solid black;"><img src="admincp/modules/quanlysp/uploads/<?php echo $cart_item['hinhanh'] ?>" width="100" style="height:100px"></td>
            <td style="border: 1px solid black;">
            <a href="pages/main/giohang/suasoluong.php?tru=<?php echo $cart_item['id'] ?>"><i class="fas fa-minus"></i></a>
                <?php echo $cart_item['soluong'] ?>
                <a href="pages/main/giohang/suasoluong.php?cong=<?php echo $cart_item['id'] ?>"><i class="fas fa-plus"></i></a>
           
            </td>
            <td style="border: 1px solid black;"><?php echo number_format($cart_item['giasanpham'], 0, ',', '.') . ' VNĐ' ?></td>
            <td style="border: 1px solid black;"><?php echo number_format($thanhtien, 0, ',', '.') . ' VNĐ' ?></td>
            <td style="border: 1px solid black;"><a href="pages/main/giohang/xoasanpham.php?xoa=<?php echo $cart_item['id'] ?>" class="btn btn-primary">XÓA</a></td>
        </tr>
    <?php
    }
    ?>
    <tr>
        <td colspan="8">
            <p style="float: left; font-size: 24px;">Tổng tiền: <?php echo number_format($tongtien, 0, ',', '.') . ' VNĐ'  ?></p>
            <p style="float: right;"><a href="pages/main/giohang/xoahetgiohang.php?xoatatca=xoahet" class="btn btn-primary">Xóa Hết</a></p>
            <div style="clear:both;"></div>
        </td>
    </tr>
</tbody>

                    <?php
                    if (isset($_SESSION['dangky'])) {
                    ?>
                        <p><a href="pages/main/thanhtoan/index.php?quanly=vanchuyen" class="btn btn-primary">Đặt hàng</a></p>
                    <?php
                    } else {
                    ?>
                        <p><a href="index.php?quanly=dangnhap" class="btn btn-primary">Đăng nhập đặt hàng</a></p>
                    <?php
                    }
                    ?>
                </td>
            </tr>
        </tbody>
    </table>

<?php
} else {
?>

    <p>Hiện tại giỏ hàng trống</p>

<?php
}
?>
