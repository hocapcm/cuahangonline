	
	<section>
		<div class="container">
			<div class="row">
				<?php $this->load->view('pages/template/sidebar'); ?>
		
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
                        <div class="row">
							<div class="col-md-7" style="display:flex;">
							<form action="" method="GET">
								<p>
									<label for="amount" style="color: #1ba2e0; font-family: 'Roboto', sans-serif; font-size: 15px; font-weight: bold; margin: 0 auto 10px; text-align: center; text-transform: uppercase; position: relative; z-index: 3;"">Price range:</label>
									<input type="text" id="amount" readonly style="border:0; color:#1ba2e0; font-weight:bold; width:300px;">
								</p>

								<div id="slider-range" style="width:369px; margin-left:8px;"></div>
								<input type="hidden" class="price_from" name="from">
								<input type="hidden" class="price_to" name="to">
								<input type="submit" value="lọc giá" class="btn btn-primary filter-price">
								</form>
							</div>
							<div class="col-md-5">
								<div class="form-group" style="float:right; margin-top:0; margin-right:50px;">
									<select class="form-control select-filter" id="select-filter">
										<option value="0">---Filler by---</option>
										<option value="?kytu=asc">Ky tu A-Z</option>
										<option value="?kytu=desc">Ky tu Z-A</option>
										<option value="?gia=asc">Gia tang dan</option>
										<option value="?gia=desc">Gia giam dan</option>
									</select>
								</div>
							</div>
							
						</div>
                            <h2 class="title text-center">Danh mục - <?php echo $allproduct_cate_pagination[0]->tendanhmuc; ?></h2>

						<?php 
						foreach ($allproduct_cate_pagination as $key => $catepro){
						?>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
							<form action="<?php echo base_url('add-to-cart1') ?>" method="POST">

								<div class="single-products">
										<div class="productinfo text-center">
										<input type="hidden" value="<?php echo $catepro->id ?>" name="product_id">	
										<input type="hidden" value="1" name="quantity">
											<a href="<?php echo base_url('san-pham/'.$catepro->id) ?>" ><img src="<?php echo base_url('uploads/product/'.$catepro->image) ?>" alt="<?php echo $catepro->title ?>" /></a>
											<a href="<?php echo base_url('san-pham/'.$catepro->id) ?>" ><?php echo $catepro->title ?></a>
											<h2><?php echo number_format($catepro->price, 0, ',', '.') ?>đ</h2>
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
						
					</div><!--features_items-->
					
				<?php echo $links ?>
				</div>
			</div>
		</div>
	</section>
	