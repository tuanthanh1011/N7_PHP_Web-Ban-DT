<div class="main">
    <?php
    #include ("sidebar/sidebar.php");
    ?>
    <div class="maincontent">

        <?php //lấy qiamly từ menu truyền vào bằng phuongư thức GET
        if (isset($_GET['quanly'])) {
            $bientam = $_GET['quanly'];
            if ($bientam == 'showAllProduct') {
                include("modules/product/product.php");
            }
            if ($bientam == 'add-product') {
                include("modules/product/add-product.php");
            }
            if ($bientam == 'edit-product') {
                include("modules/product/edit-product.php");
            }
        }
        ?>
    </div>
</div>