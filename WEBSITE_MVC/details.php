<?php
    include 'inc/head.php';
?>
<?php
if(!isset($_GET['proid']) || $_GET['proid'] == NULL){
	echo "<script>window.location = '404.php'</script>";
} else {
	$id = $_GET['proid'];
}if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
    $quantity = $_POST['quantity'];
    $AddtoCart = $ct -> add_to_cart($id,$quantity);
}
?>

<div class="main">
	
    <div class="content">	
        <div class="section group">
            <?php
		$get_product_details = $product->get_details($id);
		if($get_product_details){
			while($result_details = $get_product_details->fetch_assoc()) {
	        ?>
            <div class="cont-desc span_1_of_2">
                <div class="grid images_3_of_2">
                    <img src="admin/uploads/<?php echo $result_details['image']; ?>"height="100px">
                </div>
                <div class="desc span_3_of_2">
                    <h2><p style="color:Black;font-size:12px">Tên sản phẩm:</p> <?php echo $result_details['productName'] ?> </h2>
                    <p><?php echo $result_details['product_desc'] ?></p>
                    <div class="price">
                        <p>Giá sản phẩm: <span><?php echo $result_details['price'] ?>.VNĐ</span></p>
                        <p>Danh mục sản phẩm: <span><?php echo $result_details['catName'] ?></span></p>
                        <p>Thương hiệu: <span><?php echo $result_details['brandName'] ?></span></p>
                    </div>
                    <div class="add-cart">
                        <form action="" method="post">
                            <input type="number" class="buyfield" name="quantity" value="1" min="1"/>
                            <input type="submit" class="buysubmit" name="submit" value="Mua ngay" /><br>
                            <!-- <?php
                                if(isset($AddtoCart)){
                                    echo '<span style="color:red;font-size:17px">Sản phẩm đã tồn tại trong giỏ hàng</span>';
                                }
                            ?> -->
                        </form> 
                    </div>
                </div>
                <div class="product-desc">
                    <h2>Chi tiết sản phẩm</h2>
                    <p style="font-size:15px;text-align:justify">Sau nhiều năm hoạt động và phát triển, chúng tôi đã đạt được những thành tựu đáng kể
                         và các chứng chỉ uy tín trong lĩnh vực chế biến nông sản có lợi cho sức khỏe. Ngoài 
                         ra, các sản phẩm trái cây sấy nhiệt đới của chúng tôi đã được xuất khẩu và yêu thích 
                         tại nhiều nước trên thế giới như EU, Úc, Singapore, Nga… và các thị trường khác.</p>
                </div>
            </div>
            <?php
			}
		}
		?>
            <div class="rightsidebar span_3_of_1">
                <h2>DANH MỤC SẢN PHẨM</h2>
                <ul>
                    <?php
                    $getall_category = $cat->show_category_fontend();
                    if($getall_category){
                        while($result_allcat = $getall_category->fetch_assoc()){
                    ?>
                   <li><a href="productbycat.php?catid=<?php echo $result_allcat['catid'] ?>"><?php echo $result_allcat['catName'] ?></a></li>
                   <?php
                    }
                }
                   ?>
                </ul>

            </div>
        </div>
    </div>
    <?php
    include 'inc/footer.php';
 	?>