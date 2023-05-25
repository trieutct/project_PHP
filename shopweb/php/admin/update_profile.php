<?php
    $conn=include"../../include/ketnoidatabase.php";
    session_start();
    if(isset($_POST["submit"]))
    {
        $stmt1 = $conn->prepare("UPDATE taikhoan SET DiaChi=?,SoDienThoai=? where ID=?");
        $stmt1->bind_param("ssi",$_POST["DiaChi"],$_POST["SoDienThoai"],$_SESSION["ID"]);
        if($stmt1)
        {
            $stmt1->execute();
            echo "<script>alert('Cập nhật thành công')</script>";
            echo "<script>window.location.href='profile.php'</script>";
            $stmt1->close();     
            exit();
        }
        else
        {
            echo "<script>alert('Erro: Cập nhật không thành công')</script>";
            echo "<script>window.location.href='profile.php'</script>";
        }
    }
    $conn->close();
?>