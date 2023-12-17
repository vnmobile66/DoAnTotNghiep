<?php
    include "slider/header.php";
    $id = $_GET["category"];
    $category = getId("categories", $id);
    if(mysqli_num_rows($category) > 0){
        foreach($category as $cate){
?>
        <main id="category-main">
            <section class="breadcrumb">
                <ul class="breadcrumb-list">
                    <li class="breadcrumb-items">
                        <a href="index.php" class="breadcrumb-link">Trang chủ</a>
                    </li>
                    <li class="breadcrumb-items">
                        <?php echo $cate["category_name"];?>
                    </li>
                </ul>
            </section>
            <div class="category-container">
                <div class="category-content">
                    <h2 class="category-title">
                        <?php echo $cate["category_name"];?>
                    </h2>
                    <div class="category-box">
                        <div class="category-list-products">
                            <?php
                                $products = getId("products_tbl",$id);
                                if(mysqli_num_rows($products) > 0){
                                    foreach($products as $item){
                            ?>
                            <div class="product-item">
                                <div class="card">
                                    <a href="products.php?products=<?php echo $item["products_id"];?>" class="card-img">
                                        <img src="uploads/lazy.png" lazy-src="uploads/products/<?php echo $item["products_image"];?>">
                                    </a>
                                    <div class="card-info">
                                        <h2 class="card-name"><?php echo $item["products_name"];?></h2>
                                        <div class="card-price">
                                            <div class="price-sale">
                                                <?= number_format($item["products_price_sales"],0,'','.');?><sup>đ</sup>
                                            </div>
                                            <div class="price-primary"><?= number_format($item["products_price"],0,'','.');?><sup>đ</sup></div>
                                        </div>
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
            </div>
        </main>
<?php
        }
    }
?>
    <script src="./assets/js/category.js"></script>
    <script src="./assets/js/lazy-loading.js"></script>
<?php
    include "slider/footer.php";
    include "slider/mobile-footer.php";
?>