<div class="signup-wrapper">
  <form role="form" method="post">
    <div class="box-body">
      <div>
        <?php
        $CI =& get_instance();
        if ($CI->session->flashdata('error')) {
            echo $CI->session->flashdata('error');
        }
        ?>

      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
        <div><?php echo form_error('email') ?></div>
      </div>

      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" name="pwd" class="form-control" id="exampleInputPassword1" placeholder="Password">
        <div><?php echo form_error('pwd') ?></div>
        <div>

          <div class="form-group">
            <label for="exampleInputPassword1">Confirm Password</label>
            <input type="password" name="cfm_pwd" class="form-control" id="exampleInputPassword1" placeholder="Confirm Password">
            <div>

              <div class="form-group">
                <label for="exampleInputPassword1">UserName</label>
                <input type="text" name="username" class="form-control" id="exampleInputPassword1" placeholder="Username">
                <div><?php echo form_error('username') ?></div>
                <div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">FullName</label>
                    <input type="text" name="fullname" class="form-control" id="exampleInputPassword1" placeholder="Fullname">
                    <div><?php echo form_error('fullname') ?></div>
                    <div>

                      <div class="form-group">
                        <label for="exampleInputPassword1">Phone</label>
                        <input type="text" name="phone" class="form-control" id="exampleInputPassword1" placeholder="Phone">
                        <div><?php echo form_error('phone') ?></div>
                        <div>

                          <div class="form-group">
                            <label for="exampleInputPassword1">Address</label>
                            <input type="text" name="address" class="form-control" id="exampleInputPassword1" placeholder="Address">
                            <div>

                              <div class="box-footer" style="margin-top:10px">
                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                              </div>
                            </form>
                          </div>

                          <style>
                          .signup-wrapper{
                            padding:5px;
                            width:300px;
                            margin:0px auto;
                            border:1px solid #cdcdcd;
                            border-radius:5px;
                            margin-top:20px
                            /* } */
                          </style>