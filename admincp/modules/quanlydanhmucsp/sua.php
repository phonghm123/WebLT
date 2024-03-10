
<html>

<head>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.ckeditor.com/4.19.1/standard/ckeditor.js"></script>
</head>

<body>
<?php
    $sql_sua="SELECT * FROM tbl_danhmuc WHERE id_danhmuc='$_GET[iddanhmuc]' LIMIT 1";
    $result_sua= mysqli_query($connect,$sql_sua);
?>
<div class="container" style="border-bottom: 2px solid black;">
        <h1 style="text-align:center; font-family: 'Times New Roman', Times, serif; font-weight: bold;">Trang quản trị danh mục sản phẩm</h1>
        <div class="row" style="font-family: 'Times New Roman', Times, serif;font-size: 20px">
   <form method="POST" action="modules/quanlydanhmucsp/xuly.php?iddanhmuc=<?php echo $_GET['iddanhmuc']?>">
    <?php
        while($dong =mysqli_fetch_array($result_sua)){
    ?>
        Tên danh mục
        <input class="form-control" type="text" name="tendanhmuc" value="<?php echo $dong['tendanhmuc'] ?>" >
        <br>
        Thứ tự
        <input class="form-control" type="text" name="thutu" value="<?php echo $dong['thutu']?>">
        <br>
        <input class="btn btn-primary" type="submit" value="Sửa sản phẩm" name="suadanhmuc">
    <?php
        }
    ?>
</form>
</div>
</div>
</body>
</html>
