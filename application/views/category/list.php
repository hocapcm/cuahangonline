<div class="container">
<div class="card">
  <div class="card-header">
    List Category
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
  <a href="<?php echo base_url('category/create') ?>" class="btn btn-primary">Add Category</a>
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
      foreach($category as $key => $bra){
    ?>
    <tr>
      <th scope="row"><?php echo $key ?></th> 
      <td><?php echo $bra->title ?></td>
      <td><?php echo $bra->description ?></td>
      <td>
          <img src="<?php echo base_url('uploads/category/'.$bra->image) ?>" width="150" height="150">
      </td>
      <td>
        <?php
          if($bra->status==1){
            echo 'active';
          }else echo 'inactive';
      
        ?>
      </td>
      <td>
  <a onclick="return confirm('Are you sure?')" href="<?php echo base_url('category/delete/'.$bra->id) ?>" class="btn btn-danger">
    <i class="fas fa-trash"></i>
  </a>
  <a href="<?php echo base_url('category/edit/'.$bra->id) ?>" class="btn btn-warning">
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