<div class="container">
<div class="card">
  <div class="card-header">
    List Order
  </div>
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

  <div class="card-body">
  <form action="<?php echo base_url('order/updateAll/'.$order_details[0]->order_code) ?>" method="POST" enctype="multipart/form-data">
  <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Order Code</th>
      <th scope="col">Product Name</th>
      <th scope="col">Product Image</th>
      <th scope="col">Product Price</th>
      <th scope="col">Quantity</th>  
      <th scope="col">Subtotal</th>
    </tr>
  </thead>
  <tbody>
    <?php
      foreach($order_details as $key => $ord){
    ?>
    <tr>
      <th scope="row"><?php echo $key ?></th> 
      <td><?php echo $ord->order_code ?></td>
      <td><?php echo $ord->title ?></td>
      <td><img src="<?php echo base_url('uploads/product/'.$ord->image) ?>" width="150" height="150"></td>
      <td><?php echo number_format($ord->price,0,',','.'); ?>vnd </td>
      <td><?php echo $ord->qty ?></td>
      <td>
        <?php
          echo number_format($ord->qty*$ord->price,0,',','.');
      
        ?>vnd
      </td>
      <td>
  
        </td>

      
    </tr>
    <?php
      }
    ?>
    <tr>
        <td>
        <select name="status" class="xulydonhang1 form-control" onchange="updateStatus(this)">
            <option value="0" data-order-code="<?php echo $ord->order_code ?>">---Xu ly don hang---</option>
            <option value="2" data-order-code="<?php echo $ord->order_code ?>">Don hang da duoc xu ly: dang giao hang</option>
            <option value="3" data-order-code="<?php echo $ord->order_code ?>">Huy don</option>
        </select>

        </form>
        </td>
    </tr>

  </tbody>
</table>
  </div>
</div>
</div>