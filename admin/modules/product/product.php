<?php
$sql = "SELECT * FROM products";
$product = mysqli_query($connect, $sql);

?>
<!-- =============================================== -->

<section class="content-header">
    <h1>
        Quản lý sản phẩm
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
            <h3 class="box-title">Danh sách sản phẩm</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
            <a href="../admin/index.php?quanly=add-product" class="btn btn-success" style="margin-bottom: 12px">Thêm mới sản phẩm</a>
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Mã sản phẩm</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá gốc sản phẩm</th>
                        <th>Giá bán sản phẩm</th>
                        <th>Công ty</th>
                        <th>Ảnh sản phẩm</th>
                        <th>Ngày tạo</th>
                        <th>Trạng thái</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($product as $key => $value) : ?>
                        <tr>
                            <td><?php echo $value['idProduct'] ?></td>
                            <td><?php echo $value['name'] ?></td>
                            <td><?php echo number_format($value['costPrice']) ?> VNĐ</td>
                            <td><?php echo number_format($value['sellingPrice']) ?>VNĐ</td>
                            <td><?php echo $value['byCompany'] ?></td>
                            <td>
                                <img src="<?php echo $value['image'] ?>" alt="" width="50px">
                            </td>
                            <td><?php echo $value['createdAt'] ?></td>
                            <td>
                                <a href="../admin/index.php?quanly=edit-product&id=<?php echo $value['idProduct'] ?>" title="Sửa" class="btn btn-primary">
                                    <span class="fa fa-edit"></span>
                                </a>
                                <a href="modules/product/remove-product.php?id=<?php echo $value['idProduct'] ?>" title="Xóa" class="btn btn-danger">
                                    <span class="fa fa-trash"></span>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach ?>

                </tbody>
            </table>
        </div>

</section>
</div>