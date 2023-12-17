<?php
    include "slider/header.php";
?>
        <main>
            <?php
                if(isset($_SESSION["loggedin"])){
            ?>
            <div class="checkout-container">
                <div class="customer-infor">
                    <h2>Thông tin cá nhân</h2>
                    <form action="functions/placeorder.php" method="POST">
                        <table class="customer-tbl">
                            <tr>
                                <th>Họ và tên</th>
                                <td>
                                    <input type="text" name="users_name" id="checkout-fullname" value="<?php echo $_SESSION["name"];?>">
                                </td>
                            </tr>
                            <tr>
                                <th>Số điện thoại</th>
                                <td>
                                    <input type="text" name="users_phone" id="checkout-phone" value="<?php echo $_SESSION["phone"];?>">
                                </td>
                            </tr>
                            <tr>
                                <th>Tỉnh/Thành phố</th>
                                <td>
                                    <select name="" id="conscious" onchange="selectConscious(event)" class="customer-select">
<<<<<<< HEAD
                                        <option value="">-- Chọn Tỉnh/Thành phố --</option>
=======
                                        <option value="Đồng Tháp">Đồng Tháp</option>
>>>>>>> a57f051fa770c9c73f7ad80e69ad48a62dfd514c
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>Quận/Huyện</th>
                                <td>
                                    <select name="" id="districts" onchange="selectDistricts(event)" class="customer-select">
<<<<<<< HEAD
                                        <option value="">-- Chọn Quận/Huyện --</option>
=======
                                        <option value="TP Cao Lãnh">TP Cao Lãnh</option>
>>>>>>> a57f051fa770c9c73f7ad80e69ad48a62dfd514c
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>Phường/Xã</th>
                                <td>
                                    <select name="" id="wards" class="customer-select">
<<<<<<< HEAD
                                        <option value="Phường Hòa Thuận">-- Chọn Phường/Xã --</option>
=======
                                        <option value="Phường Hòa Thuận">Phường Hòa Thuận</option>
>>>>>>> a57f051fa770c9c73f7ad80e69ad48a62dfd514c
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>Số nhà / Tên đường</th>
                                <td>
                                    <input type="text" name="address" id="">
                                </td>
                            </tr>
                            <tr>
                                <th>Phương thức thanh toán</th>
                                <td>
                                    <label for="offline">Thanh toán khi nhận hàng</label>
                                    <input type="checkbox" name="payment_mode" id="offline" class="checkout-method-select">
                                    <!-- <br>
                                    <label for="vnpay">VNPay</label>
                                    <input type="checkbox" name="" id="vnpay" class="checkout-method-select"> -->
                                </td>
                            </tr>
                        </table>
                        <div class="order-container">
                            <?php
                                $carts = getCarts();
                                $totalPrice = 0;
                            ?>
                            <h2>Thông tin đơn hàng</h2>
                            <div class="order-detail">
                                <table class="order-tbl">
                                    <tr>
                                        <th>Mã đơn hàng</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Số lượng</th>
                                        <th>Thành tiền</th>
                                    </tr>
                                    <?php
                                            foreach($carts as $cart){
                                                $totalFormat = number_format($totalPrice += $cart["products_price_sales"]*$cart["products_qty"],0,'','.');
                                    ?>
                                        <tr>
                                            <td><?= $cart["ccarts_id"];?></td>
                                            <td><?= $cart["products_name"];?></td>
                                            <td><?= $cart["products_qty"];?></td>
                                            <td><?= $total = number_format($cart["products_price_sales"]*$cart["products_qty"],0,'','.'); ?></td>
                                        </tr>
                                    <?php
                                            }
                                    ?>
                                </table>
                                <div class="order-price" style="float: right;">
                                    <span>Tổng thanh toán: </span>
                                    <span id="order-sum-price"><?= $totalFormat;?></span>
                                </div>
                            </div>
                            <input type="hidden" name="payment_mode" value="COD">
                            <button type="submit" name="placeOrderBtn" id="checkout-btn">Xác nhận thanh toán</button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
        <div class="mobile-order-container">
            <div class="mobile-order-title">
                <h2>Tổng thanh toán: <span><?= $totalPrice;?></span></h2>
            </div>
        </div>
        <?php
            }
            else{
                echo "Vui lòng đăng nhập";
            }
        ?>
    <script src="./assets/js/checkout.js"></script>
<?php
    include "slider/footer.php";
?>