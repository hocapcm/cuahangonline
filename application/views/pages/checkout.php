<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
            <h2>Cart Information</h2>
			<div class="table-responsive cart_info">
                <?php
                if($this->cart->contents()){
                ?>
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
                            <td class="description">Image</td>
							<td class="image">Name</td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
                        <?php 
                        $subtotal = 0;
                        $total = 0;
                        foreach ($this->cart->contents() as $items) { 
                        $subtotal = $items['qty'] * $items['price'];    
                        $total += $subtotal;
                        ?>
						<tr>
							<td class="cart_product">
								<a href=""><img src="<?php echo base_url('uploads/product/'.$items['options']['image']) ?>" width="150" height="150" alt="<?php echo $items['name'] ?>"></a>
							</td>
							<td class="cart_description">
								<h4><a href=""><?php echo $items['name'] ?></a></h4>
							</td>
							<td class="cart_price">
								<p><?php echo number_format($items['price'],0,',','.') ?>vnd</p>
							</td>

							<td class="cart_quantity">
                                <form action="<?php echo base_url('update-cart-item') ?>" method="POST">
                                    <div class="cart_quantity_button">
                                        <input type="hidden" value="<?php echo $items['rowid'] ?>" name="rowid">
                                        <a class="cart_quantity_down" href="#" data-action="subtract">-</a>
                                        <input class="cart_quantity_input" type="text" name="quantity" value="<?php echo $items['qty'] ?>" autocomplete="off" size="2">
                                        <a class="cart_quantity_up" href="#" data-action="add">+</a>
                                    </div>
                                </form>
                            </td>

							<td class="cart_total">
								<p class="cart_total_price"><?php echo number_format($subtotal,0,',','.') ?>vnd</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="<?php echo base_url('delete-one-cart/'.$items['rowid']) ?>"><i class="fa fa-times"></i></a>
							</td>
						</tr>
                        <?php
                        }
                        ?>
						 <tr>
                            
                            <td colspan="4">
							<h4 class="cart_total_price">Tong tien: <?php echo number_format($total,0,',','.') ?>đ</h4></td>
                            <td>
							<!-- <a href="<?php echo base_url('checkout') ?>" class="btn btn-success">Checkout</a> -->
                            </td>
                     
                        </tr>
                     
                       

					</tbody>
				</table>
                <?php 
                    }else {
                        echo '<span class = "text text-danger">There is no item in your cart</span>';
                    }
                ?>
			</div>
            <section><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-sm-offset-3">
					<div class="login-form">
						<h2>Shipping Information</h2>
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
						<form onsubmit="return confirm('Xac nhan dat hang')" method="POST" action="<?php echo base_url('confirm-checkout') ?>">
                            <label>Name:</label>
							<input type="text" name="name" placeholder="Name" value="<?php echo $this->session->userdata('LoggedInCustomer')['username']; ?>" />
							<?php echo form_error('name') ;?>
                            <label>Email:</label>
							<input type="text" name="email" placeholder="Email" value="<?php echo $this->session->userdata('LoggedInCustomer')['email']; ?>" />
							<?php echo form_error('email') ;?>
                            <label>Phone:</label>
							<input type="text" name="phone" placeholder="Phone" value="<?php echo $this->session->userdata('LoggedInCustomer')['phone']; ?>" />
							<?php echo form_error('phone') ;?>
                            <label>Address:</label>
							<input type="text" name="address" placeholder="Address" value="<?php echo $this->session->userdata('LoggedInCustomer')['address']; ?>"/>
							<?php echo form_error('address') ;?>
                            <label>Choose a payment method</label>
							<select name="checkoutmethod" id="">
                                <option value="cod">COD</option>
                                <option value="payonline">Thanh toan Online</option>
                            </select>
							<button type="submit" class="btn btn-default">Place order</button>
						</form>
					</div>
				</div>
				
			</div>
		</div>
	</section><!--/form-->
		</div>
	</section> <!--/#cart_items-->