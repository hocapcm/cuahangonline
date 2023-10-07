<section>
	<div class="container">
		<div class="row">
			<div class="col-sm-offset-1 col-sm-10">
				<div class="features_items"><!--features_items-->
					<h2 class="title text-center">Newest Products</h2>
					<?php 
					foreach ($allproduct as $key => $allpro){
					?>
					<div class="col-sm-4">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">	
									<a href="<?php echo base_url('san-pham/'.$allpro->id) ?>" >
									<img src="<?php echo base_url('uploads/product/'.$allpro->image) ?>" alt="<?php echo $allpro->title ?>" />
									</a>
									<a href="<?php echo base_url('san-pham/'.$allpro->id) ?>" ><?php echo $allpro->title ?></a>
									<h2><?php echo number_format($allpro->price, 0, ',', '.') ?>đ</h2>
								</div>									
							</div>
							<div class="choose">
							</div>
						</div>
					</div>
					<?php
					}
					?>
				</div><!--features_items-->
			</div>
		</div>
	</div>
</section>
	