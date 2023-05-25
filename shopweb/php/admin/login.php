<?php
    $conn=include'../../include/ketnoidatabase.php';
    session_start(); 
    if(isset($_SESSION["ID"]))
    {
        unset($_SESSION["ID"]);
    }
    if(isset($_POST["login"]))
    {
        $TaiKhoan=$_POST["taikhoan"];
        $MatKhau=$_POST["matkhau"];
        $page_login="login.php";
        if(empty($TaiKhoan) || empty($MatKhau))
        {
            echo "<script>alert('Vui lòng không được để chống')</script>";
            echo "<script>window.location.href='".$page_login."'</script>";
            exit();
        }
        else
        {
            $MatKhau=md5($MatKhau);
            $stmt = $conn->prepare("SELECT * FROM TaiKhoan WHERE TaiKhoan=? and MatKhau=? ");
            $stmt->bind_param("ss", $TaiKhoan,$MatKhau);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows == 1) {
                while($row = $result->fetch_assoc()) {
                        $Permission= $row['Permission'];
                        $ID=$row['ID'];
                }
                // echo "<script>alert('$Permission')</script>";
                if(empty($Permission))
                {
                    echo "<script>alert('Tài khoản của bạn chưa được admin xác nhận. Vui lòng đợi trong giây lát!!')</script>";
                    echo "<script>window.location.href='".$page_login."'</script>";
                    $stmt->close();     
                    exit();
                }
                else if ($Permission==1)
                {
                    $_SESSION["ID"]=$ID;
                    echo "<script>window.location.href='../user/shopweb.php?trang=1'</script>";
                    $stmt->close(); 
                    exit();
                }
                else if($Permission==2 or $Permission==3 )
                {
                    $_SESSION["ID"]=$ID;
                    $_SESSION["Permission"]=$Permission;
                    echo "<script>window.location.href='account_management.php'</script>";
                    $stmt->close(); 
                    exit();
                }
            }
            else
            {
                echo "<script>alert('Thông tin tài khoản mật khẩu không chính xác!!')</script>";
                echo "<script>window.location.href='".$page_login."'</script>";
                $stmt->close(); 
                exit();
            }
            // $number=20000;
            // $number=number_format($number);
            // echo $number;
        }
    }
    $conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="../../css/login.css">
</head>
<body>
    <div id="page">
        <div class="logo">
            <ion-icon name="logo-react"></ion-icon>
        </div>
        <div class="content">
            <div class="left">
                <div class="title">
                    <h1></h1>
                </div>
                <p>Xin chào quý khách đã đến của ManCiTy</p>
                <button><a href="dangky.php">Đăng ký</a></button>
            </div>
            <div class="right">
                <form action="" method="post">
                    <h1>LOGIN</h1>
                    <input type="text" name="taikhoan" id="" placeholder="Tài khoản">
                    <input type="password" name="matkhau" placeholder="Mật khẩu">
                    <input type="submit" name="login" id="" value="LOGIN">
                </form>
            </div>
        </div>
    </div>




    <script src="../../js/login.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>