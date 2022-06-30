<?php
    include 'inc/head.php';
?>
<?php
if(isset($_GET['orderid']) && $_GET['orderid'] == 'order'){
	echo "<script>window.location = '404.php'</script>";
        $customer_id = Session::get('customer_id');
        $insertOrder = $ct->insertOrder($customer_id);
        $delCart = $ct->del_all_data_cart();
        header('Location:success.php');
}

?>
<form action="" method="POST">
<div class="main">
    <div class="content">	
        <div class="section group">
        <h2 class="success_order">Mua hàng thành công</h2>
        <?php
            $customer_id = Session::get('customer_id');
            $get_amount = $ct->getAmountPrice($customer_id);
            if($get_amount){
                $amount = 0;
                while($result = $get_amount->fetch_assoc()){
                    $price = $result['price'];
                    $amount += $price;
                }
            }
        ?>
        <p class="success_note">Tổng tiền bạn phải thanh toán cho cửa hàng cửa chúng tôi là: <?php $vat = $amount * 0.05; $total = $vat + $amount; echo $total.".VNĐ"; ?></p>
        <p class="success_note">Chúng tôi sẽ liên hệ cho bạn trong thời gian sớm nhất. Bạn có thể xem lại đơn hàng <a style="text-decoration:underline ;" href="orderdetails.php">Tại đây</p>
        </div>
    </div>
    <?php
    include 'inc/footer.php';
 	?>
    </div>
    </form>

