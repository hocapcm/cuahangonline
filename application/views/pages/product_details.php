<section>
		<div class="container">
			<div class="row">
				
			<?php $this->load->view('pages/template/sidebar'); ?>
				
				<div class="col-sm-9 padding-right">
                    <?php foreach ($product_details as $key => $prode){ ?>
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src="<?php echo base_url('uploads/product/'.$prode->image) ?>" alt="<?php echo $prode->title ?>" />
							</div>
						</div>
                        <form action="<?php echo base_url('add-to-cart') ?>" method="POST">
						<div class="col-sm-7">
									//Hiển thị thông báo thành công và lỗi
									<?php
                                    if($this->session->flashdata('success')){
                                        ?>
                                    <div class="alert alert-success"><?php echo $this->session->flashdata('success')?> </div>

                                    <?php
                                    }elseif($this->session->flashdata('error')){
                                    ?>
                                    
                                    <div class="alert alert-danger"><?php echo $this->session->flashdata('error')?> </div>
                                    
                                    <?php
                                    }
                                    ?>
							<div class="product-information"><!--/product-information-->
								<img src="images/product-details/new.jpg" class="newarrival" alt="" />
								<h2 style="font-size:30px;"><?php echo $prode->title ?></h2>
                                <input type="hidden" value="<?php echo $prode->id ?>" name="product_id">
                                <h2 style="font-weight:300;"><b style="font-weight:400;">Brand:</b> <?php echo $prode->tenthuonghieu ?> <?php
									for ($i = 1; $i <= 5; $i++) {
										if ($i <= $averageRating) {
											echo '<i class="fas fa-star" style="color: gold;"></i>';
										} else {
											echo '<i class="far fa-star" style="color: gold;"></i>';
										}
									}
									?></h2>
                                <h2 style="font-weight:300;"><b style="font-weight:400;">Category:</b> <?php echo $prode->tendanhmuc ?></h2>
                                <h2 style="font-weight:300;"><b style="font-weight:400;">Availability:</b> <?php echo $prode->quantity ?></h2>
								<span>
									<span style="font-weight:500; font-size:25px; color:red;">Price: <?php echo number_format($prode->price,0,',','.') ?>đ</span>
                                    </br></br>
									<p><label style="font-weight:400; font-size:20px;">Quantity: </label>
									<input type="number" value="1" min="1" name="quantity" />
									<button type="submit" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Add to cart
									</button>
								</span>
								<a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
							</div><!--/product-information-->
						</div>
					    </form>
					</div><!--/product-details-->

                    <?php } ?>
					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#details" data-toggle="tab">Details</a></li>
								<li><a href="#reviews" data-toggle="tab">Reviews (<?php echo $count_comments ?>)</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade active in" id="details" >
							<h2><?php echo $prode->description ?></h2>
							</div>
							
							<div class="tab-pane fade" id="reviews" >
								<div class="col-sm-12">
									<?php 
									foreach ($list_comments as $key => $comments){
									?>
									<ul>
										<li><a href=""><i class="fa fa-user"></i><?php echo $comments->name ?></a></li>
										<li><a href=""><i class="fa fa-clock-o"></i><?php echo $comments->dated ?> </a></li>
									</ul>
									<p><?php echo $comments->comment ?> </a></p>
									<?php 
									}
									?>
									<p><b>Write Your Review</b></p>
									<input type="hidden" class="star_rating_value">
										<p class="counterW">Rating: <span class="scoreNow">3</span> out of <span>5</span></p>
										<ul class="ratingW">
										<li class="on"><a href="javascript:void(0);"><div class="star"></div></a></li>
										<li class="on"><a href="javascript:void(0);"><div class="star"></div></a></li>
										<li class="on"><a href="javascript:void(0);"><div class="star"></div></a></li>
										<li><a href="javascript:void(0);"><div class="star"></div></a></li>
										<li><a href="javascript:void(0);"><div class="star"></div></a></li>
										</ul>

									<form action="#" method="POST">
										<span>
											<input type="hidden" required value="<?php echo $prode->id ?>" class="product_id_comment"/>
											<input type="text" required class="name_comment" placeholder="Your Name"/>
											<input type="email" required class="email_comment" placeholder="Email Address"/>
										</span>
										<textarea name="" class="comment" placeholder="Write your thoughts here"></textarea>
										<button type="button" class="btn btn-default pull-right write-comment">
											Send
										</button>
									</form>
								</div>
							</div>
							
						</div>
					</div><!--/category-tab-->
					
                    <div class="recommended_items"><!--sp cùng loại-->
                        <h2 class="title text-center">Sản phẩm cùng loại</h2>				
                        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <?php
                                //Loại sản phẩm đang xem ra danh sách sản phẩm cùng loại
                                foreach ($sanphamcungloai as $key => $sp) {
                                    if ($sp->id == $prode->id) {
                                        unset($sanphamcungloai[$key]);
                                    }
                                }
                                //Chia 3 sản phẩm 1 slide
                                if (!empty($sanphamcungloai)) {
                                    $chunked_sanphamcungloai = array_chunk($sanphamcungloai, 3);
                                    foreach ($chunked_sanphamcungloai as $key => $chunk) {
                                        ?>
                                        <div class="item <?php echo $key == 0 ? 'active' : '' ?>">	
                                            <div class="row">
                                                <?php foreach ($chunk as $sp) { ?>
                                                    <div class="col-sm-4">
                                                        <div class="product-image-wrapper">
														<form action="<?php echo base_url('add-to-cart1') ?>" method="POST">
                                                            <div class="single-products">
                                                                <div class="productinfo text-center">
																<input type="hidden" value="<?php echo $sp->id ?>" name="product_id">	
																<input type="hidden" value="1" name="quantity">
																<a href="<?php echo base_url('san-pham/'.$sp->id) ?>" ><img src="<?php echo base_url('uploads/product/'.$sp->image) ?>" alt="<?php echo $sp->title ?>" /></a>
																<a href="<?php echo base_url('san-pham/'.$sp->id) ?>" ><?php echo $sp->title ?></a>
																<h2><?php echo number_format($sp->price, 0, ',', '.') ?>đ</h2>
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
                                                <?php } ?>
                                            </div>
                                        </div>
                                    <?php } ?>
                                <?php } else { ?>
                                    <!-- Hiển thị thông báo nếu không có sản phẩm cùng loại -->
                                    <div class="item active" style="margin-bottom:50px; text-align: center;">
                                        <p style="font-size:20px; color:orange;">Không có sản phẩm nào cùng loại.</p>
                                    </div>
                                <?php } ?>
                            </div>
                            <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                            </a>
                            <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                                <i class="fa fa-angle-right"></i>
                            </a>			
                        </div>
                    </div><!--/sp cùng loại-->

					
				</div>
			</div>
		</div>
	</section>
	