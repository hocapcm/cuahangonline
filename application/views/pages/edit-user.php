<section id="cart_items">
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <div class="login-form">
                        <h2>User Information</h2>
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
                        <form onsubmit="return confirm('Xac nhan cap nhat thong tin tai khoan')" method="POST" action="<?php echo base_url('update-user/'.$this->session->userdata('LoggedInCustomer')['id']) ?>">
						<label>Name:</label>
							<input type="text" name="name" placeholder="Name" value="<?php echo $user->name; ?>" />

							<label>Password:</label>
							<input type="password" name="password" placeholder="Password" />

							<label>Phone:</label>
							<input type="text" name="phone" placeholder="Phone" value="<?php echo $user->phone; ?>" />

							<label>Address:</label>
							<input type="text" name="address" placeholder="Address" value="<?php echo $user->address; ?>" />

                            <button type="submit" class="btn btn-default">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>
