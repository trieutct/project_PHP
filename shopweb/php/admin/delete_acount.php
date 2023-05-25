<?php
    session_start(); 
    $conn=include"../../include/ketnoidatabase.php";
    if(isset($_GET["ID"]))
    {
        $ID=$_GET["ID"];
        $stmt1 = $conn->prepare("DELETE from taikhoan WHERE ID=?");
        $stmt1->bind_param("i",$ID);
        if($stmt1)
        {
            if(isset($_GET['taikhoancanduyet']))
            {
                if($_SESSION["Permission"]==2)
                {
                    echo "<script>alert('Bạn chỉ là nhân viên. Không có quyền xóa');
                                 window.location.href='taikhoancanduyet.php';
                        </script>";
                }
                else
                {
                    echo "<script>
                            if(confirm('Bạn chắc chắn muốn xóa không')==true)
                            {
                                window.location.href='confirm_True.php?delete_True=$ID&taikhoancanduyet=oki';
                            }
                            else
                            {
                                window.location.href='taikhoancanduyet.php';
                            }
                        </script>"; 
                }
            }
            else if(isset($_GET['total_users']))
            {
                if($_SESSION["Permission"]==2)
                {
                    echo "<script>alert('Bạn chỉ là nhân viên. Không có quyền xóa');
                                 window.location.href='total_users.php';
                        </script>";
                }
                else
                {
                    echo "<script>
                            if(confirm('Bạn chắc chắn muốn xóa không')==true)
                            {
                                window.location.href='confirm_True.php?delete_True=$ID&total_users=oki';
                            }
                            else
                            {
                                window.location.href='total_users.php';
                            }
                        </script>";
                }
            }
            else if(isset($_GET['total_admins']))
            {
                if($_SESSION["Permission"]==2)
                {
                    echo "<script>alert('Bạn chỉ là nhân viên. Không có quyền xóa');
                                 window.location.href='total_admins.php';
                        </script>";
                }
                else
                {
                    echo "<script>
                            if(confirm('Bạn chắc chắn muốn xóa không')==true)
                            {
                                window.location.href='confirm_True.php?delete_True=$ID&total_admins=oki';
                            }
                            else
                            {
                                window.location.href='total_admins.php';
                            }
                        </script>";
                }
            }
            else if(isset($_GET['total_users_in7days']))
            {
                if($_SESSION["Permission"]==2)
                {
                    echo "<script>alert('Bạn chỉ là nhân viên. Không có quyền xóa');
                                 window.location.href='users_in_7days.php';
                        </script>";
                }
                else
                {
                    echo "<script>
                                if(confirm('Bạn chắc chắn muốn xóa không')==true)
                                {
                                    window.location.href='confirm_True.php?delete_True=$ID&total_users_in7days=oki';
                                }
                                else
                                {
                                    window.location.href='users_in_7days.php';
                                }
                            </script>"; 
                }
            }
            else if(isset($_GET['total_users_in30days']))
            {
                if($_SESSION["Permission"]==2)
                {
                    echo "<script>alert('Bạn chỉ là nhân viên. Không có quyền xóa');
                                 window.location.href='users_in_30days.php';
                        </script>";
                }
                else
                {
                    echo "<script>
                            if(confirm('Bạn chắc chắn muốn xóa không')==true)
                            {
                                window.location.href='confirm_True.php?delete_True=$ID&total_users_in30days=oki';
                            }
                            else
                            {
                                window.location.href='users_in_30days.php';
                            }
                        </script>";
                }
            }
        }
    }
    else
    {
        echo "<script>alert('Erro: Xóa không thành công')</script>";
    }
    $conn->close();
?>