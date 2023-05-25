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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body>
    <div id="container">
        <?php 
            if($_SESSION["Permission"]==3)
            {
                $Permission="Admin";
                include '../../include/header_admin.php';
            }
            else if($_SESSION["Permission"]==2)
            {
                $Permission="Nhân Viên";
                include '../../include/header_employee.php';
            }
        ?>


        <div class="sidebar">
            <?php include '../../include/sildeber-left.php';?>
            <div style="height:100vh" class="sidebar-right">
            <?php
                $stmt = $conn->prepare("SELECT * FROM taikhoan where ID=?");
                $stmt->bind_param("i",$_SESSION["ID"]);
                $stmt->execute();
                $result = $stmt->get_result();
                if ($result->num_rows == 1) {                           
                while($row = $result->fetch_assoc()) { 
            ?>
                <form action="update_profile.php" method="POST">
                    <div class="row">
                      <div class="col-25">
                        <label for="fname">Tài Khoản</label>
                      </div>
                      <div class="col-75">
                        <input style="pointer-events: none;" class="input_text" type="text" id="fname" name="" value="<?php echo $row["TaiKhoan"] ?>" >
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-25">
                        <label for="lname">Số Điện Thoại</label>
                      </div>
                      <div class="col-75">
                        <input class="input_text"  type="text" id="lname" value="<?php echo $row["SoDienThoai"] ?>" name="SoDienThoai">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-25">
                        <label for="lname">Địa Chỉ</label>
                      </div>
                      <div class="col-75">
                        <input class="input_text"  type="text" id="lname" value="<?php echo $row["DiaChi"] ?>" name="DiaChi">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-25">
                        <label for="lname">Chức Vụ</label>
                      </div>
                      <div class="col-75">
                        <input style="pointer-events: none;" class="input_text"  type="text" id="lname" value="<?php echo $Permission ?>" name="">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-25">
                        <label for="lname">Time</label>
                      </div>
                      <div class="col-75">
                        <input style="pointer-events: none;" class="input_text"  type="text" id="lname" value="<?php echo $row["DaTe"] ?>" name="">
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <input class="submit" name="submit" type="submit" value="Cập Nhật">
                    </div>
                </form>
                <?php
                        }
                    }
                ?>
            </div>
        </div>
    </div>
    <script src="../../js/taikhoancanduyet.js"></script>
</body>
<?php
    }
    $conn->close();
?>
</html>