<?php
include("../../config/connect.php");

header('Content-Type: text/html; charset=utf-8');

$query = mysqli_query($connect, "SELECT cart.idCart as 'Mã đơn hàng', users.idUser as 'Mã khách hàng', fullName as 'Họ tên khách hàng', phone as 'Số điện thoại', address as 'Địa chỉ', statusCart as 'Trạng thái đơn hàng', SUM(sellingPrice * quantity) as 'Giá trị đơn hàng', cart.createdAt as 'Ngày đặt' 
                                FROM cart INNER JOIN users 
                                ON cart.idUser = users.idUser 
                                INNER JOIN cart_detail 
                                ON cart.idCart = cart_detail.idCart 
                                INNER JOIN products 
                                ON cart_detail.idProduct = products.idProduct 
                                WHERE statusCart != 0 
                                GROUP BY cart.idCart, users.idUser, fullName, statusCart, cart.createdAt;
                                ");
$carts = array();
while ($rows = mysqli_fetch_assoc($query)) {
    $carts[] = $rows;
}

$filename = "phpflow_data_export_" . date('Ymd') . ".xls";

header("Content-Type: application/vnd.ms-excel; charset=utf-8");
header("Content-Disposition: attachment; filename=\"$filename\"");

echo "\xEF\xBB\xBF";

ExportFile($carts);
exit();

function ExportFile($records)
{
    $output = '';
    $heading = false;

    if (!empty($records)) {
        foreach ($records as $row) {
            if (!$heading) {
                $output .= implode("\t", array_keys($row)) . "\n";
                $heading = true;
            }
            $output .= implode("\t", array_values($row)) . "\n";
        }
    }

    echo $output;
}
