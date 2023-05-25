<?php
    $conn=include'../../include/ketnoidatabase.php';
    session_start(); 
    if($_SESSION["ID"])
    {
        if(isset($_POST["submit"]))
        {
            $stmt = $conn->prepare("UPDATE taikhoan SET SoDienThoai=?,DiaChi=? where ID=?");
            $stmt->bind_param("ssi",$_POST["SoDienThoai"],$_POST["DiaChi"],$_SESSION["ID"]);
            if($stmt)
            {
                $stmt->execute();
                $stmt->close();
                echo "<script>
                        alert('Cập nhật thành công');
                        window.location.href='profile.php';
                    </script>";
            }
        }
    }
    else
    {
        echo "<script>window.location.href='../admin/login.php'</script>";
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <style>
        #edit_password
        {
            margin-top: 150px;
        }
    </style>
</head>
<body>
    <div id="wrapper">
        <?php include"../../include/header_user.php" ?>
            <div id="edit_password" >
                <form action="" method="POST">
                        <div class="container col-md-5">
                            <div class="card">
                                <div class="card-body">
                                    <caption> 
                                        <h2>Hồ Sơ Của Bạn</h2>
                                        <span style="color:red" ></span>
                                    </caption>
                                    <?php
                                        $stmt = $conn->prepare("SELECT * FROM taikhoan where ID=?");
                                        $stmt->bind_param("i",$_SESSION["ID"]);
                                        $stmt->execute();
                                        $result = $stmt->get_result();
                                        if ($result->num_rows == 1) {                           
                                    ?>
                                    <?php
                                            while($row = $result->fetch_assoc()) { 
                                    ?>
                                    <fieldset class="form-group">
                                            <label>Tài Khoản</label> 
                                            <input style="pointer-events: none;" type="text" value="<?php echo $row["TaiKhoan"] ?>" class="form-control" name="TaiKhoan">
                                            <label>Số Điện Thoại</label> 
                                            <input type="text"  value="<?php echo $row["SoDienThoai"] ?>" class="form-control" name="SoDienThoai">
                                            <label>Địa Chỉ</label> 
                                            <input type="text"  value="<?php echo $row["DiaChi"] ?>" class="form-control" name="DiaChi">
                                            <label>Ngày Tham Gia</label> 
                                            <input style="pointer-events: none;" type="text"  value="<?php echo $row["DaTe"] ?>" class="form-control" name="DaTe">
                                    </fieldset>                
                                            <input type="submit" style="padding:5px;background-color:#1f60a1;border-radius:2px;color:white;border:1px solid #1f60a1" name="submit" value="Cập Nhật" >
                                    </form>
                                    <?php
                                            }
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                </form>
            </div>

        <?php include"../../include/footer_user.php" ?>
    </div>

    <script src="../../js/foodweb.js"></script>
</body>
<?php
    $conn->close();
?>
</html>