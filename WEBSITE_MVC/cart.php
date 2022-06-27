<?php
    include 'inc/head.php';
?>
<?php
	if(isset($_GET['cartid'])){
		$cartid = $_GET['cartid'];
		$delcart = $ct -> del_product_cart($cartid);
	}
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
	$cartid = $_POST['cartid'];
    $quantity = $_POST['quantity'];
    $update_quantity_cart = $ct -> update_quantity_cart($cartid,$quantity);
	echo "<meta http-equiv='refresh' content='0;URL=?id=live'>";
	if($quantity<=0){
		$delcart = $ct->del_product_cart($cartid); 
	}
}
?>
<?php
	if(!isset($_GET['id'])){
		echo "<meta http-equiv='refresh' content='0;URL=?id=live'>";
	}
?>
 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2>Giỏ hàng</h2>
					<?php 
						if(isset($update_quantity_cart)){
							echo $update_quantity_cart;
						}
					?>
					<?php 
						if(isset($delcart)){
							echo $delcart;
						}
					?>
					<br>
						<table class="tblone">
							<tr>
								<th width="20%">Tên sản phẩm</th>
								<th width="10%">Hình ảnh</th>
								<th width="20%">Giá sản phẩm</th>
								<th width="20%">Số lượng</th>
								<th width="20%">Tổng tiền </th>
								<th width="10%">Chỉnh sửa</th>
							</tr>
							<?php
								$get_product_cart = $ct-> get_product_cart();
								if($get_product_cart){
									$subtotal = 0;
									$qty = 0;
									while($result = $get_product_cart->fetch_assoc()){
							?>
							<tr>
								<td><?php echo $result['productName']; ?></td>
								<td><img src="admin/uploads/<?php echo $result['image']; ?>"/></td>
								<td><?php echo $result['price']; ?></td>
								<td>
									<form action="" method="post">
										<input type="hidden" name="cartid" value="<?php echo $result['cartid']; ?>"/>
										<input type="number" name="quantity" min="0" value="<?php echo $result['quantity']; ?>"/>
										<input type="submit" name="submit" value="Thêm"/>
									</form>
								</td>
								<td>
									<?php
									$total= $result['price'] * $result['quantity'];
									echo $total;
									?>
								</td>
								<td><a href="?cartid=<?php echo $result['cartid']; ?>">Xóa</a></td>
							</tr>
								<?php
									$subtotal += $total;
									$qty = $qty + $result['quantity'];
									}
								}
								?>
						</table>
						<?php
									$check_cart = $ct->check_cart();
									if($check_cart){
										
									?>
						<table style="float:right;text-align:left;" width="40%">
							<tr>
								<th>Tổng tiền sản phẩm : </th>
								<td style="text-align:center;color:red;">
									<?php
										echo $subtotal." "."VNĐ";
										Session::set('sum',$subtotal);
										Session::set('qty',$qty);
									?>
								</td>
							</tr>
							<tr>
								<th>Thuế VAT : </th>
								<td  style="text-align:center;color:red;">5%</td>
							</tr>
							<tr>
								<th>Tổng cộng :</th>
								<td style="text-align:center;color:red;">
									<?php
										$vat = ($subtotal * 5)/100 + $subtotal;
										echo $vat ." "."VNĐ";
									?>
								</td>
							</tr>
					   </table>
					   <?php
					} else {
						echo "Giỏ hàng của bạn đang trống ! Mời bạn mua sắm ngay";
					}
					   ?>
					</div>
					<div class="shopping">
						<div class="shopleft">
							<a href="index.php"> <img src="images/shop.png" alt="" /></a>
						</div>
						<div class="shopright">
							<a href="login.php"> <img src="images/check.png" alt="" /></a>
						</div>
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
 <?php
    include 'inc/footer.php';
 ?>



 