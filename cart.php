<?php
    include "slider/header.php";
?>
<main>
            <section class="breadcrumb">
                <ul class="breadcrumb-list">
                    <li class="breadcrumb-items">
                        <a href="index.php" class="breadcrumb-link">Trang chủ</a>
                    </li>
                    <li class="breadcrumb-items">
                        Giỏ hàng
                    </li>
                </ul>
            </section>
            <!-- Breadcrumb -->
            <div class="cart-container">
                <div class="cart-products">
                    <div class="cart-products-title">
                        <h2>Giỏ hàng</h2>
                    </div>
                            <?php
                                if(isset($_SESSION["loggedin"])){
                                    $totalPrice = 0;
                                    $carts = getCarts();
                                    if(mysqli_num_rows($carts) > 0){
                            ?>
                    <div class="cart-products-box products-data" id="myCarts">
                        <table class="cart-products-tbl">
                            <tr>
                                <th>Sản phẩm</th>
                                <th>Đơn giá</th>
                                <th>Số lượng</th>
                                <th>Thành tiền</th>
                            </tr>
                                    <?php
                                        foreach($carts as $cart){
                                            $totalFormat = number_format($totalPrice += $cart["products_price_sales"]*$cart["products_qty"],0,'','.');
                                    ?>
                                            <tr>
                                                <td>
                                                    <div class="cart-products-detail">
                                                        <div class="cart-products-img">
                                                            <img src="uploads/products/<?php echo $cart["products_image"];?>" alt="">
                                                        </div>
                                                        <div class="cart-products-infor">
                                                            <div class="cart-products-name"><?php echo $cart["products_name"];?></div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="cart-products-price">
                                                        <div class="cart-products-sale-price"><?= number_format($cart["products_price_sales"],0,'','.');?></div>
                                                        <div class="cart-products-primary-price"><?= number_format($cart["products_price"],0,'','.');?></div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <input type="hidden" class="prodId" value="<?php echo $cart["products_id"];?>">
                                                    <input type="number" name="cart-qty" class="cartQty" min="1" step="1" value="<?php echo $cart["products_qty"];?>">
                                                </td>
                                                <td>
                                                    <div class="cart-products-sum-price">
                                                        <?=
                                                            number_format($cart["products_price_sales"]*$cart["products_qty"],0,'','.');
                                                        ?>
                                                    </div>
                                                </td>
                                                <td>
                                                    <button class="deleteItem" value="<?php echo $cart["ccarts_id"];?>">
                                                        <i class="bi bi-x-lg"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                    <?php
                                        }
                                    ?>
                        </table>
                    </div>
                </div>
                <div class="cart-checkout">
                    <div class="cart-checkout-container">
                        <h2 class="fz-21">Thanh toán</h2>
                        <table class="checkout-tbl">
                            <tr>
                                <th>Tổng thành tiền</th>
                                <td>
                                    <?= $totalFormat;?>
                                </td>
                            </tr>
                        </table>
                        <button id="checkout-btn">
                            <a href="checkout.php">Thanh toán</a>
                        </button>
                    </div>
                </div>
                <?php
                        }
                        else{
                            echo 
                                "<p style='text-align: center;'>
                                    Không có sản phẩm
                                </p>";
                        }
                    }
                    else{
                        echo 
                            "<tr>
                                <td colspan='4' style='padding-top: 8px;'>Vui lòng đăng nhập</td>
                            </tr>";
                    }                     
                ?>
            </div>
    </main>
    <script src="./assets/js/cart.js"></script>
<?php
    include "slider/footer.php";
?>