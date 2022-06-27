<?php
    include 'inc/head.php';
?>
<?php
	if(!isset($_GET['catid']) || $_GET['catid'] == NULL){
		echo "<script>window.location = '404.php'</script>";
	} else {
		$id = $_GET['catid'];
	}
	// if($_SERVER['REQUEST_METHOD'] === 'POST'){
	// 	$catName = $_POST['catName'];
	// 	$updateCat = $cat -> update_category($catName,$id);
	// }
?>

 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
			<?php
				$name_cat = $cat->get_name_by_cat($id);
				if($name_cat){
					while($result_name = $name_cat->fetch_assoc()){
			?>
    		<h3>Loại sản phẩm : <?php echo $result_name['catName'] ?></h3>
    		</div>
			<?php
				}
			}
				?>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
			<?php
				$productbycat = $cat->get_product_by_cat($id);
				if($productbycat){
					while($result = $productbycat->fetch_assoc()){
			?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="preview-3.php"><img src="admin/uploads/<?php echo $result['image']; ?>" height="200px"/></a>
					 <h2><?php echo $result['productName']; ?> </h2>
					 <p><?php echo $result['product_desc']; ?></p>
					 <p><span class="price"><?php echo $result['price']; ?> VNĐ</span></p>
				     <div class="button"><span><a href="details.php?proid=<?php echo $result['productid'] ?>" class="details">Chi tiết</a></span></div>
				</div>
				<?php
				}
			} else {
				echo "Loại sản phẩm này chưa có";
			}
				?>
			</div>	
    </div>
 </div>
 <?php
    include 'inc/footer.php';
 ?>