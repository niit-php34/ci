<?php
  /**
   *
   */
class MY_Controller extends CI_Controller
{
    protected $pg_per_page=10;
    function __construct()
    {
        parent::__construct();
        $this->load->library('template');
    }

    function _render_backend_view($content, $data)
    {
        $this->template->set_template('backend');
        $this->template->write_view('content', $content, $data);
        $this->template->render();
    }


    function _render_frontend_view($content, $data)
    {
        $this->template->set_template('default');
        $this->template->write_view('content', $content, $data);
        $this->template->render();
    }

    function pagination_config($base_url,$total_rows,$per_page=10,$uri_segment=3,$page_query_string=FALSE){
		$config['total_rows'] = $total_rows;
		$config['base_url']=$base_url;
		$config['page_query_string'] = $page_query_string;
		$config['per_page']=$per_page;
		$config['uri_segment']=$uri_segment;
		$this->pagination->initialize($config);
		$data=$this->pagination->create_links();
		return $data;
	}

}