<?php
    include "slider/header.php";
?>
<?php
    if(isset($_GET["search_btn"])){
        $keyword = $_GET["keyword"];
        $search = searchItem($keyword);
?>
<main id="search-main">
<h2>Kết quả tìm kiếm cho: <?= $keyword;?></h2>
<div class="search-container">
                <div class="search-content">
                    <div class="search-box">
                        <div class="search-list-products">
                        <?php
                            if(mysqli_num_rows($search) > 0){
                                foreach($search as $item){
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
                                echo "Sản phẩm không tồn tại";
                            }
                        ?>
                        </div>
                    </div>
                </div>
            </div>
</main>
<?php
    }
?>
<script src="./assets/js/lazy-loading.js"></script>
<?php
    include "slider/footer.php";
    include "slider/mobile-footer.php";
?>
