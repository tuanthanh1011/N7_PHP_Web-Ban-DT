<?php
$sql = "SELECT * FROM cart inner join users on cart.idUser = users.idUser where statusCart != 0";
// $product = mysqli_query($connect, $sql);

$count = "SELECT COUNT(idCart) as total from cart";
$result = mysqli_query($connect, $count);
$row = mysqli_fetch_assoc($result);
$total_records = $row['total'];

$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = 7;

$total_page = ceil($total_records / $limit);

if($current_page > $total_page){
    $current_page = $total_page;
}
else if($current_page < 1){
    $current_page = 1;
}

$start = ($current_page - 1) * $limit;

$product = mysqli_query($connect, $sql);

?>
<!-- =============================================== -->

<section class="content-header">
    <h1>
        Quản lý đơn hàng
    </h1>
</section>

<style>
    th,
    td {
        text-align: center;
    }
</style>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Danh sách đơn hàng</h3>

            <div class="box-tools pull-right">
                <a href="modules/order/export-file.php" class="btn btn-primary">Xuất file</a>
            </div>
        </div>
        <div class="box-body">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Mã đơn hàng</th>
                        <th>Tên khách hàng</th>
                        <th>Số điện thoại</th>
                        <th>Giá trị đơn hàng</th>
                        <th>Hình thức thanh toán</th>
                        <th>Trạng thái</th>
                        <th>Ngày đặt hàng</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($product as $key => $value) : ?>
                        <tr>
                            <td><?php echo $value['idCart'] ?></td>
                            <td><?php echo $value['fullName'] ?></td>
                            <td><?php echo $value['phone'] ?></td>

                            <?php
                            $idCart = $value['idCart'];
                            $sql_total_cart = "SELECT SUM(sellingPrice * quantity) as total FROM cart_detail inner join products on cart_detail.idProduct = products.idProduct where idCart = $idCart";
                            $query_total_cart = mysqli_query($connect, $sql_total_cart);
                            $total_cart = mysqli_fetch_array($query_total_cart)
                            ?>

                            <td><?php echo number_format($total_cart['total']) ?> VNĐ</td>
                            <td><?php echo $value['payments'] ?></td>

                            <?php
                            $status = $value['statusCart'];
                            $statusText = '';

                            switch ($status) {
                                case 1:
                                    $statusText = 'Đang giao';
                                    break;

                                case 2:
                                    $statusText = 'Giao thành công';
                                    break;
                            }
                            ?>
                            <td>
                                <span><?php echo $statusText; ?></span>
                            </td>

                            <td><?php echo $value['createdAt'] ?></td>
                            <td>
                                <a href="../admin/index.php?quanly=order_detail&id=<?php echo $value['idCart'] ?>" title="Xem" class="btn btn-primary">Xem
                                </a>
                                <a href="modules/order/update-order.php?id=<?php echo $value['idCart'] ?>" title="Sửa" class="btn btn-primary">Cập nhật trạng thái
                                </a>
                                <a style="height: 34px;" href="modules/order/remove-order.php?id=<?php echo $value['idCart'] ?>" title="Xóa" class="btn btn-danger">
                                    <span class="fa fa-trash"></span>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach ?>

                </tbody>
            </table>
            <div class="pagination">
                    <?php 

                        if ($current_page > 1 && $total_page > 1){
                            echo '<a class="link-page" href="index.php?quanly=orders&page='.($current_page-1).'">Prev</a>  ';
                        }

                        for ($i = 1; $i <= $total_page; $i++){
                           
                            if ($i == $current_page){
                                echo '<span class="current-page">'.$i.'</span>  ';
                            }
                            else{
                                echo '<a class="link-page" href="index.php?quanly=orders&page='.$i.'">'.$i.'</a>  ';
                            }
                        }
            
                        if ($current_page < $total_page && $total_page > 1){
                            echo '<a class="link-page" href="index.php?quanly=orders&page='.($current_page+1).'">Next</a>  ';
                        }
                    ?>
                    </div>
        </div>

</section>
</div>
<style>
    .pagination{
        float: right;
    }

    .current-page{
        border: 1px solid #333;
        color: white;
        background-color: #333;
        padding: 4px 10px;
    }

    .link-page{
        border: 1px solid #333;
        color: black;
       
        padding: 4px 10px;
    }

    .link-page:hover{
        color: #333;
    }

</style>