<section id="cart_items">
		<div class="container">
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
							<td class="quantity">In Stock</td>
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
										<?php
										if($items['qty']>$items['options']['in_stock']){

										?>
										 <a class="cart_quantity_down" href="#" data-action="subtract">-</a>
                                        <input class="cart_quantity_input" type="number" min="1" name="quantity" value="<?php echo $items['options']['in_stock'] ?>" autocomplete="off" size="2">
                                        <a class="cart_quantity_up" href="#" data-action="add">+</a>
										<?php
										}else{
										?>
										 <a class="cart_quantity_down" href="#" data-action="subtract">-</a>
                                        <input class="cart_quantity_input" type="number" min="1" name="quantity" value="<?php echo $items['qty'] ?>" autocomplete="off" size="2">
                                        <a class="cart_quantity_up" href="#" data-action="add">+</a>
										<?php
										}
										?>
                                      
                                    </div>
                                </form>
                            </td>
							<td class="cart_description">
								<h4><a href=""><?php echo $items['options']['in_stock'] ?></a></h4>
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
						
                     
                       

					</tbody>
				</table>
				<div class="row">
				<div class="col-sm-9">
				<h4 class="cart_total_price">Tong tien: <?php echo number_format($total,0,',','.') ?>đ</h4>
				</div>
				<div class="col-sm-3">
					<a href="<?php echo base_url('delete-all-cart') ?>" class="btn btn-danger">Delete all</a>
					<a href="<?php echo base_url('checkout') ?>" class="btn btn-success">Checkout</a>
				</div>
				
                            
                          
              

				</div>
                <?php 
                    }else {
                        echo '<span style="font-size:18px;" class = "text text-danger">There is no item in your cart!</span>';
                    }
                ?>
			</div>
		</div>
	</section> <!--/#cart_items-->