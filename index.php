<?php
    include "slider/header.php";
?>
    <main>
            <!-- Slideshow -->
            <div class="slideshow-box">
                <!-- Slideshow container -->
                <div class="slideshow-container">
                    <div class="slider">
                    <div class="slides">
                        <input type="radio" name="radio-btn" id="radio1">
                        <input type="radio" name="radio-btn" id="radio2">
                        <input type="radio" name="radio-btn" id="radio3">
                        <input type="radio" name="radio-btn" id="radio4">
                        <?php
                            $banners = showBanner("banner_tbl");
                            if(mysqli_num_rows($banners) > 0){
                                foreach($banners as $banner){
                        ?>
                            <div class="slide <?= $banner["banner_id"]==1?'first':'' ?>">
                                <img src="uploads/banners/<?= $banner["banner_images"];?>" alt="">
                            </div>
                        <?php
                                }
                            }
                        ?>
                        <div class="navigation-auto">
                            <div class="auto-btn1"></div>
                            <div class="auto-btn2"></div>
                            <div class="auto-btn3"></div>
                            <div class="auto-btn4"></div>
                        </div>
                    </div>
                    <div class="navigation-manual">
                        <label for="radio1" class="manual-btn"></label>
                        <label for="radio2" class="manual-btn"></label>
                        <label for="radio3" class="manual-btn"></label>
                        <label for="radio4" class="manual-btn"></label>
                    </div>
                    </div>
                </div>
            </div>
            <!-- Slideshow -->

            <!-- Content -->
            <div class="content">
                <!-- Deal -->
                <div class="deal content-items">
                    <div class="deal-title">
                        <div class="deal-title-date">
                            <h3>
                                Diễn ra từ ngày
                                <span id="start-date">16/10</span> -<span id="end-date">22/10</span> 
                            </h3>
                            <div class="countdown">
                                <h4>Kết thúc sau: </h4>
                                <span class="countdown-time" id="hours"></span>
                                <span class="countdown-time" id="minute"></span>
                                <span class="countdown-time" id="second"></span>
                            </div>
                        </div>
                        <div class="deal-title-text">
                            <img src="https://img.tgdd.vn/imgt/f_webp,fit_outside,quality_100/https://cdn.tgdd.vn/mwgcart/mwgcore/ContentMwg/images/homev2/fs-1610-2210-theme/desk/tgdd/banner-title.jpg" alt="">
                        </div>
                    </div>
                    <div class="deal-content">
                        <div class="carousel owl-carousel">
                            <?php
                                $deals = getSales("products_tbl");
                                if(mysqli_num_rows($deals) > 0){
                                    foreach($deals as $deal){
                            ?>
                                <div class="card">
                                    <a href="products.php?products=<?= $deal["products_id"];?>" class="card-img">
                                        <img src="uploads/products/<?= $deal["products_image"];?>" alt="">
                                    </a>
                                    <div class="card-info">
                                        <h2 class="card-name"><?= $deal["products_name"];?></h2>
                                        <div class="card-price">
                                            <div class="price-sale"><?= number_format($deal["products_price_sales"],0,'','.');?><sup>đ</sup></div>
                                            <div class="price-primary"><?= number_format($deal["products_price"],0,'','.');?><sup>đ</sup></div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                                    }
                                }
                                else{
                                    echo "Không có sản phẩm";
                                }
                            ?>
                        </div>
                    </div>
                </div>
                <!-- Deal -->
                <!-- New Products -->
                <div class="advertisement content-items">
                    <div class="advertisement-item">
                        <a href="#">
                            <img src="https://lh3.googleusercontent.com/XtKhmrgEt5uItWtpTA5kmLVhjiva1VZvRL1ROXtf0bvMYsGWOdV3tOiKpPFTg2B_KxvrVHQQtujsj0TkQVrsh9jsu_gKb4c1=w616-rw" alt="">
                        </a>
                    </div>
                    <div class="advertisement-item">
                        <a href="#">
                            <img src="https://lh3.googleusercontent.com/pmpFbS7kiNXIwKXjB4-snm6L31inUSAHv2UtBLIliQKFknmG5Tw2T_JrgbzAUbLTs3LWU32Plx3SSQsZdpJnV1aSwOQrOE_P=w616-rw" alt="">
                        </a>
                    </div>
                </div>
                <!-- New Products -->
                <!-- Laptop -->
                <div class="laptop content-items">
                    <div class="laptop-banner content-banner">
                        <div class="laptop-title content-title">
                            Laptop
                        </div>
                        <a href="category.php?category=21" class="content-show-all">
                            <span>Xem tất cả</span>
                            <i class="bi bi-chevron-right"></i>
                        </a>
                    </div>
                    <hr>
                    <div class="laptop-content">
                        <div class="carousel owl-carousel">
                            <?php
                                $laptops = getShow("products_tbl", 21);
                                if(mysqli_num_rows($laptops) > 0){
                                    foreach($laptops as $laptop){
                            ?>
                                <div class="card">
                                    <a href="products.php?products=<?= $laptop["products_id"];?>" class="card-img">
                                        <img src="uploads/products/<?= $laptop["products_image"];?>" alt="">
                                    </a>
                                    <div class="card-info">
                                        <h2 class="card-name"><?= $laptop["products_name"];?></h2>
                                        <div class="card-price">
                                            <div class="price-sale"><?= number_format($laptop["products_price_sales"],0,'','.');?><sup>đ</sup></div>
                                            <div class="price-primary"><?= number_format($laptop["products_price"],0,'','.');?><sup>đ</sup></div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                                    }
                                }
                                else{
                                    echo "Không có sản phẩm";
                                }
                            ?>
                        </div>
                    </div>
                </div>
                <!-- Laptop -->
                <!-- SmartPhone -->
                <div class="smartphone content-items">
                    <div class="smartphone-banner content-banner">
                        <div class="smartphone-title content-title">
                            Điện thoại
                        </div>
                        <a href="category.php?category=22" class="smartphone-show-all content-show-all">
                            <span>Xem tất cả</span>
                            <i class="bi bi-chevron-right"></i>
                        </a>
                    </div>
                    <hr>
                    <div class="smartphone-content">
                        <div class="carousel owl-carousel">
                            <?php
                                $smartphones = getShow("products_tbl", 22);
                                if(mysqli_num_rows($smartphones) > 0){
                                    foreach($smartphones as $smartphone){
                            ?>
                                <div class="card">
                                    <a href="products.php?products=<?= $smartphone["products_id"];?>" class="card-img">
                                        <img src="uploads/products/<?= $smartphone["products_image"];?>" alt="">
                                    </a>
                                    <div class="card-info">
                                        <h2 class="card-name"><?= $smartphone["products_name"];?></h2>
                                        <div class="card-price">
                                            <div class="price-sale"><?= number_format($smartphone["products_price_sales"],0,'','.');?><sup>đ</sup></div>
                                            <div class="price-primary"><?= number_format($smartphone["products_price"],0,'','.');?><sup>đ</sup></div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                                    }
                                }
                                else{
                                    echo "Không có sản phẩm";
                                }
                            ?>
                        </div>
                    </div>
                </div>
                <!-- SmartPhone -->
                <!-- Camera -->
                <div class="camera content-items">
                    <div class="camera-banner content-banner">
                        <div class="camera-title content-title">
                            Camera
                        </div>
                        <a href="category.php?category=23" class="camera-show-all content-show-all">
                            <span>Xem tất cả</span>
                            <i class="bi bi-chevron-right"></i>
                        </a>
                    </div>
                    <hr>
                    <div class="camera-content">
                        <div class="carousel owl-carousel">
                            <?php
                                $cameras = getShow("products_tbl", 23);
                                if(mysqli_num_rows($cameras) > 0){
                                    foreach($cameras as $camera){
                            ?>
                                <div class="card">
                                    <a href="products.php?products=<?= $camera["products_id"];?>" class="card-img">
                                        <img src="uploads/products/<?= $camera["products_image"];?>" alt="">
                                    </a>
                                    <div class="card-info">
                                        <h2 class="card-name"><?= $camera["products_name"];?></h2>
                                        <div class="card-price">
                                            <div class="price-sale"><?= number_format($camera["products_price_sales"],0,'','.');?><sup>đ</sup></div>
                                            <div class="price-primary"><?= number_format($camera["products_price_sales"],0,'','.');?><sup>đ</sup></div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                                    }
                                }
                                else{
                                    echo "Không có sản phẩm";
                                }
                            ?>
                        </div>
                    </div>
                </div>
                <!-- Camera -->
            </div>
            <!-- Content -->
        </main>
        <script src="./assets/js/main.js"></script>
<?php
    include "slider/footer.php";
    include "slider/mobile-footer.php";
?>