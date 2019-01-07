<?php
/**
*
*/
class Products extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('products_model');
    }

    public function index()
    {

        $data = $this->products_model->get('*', array(), array(), 0, 10, array('id'=>'DESC'));
        parent::_render_backend_view('backend/products/index', array('data'=>$data));
    }

    public function add()
    {
        if (isset($_POST['submit'])) {
            $name = $this->input->post('name');
            $description = $this->input->post('description');
            $categories= $this->input->post('categories');
            $tag = $this->input->post('tag');
            $keyword = $this->input->post('keyword');
            $short_desc = $this->input->post('short_desc');
            $price = $this->input->post('price');
            $discount = $this->input->post('discount');
            $sku=$this->input->post('sku');

            $cat = '';
            if ($categories!=null) {
                foreach ($categories as $r) {
                    $cat.=','.$r;
                }
            }
            $insert_data =array(
                'name'=>$name,
                'description'=>htmlspecialchars($description),
                'categories_id'=>$cat,
                'discount'=>$discount,
                'price'=>$price,
                'keyword'=>$keyword,
                'short_desc'=>$short_desc,
                'sku'=>$sku,
                'tag'=>$tag
            );

            $id=$this->products_model->insert($insert_data);
            //echo $this->db->last_query();
            //exit();
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
                        $this->products_model->update(
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
            redirect(base_url().'admin/products/add');
        }
        parent::_render_backend_view('backend/products/add', null);
    }

    public function delete()
    {
        $id=$this->input->get('id');
        $this->products_model->delete($id);
        redirect(base_url().'admin/products');
    }

    public function activate()
    {
        //echo 'test';
        $id=$this->input->get('id');
        $this->products_model->update(array('activated'=>1), $id);
        redirect(base_url().'admin/products');
    }

    public function deactive()
    {
        $id=$this->input->get('id');
        $this->products_model->update(array('activated'=>0), $id);
        redirect(base_url().'admin/products');
    }
}
