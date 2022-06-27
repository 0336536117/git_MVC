<div class="header_bottom">
    <div class="header_bottom_left">
        <div class="section group">
            <?php
					$getlastestDau = $product->getlastestDau();
					if($getlastestDau){
						while($resultDau = $getlastestDau->fetch_assoc()){	
				?>
            <div class="listview_1_of_2 images_1_of_2">
                <div class="listimg listimg_2_of_1">
                    <a href="preview.html"> <img src="admin/uploads/<?php echo $resultDau['image']; ?>" height="133px" width="auto"/></a>
                </div>
                <div class="text list_2_of_1">
                    <h2><?php echo $resultDau['productName']; ?></h2>
                    <p><?php echo $resultDau['product_desc']; ?></p>
                    <div class="button"><span><a href="details.php?proid= <?php echo $resultDau['productid']; ?>">Chi tiết</a></span></div>
                </div>
            </div>
            <?php
					}
				}
			   ?>
            <?php
					$getlastestCam = $product->getlastestCam();
					if($getlastestCam){
						while($resultCam = $getlastestCam->fetch_assoc()){
				?>
            <div class="listview_1_of_2 images_1_of_2">
                <div class="listimg listimg_2_of_1">
                    <a href="preview.html"><img src="admin/uploads/<?php echo $resultCam['image']; ?>" height="133px" width="auto"/></a>
                </div>
                <div class="text list_2_of_1">
                    <h2><?php echo $resultCam['productName']; ?></h2>
                    <p><?php echo $resultCam['product_desc']; ?></p>
                    <div class="button"><span><a href="details.php?proid= <?php echo $resultCam['productid']; ?>">Chi tiết</a></span></div>
                </div>
            </div>
            <?php
					}
				}
			   ?>
        </div>
        <div class="section group">
            <?php
					$getlastestXoai = $product->getlastestXoai();
					if($getlastestXoai){
						while($resultXoai = $getlastestXoai->fetch_assoc()){
				?>
            <div class="listview_1_of_2 images_1_of_2">
                <div class="listimg listimg_2_of_1">
                    <a href="preview.html"><img src="admin/uploads/<?php echo $resultXoai['image']; ?> "height="133px" width="auto"/></a>
                </div>
                <div class="text list_2_of_1">
                    <h2><?php echo $resultXoai['productName']; ?></h2>
                    <p><?php echo $resultXoai['product_desc']; ?></p>
                    <div class="button"><span><a href="details.php?proid= <?php echo $resultXoai['productid']; ?>">Chi tiết</a></span></div>
                </div>
            </div>
            <?php
					}
				}
			   ?>
            <?php
					$getlastestBo = $product->getlastestBo();
					if($getlastestBo){
						while($resultBo = $getlastestBo->fetch_assoc()){
				?>
            <div class="listview_1_of_2 images_1_of_2">
                <div class="listimg listimg_2_of_1">
                    <a href="preview.html"><img src="admin/uploads/<?php echo $resultBo['image']; ?>" height="133px" width="auto"/></a>
                </div>
                <div class="text list_2_of_1">
                    <h2><?php echo $resultBo['productName']; ?></h2>
                    <p><?php echo $resultBo['product_desc']; ?></p>
                    <div class="button"><span><a href="details.php?proid= <?php echo $resultBo['productid'] ?>">Chi tiết</a></span></div>
                </div>
            </div>
            <?php
					}
				}
			   ?>
        </div>
        <div class="clear"></div>
    </div>
    <div class="header_bottom_right_images">

        <!-- FlexSlider -->

        <section class="slider">
            <div class="flexslider">
                <ul class="slides">
                    <li><img src="images/banner1.png" alt="" /></li>
                    <li><img src="images/banner2.png" alt="" /></li>
                    <li><img src="images/banner3.png" alt="" /></li>
                    <li><img src="images/banner4.png" alt="" /></li>
                </ul>
            </div>
        </section>
		
        <!-- FlexSlider -->

    </div>
    <div class="clear"></div>
</div>