<?php
    include("middleware/adminMiddleware.php");
    include("includes/header.php");
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col position-relative z-index-2">
                    <div class="card card-plain mb-4">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="d-flex flex-column h-100">
                                        <h2 class="font-weight-bolder mb-0">Bảng điều khiển</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="col">
                                        <div class="card border-left-primary shadow h-100 py-2">
                                            <div class="card-body">
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col mr-2">
                                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                            Tổng thành viên
                                                        </div>
                                                        <?php
                                                            $query = "SELECT users_id, COUNT(users_id) FROM users WHERE role_as = 0";
                                                            $run = mysqli_query($con, $query);
                                                            $row = mysqli_fetch_array($run);
                                                        ?>
                                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $row["COUNT(users_id)"];?></div>
                                                    </div>
                                                    <div class="col-auto">
                                                        <i class="fas fa-user fa-2x text-gray-300"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="col">
                                        <div class="card border-left-primary shadow h-100 py-2">
                                            <div class="card-body">
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col mr-2">
                                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                            Tổng đơn hàng
                                                        </div>
                                                        <?php
                                                            $orders = totalOrders();
                                                            $rowOrders = mysqli_fetch_array($orders);
                                                        ?>
                                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                            <?= $rowOrders["COUNT(orders_id)"];?>
                                                        </div>
                                                    </div>
                                                    <div class="col-auto">
                                                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="col">
                                        <div class="card border-left-primary shadow h-100 py-2">
                                            <div class="card-body">
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col mr-2">
                                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                            Tổng doanh thu
                                                        </div>
                                                        <?php 
                                                            $sum = sumOrders();
                                                            $sumOrders = mysqli_fetch_array($sum);
                                                        ?>
                                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                            <?= number_format($sumOrders["sum"],0,'','.');?>
                                                        </div>
                                                    </div>
                                                    <div class="col-auto">
                                                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="col">
                                    <div class="col">
                                        <div class="card border-left-primary shadow h-100 py-2">
                                            <div class="card-body">
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col mr-2">
                                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                            Earnings (Monthly)
                                                        </div>
                                                        <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
                                                    </div>
                                                    <div class="col-auto">
                                                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                    <!-- add class row -->
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    include("includes/footer.php");
?>