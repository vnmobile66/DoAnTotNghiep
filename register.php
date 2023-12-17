<?php
    include "slider/header.php";
?>
<main id="register-page">
            <div class="register-container">
                <h2 class="register-title">
                    Hoàng Phát
                </h2>
                <form action="functions/authcode.php" method="POST" id="frmregister">
                    <h3>Đăng ký</h3>
                    <div class="register-box">
                        <div class="register-box-title">Họ tên</div>
                        <input type="text" name="users_name" id="fullname">
                    </div>
                    <div class="register-box">
                        <div class="register-box-title">Số điện thoại</div>
                        <input type="text" name="users_phone" id="phonenumber">
                        <span name="err"></span>
                    </div>
                    <div class="register-box">
                        <div class="register-box-title">Mật khẩu</div>
                        <input type="password" name="users_pass" id="password">
                        <div class="show-pass" id="show-pass">
                            <i class="bi bi-eye"></i>
                        </div>
                        <span id="strong-pass"></span>
                    </div>
                    <div class="register-box">
                        <div class="register-box-title">Nhập lại mật khẩu</div>
                        <input type="password" name="users_rePass" id="re-password">
                        <div class="show-pass" id="show-re-pass">
                            <i class="bi bi-eye"></i>
                        </div>
                    </div>
                    <div class="register-box">
                        <div class="register-box-title">Tỉnh/Thành phố</div>
                        <select name="users_conscious" id="conscious" onchange="selectConscious(event)">
                            <option value="">-- Chọn Tỉnh/Thành phố --</option>
                        </select>
                    </div>
                    <div class="register-box">
                        <div class="register-box-title">Quận/Huyện</div>
                        <select name="users_city" id="districts" onchange="selectDistricts(event)">
                            <option value="">-- Chọn Quận/Huyện --</option>
                        </select>
                    </div>
                    <div class="register-box">
                        <div class="register-box-title">Phường/Xã</div>
                        <select name="users_wards" id="wards">
                            <option value="">-- Chọn Phường/Xã --</option>
                        </select>
                    </div>
                    <button type="submit" id="register-btn" name="register_btn">Đăng ký</button>
                </form>
                <div class="register-nav">
                    <span>Bạn đã có tài khoản? <a href="./login.php">Đăng nhập ngay</a></span>
                </div>
            </div>
        </main>
    <script src="./assets/js/register.js"></script>
<?php
    include "slider/footer.php";
    include "slider/mobile-footer.php";
?>