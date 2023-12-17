<?php
    session_start();
    include("functions/user_function.php");
?>
<!DOCTYPE html>
<html lang="vi-VN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Tech Hoàng Phát Loan Khanh - Kinh doanh công nghệ số, mua - bán điện thoại, máy tính, camera">
    <meta name="keywords" content="Hoàng Phát, Hoàng Phát Cao Lãnh">
    <meta name="author" content="TruongNgocPhuc">
    <meta propety="og:type" content="website"/>
    <meta propety="og:title" content="Hoàng Phát - Kinh doanh công nghệ số, mua - bán điện thoại, máy tính, camera"/>
    <meta propety="og:description" content="Tech Hoàng Phát Loan Khanh - Kinh doanh công nghệ số, mua - bán điện thoại, máy tính, camera"/>
    <meta propety="og:url" content=""/>
    <meta propety="og:image" content="./assets/images/upload/hoangphatlogo.png"/>
    <!-- Bootstrap icons -->
    <link rel="stylesheet" href="./assets/bootstrap/node_modules/bootstrap-icons/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="./assets/bootstrap/node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <!-- JQuery + Ajax -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <!-- Reset CSS -->
    <link rel="stylesheet" href="./assets/css/reset.css">
    <!-- Style -->
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/cart.css">
    <link rel="stylesheet" href="./assets/css/category.css">
    <link rel="stylesheet" href="./assets/css/checkout.css">
    <link rel="stylesheet" href="./assets/css/login.css">
    <link rel="stylesheet" href="./assets/css/mobile-category.css">
    <link rel="stylesheet" href="./assets/css/products.css">
    <link rel="stylesheet" href="./assets/css/profile.css">
    <link rel="stylesheet" href="./assets/css/register.css">
    <!-- Media -->
    <link rel="stylesheet" href="./assets/css/media.css">
    <title>Hoàng Phát - Kinh doanh công nghệ số, mua - bán điện thoại, máy tính, camera</title>
</head>
<body>
    <div class="custom-container">
        <header>
            <!-- Banner -->
            <div class="row banner">
                <img src="https://lh3.googleusercontent.com/5hsL_sMtnmh_hwWnJ06ayYZkrRulsBwQ839oqLBAILBnykgWSg_-zTwItuHts-5-v_HaLvU_FzVyBi9QvFI-D-B5onBI4o50=w1920-rw" alt="">
            </div>
            <!-- Banner -->

            <!-- About us -->
            <div class="contact_us">
                <address>
                    <i class="bi bi-geo-alt"></i>
                    2A Võ Văn Trị, P.Hòa Thuận, Tp. Cao Lãnh, Đồng Tháp
                </address>
                <div>
                    <i class="bi bi-telephone"></i>
                    <span>0939833533 - 0939854769</span>
                </div>
                <a href="https://www.facebook.com/">
                    <i class="bi bi-facebook"></i>
                    <span>Vi tính Hoàng Phát</span>
                </a>
            </div>
            <!-- About us -->

            <!-- Navigation -->
            <div id="navbar">
                <div class="navbar-content">
                <!-- Logo -->
                <a href="index.php" class="logo">
                    <img src="./assets/images/upload/logo.png" alt="">
                </a>
                <button class="logo-menu fz-21" id="menu">
                    <i class="bi bi-justify"></i>
                    <span>Danh mục</span>
                </button>
                <div id="list">
                    <ul class="list-items">
                        <?php
                            $category = userSelect("categories");
                            if(mysqli_num_rows($category) > 0){
                                foreach($category as $item){
                        ?>
                            <li class="items">
                                <a href="category.php?category=<?php echo $item["category_id"];?>">
                                    <?php echo $item["category_name"];?>
                                </a>
                            </li>
                        <?php
                                }
                            }
                            else{
                                echo "Không có danh mục";
                            }
                        ?>
                    </ul>
                </div>
                <div class="search-container">
                    <div class="search-box">
                        <form action="search.php" method="GET">
                            <input type="text" name="keyword" id="search-text" placeholder="Tìm kiếm sản phẩm" maxlength="255">
                            <button type="submit" id="search" name="search_btn">
                                <i class="bi bi-search"></i>
                            </button>
                        </form>
<<<<<<< HEAD
                        <button id="voice_search">
                            <i class="bi bi-mic"></i>
                        </button>
=======
>>>>>>> a57f051fa770c9c73f7ad80e69ad48a62dfd514c
                    </div>
                </div>
                <?php
                    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
                        echo '
                        <a href="login.php" class="fz-21" id="accountBtn">
                            <i class="bi bi-person-circle"></i>
                            <span>Tài khoản</span>
                        </a>
                        ';
                    } else {
                        $theSession = htmlspecialchars($_SESSION["name"]);
                        echo "<a class='pc-show' href='profile.php'>$theSession</a>";
                        echo "<a class='pc-show' href='logout.php'>Đăng xuất</a>";
                    }
                ?>
                <?php
                    if(isset($_SESSION["loggedin"])){
                        $id = $_SESSION["id"];
                        $query = "SELECT carts_id, COUNT(carts_id) FROM carts WHERE users_id='$id'";
                        $run = mysqli_query($con, $query);
                        $row = mysqli_fetch_array($run);
                    }
                ?>
                <a href="cart.php" class="fz-21 cart" 
                data-index="<?php echo isset($_SESSION["loggedin"])?$row["COUNT(carts_id)"]:'0';?>">
                    <i class="bi bi-cart"></i>
                    <span>Giỏ hàng</span>
                </a>
                </div>
            </div>
            <!-- Navigation -->
        </header>