<?php
    include "slider/header.php";
?>
<a id="m-comeback" href="profile.html">
            <span>Quay lai</span>
        </a>
        <main id="login-page">
            <div class="login-container">
                <h2 class="login-title">
                    Hoàng Phát
                </h2>
                <form action="functions/authcode.php" method="POST" id="frmLogin">
                    <h3>Đăng nhập</h3>
                    <div class="login-box">
                        <div class="login-box-title">Số điện thoại</div>
                        <input type="text" name="users_phone" id="phonenumber">
                        <span class="tooltip"></span>
                    </div>
                    <div class="login-box">
                        <div class="login-box-title">Mật khẩu</div>
                        <input type="password" name="users_pass" id="password">
                    </div>
                    <!-- <div class="login-box"></div> -->
                    <button type="submit" id="login-btn" name="login_btn">Đăng nhập</button>
                </form>
                <div class="login-nav">
                    <!-- <a href="#">Quên mật khẩu</a> -->
                    <span>Bạn chưa có tài khoản? <a href="./register.php">Đăng ký ngay</a></span>
                </div>
            </div>
        </main>
    <script src="./assets/js/login.js"></script>
<?php
    include "slider/footer.php";
    include "slider/mobile-footer.php";
?>