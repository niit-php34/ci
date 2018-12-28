<div class="col-md-6">
  <!-- Horizontal Form -->
  <div class="box box-info">
    <div class="box-header with-border">
      <h3 class="box-title">Add new user</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form class="form-horizontal" method="post">
      <div>
        <?php
        $CI =& get_instance();
        if ($CI->session->flashdata('code') && $CI->session->flashdata('code')=='1') {
            echo '<div class="alert alert-success" role="alert">'.$CI->session->flashdata('message').'</div>';
        } else {
            echo '<div class="alert alert-danger" role="alert">'.$CI->session->flashdata('message').'</div>';
        }

        ?>

      </div>
      <div class="box-body">

        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Email</label>

          <div class="col-sm-10">
            <input type="email" class="form-control" id="inputEmail3" placeholder="Email" name="email">
          </div>
        </div>


        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Fullname</label>

          <div class="col-sm-10">
            <input type="text" class="form-control" id="inputEmail3" placeholder="Fullname" name="fullname">
          </div>
        </div>

        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">UserName</label>

          <div class="col-sm-10">
            <input type="text" class="form-control" id="inputEmail3" placeholder="UserName" name="username">
          </div>
        </div>

        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Address</label>

          <div class="col-sm-10">
            <input type="text" class="form-control" id="inputEmail3" placeholder="Address" name="address">
          </div>
        </div>

        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Phone</label>

          <div class="col-sm-10">
            <input type="text" class="form-control" id="inputEmail3" placeholder="Phone" name="phone">
          </div>
        </div>

        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Password</label>

          <div class="col-sm-10">
            <input type="password" class="form-control" id="inputEmail3" placeholder="Password" name="pwd">
          </div>
        </div>

        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Level</label>

          <div class="col-sm-10">
            <select class="form-control" name="level">
              <option value="1">Staff</option>
              <option value="0">Admin</option>
            </select>
          </div>
        </div>

      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        <button type="submit" name="reset" class="btn btn-default">Reset</button>
        <button type="submit" name="submit" class="btn btn-info pull-right">Submit</button>
      </div>
      <!-- /.box-footer -->
    </form>
  </div>

  <!-- /.box -->
</div>