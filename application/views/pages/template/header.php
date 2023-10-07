<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?php echo $this->config->config["pageTitle"] ?></title>
    <link href="<?php echo base_url('frontend/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('frontend/css/font-awesome.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('frontend/css/prettyPhoto.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('frontend/css/price-range.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('frontend/css/animate.css') ?>" rel="stylesheet">
	<link href="<?php echo base_url('frontend/css/main.css') ?>" rel="stylesheet">
	<link href="<?php echo base_url('frontend/css/responsive.css') ?>" rel="stylesheet">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="frontend/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="frontend/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="frontend/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="frontend/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="frontend/images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-3">
						<div class="logo pull-left">
							<a href="<?php echo base_url('/') ?>"><img src="<?php echo base_url('frontend/images/home/logo1.png') ?>" alt="" style="width:150px; padding-right: 10px;"/></a>
						</div>
						
					</div>
					<div class="col-sm-9">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								
								<?php
									if($this->session->userdata('LoggedInCustomer')){
								?>
								<li><a href="<?php echo base_url('edit-user/'.$this->session->userdata('LoggedInCustomer')['id']) ?>"><i class="fa fa-user"></i> <?php echo $this->session->userdata('LoggedInCustomer')['username'] ?></a> </li>
								<li><a href="<?php echo base_url('dang-xuat') ?>"><i class="fa fa-unlock-alt"></i> Logout</a></li>

								<?php
									}else{
								?>
								<li><a href="<?php echo base_url('dang-nhap') ?>"><i class="fa fa-lock"></i> Login</a></li>

								<?php 
									}
									?>
								<li><a href="<?php echo base_url('gio-hang') ?>"><i class="fa fa-shopping-cart"></i> Cart</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-md-7">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="<?php echo base_url('/') ?>" class="active">Home</a></li>
								<li class="dropdown"><a href="#">Category<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
										<?php
										foreach ($category as $key => $cate){
										?>
											<li><a href="<?php echo base_url('danh-muc/'.$cate->id)?>"><?php echo $cate->title ?></a></li>
										<?php
										}
										?>
                                    </ul>
                                </li>
								<li class="dropdown"><a href="#">Brand<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
										<?php
										foreach ($brand as $key => $bra){
										?>
											<li><a href="<?php echo base_url('thuong-hieu/'.$bra->id)?>"><?php echo $bra->title ?></a></li>
										<?php
										}
										?>
                                    </ul>
                                </li>  
								<li style="height:50px;">
								<div class="search_box pull-right">
									<form action="<?php echo base_url('tim-kiem') ?>" method="GET">
									<input type="text" name="keyword" class="searchbox-input" placeholder="Search here"/>
									<button type="submit" name="timkiem" value="go" class="btn btn-default go"><i class="fa fa-search"></i></button>
									</form>
								</div>
								</li>
								
								
							</ul>
						</div>
					</div>
					<div class="col-md-5 hidden-xs">
						<div class="contactinfo pull-right">
							<ul class="nav nav-pills">
								<li><a href="#">Call: <i class="fa fa-phone"></i> +84 49 81 258</a></li>
								<li><a href="#">| <i class="fa fa-envelope"></i> podo@gmail.com</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->