<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
        $sql_lietke_nguoidung="SELECT * FROM tbl_dangky ORDER BY id_khachhang DESC";
        $result_lietke_nguoidung= mysqli_query($connect,$sql_lietke_nguoidung);
    ?>
    <h1 style="font-family: 'Times New Roman', Times, serif;">Danh sách người dùng</h1>
    <table class="table table-striped" style="margin-bottom: 50px; border-bottom: 2px solid black;font-family: 'Times New Roman', Times, serif;font-size: 20px;">
    <tr>
        <th>ID</th>
        <th>Name </th>
        <th>Account</th>
        <th>Email</th>
        <th>Number phone</th>
        <th>Address</th>
        <th>Chức năng</th>
        <th>Chức vụ</th>
    </tr>
    <?php
        $i=0;
        while($row=mysqli_fetch_array($result_lietke_nguoidung)) {
        $i++
    ?>
    <tr>
        <td style="height:100px;"> <?php echo $i ?></td>
        <td style="border: 2px solid black;"> <?php echo $row ['hovaten']?></td>
        <td style="border: 2px solid black;"> <?php echo $row ['taikhoan']?></td>
        <td style="border: 2px solid black;"> <?php echo $row ['email']?></td>
        <td style="border: 2px solid black;"> <?php echo $row ['sodienthoai']?></td>
        <td style="width:4  00px;"> <?php echo $row ['diachi']?></td>
        <td style="border: 2px solid black;">
            <a class="btn btn-danger" href="?action=quanlynguoidung&query=sua&idnguoidung=<?php echo $row['id_khachhang'] ?>"> Sửa </a>
            <a class="btn btn-danger" href="javascript:void(0);" onclick="deleteUser(<?php echo $row['id_khachhang']?>);">Xóa</a>|
        </td>
        <td><?php if($row['chucvu']==1){
            echo "Nhân viên";
     }else{
            echo "Khách hàng";
     }?></td>
    </tr>
    <?php
        }
    ?>
</table>
<script>
   function deleteUser(id) {
    Swal.fire({
        title: 'Bạn có chắc chắn muốn xóa người dùng này?',
        text: "Bạn sẽ không thể hoàn tác hành động này!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Có, xóa nó!'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = "modules/quanlynguoidung/xuly.php?idnguoidung=" + id;
        }
    })
}
</script>