<?php
    include("middleware/adminMiddleware.php");
    include("includes/header.php");
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <h4>Đơn hàng</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body" id="products_table">
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên khách hàng</th>
                                <th>Số điện thoại</th>
                                <th>Địa chỉ</th>
                                <th>Tổng tiền</th>
                                <th>Chi tiết</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $orders = getAll("orders");
                                if(mysqli_num_rows($orders) > 0){
                                    foreach($orders as $order){
                            ?>
                                <tr>
                                    <td><?= $order["orders_id"];?></td>
                                    <td><?= $order["users_name"];?></td>
                                    <td><?= $order["users_phone"];?></td>
                                    <td><?= $order["address"];?></td>
                                    <td><?= $order["total_price"];?></td>
                                    <td>
                                        <a href="order_detail.php?order_id=<?= $order["orders_id"];?>">Xem</a>
                                    </td>
                                </tr>
                            <?php
                                    }
                                }
                                else{
                                    echo 
                                    "<tr>
                                        <th colspan='8'>Không có đơn hàng</th>
                                    <tr>";
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    include("includes/footer.php");
?>