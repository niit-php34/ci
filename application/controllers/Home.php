<?php
/**
 *
 */
class Home extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('template');
    }

    function index()
    {
        $this->load->library('template');

        $this->load->model('user_model');
        $this->user_model->insert(array('name'=>'Nguye','address'=>'Ha','phone'=>'08781'));
        $this->user_model->update(array('name'=>'John'), 2);
        
        $this->template->set_template('backend');
        //$data['menu']=$this->bk_menu;
        //$data['title']=$this->bk_title;
        $this->template->write_view('content', 'form', $data);
        $this->template->render();
    }

    function hello()
    {
        // $this->load->library('form_validation');
        // $this->load->helper('url');
        // $this->load->model('model_name');

        //echo 'hello';
        // echo $this->uri->segment(3);
        // echo $this->uri->segment(4);
        //echo $_GET['id'];
        $data=array('city'=>'Ha Noi','country'=>'Viet Name');
        $this->load->view('hello', $data);
    }

    function demo_validate()
    {
        $this->load->helper('form');

        if (isset($_POST['username'])) {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('username', 'Ten dang nhap', 'trim|required');

            $this->form_validation->set_rules('fullname', 'Họ tên', 'trim|required');

            $this->form_validation->set_rules('pwd', 'Mật khẩu', 'trim|required');

            if ($this->form_validation->run() == false) {
            } else {
                $config['upload_path']          = 'uploads/';
                $config['allowed_types']        = 'jpg|png';
                $config['max_size']             = 5000;
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('image')) {
                    echo $this->upload->display_errors();
                } else {
                    var_dump($this->upload->data());
                    echo "success";
                }
            }
        }
        $this->load->view('form');
    }
}
