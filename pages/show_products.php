<style>
  .wrap_btn_next-prev {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 30px;
    height: 30px;
    background-color: #ccc;
    border-radius: 50%;
  }

  .maincontent {
    background-color: #F0F0F0 !important;
    padding-bottom: 40px;
  }
</style>

<?php
$sql_dssp = "SELECT * FROM products LIMIT 8";
$query_dssp = mysqli_query($connect, $sql_dssp);

$sql_dsspnew = "SELECT DISTINCT * FROM products WHERE tag = 'NEW' LIMIT 8";
$query_dsspnew = mysqli_query($connect, $sql_dsspnew);

$sql_dssphot = "SELECT DISTINCT * FROM products WHERE tag = 'HOT' LIMIT 8";
$query_dssphot = mysqli_query($connect, $sql_dssphot);
?>

<div class="container" style="max-width: 1300px">
  <!-- slide show -->
  <div class="row" style="display: block; padding: 18px 0">
    <section class="awe-section-1">
      <div class="mt-4 top-sliders col-md-12">
        <div class="slideshow">
          <div id="demo" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <div style="display: flex">
                  <img style="padding: 2px; border-radius: 16px" src="./img/slide/Cate-copy-2-(4)_25549280901122023.jpg" alt="Los Angeles" width="50%" height="500">
                  <img style="padding: 2px; border-radius: 16px" src="./img/slide/cate-(3)_89112400801122023.png" alt="Los Angeles" width="50%" height="500">
                </div>
              </div>
              <div class="carousel-item">
                <div style="display: flex">
                  <img style="padding: 2px; border-radius: 16px" src="./img/slide/Cate-(3)_90105342330112023.png" alt="Los Angeles" width="50%" height="500">
                  <img style="padding: 2px; border-radius: 16px" src="./img/slide/CATE-(4)_71529380001122023.jpg" alt="Los Angeles" width="50%" height="500">
                </div>
              </div>
              <div class="carousel-item">
                <div style="display: flex">
                  <img style="padding: 2px; border-radius: 16px" src="./img/slide/Cate-(4)_94535392330112023.png" alt="Los Angeles" width="50%" height="500">
                  <img style="padding: 2px; border-radius: 16px" src="./img/slide/Cate-(5)_9025270807122023.png" alt="Los Angeles" width="50%" height="500">
                </div>
              </div>

            </div>
            <a class="carousel-control-prev" href="#demo" data-slide="prev">
              <div class="wrap_btn_next-prev">
                <span class="carousel-control-prev-icon"></span>
              </div>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
              <div class="wrap_btn_next-prev">
                <span class="carousel-control-next-icon"></span>
              </div>
            </a>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- end slide show -->
  <div class="product" style="background-color: #fff; border-radius: 12px">
    <div class="container">

      <div class="product__new">
        <h3 class="product__ne title-product">Sản phẩm mới</h3>
        <div class="row">

          <?php
          while ($row_dsspnew = mysqli_fetch_array($query_dsspnew)) {
          ?>
            <div class="col-lg-3 col-md-6 col-sm-12 mb-20">
              <a href="index.php?quanly=productDetail&id=<?php echo $row_dsspnew['idProduct'] ?>" class="product__new-item">
                <div class="card" style="width: 100%">
                  <div>
                    <img class="card-img-top" src="./img/product/<?php echo $row_dsspnew['image'] ?>" alt="Card image cap">
                    <form action="" class="hover-icon hidden-sm hidden-xs">
                      <input type="hidden">
                      <a href="pages/main/giohang/themgiohang.php?idP=<?php echo $row_dsspnew['idProduct'] ?>&qtt=1" class="btn-add-to-cart" title="Thêm vào giỏ hàng">
                        <i class="fas fa-cart-plus"></i>
                      </a>
                      <a href="index.php?quanly=productDetail&id=<?php echo $row_dsspnew['idProduct'] ?>" class="quickview" title="Xem nhanh">
                        <i class="fas fa-search"></i>
                      </a>
                    </form>
                  </div>
                  <div class="card-body">
                    <h5 class="card-title custom__name-product">
                      <?php echo $row_dsspnew['name'] ?>
                    </h5>
                    <div class="product__price">
                      <p class="card-text price-color product__price-old"><?php echo number_format($row_dsspnew['costPrice']) ?> đ</p>
                      <p class="card-text price-color product__price-new"><?php echo number_format($row_dsspnew['sellingPrice']) ?> đ</p>
                    </div>
                    <div class="home-product-item__action">
                      <span class="home-product-item__like home-product-item__like--liked">
                        <?php
                        $idProduct_spnew = $row_dsspnew['idProduct'];
                        $row_product_favourite_spnew['countSP'] = null;
                        if (isset($_SESSION['id_user'])) {
                          $sql_product_favourite_spnew = "SELECT COUNT(*) as countSP FROM favorite_products WHERE idProduct = $idProduct_spnew and idUser = $id_user";
                          $query_product_favourite_spnew = mysqli_query($connect, $sql_product_favourite_spnew);
                          $row_product_favourite_spnew = mysqli_fetch_array($query_product_favourite_spnew);
                        }
                        if ($row_product_favourite_spnew['countSP'] > 0 && $row_product_favourite_spnew['countSP'] != null) {
                        ?>
                          <i class="home-product-item__like-icon-empty far fa-heart"></i>
                          <a href="<?php echo isset($_SESSION['id_user']) ? 'pages/main/xoasanphamyeuthich.php?id=' . $row_dsspnew['idProduct'] : 'javascript:alert(\'Bạn cần đăng nhập để sử dụng chức năng này!\');' ?>">
                            <i class="home-product-item__like-icon-fill fas fa-heart"></i>
                          </a>
                        <?php
                        } else {
                        ?>
                          <i class="home-product-item__like-icon-empty far fa-heart"></i>
                          <a href="<?php echo isset($_SESSION['id_user']) ? 'pages/main/sanphamyeuthich.php?id=' . $row_dsspnew['idProduct'] : 'javascript:alert(\'Bạn cần đăng nhập để sử dụng chức năng này!\');' ?>">
                            <i class="fa-regular fa-heart"></i>
                          </a>
                        <?php

                        } ?>
                      </span>

                      <?php
                      // Xử lý việc tính sao trung bình của mỗi sp và hiển thị ra màn hình
                      $idProduct = $row_dsspnew['idProduct'];
                      $sql_rate = "SELECT AVG(feedbacks.Rate) AS average_rate
                      FROM feedbacks 
                      WHERE feedbacks.idProduct = $idProduct
                      GROUP BY feedbacks.idProduct";
                      $query_rate = mysqli_query($connect, $sql_rate);
                      $row_average_rate = mysqli_fetch_array($query_rate);
                      if ($row_average_rate)
                        $rate_avg = round($row_average_rate['average_rate']);
                      else $rate_avg = 0;
                      ?>
                      <div class="home-product-item__rating">

                        <?php
                        for ($i = 0; $i < 5; $i++) {
                          $starClass = ($i < $rate_avg) ? "home-product-item__star--gold" : "";
                        ?>
                          <i class="fas fa-star <?= $starClass ?>"></i>
                        <?php
                        }
                        ?>
                        <!-- Kết thúc mã xử lý -->
                      </div>
                      <span class="home-product-item__sold"><?php echo $row_dsspnew['sellNumber'] ?> đã bán</span>
                    </div>
                    <div class="sale-off">
                      <span class="sale-off-percent"><?php echo round(100 - ($row_dsspnew['sellingPrice'] / $row_dsspnew['costPrice']) * 100) ?> %</span>
                      <span class="sale-off-label">GIẢM</span>
                    </div>
                  </div>
                </div>
              </a>
            </div>

          <?php
          }
          ?>
        </div>
      </div>
      <!-- List sản phẩm hot -->
      <div class="product__sale">
        <h3 class="product__sale title-product">Top sản phẩm hot</h3>
        <div class="row">
          <?php
          while ($row_dssphot = mysqli_fetch_array($query_dssphot)) {
          ?>
            <div class="col-lg-3 col-md-6 col-sm-12 mb-20">
              <a href="index.php?quanly=productDetail&id=<?php echo $row_dssphot['idProduct'] ?>" class="product__new-item">
                <div class="card" style="width: 100%">
                  <div>
                    <img class="card-img-top" src="./img/product/<?php echo $row_dssphot['image'] ?>" alt="Card image cap">
                    <form action="" class="hover-icon hidden-sm hidden-xs">
                      <input type="hidden">
                      <a href="pages/main/giohang/themgiohang.php?idP=<?php echo $row_dssphot['idProduct'] ?>&qtt=1" class="btn-add-to-cart" title="Thêm vào giỏ hàng">
                        <i class="fas fa-cart-plus"></i>
                      </a>
                      <a href="index.php?quanly=productDetail&id=<?php echo $row_dssphot['idProduct'] ?>" class="quickview" title="Xem nhanh">
                        <i class="fas fa-search"></i>
                      </a>
                    </form>
                  </div>
                  <div class="card-body">
                    <h5 class="card-title custom__name-product">
                      <?php echo $row_dssphot['name'] ?>
                    </h5>
                    <div class="product__price">
                      <p class="card-text price-color product__price-old"><?php echo number_format($row_dssphot['costPrice']) ?> đ</p>
                      <p class="card-text price-color product__price-new"><?php echo number_format($row_dssphot['sellingPrice']) ?> đ</p>
                    </div>
                    <div class="home-product-item__action">
                      <span class="home-product-item__like home-product-item__like--liked">
                        <?php
                        $idProduct_spnew = $row_dssphot['idProduct'];
                        $row_product_favourite_spnew['countSP'] = null;
                        if (isset($_SESSION['id_user'])) {
                          $sql_product_favourite_spnew = "SELECT COUNT(*) as countSP FROM favorite_products WHERE idProduct = $idProduct_spnew and idUser = $id_user";
                          $query_product_favourite_spnew = mysqli_query($connect, $sql_product_favourite_spnew);
                          $row_product_favourite_spnew = mysqli_fetch_array($query_product_favourite_spnew);
                        }
                        if ($row_product_favourite_spnew['countSP'] > 0 && $row_product_favourite_spnew['countSP'] != null) {
                        ?>
                          <i class="home-product-item__like-icon-empty far fa-heart"></i>
                          <a href="<?php echo isset($_SESSION['id_user']) ? 'pages/main/xoasanphamyeuthich.php?id=' . $row_dssphot['idProduct'] : 'javascript:alert(\'Bạn cần đăng nhập để sử dụng chức năng này!\');' ?>">
                            <i class="home-product-item__like-icon-fill fas fa-heart"></i>
                          </a>
                        <?php
                        } else {
                        ?>
                          <i class="home-product-item__like-icon-empty far fa-heart"></i>
                          <a href="<?php echo isset($_SESSION['id_user']) ? 'pages/main/sanphamyeuthich.php?id=' . $row_dssphot['idProduct'] : 'javascript:alert(\'Bạn cần đăng nhập để sử dụng chức năng này!\');' ?>">
                            <i class="fa-regular fa-heart"></i>
                          </a>
                        <?php

                        } ?>
                      </span>

                      <?php
                      $idProduct = $row_dssphot['idProduct'];
                      $sql_rate = "SELECT AVG(feedbacks.Rate) AS average_rate
                      FROM feedbacks 
                      WHERE feedbacks.idProduct = $idProduct
                      GROUP BY feedbacks.idProduct";
                      $query_rate = mysqli_query($connect, $sql_rate);
                      $row_average_rate = mysqli_fetch_array($query_rate);
                      if ($row_average_rate)
                        $rate_avg = round($row_average_rate['average_rate']);
                      else $rate_avg = 0;
                      ?>
                      <div class="home-product-item__rating">

                        <?php
                        for ($i = 0; $i < 5; $i++) {
                          $starClass = ($i < $rate_avg) ? "home-product-item__star--gold" : "";
                        ?>
                          <i class="fas fa-star <?= $starClass ?>"></i>
                        <?php
                        }
                        ?>

                      </div>
                      <span class="home-product-item__sold"><?php echo $row_dssphot['sellNumber'] ?> đã bán</span>
                    </div>
                    <div class="sale-off">
                      <span class="sale-off-percent"><?php echo round(100 - ($row_dssphot['sellingPrice'] / $row_dssphot['costPrice']) * 100) ?> %</span>
                      <span class="sale-off-label">GIẢM</span>
                    </div>
                  </div>
                </div>
              </a>
            </div>

          <?php
          }
          ?>
        </div>

        <!-- Ưu đãi đi kèm sản phẩm hot -->
        <section class="awe-section-9">
          <div class="section_policy clearfix">
            <div class="col-12">
              <div class="owl-policy-mobile">
                <div class="owl-stage-outer" style="padding-left: 70px;">
                  <div class="owl-stage">
                    <div class="owl-item">
                      <div class="section_policy_content">
                        <a href="">
                          <img src="https://bizweb.dktcdn.net/100/344/983/themes/704702/assets/policy_images_1.png?1628514159582" alt="">
                          <div class="section-policy-padding">
                            <h3>Miễn phí vận chuyển</h3>
                            <div class="section_policy_title">Cho các đơn hàng</div>
                          </div>
                        </a>
                      </div>
                    </div>
                    <div class="owl-item">
                      <div class="section_policy_content">
                        <a href="">
                          <img src="https://bizweb.dktcdn.net/100/344/983/themes/704702/assets/policy_images_2.png?1628514159582" alt="">
                          <div class="section-policy-padding">
                            <h3>Hỗ trợ 24/7</h3>
                            <div class="section_policy_title">Liên hệ hỗ trợ 24h/ngày</div>
                          </div>
                        </a>
                      </div>
                    </div>
                    <div class="owl-item">
                      <div class="section_policy_content">
                        <a href="">
                          <img src="	https://bizweb.dktcdn.net/100/344/983/themes/704702/assets/policy_images_3.png?1628514159582" alt="">
                          <div class="section-policy-padding">
                            <h3>Hoàn tiền 100%</h3>
                            <div class="section_policy_title">Nếu sản phẩm bị lỗi, hư hỏng</div>
                          </div>
                        </a>
                      </div>
                    </div>
                    <div class="owl-item">
                      <div class="section_policy_content">
                        <a href="">
                          <img src="https://bizweb.dktcdn.net/100/344/983/themes/704702/assets/policy_images_4.png?1628514159582" alt="">
                          <div class="section-policy-padding">
                            <h3>Thanh toán</h3>
                            <div class="section_policy_title">Được bảo mật 100%</div>
                          </div>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>


        <div class="product__yml">
          <h3 class="product__yml title-product">Tất cả sản phẩm</h3>
          <div class="row">
            <?php
            while ($row_dssp = mysqli_fetch_array($query_dssp)) {
            ?>
              <div class="col-lg-3 col-md-6 col-sm-12 mb-20" style="margin-bottom: 30px;">
                <a href="index.php?quanly=productDetail&id=<?php echo $row_dssp['idProduct'] ?>" class="product__new-item">
                  <div class="card" style="width: 100%">
                    <div>
                      <img class="card-img-top" src="./img/product/<?php echo $row_dssp['image'] ?>" alt="Card image cap">
                      <form action="" class="hover-icon hidden-sm hidden-xs">
                        <input type="hidden">
                        <a href="pages/main/giohang/themgiohang.php?idP=<?php echo $row_dssp['idProduct'] ?>&qtt=1" class="btn-add-to-cart" title="Thêm vào giỏ hàng">
                          <i class="fas fa-cart-plus"></i>
                        </a>
                        <a href="index.php?quanly=productDetail&id=<?php echo $row_dssp['idProduct'] ?>" data-toggle="modal" data-target="#myModal" class="quickview" title="Xem nhanh">
                          <i class="fas fa-search"></i>
                        </a>
                      </form>
                    </div>
                    <div class="card-body">
                      <h5 class="card-title custom__name-product">
                        <?php echo $row_dssp['name'] ?>
                      </h5>
                      <div class="product__price">
                        <p class="card-text price-color product__price-old"><?php echo number_format($row_dssp['costPrice']) ?> đ</p>
                        <p class="card-text price-color product__price-new"><?php echo number_format($row_dssp['sellingPrice']) ?> đ</p>
                      </div>
                      <div class="home-product-item__action">
                        <span class="home-product-item__like home-product-item__like--liked">
                          <?php
                          $idProduct_spnew = $row_dssp['idProduct'];
                          $row_product_favourite_spnew['countSP'] = null;
                          if (isset($_SESSION['id_user'])) {
                            $sql_product_favourite_spnew = "SELECT COUNT(*) as countSP FROM favorite_products WHERE idProduct = $idProduct_spnew and idUser = $id_user";
                            $query_product_favourite_spnew = mysqli_query($connect, $sql_product_favourite_spnew);
                            $row_product_favourite_spnew = mysqli_fetch_array($query_product_favourite_spnew);
                          }
                          if ($row_product_favourite_spnew['countSP'] > 0 && $row_product_favourite_spnew['countSP'] != null) {
                          ?>
                            <i class="home-product-item__like-icon-empty far fa-heart"></i>
                            <a href="<?php echo isset($_SESSION['id_user']) ? 'pages/main/xoasanphamyeuthich.php?id=' . $row_dssp['idProduct'] : 'javascript:alert(\'Bạn cần đăng nhập để sử dụng chức năng này!\');' ?>">
                              <i class="home-product-item__like-icon-fill fas fa-heart"></i>
                            </a>
                          <?php
                          } else {
                          ?>
                            <i class="home-product-item__like-icon-empty far fa-heart"></i>
                            <a href="<?php echo isset($_SESSION['id_user']) ? 'pages/main/sanphamyeuthich.php?id=' . $row_dssp['idProduct'] : 'javascript:alert(\'Bạn cần đăng nhập để sử dụng chức năng này!\');' ?>">
                              <i class="fa-regular fa-heart"></i>
                            </a>
                          <?php

                          } ?>
                        </span>

                        <?php
                        $idProduct = $row_dssp['idProduct'];
                        $sql_rate = "SELECT AVG(feedbacks.Rate) AS average_rate
                        FROM feedbacks 
                        WHERE feedbacks.idProduct = $idProduct
                        GROUP BY feedbacks.idProduct";
                        $query_rate = mysqli_query($connect, $sql_rate);
                        $row_average_rate = mysqli_fetch_array($query_rate);
                        if ($row_average_rate)
                          $rate_avg = round($row_average_rate['average_rate']);
                        else $rate_avg = 0;
                        ?>
                        <div class="home-product-item__rating">

                          <?php
                          for ($i = 0; $i < 5; $i++) {
                            $starClass = ($i < $rate_avg) ? "home-product-item__star--gold" : "";
                          ?>
                            <i class="fas fa-star <?= $starClass ?>"></i>
                          <?php
                          }
                          ?>

                        </div>
                        <span class="home-product-item__sold"><?php echo $row_dssp['sellNumber'] ?> đã bán</span>
                      </div>
                      <div class="sale-off">
                        <span class="sale-off-percent"><?php echo round(100 - ($row_dssp['sellingPrice'] / $row_dssp['costPrice']) * 100) ?> %</span>
                        <span class="sale-off-label">GIẢM</span>
                      </div>
                    </div>
                  </div>
                </a>
              </div>

            <?php
            }
            ?>

          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="shoesnews" style="background-color: white; border-radius: 15px;">
    <div class="container">
      <h3 class="shoesnews__title" style="padding: 24px;">Tin tức</h3>
      <?php
      $sql_show_news = "SELECT * FROM news LIMIT 3";
      $query_show_news = mysqli_query($connect, $sql_show_news);
      ?>
      <div class="row">
        <?php
        while ($row = mysqli_fetch_array($query_show_news)) {
        ?>
          <div class="col-lg-4 col-md-4 col-sm-12 mb-20">
            <a href="index.php?quanly=news_detail&id=<?php echo $row['id'] ?>" class="product__new-item">
              <div class="card" style="width: 100%">
                <img class="card-img-top" src="./img/news/<?php echo $row['image'] ?>" alt="Card image cap" height="230px">
                <div class="card-body">
                  <h5 class="card-title custom__name-product title-news">
                    <?php echo $row['title'] ?>
                  </h5>
                  <p class="card-text custom__name-product" style="font-weight: 400;"><?php echo $row['short_description'] ?></p>
                </div>
              </div>
            </a>
          </div>
        <?php
        }
        ?>
      </div>
      <div class="shoesnews__all">
        <a href="index.php?quanly=news" class="shoesnews__all-tittle">Xem tất cả</a> <i class="fi-rs-angle-right"></i>
      </div>
    </div>
  </div>
</div>