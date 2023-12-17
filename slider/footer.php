<footer>
            <div class="customer">
                <div class="support left">
                    <h3>Hỗ trợ khách hàng</h3>
                    <ul class="support-list">
                        <li class="support-items">
                            <a href="#">Dịch vụ sửa chữa</a>
                        </li>
                        <li class="support-items">
                            <a href="#">Giao hàng và lắp đặt tại nhà</a>
                        </li>
                        <li class="support-items">
                            <a href="#">Hỏi đáp</a>
                        </li>
                    </ul>
                </div>
                <div class="support">
                    <h3>Về Hoàng phát</h3>
                    <ul class="support-list">
                        <li class="support-items">
                            <a href="tel:+0939833533">
                                <i class="bi bi-telephone"></i>
                                <span>0939833533</span>
                            </a>
                            <span> hoặc </span>
                            <a href="tel:+0939854769">0939854769</a>
                        </li>
                        <li class="support-items">
                            <a href="#">
                                <i class="bi bi-facebook"></i>
                                <span>Vi tính Hoàng phát</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="support right">
                    <a href="index.php">
                        <img src="./assets/images/upload/logo.png" alt="">
                    </a>
                </div>
            </div>
            <div class="copyright"></div>
        </footer>
        <div id="fb-root"></div>
        <div id="fb-customer-chat" class="fb-customerchat"></div>
        <script>
            var chatbox = document.getElementById('fb-customer-chat');
            chatbox.setAttribute("page_id", "107108402224336");
            chatbox.setAttribute("attribution", "biz_inbox");
        </script>
        <script>
            window.fbAsyncInit = function() {
                FB.init({
                xfbml            : true,
                version          : 'v18.0'
                });
            };
            (function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s); js.id = id;
                js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        </script>
        <button onclick="topFunction()" id="myBtn" style="bottom: 100px;">
            <i class="bi bi-chevron-up"></i>
        </button>
    </div>
    <script src="./assets/js/jquery-3.7.1.min.js"></script>
    <!-- Search JS -->
    <script src="./assets/js/search.js"></script>
    <!-- Header JS -->
    <script src="./assets/js/header.js"></script>
    <!-- Footer JS -->
    <script src="./assets/js/footer.js"></script>
    <!-- APIs -->
    <script src="./assets/js/address_api.js"></script>
</body>
</html>