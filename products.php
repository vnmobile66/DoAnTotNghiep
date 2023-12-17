<?php
    include "slider/header.php";
    $id = $_GET["products"];
    $products = getNameBrand("products_tbl",$id);
    if(mysqli_num_rows($products) > 0){
        $product = mysqli_fetch_array($products);
?>
        <main>
            <section class="breadcrumb">
                <ul class="breadcrumb-list">
                    <li class="breadcrumb-items">
                        <a href="index.php" class="breadcrumb-link">Trang chủ</a>
                    </li>
                    <li class="breadcrumb-items">
                        <?php 
                            $cate = getNameCate("products_tbl",$id);
                            if(mysqli_num_rows($cate) > 0){
                                $category = mysqli_fetch_array($cate);
                        ?>
                            <a href="category.php?category=<?php echo $category["category_id"];?>" class="breadcrumb-link"><?php echo $category["category_name"];?></a>
                        <?php
                            }
                        ?>
                    </li>
                    <li class="breadcrumb-items">
                        <?php echo $product["products_name"];?>
                    </li>
                </ul>
            </section>
            <!-- Breadcrumb -->
            <div class="products-container">
                <div class="products-box" id="myProducts">
                    <div class="products products-data">
                        <div class="products-img">
                            <div class="img">
                                <img src="uploads/products/<?php echo $product["products_image"];?>">
                            </div>
                        </div>
                        <div class="products-content">
                            <h1 class="products-name"><?php echo $product["products_name"];?></h1>
                            <span class="products-brand"><?php echo $product["brand_name"];?></span>
                            <div class="products-qty" style="float: left; width: 100%; margin: 20px 0px;">
                                <span style="margin: 0;">Số lượng</span>
                                <input style="margin: 0;" type="number" value="1" name="qty" class="qty" step="1" min="1" max="<?php echo $product["products_qty"];?>">
                            </div>
                            <div class="products-price">
                                <div class="products-price-sale"><?= number_format($product['products_price_sales'],0,'','.');?><sup>₫</sup></div>
                                <div class="products-price-primary"><?= number_format($product['products_price'],0,'','.');?><sup>₫</sup></div>
                            </div>
                            <div class="products-btn">
                                <button id="add-to-cart" class="addToCart" value="<?php echo $product["products_id"];?>">THÊM VÀO GIỎ HÀNG</button>
                            </div>
                        </div>
                    </div>
                    <div class="products-describe">
                        <h2 class="products-title">Thông số kỹ thuật và Mô tả sản phẩm</h2>
                        <div class="box-parameter">
                            <div class="parameter">
                                <h2 style="padding-bottom: 12px;">Thông số kỹ thuật</h2>
                                <div class="parameter-describe-content">
                                    <?php echo $product['products_parameter'];?>
                                </div>
                            </div>
                            <div class="describe">
                                <h2 style="padding-bottom: 12px;">Mô tả sản phẩm</h2>
                                <div class="parameter-describe-content" style="text-align: justify;">
                                    <?php echo $product['products_describe'];?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
<<<<<<< HEAD
            </div>
=======
            </div>
            <!-- <div class="mobile-products-control">
                <button id="mobile-add-to-cart" class="m-control">THÊM VÀO GIỎ HÀNG</button>
            </div> -->
>>>>>>> a57f051fa770c9c73f7ad80e69ad48a62dfd514c
        </main>
<?php
    }
?>
    <script src="./assets/js/products.js"></script>
<?php
    include "slider/footer.php";
?>