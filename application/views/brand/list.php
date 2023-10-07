<div class="container">
<div class="card">
  <div class="card-header">
    List Brand
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
  <a href="<?php echo base_url('brand/create') ?>" class="btn btn-primary">Add Brand</a>
  <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">Image</th>  
      <th scope="col">Status</th>
      <th scope="col">Manage</th>
    </tr>
  </thead>
  <tbody>
    <?php
      foreach($brand as $key => $pro){
    ?>
    <tr>
      <th scope="row"><?php echo $key ?></th> 
      <td><?php echo $pro->title ?></td>
      <td><?php echo $pro->description ?></td>
      <td>
          <img src="<?php echo base_url('uploads/brand/'.$pro->image) ?>" width="150" height="150">
      </td>
      <td>
        <?php
          if($pro->status==1){
            echo 'active';
          }else echo 'inactive';
      
        ?>
      </td>
      <td>
  <a onclick="return confirm('Are you sure?')" href="<?php echo base_url('brand/delete/'.$pro->id) ?>" class="btn btn-danger">
    <i class="fas fa-trash"></i>
  </a>
  <a href="<?php echo base_url('brand/edit/'.$pro->id) ?>" class="btn btn-warning">
    <i class="fas fa-pencil-alt"></i>
  </a>
</td>

      
    </tr>
    <?php
      }
    ?>

  </tbody>
</table>
  </div>
</div>
</div>