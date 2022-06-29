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
        </div>
    </div>
    <?php
    include 'inc/footer.php';
 	?>
    </div>
    </form>

