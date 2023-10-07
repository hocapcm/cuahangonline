<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							<?php
								foreach ($category as $key => $cate){
							?>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="<?php echo base_url('danh-muc/'.$cate->id)?>"><?php echo $cate->title?></a></h4>
								</div>
							</div>
							<?php
								}
								?>
						</div><!--/category-products-->
					
						<div class="brands_products"><!--brands_products-->
							<h2>Brand</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
							<?php
								foreach ($brand as $key => $bra){
							?>
									<li><a href="<?php echo base_url('thuong-hieu/'.$bra->id) ?>"> <?php echo $bra->title ?></a></li>
									
							<?php
								}
								?>
								
								</ul>
							</div>
						</div><!--/brands_products-->
						
						
					
					</div>
				</div>
				