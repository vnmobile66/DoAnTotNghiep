<?php
    $page = substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"],"/") + 1);
?>
<div class="mobile-controller">
    <!-- Trang chu -->
    <a href="index.php" style="<?php echo $page == "index.php"?'background: var(--bg-red); color: #fff':'';?>">
        <i class="bi bi-house"></i>
    </a>
    <!-- Danh muc -->
    <a href="mobile-category.php" style="<?php echo $page == "mobile-category.php"?'background: var(--bg-red); color: #fff':'';?>">
        <i class="bi bi-grid"></i>
    </a>
    <!-- Gio hang -->
    <a href="cart.php">
        <i class="bi bi-cart2"></i>
    </a>
    <!-- Tai khoan -->
    <?php
        if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
            echo '
                    <a href="login.php">
                        <i class="bi bi-person"></i>
                    </a>
                ';
        } else {
            $theSession = htmlspecialchars($_SESSION["name"]);
            echo "
                    <a href='profile.php'>
                        <i class='bi bi-person'></i>
                    </a>
                ";
        }
    ?>
</div>