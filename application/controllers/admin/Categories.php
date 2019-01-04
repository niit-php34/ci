<?php
/**
*
*/
class Categories extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('categories_model');
    }

    public function index()
    {

        $data = $this->categories_model->get('*', array(), array(), 0, 10, array('id'=>'DESC'));
        parent::_render_backend_view('backend/categories/index', array('data'=>$data));
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
                'level'=>1,
                'activated'=>1
            );
            $id=$this->categories_model->insert($insert_data);
            if ($id>0) {
                $this->session->set_flashdata('code', '1');
                $this->session->set_flashdata('message', 'Adding Successfully !!!!');
            } else {
                $this->session->set_flashdata('code', '0');
                $this->session->set_flashdata('message', 'Adding Failed');
            }
            redirect(base_url().'admin/categories/add');
        }
        parent::_render_backend_view('backend/categories/add', null);
    }

    public function delete()
    {
        $id=$this->input->get('id');
        $this->categories_model->delete($id);
    }

    public function activate()
    {
    //echo 'test';
        $id=$this->input->get('id');
        $this->categories_model->update(array('activated'=>1), $id);
        redirect(base_url().'admin/categories');
    }

    public function deactive()
    {
        $id=$this->input->get('id');
        $this->categories_model->update(array('activated'=>0), $id);
        redirect(base_url().'admin/categories');
    }
}
