<?php
    include 'inc/head.php';
?>

<?php
	$login_check = Session::get('customer_login');
    if($login_check == false){
        header ('Location:login.php');
    }
?>
 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2>Chi tiết đơn hàng của bạn</h2>
					<br>
						<table class="tblone">
							<tr>
                                <th width="5%">ID</th>   
								<th width="15%">Tên sản phẩm</th>
								<th width="10%">Hình ảnh</th>
								<th width="15%">Giá sản phẩm</th>
								<th width="10%">Số lượng</th>
                                <th width="20%">Ngày đặt</th>
                                <th width="10%">Trạng thái</th>
								<th width="10%">Chỉnh sửa</th>
							</tr>
							<?php
                                $customer_id = Session::get('customer_id');
								$get_cart_ordered = $ct-> get_cart_ordered($customer_id);
								if($get_cart_ordered){
                                    $i=0;
									$qty = 0;
									while($result = $get_cart_ordered->fetch_assoc()){
                                        $i++;
							?>
							<tr>
                                <td><?php echo $i; ?></td>
								<td><?php echo $result['productName']; ?></td>
								<td><img src="admin/uploads/<?php echo $result['image']; ?>"/></td>
								<td><?php echo $result['price'],".VNĐ"; ?></td>
								<td><?php echo $result['quantity']; ?></td>
                                <td><?php echo $fm->formatDate($result['date_order']); ?></td>
                                <td>
                                    <?php
                                        if($result['status']=='0'){
                                            echo('Đang xử lý');
                                        } else {
                                            echo('Đã xử lý');
                                        }
                                    ?>
                                </td>
                                <?php
                                    if($result['status']=='0'){
                                ?>
                                    <td><?php echo ('N/A');?></td>
                                <?php 
                                    } else {
                                ?>
								<td><a onclick="return confirm('Bạn có muốn xóa không')" href="#">Xóa</a></td>
                                <?php
                                    }
                                ?>
							</tr>
								<?php
									}
								}
								?>
						</table>

					
					</div>
					<div class="shopping">
						<div class="shopleft">
							<a href="index.php"> <img src="images/shop.png" alt="" /></a>
						</div>
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
 <?php
    include 'inc/footer.php';
 ?>



 