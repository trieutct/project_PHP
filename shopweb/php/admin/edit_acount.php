<?php
    $conn=include"../../include/ketnoidatabase.php";
    session_start();
    if(isset($_GET["ID"]))
    {
        $ID=$_GET["ID"];
    }
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
    <link rel="stylesheet" href="../../css/edit_acount.css">
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
            <?php
                $stmt = $conn->prepare("SELECT * FROM taikhoan where ID=?");
                $stmt->bind_param("i",$ID);
                $stmt->execute();
                $result = $stmt->get_result();
                if ($result->num_rows == 1) {                           
            ?>
            <?php
                    while($row = $result->fetch_assoc()) { 
            ?>
                <form action="update_permission_acount.php?ID=<?php echo $ID ?>" method="POST">
                    <div class="row">
                      <div class="col-25">
                        <label for="fname">Tài Khoản</label>
                      </div>
                      <div class="col-75">
                        <input class="input_text" type="text" id="fname" name="taikhoan" value="<?php echo $row["TaiKhoan"]?>" >
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-25">
                        <label for="lname">Mật Khẩu</label>
                      </div>
                      <div class="col-75">
                        <input class="input_text"  type="password" id="lname" value="<?php echo $row["MatKhau"]?>" name="matkhau" me..">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-25">
                        <label for="country">Permission</label>
                      </div>
                      <div class="col-75">
                        <!-- <select id="country" name="country">
                          <option value="australia">Australia</option>
                          <option value="canada">Canada</option>
                          <option value="usa">USA</option>
                        </select> -->
                        <input type="radio" name="Permission" id="" value="1"> User
                        <input type="radio" name="Permission" id="" value="2"> Nhân Viên
                        <input type="radio" name="Permission" id="" value="0"> Không duyệt
                      </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                          <label for="fname">Số Điện Thoại</label>
                        </div>
                        <div class="col-75">
                          <input class="input_text" type="text" id="fname" name="phone" value="<?php echo $row["SoDienThoai"]?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                          <label for="fname">Địa Chỉ</label>
                        </div>
                        <div class="col-75">
                          <input class="input_text" type="text" id="fname" name="diachi" value="<?php echo $row["DiaChi"]?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                          <label for="fname">Time</label>
                        </div>
                        <div class="col-75">
                          <input class="input_text" type="text" id="fname" name="time" value="<?php echo $row["DaTe"]?>">
                        </div>
                    </div>
                    <?php
                                }
                            }
                    ?>
                    <br>
                    <div class="row">
                      <input class="submit" name="submit" type="submit" value="Duyệt">
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
</html>