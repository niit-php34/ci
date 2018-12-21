<?php
  /**
   *
   */
class user_model extends CI_Model
{

    function __construct()
    {
        $this->load->database();
    }

    // function insert()
    // {
    //     $this->db->insert('user', array('name'=>'Nguyen Thanh Luan','address'=>'Ha Long','phone'=>'0868'));
    // }

    function insert($data)
    {
        $this->db->insert('user', $data);
    }

    function update($data, $id)
    {
        $this->db->update(
            'user',
            $data,
            array('id'=>$id)
        );
    }

    function get()
    {
        $result=$this->db->get('user');
        return $this->db->query_result();
    }
}
