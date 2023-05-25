<?php
    $conn=include"../../include/ketnoidatabase.php";
    session_start();
    if(isset($_POST["submit"]))
    {
        if(empty($_POST["MaSanPham"]))
        {
            echo 
                    "<script>
                        alert('Erro: Vui lòng nhập mã sản phẩm');
                        window.location.href='add_product.php';
                    </script>";
            exit();
        }
        else if(empty($_POST["TenSanPham"]))
        {
            echo 
                    "<script>
                        alert('Erro: Vui lòng nhập tên sản phẩm');
                        window.location.href='add_product.php';
                    </script>";
            exit();
        }
        else if(empty($_POST["Image"]))
        {
            echo 
                    "<script>
                        alert('Erro: Vui lòng phải có ảnh của sản phẩm');
                        window.location.href='add_product.php';
                    </script>";
            exit();
        }
        else if(empty($_POST["Price"]))
        {
            echo 
                    "<script>
                        alert('Erro: Vui lòng nhập giá sản phẩm');
                        window.location.href='add_product.php';
                    </script>";
            exit();
        }
        else if(!is_numeric($_POST["Price"]))
        {
            echo 
                    "<script>
                        alert('Erro: Vui lòng giá sản phẩm phải là số');
                        window.location.href='add_product.php';
                    </script>";
            exit();
        }
        else
        {
            $stmt = $conn->prepare("SELECT * FROM product WHERE MaSanPham=? ");
            $stmt->bind_param("s", $_POST["MaSanPham"]);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                echo "<script>alert('Erro: Mã sản phẩm đã tồn tại')</script>";
                echo "<script>window.location.href='add_product.php'</script>";
                $stmt->close(); 
                exit();
            }
            else
            {
                $stmt = $conn->prepare("INSERT INTO product(MaSanPham,TenSanPham,Images,Price,MoTa) VALUES (?, ?, ?,?,?)");
                $stmt->bind_param("sssis", $_POST["MaSanPham"], $_POST["TenSanPham"], $_POST["Image"], $_POST["Price"], $_POST["MoTa"]);
                $stmt->execute();
                $result = $stmt->get_result();
                echo "<script>alert('Thêm sản phẩm thành công')</script>";
                echo "<script>window.location.href='add_product.php'</script>";
                $stmt->close(); 
                exit();
            }
        }
    }
    $conn->close();
?>