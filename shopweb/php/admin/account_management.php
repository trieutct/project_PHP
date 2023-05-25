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
                    <h2>Account Management</h2>
                    <p>Account Management</p>
                </div>
                <div class="right_content">
                        <div class="right_content_view">
                            <div class="title">
                                Account Cần Duyệt
                                <span style="color:#00FF00">
                                    <?php 
                                        $query=mysqli_query($conn,"select ID from taikhoan where Permission=0");
                                        $totalusers_permission=mysqli_num_rows($query);
                                        echo $totalusers_permission ;
                                    ?>
                                </span>
                            </div>
                            <div class="right_content_link">
                                <a href="taikhoancanduyet.php">Xem chi tiết</a>
                                <i class="fa-solid fa-angle-right"></i>
                            </div>
                        </div>
                        <div class="right_content_view">
                        <div class="title">
                            Total Users
                                <span style="color:#00FF00">
                                    <?php 
                                        $query1=mysqli_query($conn,"select ID from taikhoan where Permission=1");
                                        $totalusers=mysqli_num_rows($query1);
                                        echo $totalusers;
                                    ?>
                                </span>
                        </div>
                        <div class="right_content_link">
                            <a href="total_users.php">Xem chi tiết</a>
                            <i class="fa-solid fa-angle-right"></i>
                        </div>
                    </div>
                    <div class="right_content_view">
                        <div class="title">
                        Registered Users Last 7 Days
                            <span style="color:#00FF00">
                            <?php 
                                $query2=mysqli_query($conn,"select * from taikhoan where Permission=1 and date(DaTe)>=now() - INTERVAL 7 day");
                                $totalusers_in7days=mysqli_num_rows($query2);
                                echo $totalusers_in7days;
                            ?>
                            </span>
                        </div>
                        <div class="right_content_link">
                            <a href="users_in_7days.php">Xem chi tiết</a>
                            <i class="fa-solid fa-angle-right"></i>
                        </div>
                    </div>
                    <div class="right_content_view">
                        <div class="title">
                        Registered Users Last 30 Days
                            <span style="color:#00FF00">
                                <?php 
                                    $query3=mysqli_query($conn,"select * from taikhoan where Permission=1 and date(DaTe)>=now() - INTERVAL 30 day");
                                    $totalusers_in30days=mysqli_num_rows($query3);
                                    echo $totalusers_in30days;
                                ?>
                            </span>
                        </div>
                        <div class="right_content_link">
                            <a href="users_in_30days.php">Xem chi tiết</a>
                            <i class="fa-solid fa-angle-right"></i>
                        </div>
                    </div>
                    <div class="right_content_view">
                        <div class="title">
                        Total Admin
                            <span style="color:#00FF00">
                                <?php 
                                    $query4=mysqli_query($conn,"select * from taikhoan where Permission=2 or Permission=3");
                                    $total_admins=mysqli_num_rows($query4);
                                    echo $total_admins;
                                ?>
                            </span>
                        </div>
                        <div class="right_content_link">
                            <a href="total_admins.php">Xem chi tiết</a>
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