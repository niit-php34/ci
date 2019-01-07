<div class="col-md-12">
  <!-- Horizontal Form -->
  <div class="box box-info">
    <div class="box-header with-border">
      <h3 class="box-title">Add new user</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form class="form-horizontal" method="post" enctype="multipart/form-data">
      <div>
        <?php
        $CI =& get_instance();
        if ($CI->session->flashdata('code')) {
            if ($CI->session->flashdata('code')=='1') {
                echo '<div class="alert alert-success" role="alert">'.$CI->session->flashdata('message').'</div>';
            } else {
                echo '<div class="alert alert-danger" role="alert">'.$CI->session->flashdata('message').'</div>';
            }
        }
        ?>
      </div>
      <div class="box-body">
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Images</label>
          <div class="col-sm-10">
            <input type="file" class="form-control" name="file">
          </div>
        </div>

        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Name</label>

          <div class="col-sm-10">
            <input type="text" class="form-control" id="inputEmail3" placeholder="Name" name="name">
          </div>
        </div>

        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Description</label>

          <div class="col-sm-10">
            <textarea type="text" class="form-control" id="inputEmail3" placeholder="Description" name="description">
            </textarea>
          </div>
        </div>

        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Parent Category</label>
            <?php
            $CI =& get_instance();
            $this->load->model('categories_model');
            $cat=$CI->categories_model->get('*', array(), array(), 0, 100, array('id'=>'DESC'));
            ?>
          <div class="col-sm-10">
            <select class="form-control" name="parent_id">
              <option value="0">No Category</option>
                <?php
                foreach ($cat as $r) {
                    ?>
                <option><?php echo $r->name; ?></option>
                    <?php
                }
                ?>
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