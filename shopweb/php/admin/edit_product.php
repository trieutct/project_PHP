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
    <link rel="stylesheet" href="../../css/edit_product.css">
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
                $stmt = $conn->prepare("SELECT * FROM product where ID=?");
                $stmt->bind_param("i",$ID);
                $stmt->execute();
                $result = $stmt->get_result();
                if ($result->num_rows == 1) {                           
            ?>
            <?php
                    while($row = $result->fetch_assoc()) { 
            ?>
                <form action="update_product.php?ID=<?php echo $ID ?>" method="POST">
                    <div class="row">
                      <div class="col-25">
                        <label for="fname">Mã Sản Phẩm</label>
                      </div>
                      <div class="col-75">
                        <input style="pointer-events: none;" class="input_text" type="text" id="fname" name="MaSanPham" value="<?php echo $row["MaSanPham"]?>" >
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-25">
                        <label for="lname">Tên Sản Phẩm</label>
                      </div>
                      <div class="col-75">
                        <input class="input_text"  type="text" id="lname" value="<?php echo $row["TenSanPham"]?>" name="TenSanPham">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-25">
                        <label for="country">Image</label>
                      </div>
                      <div class="col-75">
                        <input class="input_text"  type="file" id="lname"  name="Image" >
                      </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                          <label for="fname">Price</label>
                        </div>
                        <div class="col-75">
                          <input class="input_text" type="text" id="fname" name="Price" value="<?php echo $row["Price"]?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                          <label for="fname">Mô Tả</label>
                        </div>
                        <div class="col-75">
                          <input class="input_text" type="text" id="fname" name="MoTa" value="<?php echo $row["MoTa"]?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                          <label for="fname">Time</label>
                        </div>
                        <div class="col-75">
                          <input style="pointer-events: none;" class="input_text" type="text" id="fname" name="time" value="<?php echo $row["DaTe"]?>">
                        </div>
                    </div>
                    <?php
                                }
                            }
                    ?>
                    <br>
                    <div class="row">
                      <!-- <button name="submit">OKi</button> -->
                      <input class="submit" name="submit" type="submit" value="Update">
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