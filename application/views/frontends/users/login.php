            <div class="login-wrapper">
            <?php
            $CI =& get_instance();
        if ($CI->session->flashdata('error')) {
            echo $CI->session->flashdata('error');
        }
        ?>
            <form role="form" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" name="pwd" placeholder="Password">
                <div>

                <!-- <div class="checkbox">
                  <label>
                    <input type="checkbox"> Check me out
                  </label>
                </div>
              </div> -->
              <!-- /.box-body -->

              <div class="box-footer" style="margin-top:10px">
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
            </div>

            <style>
              .login-wrapper{
                padding:5px;
                width:300px;
                margin:0px auto;
                border:1px solid #cdcdcd;
                border-radius:5px;
                margin-top:20px
              /* } */
            </style>