<?php
  /**
   *
   */
class MY_Controller extends CI_Controller
{
    
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
}
