<?php
    $conn=include'../../include/ketnoidatabase.php';
    session_start(); 
    if(isset($_GET["trang"]))
    {
        $trang=$_GET["trang"];
    }
    else
        $trang="";
    if($trang=="" || $trang==1)
    {
        $begin=0;
    }
    else
        $begin=($trang*4)-4;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <link rel="stylesheet" href="../../css/shopweb.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body>
    <div id="wrapper">
        <?php include"../../include/header_user.php" ?>
        <?php include"../../include/slide_web.php" ?>
        <div id="wp-products">
            <h2>SẢN PHẨM BÁN CHẠY CỦA CHÚNG TÔI</h2>
            <ul id="list-products">
            <?php
                $stmt = $conn->prepare("SELECT * FROM product LIMIT $begin,4");
                $stmt->execute();
                $result = $stmt->get_result();
                if ($result->num_rows > 0) {   
                    while($row = $result->fetch_assoc()) {                        
            ?>
                <div class="item">
                    <a href="">
                        <img src="../../img/<?php echo $row["Images"] ?>" alt="">
                        <div class="stars">
                            <span>
                                <i class="fa-solid fa-star"></i>
                            </span>
                            <span>
                                <i class="fa-solid fa-star"></i>
                            </span>
                            <span>
                                <i class="fa-solid fa-star"></i>
                            </span>
                            <span>
                                <i class="fa-solid fa-star"></i>
                            </span>
                            <span>
                                <i class="fa-solid fa-star"></i>
                            </span>
                        </div>
                        
                        <div class="name">
                        <?php echo $row["TenSanPham"] ?>
                        </div>
                        <div class="desc">
                        <?php echo $row["MoTa"] ?> 
                        </div>
                        <div class="price">
                            <span><?php echo number_format($row["Price"]) ?></span> VNĐ
                        </div>
                    </a>
                </div>
                <?php 
                        }
                    }
                ?>
            </ul>
            <?php
                $sql_page=mysqli_query($conn,"select * from product");
                $count=mysqli_num_rows($sql_page);
                $pages=ceil($count/4);
            ?>
            <div class="list-page">
            <?php
                for($i=1;$i<=$pages;$i++)
                    {
            ?>
                    <a 
                    <?php
                        if($i==$trang)
                        {
                            echo 'style="background:#DCDCDC"';
                        }
                    ?>
                    href="shopweb.php?trang=<?php echo $i ?>"><?php echo $i ?></a>
            <?php       
                    }
            ?>
            </div>
        </div>
        <div id="saleoff">
            <div class="box-left">
                <h1>
                    <span>Giảm giá lên đến</span>
                    <span>45%</span>
                </h1>
            </div>
            <div class="box-right">

            </div>
        </div>
        <div id="comment">
            <h2>NHẬN XÉT CỦA KHÁCH HÀNG</h2>
            <div id="comment-body">
                <div class="prev">
                    <a href="">
                        <i class="fa-solid fa-angle-left"></i>
                    </a>
                </div>
                <ul id="list-comment">
                    <li class="item">
                        <div class="avatar">
                            <img src="../../img/avatar.jpg" alt="">
                        </div>
                        <div class="stars">
                            <span><i class="fa-solid fa-star"></i></span>
                            <span><i class="fa-solid fa-star"></i></span>
                            <span><i class="fa-solid fa-star"></i></span>
                            <span><i class="fa-solid fa-star"></i></span>
                            <span><i class="fa-solid fa-star"></i></span>
                        </div>
                        <div class="name">
                            Trịnh Công Triệu
                        </div>
                        <div class="text">
                            <p>Bố mẹ quen 1 bác đang tuyển công nhân, lương lậu cũng ổn…
                                Bố mẹ cũng tâm sự bảo thôi giờ ở nhà, tiền ăn ở ko phải lo, đi làm bao nhiêu thì tiết kiệm để lo cho sau này</p>
                        </div>
                    </li>
                    <li class="item">
                        <div class="avatar">
                            <img src="../../img/avatar.jpg" alt="">
                        </div>
                        <div class="stars">
                            <span><i class="fa-solid fa-star"></i></span>
                            <span><i class="fa-solid fa-star"></i></span>
                            <span><i class="fa-solid fa-star"></i></span>
                            <span><i class="fa-solid fa-star"></i></span>
                            <span><i class="fa-solid fa-star"></i></span>
                        </div>
                        <div class="name">
                            Trịnh Công Triệu
                        </div>
                        <div class="text">
                            <p>Bố mẹ quen 1 bác đang tuyển công nhân, lương lậu cũng ổn…
                                Bố mẹ cũng tâm sự bảo thôi giờ ở nhà, tiền ăn ở ko phải lo, đi làm bao nhiêu thì tiết kiệm để lo cho sau này</p>
                        </div>
                    </li>
                    <li class="item">
                        <div class="avatar">
                            <img src="../../img/avatar.jpg" alt="">
                        </div>
                        <div class="stars">
                            <span><i class="fa-solid fa-star"></i></span>
                            <span><i class="fa-solid fa-star"></i></span>
                            <span><i class="fa-solid fa-star"></i></span>
                            <span><i class="fa-solid fa-star"></i></span>
                            <span><i class="fa-solid fa-star"></i></span>
                        </div>
                        <div class="name">
                            Trịnh Công Triệu
                        </div>
                        <div class="text">
                            <p>Bố mẹ quen 1 bác đang tuyển công nhân, lương lậu cũng ổn…
                                Bố mẹ cũng tâm sự bảo thôi giờ ở nhà, tiền ăn ở ko phải lo, đi làm bao nhiêu thì tiết kiệm để lo cho sau này</p>
                        </div>
                    </li>
                </ul>
                <div class="next">
                    <a href="">
                        <i class="fa-solid fa-angle-right"></i>
                    </a>
                </div>
            </div>
        </div>
        <?php include"../../include/footer_user.php" ?>
    </div>

    <script src="../../js/foodweb.js"></script>
</body>
<?php
    $conn->close();
?>
</html>