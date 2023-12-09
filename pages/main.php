<div class="main">
    <?php
    #include ("sidebar/sidebar.php");
    ?>
    <div class="maincontent" style="position: relative;">

        <?php //lấy qiamly từ menu truyền vào bằng phuongư thức GET
        if (isset($_GET['quanly'])) {
            $bientam = $_GET['quanly'];
        } else {
            $bientam = "";
            include("./pages/show_products.php");
        }
        if ($bientam == 'contact') {
            include("main/contact.php");
        }
        if ($bientam == 'showAllProduct') {
            include('main/showAllProduct.php');
        }
        if ($bientam == 'nhomsp') {
            include('main/groupProduct.php');
        }
        if ($bientam == 'news') {
            include("main/news.php");
        }
        if ($bientam == 'news_detail') {
            include("main/news_detail.php");
        }
        if ($bientam == 'dangKy') {
            include("main/Dangky.php");
        }
        if ($bientam == 'dangNhap') {
            include("main/Dangnhap.php");
        }
        if ($bientam == 'cart') {
            include("main/giohang/cart.php");
        }
        if ($bientam == 'listlike') {
            include("main/listlike.php");
        }
        if ($bientam == 'gioithieu') {
            include("main/Gioithieu.php");
        }
        if ($bientam == 'pay') {
            include("main/pay.php");
        }
        if ($bientam == 'productDetail') {
            include("main/ProductDetail.php");
        }
        if ($bientam == 'thongtin') {
            include("main/infor.php");
        }
        if ($bientam == 'payMomo') {
            include("main/momoPayment.php");
        }
        if ($bientam == 'payMomoSuccess') {
            include("main/paymentSuccess.php");
        }
        if ($bientam == 'orderDetail') {
            include("main/orderDetail.php");
        }
        if ($bientam == 'dangXuat') {
            unset($_SESSION['id_user']);
            echo "<script>location.href = 'index.php'</script>";
        }
        ?>

        <div style="position: fixed; right: 20px; bottom: 40px;">
            <a href="javascript:void(0);" onclick="redirectToHiddenURL();">
                <img src="./img/Logo-Zalo-300823.png" style="width: 50px" alt="">
            </a>
        </div>

        <a href="">
            <div style="padding: 4px 8px 16px 8px; border-radius: 8px; position: fixed; text-align: center; right: 140px; bottom: -6px; background-color: #e40d0f; width: 250px; height: 40px; ;line-height: 30px">
                <i style="color: white; font-size: 18px" class="fa-solid fa-phone"></i>
                <span style="color: white; font-size: 14px">Tư vấn bán hàng <span style="font-weight: 700;"> 1800 0123 </span></span>
            </div>
        </a>

    </div>
</div>

<script>
    // Hàm chuyển hướng ẩn
    function redirectToHiddenURL() {
        var hiddenCode = "0896535751"; // Mã số không đổi
        var hiddenURL = "https://zalo.me/" + hiddenCode; // URL thực sự

        // Thực hiện chuyển hướng
        window.location.href = hiddenURL;
    }
</script>