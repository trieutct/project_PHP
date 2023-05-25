<?php
    $conn=include"../../include/ketnoidatabase.php";
    session_start();
    if(isset($_GET["ID"]))
    {
        $ID=$_GET["ID"];
    }
    if(isset($_POST["submit"]))
    {
        if(empty($_POST["Price"]))
        {
            echo "<script>alert('Erro: Không được để chống Price. ')</script>";
            echo "<script>window.location.href='edit_product.php?ID=$ID'</script>";
        }
        else if(!is_numeric($_POST["Price"]))
        {
            echo 
                    "<script>
                        alert('Erro: Vui lòng giá sản phẩm phải là số');
                        window.location.href='edit_product.php?ID=$ID';
                    </script>";
            exit();
        }
        else if(empty($_POST["Image"]))
        {
            $stmt1 = $conn->prepare("UPDATE product SET TenSanPham=?,Price=?,MoTa=? where ID=?");
            $stmt1->bind_param("sisi",$_POST["TenSanPham"],$_POST["Price"],$_POST["MoTa"],$ID);
            if($stmt1)
            {
                $stmt1->execute();
                $stmt1->close();     
                echo "<script>alert('Cập nhật thành công')</script>";
                echo "<script>window.location.href='list_product.php'</script>";
                exit();
            }
            else
            {
                echo "<script>alert('Erro: Cập nhật không thành công')</script>";
                echo "<script>window.location.href='edit_product.php?ID=$ID'</script>";
            }
        }
        else if(!empty($_POST["Image"]))
        {
            $stmt1 = $conn->prepare("UPDATE product SET TenSanPham=?,Images=?,Price=?,MoTa=? where ID=?");
            $stmt1->bind_param("ssisi",$_POST["TenSanPham"],$_POST["Image"],$_POST["Price"],$_POST["MoTa"],$ID);
            if($stmt1)
            {
                $stmt1->execute();
                $stmt1->close();     
                echo "<script>alert('Cập nhật thành công')</script>";
                echo "<script>window.location.href='list_product.php'</script>";
                exit();
            }
            else
            {
                echo "<script>alert('Erro: Cập nhật không thành công')</script>";
                echo "<script>window.location.href='edit_product.php?ID=$ID'</script>";
            }
        }
    }
    $conn->close();
?>