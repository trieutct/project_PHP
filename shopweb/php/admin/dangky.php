<?php
    $conn=include '../../include/ketnoidatabase.php';
    if(isset($_POST['submit']))
    {
        $taikhoan=$_POST['taikhoan'];
        $matkhau=$_POST['matkhau'];
        $laimatkhau=$_POST['laimatkhau'];
        $page_dangky='dangky.php';
        $Permission=0;
        if(empty($taikhoan) || empty($matkhau) || empty($laimatkhau))
        {
            echo "<script>alert('Vui lòng không được để chống')</script>";
            echo "<script>window.location.href='".$page_dangky."'</script>";
            exit();
        }
        else
        {
            if($matkhau != $laimatkhau)
            {
                echo "<script>alert('2 mật khẩu không giống nhau. Vui lòng nhập lại!')</script>";
                echo "<script>window.location.href='".$page_dangky."'</script>";
                exit();
            }
            else
            {
                $stmt = $conn->prepare("SELECT * FROM taikhoan WHERE TaiKhoan=? ");
                $stmt->bind_param("s", $taikhoan);
                $stmt->execute();
                $result = $stmt->get_result();
                if ($result->num_rows > 0) {
                    // echo $result->fetch_assoc()['TaiKhoan'];
                    echo "<script>alert('Tài khoản này đã tồn tại.Vui lòng bạn chọn tài khoản khác')</script>";
                    echo "<script>window.location.href='".$page_dangky."'</script>";
                    $stmt->close(); 
                    exit();
                }
                else
                {
                    $matkhau=md5($laimatkhau);
                    $stmt = $conn->prepare("INSERT INTO taikhoan (TaiKhoan,MatKhau,Permission) VALUES (?, ?, ?)");
                    $stmt->bind_param("ssi", $taikhoan, $matkhau,$Permission);      
                    $stmt->execute();
                    // $result= $stmt->get_result();
                    // header("location:login.php");
                    echo "<script>alert('Bạn đăng ký thành công. Vui lòng đợi admin duyệt tài khoản!!!')</script>";
                    echo "<script>window.location.href='login.php'</script>";
                    $stmt->close(); 
                    exit();
                }
            }
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
    <link rel="stylesheet" href="../../css/dangky.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
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
                <button><a href="login.php">Đăng Nhập</a></button>
            </div>
            <div class="right">
                <form action="" method="post">
                    <h1>ĐĂNG KÝ</h1>
                    <input type="text" name="taikhoan" id="" placeholder="Tài khoản">
                    <input type="password" name="matkhau" placeholder="Mật khẩu">
                    <input type="password" name="laimatkhau" placeholder="Nhập lại mật khẩu">
                    <input type="submit" name="submit" id="" value="ĐĂNG KÝ">
                </form>
            </div>
        </div>
    </div>






    <script src="../../js/dangky.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>