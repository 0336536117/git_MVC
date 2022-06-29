<?php
    include 'inc/head.php';
?>
<?php
	$login_check = Session::get('customer_login');
    if($login_check == false){
        header ('Location:login.php');
    }
?>
<?php
// if(!isset($_GET['proid']) || $_GET['proid'] == NULL){
// 	echo "<script>window.location = '404.php'</script>";
// } else {
// 	$id = $_GET['proid'];
// }if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
//     $quantity = $_POST['quantity'];
//     $AddtoCart = $ct -> add_to_cart($id,$quantity);
// }
?>

<div class="main">
	
    <div class="content">	
        <div class="section group">
            <div class="content_top">
                <div class="heading">
                <h3>Phương thức thanh toán</h3>
                </div>
                <div class="clear"></div>
                <h3 class="payment">Chọn phương thức thanh toán của bạn</h3>
                <a class="payment_href" href="offlinepayment.php">Thanh toán Offline</a>
                <a class="payment_href" href="onlinepayment.php">Thanh toán Online</a>
            </div>
        </div>
    </div>
    <?php
    include 'inc/footer.php';
 	?>
    </div>
