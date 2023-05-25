<?php
    $conn=include"../../include/ketnoidatabase.php";
    session_start();
    if(!$_SESSION["ID"])
    {
        echo "<script>window.location.href='login.php'</script>";
    }
    else
    {
?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>
    <link rel="stylesheet" href="../../css/edit_password.css">
    <style>
        .sidebar-right h2{
            font-size: 40px;
            text-align:center;
            margin-top: 10px;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body>
<div id="container">
        <?php 
            if($_SESSION["Permission"]==3)
            {
                include '../../include/header_admin.php';
            }
            else if($_SESSION["Permission"]==2)
            {
                include '../../include/header_employee.php';
            }
        ?>


        <div class="sidebar">
            <?php include '../../include/sildeber-left.php';?>
            <div style="height:100vh" class="sidebar-right">
                <h2>Thêm Sản Phẩm</h2>
                <form action="insert_product.php" method="POST">
                    <div class="row">
                      <div class="col-25">
                        <label for="fname">Mã Sản Phẩm</label>
                      </div>
                      <div class="col-75">
                        <input class="input_text" type="text" id="fname" name="MaSanPham" value="" >
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-25">
                        <label for="lname">Tên Sản Phẩm</label>
                      </div>
                      <div class="col-75">
                        <input class="input_text"  type="text" id="lname" value="" name="TenSanPham">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-25">
                        <label for="lname">Image</label>
                      </div>
                      <div class="col-75">
                        <input class="input_text"  type="file" id="lname" value="" name="Image">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-25">
                        <label for="lname">Price</label>
                      </div>
                      <div class="col-75">
                        <input class="input_text"  type="text" id="lname" value="" name="Price">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-25">
                        <label for="lname">Mô tả</label>
                      </div>
                      <div class="col-75">
                        <input class="input_text"  type="text" id="lname" value="" name="MoTa">
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <input class="submit" name="submit" type="submit" value="Add">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="../../js/taikhoancanduyet.js"></script>
</body>
<?php
    }
    $conn->close();
?>