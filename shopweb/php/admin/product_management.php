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
    <link rel="stylesheet" href="../../css/account_management.css">
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
                <div class="right_header">
                    <h2>Product Management</h2>
                    <p>Product Management</p>
                </div>
                <div class="right_content">
                        <div class="right_content_view">
                            <div class="title">
                                List Product
                                <span style="color:#00FF00">
                                    <?php 
                                        $query=mysqli_query($conn,"select ID from product");
                                        $total_product=mysqli_num_rows($query);
                                        echo $total_product ;
                                    ?>
                                </span>
                            </div>
                            <div class="right_content_link">
                                <a href="list_product.php">Xem chi tiết</a>
                                <i class="fa-solid fa-angle-right"></i>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../../js/admin.js"></script>
<?php
    }
   $conn->close();
?>
</body>
</html>