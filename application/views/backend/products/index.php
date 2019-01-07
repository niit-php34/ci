<table class="table table-bordered">
  <tbody><tr>
    <th style="width: 10px">#</th>
    <th>Name</th>
    <th>Image</th>
    <th>Description</th>
    <th>Price</th>
    <th>Discount</th>
    <th>Status</th>
    <th>Action</th>
  </tr>

  <?php
  if (isset($data) && $data!=null) {
    foreach ($data as $key => $r) {
      ?>
      <tr>
        <td><?php echo $r->id; ?></td>
        <td><?php echo $r->name; ?></td>
        <td>
          <img src="<?php echo $r->image!=null?base_url().$r->image:'https://via.placeholder.com/150'; ?>"/>
        </td>
        <td><?php echo $r->description; ?></td>
        <td><?php echo $r->price; ?></td>
        <td><?php echo $r->discount; ?></td>
        
        <td>
          <?php if($r->activated == 1){
            echo 'Activated';
          }else{
            echo 'Deactivated';
          } ?>
        </td>
        <td>
          <a href="<?php echo base_url() ?>admin/categories/delete?id=<?php echo $r->id; ?>" class="btn btn-danger">Delete</a>
          <a class="btn btn-primary" href="<?php echo base_url() ?>admin/categories/update?id=<?php echo $r->id; ?>">Update</a>
          <a class="btn btn-primary" href="<?php echo base_url() ?>admin/categories/activate?id=<?php echo $r->id; ?>">Active</a>
          <a class="btn btn-primary" href="<?php echo base_url() ?>admin/categories/deactive?id=<?php echo $r->id; ?>">DeActive</a>
        </td>
      </tr>
      <?php 
    }
  }
  ?>

</tbody></table>