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
                            <h4>Thành viên</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body" id="products_table">
                    <table class="table table-bordered text-center" id="category_table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên thành viên</th>
                                <th>Địa chỉ</th>
                                <th>Vai trò</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $members = getAll("users");
                                if(mysqli_num_rows($members) > 0){
                                    foreach($members as $member){
                            ?>
                                <tr>
                                    <td><?php echo $member["users_id"];?></td>
                                    <td><?php echo $member["users_name"];?></td>
                                    <td><?php echo $member["users_conscious"];?></td>
                                    <td><?php echo $member["role_as"] == 0 ?'Thành viên':'Quản trị viên';?></td>
                                </tr>
                            <?php
                                    }
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