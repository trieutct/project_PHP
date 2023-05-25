<?php
    $conn=include'../../include/ketnoidatabase.php';
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
    <link rel="stylesheet" href="../../css/taikhoancanduyet.css">
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
                <h1>Danh Sách Tài Khoản Users</h1>
            <?php
                $Permission=1;
                $stmt = $conn->prepare("SELECT * FROM taikhoan where Permission=? order by DaTe DESC");
                $stmt->bind_param("i",$Permission);
                $stmt->execute();
                $result = $stmt->get_result();
                if ($result->num_rows > 0) {                           
            ?>
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Tài Khoản</th>
                        <th>Mật Khẩu</th>
                        <th>Số Điện Thoại</th>
                        <th>Địa Chỉ</th>
                        <th>Time</th>
                        <th>Action</th>
                    </tr>
                <?php
                    while($row = $result->fetch_assoc()) { 
                ?>
                    <tr>
                        <td><?php echo $row["ID"]?></td>
                        <td><?php echo $row["TaiKhoan"]?></td>
                        <td><?php echo $row["MatKhau"]?></td>
                        <td><?php echo $row["SoDienThoai"]?></td>
                        <td><?php echo $row["DiaChi"]?></td>
                        <td><?php echo $row["DaTe"]?></td>
                        <td>
                            <a href="edit_acount.php?ID=<?php echo $row["ID"]?>"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a href="delete_acount.php?ID=<?php echo $row["ID"]?>&total_users=1"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php
            }
        }
    else
    {
        echo "<h2 style='color:red;text-align:center'>Không có tài khoản nào</h2>";
    }
    $stmt->close();  
                    ?>
                  </table>
            </div>
        </div>
    </div>
    <script src="../../js/taikhoancanduyet.js"></script>
</body>
</html>
<?php
$conn->close();
}
?>