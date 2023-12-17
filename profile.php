<?php
    include "slider/header.php";
?>
        <main id="profile">
            <div class="profile-container">
                <div class="profile-background">
                    <div class="profile-avatar">
                        <div class="profile-avatar-container profile-data">
                            <form action="profile-code.php" method="POST" id="images-post" enctype="multipart/form-data">
                                <input type="hidden" name="users_id" class="users_id" value="<?= $_SESSION["id"];?>">
                                <?php
                                    $users_id = $_SESSION["id"];
                                    $user = getUsersId("users",$users_id);
                                    $data = mysqli_fetch_array($user);
                                ?>
                                <div class="avatar-box">
                                    <input type="hidden" name="avt_old" value="<?= $data["users_avt"];?>">
                                    <img src="uploads/users/<?= $data["users_avt"];?>" alt="" class="my-avatar">
                                </div>
                                <div class="edit-avatar">
                                    <label for="edit-avatar">
                                        <i class="bi bi-camera"></i>
                                    </label>
                                    <input type="file" name="users_avt" id="edit-avatar" class="users_img" accept=".jpg, .jpeg, .png">
                                </div>
                                <div class="edit-avatar-cancel" id="cancel" style="display: none;">
                                    <i class="bi bi-x-lg"></i>
                                </div>
                                <div class="edit-avatar-confirm" id="confirm" style="display: none;">
                                    <label for="confirm-btn">
                                        <i class="bi bi-check-lg"></i>
                                    </label>
                                    <input type="submit" value="" name="confirm" id="confirm-btn">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="profile-detail">
                    <h2 id="name"><?= $data["users_name"];?></h2>
                    <div class="detail">
                        <div class="information">
                            <h3 class="title">Thông tin cá nhân</h3>
                            <table id="information-tbl">
                                <tr>
                                    <th>Số điện thoại</th>
                                    <td><?php echo $_SESSION["phone"];?></td>
                                </tr>
                                <tr>
                                    <th>Địa chỉ</th>
                                </tr>
                                <tr>
                                    <th>Tỉnh/Thành phố</th>
                                    <td>
                                        <input type="hidden" name="" value="<?= $data["users_conscious"];?>" id="myConscious">
                                        <div id="users_conscious"></div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Quận/Huyện</th>
                                    <td>
                                        <input type="hidden" name="" value="<?= $data["users_city"];?>" id="myCity">
                                        <div id="users_city"></div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Phường/Xã</th>
                                    <td>
                                        <input type="hidden" name="" value="<?= $data["users_wards"];?>" id="myWards">
                                        <div id="users_wards"></div>
                                    </td>
                                </tr>
                            </table>
                            <div class="profile-control">
                                <button class="profile-control-btn" id="edit-pass">Đổi mật khẩu</button>
                                <!-- <button onclick="window.location.href='edit-profile.php'" class="profile-control-btn" id="update-information">Cập nhật thông tin</button> -->
                            </div>
                        </div>
                        <div class="order-manager">
                            <h3 class="title">Quản lý đơn hàng</h3>
                            <table id="order-manager-tbl">
                                <tr>
                                    <th>Mã đơn hàng</th>
                                    <th>Thành tiền</th>
                                    <th>Chi tiết</th>
                                </tr>
                                <?php
                                    $orders = getOrders();
                                    if(mysqli_num_rows($orders) > 0){
                                        foreach($orders as $order){
                                ?>
                                    <tr>
                                        <td><?= $order["tracking_no"];?></td>
                                        <td><?= number_format($order["total_price"],0,'','.');?></td>
                                        <td>
                                            <a href="order_detail.php?order_id=<?= $order["orders_id"];?>">Xem chi tiết</a>
                                        </td>
                                    </tr>
                                <?php     
                                        }
                                    }
                                    else{
                                        echo 
                                            "<tr>
                                                <td colspan='4'>Không có đơn hàng</td>
                                            </tr>";
                                    }
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <!-- Modal Change Password -->
        <div id="changePass" class="modal">
            <div class="modal-content">
                <form action="functions/authcode.php" method="post">
                    <span class="close">&times;</span>
                    <div class="form-title">
                        <h2>Đổi mật khẩu</h2>
                    </div>
                    <div class="form-control">
                        <label for="old-pass">Mật khẩu cũ:</label>
                        <input type="password" name="users_pass" id="old-pass" class="changePassControl">
                        <div class="show-pass" id="show-old-pass">
                            <i class="bi bi-eye"></i>
                        </div>
                    </div>    
                    <div class="form-control">
                        <label for="new-pass">Mật khẩu mới:</label>
                        <input type="password" name="new_pass" id="new-pass" class="changePassControl">
                        <div class="show-pass" id="show-new-pass">
                            <i class="bi bi-eye"></i>
                        </div>
                    </div>    
                    <div class="form-control">
                        <label for="">Nhập lại:</label>
                        <input type="password" name="re_new_pass" id="re-newPass" class="changePassControl">
                        <div class="show-pass" id="show-re-newPass">
                            <i class="bi bi-eye"></i>
                        </div>
                    </div>
                    <input type="submit" name="updatePass" value="Cập nhật">  
                </form>
            </div>  
        </div>
<script src="./assets/js/profile.js"></script>
<?php
    include "slider/footer.php";
    include "slider/mobile-footer.php";
?>