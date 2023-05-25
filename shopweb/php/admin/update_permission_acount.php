<?php
    $conn=include"../../include/ketnoidatabase.php";
    session_start();
    if(isset($_GET["ID"]))
    {
        $ID=$_GET["ID"];
    }
    if(isset($_POST["submit"]))
    {
        $Permisions=$_POST["Permission"];
        if($Permisions=="")
        {
            echo "<script>alert('Erro: chưa phân quyền cho ID $ID !!!!')</script>";
            echo "<script>window.location.href='edit_acount.php?ID=$ID'</script>";
        }
        else
        {
            // echo "<script>alert('$ID')</script>";
            $stmt1 = $conn->prepare("UPDATE taikhoan SET Permission=? where ID=?");
            $stmt1->bind_param("ii",$Permisions,$ID);
            $stmt1->execute();
            // $result1 = $stmt1->get_result();
            //echo $result1->num_rows;
            if ($stmt1) 
            {  
                echo "<script>alert('Duyệt thành công')</script>";
                echo "<script>window.location.href='taikhoancanduyet.php'</script>";
                $stmt1->close();     
                exit();
            }
            else
            {
                echo "<script>alert('Duyệt không thành công !!!!')</script>";
                echo "<script>window.location.href='edit_acount.php?ID=$ID'</script>";
                $stmt1->close();     
                exit();
            }
        }
    }
    $conn->close();
?>