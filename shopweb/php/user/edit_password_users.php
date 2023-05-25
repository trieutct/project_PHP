<?php
    $conn=include'../../include/ketnoidatabase.php';
    session_start(); 
    if($_SESSION["ID"])
    {
        if(isset($_POST["submit"]))
        {
            $stmt = $conn->prepare("SELECT MatKhau FROM taikhoan where ID=?");
            $stmt->bind_param("i",$_SESSION["ID"]);
            $stmt->execute();
            $result = $stmt->get_result();
            $Password=$result->fetch_assoc()["MatKhau"];   
            if((md5($_POST["MatKhauHienTai"])) != $Password)
            {
                $stmt->close();
                echo "<script>
                        alert('Erro: Mật khẩu cũ không đúng')
                        window.location.href='edit_password_users.php'
                    </script>";
            } 
            else if($_POST["MatKhauMoi"] != $_POST["NLMatKhauMoi"])
            {
                $stmt->close();
                echo "<script>
                        alert('Erro: 2 mật khẩu mới không giống nhau')
                        window.location.href='edit_password_users.php'
                    </script>";
            }
            else
            {
                $stmt1 = $conn->prepare("UPDATE taikhoan SET MatKhau=? where ID=?");
                $stmt1->bind_param("si",$_POST["NLMatKhauMoi"],$_SESSION["ID"]);
                if($stmt1)
                {
                    $Password_moi=md5($_POST["NLMatKhauMoi"]);
                    echo "<script>
                                if(confirm('Bạn chắc chắn muốn đổi mật khẩu không?')==true)
                                {
                                    window.location.href='../admin/confirm_True.php?Update_True=$Password_moi&shopweb=oki';
                                }
                                else
                                {
                                    window.location.href='edit_password_users.php';
                                }
                            </script>";
                }
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
                                        <h2>Đổi mật khẩu</h2>
                                        <span style="color:red" ></span>
                                    </caption>
                                    <fieldset class="form-group">
                                            <label>Mật khẩu hiện tại</label> 
                                            <input type="password" value="" class="form-control" name="MatKhauHienTai">
                                            <label>Mật khẩu mới</label> 
                                            <input type="password"  value="" class="form-control" name="MatKhauMoi">
                                            <label>Nhập lại mật khẩu mới</label> 
                                            <input type="password"  value="" class="form-control" name="NLMatKhauMoi">
                                    </fieldset>                
                                            <input type="submit" style="padding:5px;background-color:#1f60a1;border-radius:2px;color:white;border:1px solid #1f60a1" name="submit" value="Đổi mật khẩu" >
                                    </form>
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