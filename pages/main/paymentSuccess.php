<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    .wrap {
        width: 80%;
        margin: 0 auto;
        border: 1px dashed #ccc;
        display: flex;
        flex-direction: column;
        margin-top: 30px;
        padding: 20px;
        align-items: center;
        justify-content: center;
        height: 300px;
        border-radius: 20px;
    }
</style>

<?php
session_start();
include "../../admin/config/connect.php";
$id_user = $_SESSION['id_user'];
$sql_pay = "UPDATE cart SET payments = 'Thanh toán qua Momo', statusCart = 1 WHERE idUser = $id_user and statusCart = 0";
$query_pay = mysqli_query($connect, $sql_pay);
?>

<div class="container">
    <div class="wrap">
        <i class="fa-regular fa-circle-check" style="font-size: 60px; color: green;"></i>
        <h1>Thanh toán thành công</h1>
        <a href="../../index.php">Quay trở về trang chủ ... </a>
    </div>
</div>