<table class="table table-bordered">
  <tbody><tr>
    <th style="width: 10px">#</th>
    <th>Username</th>
    <th>Fullname</th>
    <th>Phone</th>
    <th>Address</th>
    <th>Status</th>
    <th>Action</th>
  </tr>

  <?php
  if (isset($data) && $data!=null) {
    foreach ($data as $key => $r) {
      ?>
      <tr>
        <td><?php echo $r->id; ?></td>
        <td><?php echo $r->user_name; ?></td>
        <td><?php echo $r->full_name; ?></td>
        <td><?php echo $r->phone; ?></td>
        <td><?php echo $r->address; ?></td>
        <td>
          <?php if($r->activated == 1){
            echo 'Activated';
          }else{
            echo 'Deactivated';
          } ?>
        </td>
        <td>
          <a href="<?php echo base_url() ?>admin/users/delete?id=<?php echo $r->id; ?>" class="btn btn-danger">Delete</a>
          <a class="btn btn-primary" href="<?php echo base_url() ?>admin/users/update?id=<?php echo $r->id; ?>">Update</a>
          <a class="btn btn-primary" href="<?php echo base_url() ?>admin/users/activate?id=<?php echo $r->id; ?>">Active</a>
          <a class="btn btn-primary" href="<?php echo base_url() ?>admin/users/deactive?id=<?php echo $r->id; ?>">DeActive</a>
        </td>
      </tr>
      <?php 
    }
  }
  ?>

</tbody></table>