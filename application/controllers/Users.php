<?php

 /**
  *
  */
class Users extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function signup()
    {
        if (isset($_POST['submit'])) {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('fullname', 'Full Name', 'trim|required');

            $this->form_validation->set_rules('username', 'Full Name', 'trim|required');

            $this->form_validation->set_rules('email', 'Email', 'trim|required');

            $this->form_validation->set_rules('pwd', 'Password', 'trim|required');

            $this->form_validation->set_rules('phone', 'Phone', 'trim|required');

            if ($this->form_validation->run()) {
                $fullname = $this->input->post('fullname');
                $username = $this->input->post('username');
                $address= $this->input->post('address');
        
                $pwd = $this->input->post('pwd');
                $phone = $this->input->post('phone');
                $email = $this->input->post('email');
                $cfm_pwd=$this->input->post('cfm_pwd');
                $code = substr(uniqid(), 1, 6);

                //check confirm password
                if ($pwd != $cfm_pwd) {
                    $this->session->set_flashdata('error', 'Re password not match password');
                    redirect(base_url().'users/signup');
                }
                //check email exist in db
                $this->load->model('users_model');
                $exist =$this->users_model->get('*', array('email'=>$email));
                if ($exist!=null) {
                    $this->session->set_flashdata('error', 'Email exist in our db');
                    redirect(base_url().'users/signup');
                }

          //check phone exist in db
                $exist =$this->users_model->get('*', array('phone'=>$phone));
                if ($exist!=null) {
                    $this->session->set_flashdata('error', 'Phone exist in our db');
                    redirect(base_url().'users/signup');
                }

         //check username exist in db
                $exist =$this->users_model->get('*', array('user_name'=>$user_name));
                if ($exist!=null) {
                    $this->session->set_flashdata('error', 'Username exist in our db');
                    redirect(base_url().'users/signup');
                }


                //send email
                /*gui mail o day*/
                 //
                 //sau khi gui mail thanh cong
                $this->load->model('verified_account_model');
                $this->verified_account_model->insert(
                    array(
                    'full_name'=>$fullname,
                    'user_name'=>$username,
                    'address'=>$address,
                    'pwd'=>md5(md5(md5($pwd))),
                    'phone'=>$phone,
                    'email'=>$email,
                    'code'=>$code
                    )
                );
                      // echo $this->db->last_query();
                      // exit();
                       //chuyen user sang trang xac thuc email
                $_SESSION['email']=$email;
                redirect(base_url().'users/verification_email');
            }
        }
        parent::_render_frontend_view('frontends/users/signup', null);
    }

    function verification_email()
    {
        if (isset($_POST['code']) && isset($_SESSION['email'])) {
            $this->load->model('verified_account_model');
            $email = $_SESSION['email'];
            $code = $this->input->post('code');
            $data=$this->verified_account_model->get('*', array('email'=>$email,'code'=>$code));
            if ($data!=null) {
                   //code dung
                   //import du lieu tu bang verified_account sang bang user;
                $this->load->model('users_model');
                $this->users_model->insert(
                    array(
                    'user_name'=>$data[0]->user_name,
                    'full_name'=>$data[0]->full_name,
                    'email'=>$data[0]->email,
                    'address'=>$data[0]->address,
                    'phone'=>$data[0]->phone,
                    'pwd'=>$data[0]->pwd,
                    'activated'=>1,
                    'level'=>2
                    )
                );
                $this->verified_account_model->delete($data[0]->id);
                redirect(base_url().'users/login');
            } else {
                   //code sai
                $this->session->set_flashdata('error', 'Code ban nhap vao khong dung');
            }
        }
        parent::_render_frontend_view('frontends/users/verification_email', null);
    }

    function profile(){
        if(!isset($_SESSION['user'])){
            redirect(base_url().'users/login');
        }
        //load user info
    }

    function login()
    {
        if(isset($_POST['submit'])){
            $email = $this->input->post('email');
            $pwd=$this->input->post('pwd');
            $pwd=md5(md5(md5($pwd)));
            $this->load->model('users_model');
            $data=$this->users_model->get('*',array('email'=>$email,'pwd'=>$pwd));
            echo $this->db->last_query();
            if($data!=null){
                $_SESSION['user']=$data[0];
                redirect(base_url().'users/profile');
            }else{
                $this->session->set_flashdata('error','Incorrect Information');
                redirect(base_url().'users/login');
            }
        }
        parent::_render_frontend_view('frontends/users/login', null);
    }

    function pass(){
        echo md5(md5(md5('admin')));
    }
}
