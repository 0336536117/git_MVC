<?php
    include 'inc/head.php';
?>
<?php
if(isset($_GET['orderid']) && $_GET['orderid'] == 'order'){
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
        <div class="heading">
            <h3>Thanh toán Offline</h3>
            </div>
            <div class="clear"></div>
            <div class="box_left">
                <h2>Thông tin sản phẩm</h2>
                <div class="cartpage">
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
						<table class="tblone">
							<tr>
                                <th width="5%">ID</th>
								<th width="25%">Tên SP</th>
								<th width="25%">Giá SP</th>
								<th width="20%">Số lượng</th>
								<th width="30%">Tổng tiền </th>
							</tr>
							<?php
								$get_product_cart = $ct-> get_product_cart();
								if($get_product_cart){
									$subtotal = 0;
									$qty = 0;
                                    $i =0;
									while($result = $get_product_cart->fetch_assoc()){
                                        $i++;
							?>
							<tr>
                                <td><?php echo $i; ?></td>
								<td><?php echo $result['productName']; ?></td>
								<td><?php echo $result['price'].".VNĐ"; ?></td>
								<td>
										<input type="number" name="quantity" min="0" value="<?php echo $result['quantity']; ?>"/>
								</td>
								<td>
									<?php
									$total= $result['price'] * $result['quantity'];
									echo $total.".VNĐ ";
									?>
								</td>
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
						<table style="float:right;text-align:left;font-size:15px;margin:5px" width="40%">
							<tr>
								<th>Tổng tiền SP : </th>
								<td>
									<?php
										echo $subtotal.".VNĐ";
										Session::set('sum',$subtotal);
										Session::set('qty',$qty);
									?>
								</td>
							</tr>
							<tr>
								<th>Thuế VAT : </th>
								<td>5%</td>
							</tr>
							<tr>
								<th>Tổng cộng :</th>
								<td>
									<?php
										$vat = ($subtotal * 5)/100 + $subtotal;
										echo $vat.".VNĐ";
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
            </div>

            <div class="box_right">
                <h2>Thông tin khách hàng</h2>
            <table class="tblone">
                <?php
                $id = Session::get('customer_id');
                    $get_customers = $cs->show_customers($id);
                    if($get_customers){
                        while($result = $get_customers->fetch_assoc()){
                ?>
                <tr>
                    <td>Name</td>
                    <td>:</td>
                    <td><?php echo $result['name'] ?></td>
                </tr>
                <tr>
                    <td>City</td>
                    <td>:</td>
                    <td><?php echo $result['city'] ?></td>
                </tr>
                <tr>
                    <td>Phone</td>
                    <td>:</td>
                    <td><?php echo $result['phone'] ?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>:</td>
                    <td><?php echo $result['email'] ?></td>
                </tr>
                <tr>
                    <td>Zipcode</td>
                    <td>:</td>
                    <td><?php echo $result['zipcode'] ?></td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td>:</td>
                    <td><?php echo $result['address'] ?></td>
                </tr>
                <tr>
                    <td colspan="3"><a href="editprofile.php">Update Profile</a></td>

                </tr>
               
                <?php       
                        }
                    }
                ?>
            </table>
            </div>
        </div>
        <br><center><a class="a_order" href="?orderid=order">Mua Ngay</a></center>
    </div>
    <?php
    include 'inc/footer.php';
 	?>
    </div>
    </form>

