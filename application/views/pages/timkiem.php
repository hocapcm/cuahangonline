	
	<section>
		<div class="container">
			<div class="row">
			<?php $this->load->view('pages/template/sidebar'); ?>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
                       
                        <h2 class="title text-center">Từ khóa tìm kiếm: <?php echo $title; ?></h2>
                        //Hiển thị thông báo ko có kết quả phù hợp
						<?php if (isset($no_results)): ?>
							<p style="text-align: center; font-size: 18px;"><?php echo $no_results; ?></p>
						<?php else: ?>
						//Nếu có kết quả phù hợp thì lấy dữ liệu ra
						<?php 
						foreach ($allproduct_keyword_pagination as $key => $keywordsearch){
						?>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
							<form action="<?php echo base_url('add-to-cart') ?>" method="POST">

								<div class="single-products">
										<div class="productinfo text-center">
										<input type="hidden" value="<?php echo $keywordsearch->id ?>" name="product_id">	
										<input type="hidden" value="1" name="quantity">
											<a href="<?php echo base_url('san-pham/'.$keywordsearch->id) ?>" ><img src="<?php echo base_url('uploads/product/'.$keywordsearch->image) ?>" alt="<?php echo $keywordsearch->title ?>" /></a>
											<a href="<?php echo base_url('san-pham/'.$keywordsearch->id) ?>" ><?php echo $keywordsearch->title ?></a>
											<h2><?php echo number_format($keywordsearch->price, 0, ',', '.') ?>đ</h2>
											<button type="submit" class="btn btn-default cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
										</div>
										
								</div>
						</form>
								<div class="choose">
									<!-- <ul class="nav nav-pills nav-justified">
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
									</ul> -->
								</div>
							</div>
						</div>
						<?php
						}
						?>
						<?php endif; ?>
					</div><!--features_items-->
					
					<?php echo $links ?>
				</div>
			</div>
		</div>
	</section>
	