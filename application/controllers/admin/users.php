<?php
  /**
   *
   */
class Users extends MY_Controller
{
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('users_model');
    }

    public function index()
    {
    }

    public function add()
    {
        if (isset($_POST['submit'])) {
            $email = $this->input->post('email');
            $username = $this->input->post('username');
            $fullname = $this->input->post('fullname');
            $pwd=$this->input->post('pwd');
            $address = $this->input->post('address');
            $phone = $this->input->post('phone');
            $level = $this->input->post('level');
            $insert_data =array(
            'email'=>$email,
            'user_name'=>$username,
            'full_name'=>$fullname,
            'pwd'=>md5($pwd),
            'address'=>$address,
            'phone'=>$phone,
            'level'=>$level,
            'activated'=>1
            );
            $this->users_model->insert($insert_data);
        }
        parent::_render_backend_view('backend/users/add', null);
    }
}
