<?php
    $conn=include'../../include/ketnoidatabase.php';
    session_start(); 
    if(!$_SESSION["ID"])
    {
        echo "<script>window.location.href='login.php'</script>";
    }
    if(isset($_POST["submit"]))
    {
        $stmt = $conn->prepare("SELECT MatKhau FROM taikhoan where ID=?");
        $stmt->bind_param("i",$_SESSION["ID"]);
        $stmt->execute();
        $result = $stmt->get_result();
        $Password=$result->fetch_assoc()["MatKhau"];   
        if((md5($_POST["password_cu"])) != $Password)
        {
            $stmt->close();
            echo "<script>
                    alert('Erro: Mật khẩu cũ không đúng')
                    window.location.href='edit_password.php'
                </script>";
        } 
        else if($_POST["password_moi"] != $_POST["nl_password_moi"])
        {
            $stmt->close();
            echo "<script>
                    alert('Erro: 2 mật khẩu mới không giống nhau')
                    window.location.href='edit_password.php'
                </script>";
        }
        else
        {
            $stmt1 = $conn->prepare("UPDATE taikhoan SET MatKhau=? where ID=?");
            $stmt1->bind_param("si",$_POST["nl_password_moi"],$_SESSION["ID"]);
            if($stmt1)
            {
                $Password_moi=md5($_POST["password_moi"]);
                echo "<script>
                            if(confirm('Bạn chắc chắn muốn đổi mật khẩu không?')==true)
                            {
                                window.location.href='confirm_True.php?Update_True=$Password_moi&account_management=oki';
                            }
                            else
                            {
                                window.location.href='edit_password.php';
                            }
                        </script>";
            }
        }
    }
?>