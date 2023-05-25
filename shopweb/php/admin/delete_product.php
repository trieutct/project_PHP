<?php
    session_start(); 
    $conn=include"../../include/ketnoidatabase.php";
    if(isset($_GET["ID"]))
    {
        $ID=$_GET["ID"];
        $stmt1 = $conn->prepare("DELETE from product WHERE ID=?");
        $stmt1->bind_param("i",$ID);
        if($stmt1)
        {
                if($_SESSION["Permission"]==2)
                {
                    echo "<script>alert('Bạn chỉ là nhân viên. Không có quyền xóa');
                                 window.location.href='list_product.php';
                        </script>";
                }
                else
                {
                    echo "<script>
                            if(confirm('Bạn chắc chắn muốn xóa không')==true)
                            {
                                window.location.href='confirm_True.php?delete_product_True=$ID';
                            }
                            else
                            {
                                window.location.href='list_product.php';
                            }
                        </script>"; 
                }
        }
            
    }
    else
    {
        echo "<script>alert('Erro: Xóa không thành công')</script>";
    }
    $conn->close();
?>