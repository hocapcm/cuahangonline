<footer id="footer"><!--Footer-->
		
		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-2 hidden-xs">
						<div class="single-widget">
							<h2>Giới thiệu Podo Shop</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Giới thiệu hệ thống cửa hàng</a></li>
								<li><a href="#">Tuyển dụng</a></li>
								<li><a href="#">Tài khoản ngân hàng</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2 hidden-xs">
						<div class="single-widget">
							<h2>Chính sách & Quy định</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Chính sách bảo hành</a></li>
								<li><a href="#">Chính sách đổi trả</a></li>
								<li><a href="#">Khách hàng thân thiết</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Hướng dẫn sử dụng</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Hướng dẫn mua hàng</a></li>
								<li><a href="#">Hướng dẫn thanh toán</a></li>
								<li><a href="#">Hướng dẫn mua trả góp</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Tổng đài hỗ trợ</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Hotline: 09.49.81.258</a></li>
								<li><a href="#">Email: podo@gmail.com</a></li>
								<li><a href="#">Giờ mở cửa: 8h - 21h</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3 col-sm-offset-1">
						<div class="single-widget">
							<h2>Địa chỉ cửa hàng</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">92 Phan Đình Phùng, Phú Nhuận, Hồ Chí Minh</a></li>
								<li><a href="#">206 Phố Huế, Hai Bà Trưng, Hà Nội</a></li>
								<li><a href="#">Giờ mở cửa: 8h - 21h</a></li>
							</ul>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Công ty Thời trang PODO. GPKD số 0123421514 cấp ngày 14/09/2023 do Sở Kế Hoạch và Đầu Tư thành phố Hồ Chí Minh cấp</p>
				</div>
			</div>
		</div>
		
	</footer>
	

  
    <script src="<?php echo base_url('frontend/js/jquery.js') ?>"></script>
	<script src="<?php echo base_url('frontend/js/bootstrap.min.js') ?>"></script>
	<script src="<?php echo base_url('frontend/js/jquery.scrollUp.min.js') ?>"></script>
	<script src="<?php echo base_url('frontend/js/price-range.js') ?>"></script>
	<script src="<?php echo base_url('frontend/js/filter.js') ?>"></script>
	<script src="<?php echo base_url('frontend/js/update-cart.js') ?>"></script>
	<script src="<?php echo base_url('frontend/js/login-register.js') ?>"></script>
	<script src="<?php echo base_url('frontend/js/rating-star.js') ?>"></script>
    <script src="<?php echo base_url('frontend/js/jquery.prettyPhoto.js') ?>"></script>
    <script src="<?php echo base_url('frontend/js/main.js') ?>"></script>
	<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
	
	<script>
	$('.price_from').val(<?php echo $min_price ?>);
	$('.price_to').val(<?php echo $max_price/2 ?>);
	$( function() {
		$( "#slider-range" ).slider({
		range: true,
		min: <?php echo $min_price ?>,
		max: <?php echo $max_price ?>,
		values: [ <?php echo $min_price ?>, <?php echo $max_price/2 ?> ],
		slide: function( event, ui ) {
			$( "#amount" ).val( "đ" + addPlus(ui.values[ 0 ]).toString() + " - đ" + addPlus(ui.values[ 1 ]) );
			$('.price_from').val(ui.values[ 0 ]);
			$('.price_to').val(ui.values[ 1 ]);
		}
		
		});
		$( "#amount" ).val( "đ" +  addPlus($( "#slider-range" ).slider( "values", 0 )) +
		" - đ" + addPlus($( "#slider-range" ).slider( "values", 1 ) ));
	} );
	function addPlus(nStr)
			{
				nStr += '';
				x = nStr.split('.');
				x1 = x[0];
				x2 = x.length > 1 ? '.' + x[1] : '';
				var rgx = /(\d+)(\d{3})/;
				while (rgx.test(x1)) {
					x1 = x1.replace(rgx, '$1' + '.' + '$2');
				}
				return x1 + x2;
			}
  </script>

  <script>
	function myFunction(){
	//alert('OK');
	var name_comment = $('.name_comment').val();
		var email_comment = $('.email_comment').val();
		var comment = $('.comment').val();
		var product_id_comment = $('.product_id_comment').val();
		var star = $('.star_rating_value').val();
		if(name_comment ==''|| email_comment==''|| comment==''){
			alert('Missing input information!');
		}else{
			$.ajax({
			method: 'POST',
			url: "<?=base_url('comment/send');?>",
			data: {name_comment:name_comment,email_comment:email_comment,comment:comment,product_id_comment:product_id_comment,star:star},
			success:function(){
				alert('Sent comment successfully!');
				$('.name_comment').val("");
				$('.email_comment').val("");
				$('.comment').val("");
			}
		})
		}
		

		
	}
	$(document).ready(function () {
		$('.write-comment').click(myFunction); // Attach the click event to the button
	});

  </script>
	
</body>
</html>