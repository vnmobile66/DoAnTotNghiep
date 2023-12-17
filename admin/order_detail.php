<?php
    include("includes/header.php");
    include("middleware/adminMiddleware.php");
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php
                if(isset($_GET["order_id"])){
                    $id = $_GET['order_id'];
                    $orders = orderItems("order_items",$id);
                    if(mysqli_num_rows($orders) > 0){
            ?>
                <div class="card">
                    <div class="card-header">
                        <h4>Chi tiết đơn hàng</h4>
                    </div>
                    <div class="card-body">
                    <table class="table table-bordered text-center" id="category_table">
                        <thead>
                            <tr>
                                <th>Tên sản phẩm</th>
                                <th>Ảnh sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach($orders as $order){ 
                            ?>
                            <tr>
                                <th><?= $order["products_name"];?></th>
                                <th>
                                    <img style="width: 100px; height: 100px;" src="../uploads/products/<?= $order["products_image"];?>"/>
                                </th>
                                <th><?= $order["qty"];?></th>
                                <th><?= $order["price"];?></th>
                            </tr>
                            <?php
                                }
                            ?>
                            <tr>
                                <td>
                                    <a href="order_manager.php" class="btn btn-danger">Quay lại</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    </div>
                </div>
            <?php
                    }
                    else{
                        echo "Sản phẩm không tồn tại";
                    }
                }
                else{
                    echo "Không có sản phẩm";
                };
            ?>
        </div>
    </div>
</div>
<?php
    include("includes/footer.php");
?>