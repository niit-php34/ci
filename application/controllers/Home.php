<?php
/**
 *
 */
class Home extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('template');
    }

    function index()
    {
        parent::_render_frontend_view('frontends/home', null);
    }
}
