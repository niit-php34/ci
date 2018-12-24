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

    public function index()
    {
    }

    public function add()
    {
        parent::_render_backend_view('backend/users/add', null);
    }
}
