<?php
    $conn=include"../../include/ketnoidatabase.php";
    session_start(); 
    if(isset($_GET["delete_True"]))//detele account
    {
        $ID_Delete=$_GET["delete_True"];
        $stmt1 = $conn->prepare("DELETE from taikhoan WHERE ID=?");
        $stmt1->bind_param("i",$ID_Delete);
        if($stmt1)
        {
            $stmt1->execute();
            $stmt1->close();
            if(isset($_GET["taikhoancanduyet"]))
            {
                echo "<script>window.location.href='taikhoancanduyet.php';</script>";
            }
            else if(isset($_GET["total_users"]))
            {
                echo "<script>window.location.href='total_users.php';</script>";
            }
            else if(isset($_GET["total_admins"]))
            {
                echo "<script>window.location.href='total_admins.php';</script>";
            }
            else if(isset($_GET["total_users_in7days"]))
            {
                echo "<script>window.location.href='users_in_7days.php';</script>";
            }
            else if(isset($_GET["total_users_in30days"]))
            {
                echo "<script>window.location.href='users_in_30days.php';</script>";
            }
        }
    }
    else if(isset($_GET["Update_True"]))
    {
        $MK_Update=$_GET["Update_True"];
        $stmt2 = $conn->prepare("UPDATE taikhoan SET MatKhau=? where ID=?");
        $stmt2->bind_param("si",$MK_Update,$_SESSION["ID"]);
        if($stmt2)
        {
            $stmt2->execute();
            $stmt2->close();
            if(isset($_GET["account_management"]))
            {
                echo "<script>
                        alert('Đổi Thành Công');
                        window.location.href='account_management.php';
                    </script>";
            }
            if(isset($_GET["shopweb"]))
            {
                echo "<script>
                        alert('Đổi Thành Công');
                        window.location.href='../user/shopweb.php';
                    </script>";
            }
        }
    }
    else if(isset($_GET["delete_product_True"]))
    {
        $ID_Delete=$_GET["delete_product_True"];
        $stmt1 = $conn->prepare("DELETE from product WHERE ID=?");
        $stmt1->bind_param("i",$ID_Delete);
        if($stmt1)
        {
            $stmt1->execute();
            $stmt1->close();
            echo "<script>
                    window.location.href='list_product.php'
                    </script>";
        }
    }
    else
    {
        echo "<script>alert('Erro: Xóa không thành công')</script>";
    }

    $conn->close();
?>
