<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/brand.php';?>
<?php include '../classes/category.php';?>
<?php include '../classes/product.php';?>
<?php include_once '../helpers/format.php';?>
<?php
	$fm = new Format();
	$pd = new product();
	$cat = new category();
	if(isset($_GET['productid'])){
		$id = $_GET['productid'];
		$delpro = $pd -> del_product($id);
	}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Danh sách sản phẩm</h2>
        <div class="block">
			<?php  
			if(isset($delpro)){
				echo $delpro;
			}

			?>
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>ID</th>
					<th>Tên SP</th>
					<th>Giá SP</th>
					<th>Ảnh SP</th>
					<th>Danh mục SP</th>
					<th>Thương hiệu</th>
					<th>Mô tả SP</th>
					<th>Loại SP</th>	
					<th>Chỉnh sửa</th>
				
				</tr>
			</thead>
			<tbody>
				<?php
					$pdlist = $pd->show_product();
					if($pdlist){
						$i = 0;
					while ($result = $pdlist->fetch_assoc()) {
					$i ++;
				
				?>
				<tr class="odd gradeX">
					<td><?php echo $i ?></td>
					<td><?php echo $result['productName']?></td>
					<td><?php echo $result['price']?></td>
					<td><img src="uploads/<?php echo $result['image']?>"  width="60px" height="60px"></td>
					<td><?php echo $result['catName']?></td>
					<td><?php echo $result['brandName']?></td>
					<td><?php echo $fm->textShorten($result['product_desc'], 100)?></td>
					<td><?php
					if($result['type'] == 0){
						echo "Không nổi bật";
					} else {
						echo "Nổi bật";
					}
					?></td>
					<td><a href="productedit.php?productid=<?php echo $result['productid']?>">Edit</a> || <a href="?productid=<?php echo $result['productid']?>">Delete</a></td>
				</tr>
				<?php
					}
				}
				?>
			</tbody>
		</table>

       </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        $('.datatable').dataTable();
		setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
