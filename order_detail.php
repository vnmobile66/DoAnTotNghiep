<?php
    include "slider/header.php";
?>
<?php
    if(isset($_GET["order_id"])){
        $id = $_GET['order_id'];
        $orders = orderItems("order_items",$id);
        if(mysqli_num_rows($orders) > 0){
?>
<main>
    <div class="order-manager" style="margin-left: 0;">
        <h3 class="title">Chi tiết đơn hàng</h3>
        <table id="order-manager-tbl">
            <tr>
                <th>Tên sản phẩm</th>
                <th>Ảnh sản phẩm</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
            </tr>
            <?php
                foreach($orders as $order){ 
            ?>
                <tr>
                    <th><?= $order["products_name"];?></th>
                    <th>
                        <img style="width: 100px; height: 100px;" src="uploads/products/<?= $order["products_image"];?>"/>
                    </th>
                        <th><?= $order["qty"];?></th>
                        <th><?= $order["price"];?></th>
                </tr>
            <?php
                }
            ?>
                <tr>
                    <td>
                        <a href="profile.php">Quay lại</a>
                    </td>
                </tr>
        </table>
    </div>
</main>
<?php
        }
    }
?>
<?php
    include "slider/footer.php";
    include "slider/mobile-footer.php";
?>