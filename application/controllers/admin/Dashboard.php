<?php

  /**
   *
   */
class Dashboard extends MY_Controller
{
    
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        parent::_render_backend_view('backend/dashboard', null);
    }
}
