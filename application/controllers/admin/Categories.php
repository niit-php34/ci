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
            $name = $this->input->post('name');
            $description = $this->input->post('description');
            $parent_id = $this->input->post('parent_id');

            $insert_data =array(
                'name'=>$name,
                'description'=>$description,
                'parent_id'=>$parent_id
            );

            $id=$this->categories_model->insert($insert_data);
            if ($id>0) {
                if (isset($_FILES['file'])) {
                    $config['upload_path'] = 'uploads/';
                    $config['allowed_types'] = 'gif|jpg|png';
                    $config['max_size']  = '100';
                    $config['max_width']  = '1024';
                    $config['max_height']  = '768';

                    $this->load->library('upload', $config);
                    
                    if (! $this->upload->do_upload('file')) {
                        $this->session->set_flashdata('code', '0');
                        $this->session->set_flashdata('message', 'Upload Failed Error'.$this->upload->display_errors());
                    } else {
                        $data = $this->upload->data();
                        //var_dump($data);
                        //exit();
                        $this->categories_model->update(
                            array('image'=>'uploads/'.$data['file_name']),
                            $id
                        );
                        $this->session->set_flashdata('code', '1');
                        $this->session->set_flashdata('message', 'Adding Successfully !!!!');
                    }
                } else {
                    $this->session->set_flashdata('code', '1');
                    $this->session->set_flashdata('message', 'Adding Successfully !!!!');
                }
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
        redirect(base_url().'admin/categories');
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
