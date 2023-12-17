<?php
    include "slider/header.php";
?>
<main id="mobile-category">
            <div class="m-category-title">
                Danh mục sản phẩm
            </div>
            <div class="m-category">
                <?php
                    $m_category = userSelect("categories");
                    if(mysqli_num_rows($m_category) > 0){
                        foreach($m_category as $item){ 
                ?>
                    <div class="m-category-items">
                        <a href="category.php?category=<?php echo $item["category_id"];?>">
                            <div class="m-category-img">
                                <img src="uploads/<?php echo $item["category_image"];?>">
                            </div>
                            <span class="mobile-category-span"><?php echo $item["category_name"];?></span>
                        </a>
                    </div>
                <?php
                        }
                    } 
                ?>
            </div>
        </main>
<?php
    include "slider/mobile-footer.php";
?>