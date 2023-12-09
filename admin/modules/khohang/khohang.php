<section class="content-header">
    <h1>
        Quản lý kho hàng
    </h1>
</section>

<style>
    th,
    td {
        text-align: center;
    }
</style>

<?php
$sql = "SELECT * FROM products";
$product = mysqli_query($connect, $sql);

if (isset($_POST['sbUpdateQtt'])) {
    $id_pro = $_POST['idP'];
    $qtt = $_POST['qtt'];
    $sql_qtt = "UPDATE products SET qttStock = $qtt where idProduct = $id_pro";
    $product = mysqli_query($connect, $sql_qtt);
    $sql = "SELECT * FROM products";
    $product = mysqli_query($connect, $sql);
}
?>
<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Danh sách sản phẩm</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Mã sản phẩm</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá gốc sản phẩm</th>
                        <th>Giá bán sản phẩm</th>
                        <th>Số lượng trong kho</th>
                        <th>Số lượng cập nhật</th>
                        <th>Trạng thái</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($product as $key => $value) : ?>
                        <form action="" method="post">
                            <tr>
                                <td><?php echo $value['idProduct'] ?></td>
                                <td><?php echo $value['name'] ?></td>
                                <td><?php echo number_format($value['costPrice']) ?> VNĐ</td>
                                <td><?php echo number_format($value['sellingPrice']) ?>VNĐ</td>
                                <td><?php echo $value['qttStock'] ?></td>
                                <td>
                                    <input type="text" name="qtt" id="" value="">
                                    <input type="hidden" value="<?php echo $value['idProduct'] ?>" name='idP'>
                                </td>
                                <td>
                                    <input value="Cập nhật" type="submit" name="sbUpdateQtt" title="Cập nhật số lượng" class="btn btn-primary"></input>
                                </td>
                            </tr>
                        </form>
                    <?php endforeach ?>

                </tbody>
            </table>
        </div>

</section>
</div>