  <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
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
          <label for="inputEmail3" class="col-sm-2 control-label">SKU</label>

          <div class="col-sm-10">
            <input type="text" class="form-control" id="inputEmail3" placeholder="Name" name="sku">
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
           <div style="height: 150px;overflow-y: scroll;border:1px solid #cdcdcd;padding:5px">
            <?php
            foreach ($cat as $r) {
                ?>
              <div>
                <input type="checkbox" name="categories[]" value="<?php echo $r->id ?>">&nbsp;<label><?php echo $r->name; ?></label> 
              </div>
                <?php
            }
            ?>
          </div>
        </div>
      </div>

      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Price</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="inputEmail3" placeholder="Price" name="price">
        </div>
      </div>

      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Discount</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="inputEmail3" placeholder="Discount" name="discount">
        </div>
      </div>


      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Short Description</label>
        <div class="col-sm-10">
          <textarea class="form-control" id="inputEmail3" placeholder="Short Desc" name="short_desc"></textarea>
        </div>
      </div>

      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Keyword</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="inputEmail3" placeholder="Keyword" name="keyword">
        </div>
      </div>

      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Tags</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="inputEmail3" placeholder="Tag" name="tag">
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