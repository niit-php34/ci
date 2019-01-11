<?php
  /**
   *
   */
class Verified_account_model extends CI_Model
{

    function __construct()
    {
        $this->load->database();
    }

    function get($select = '*', $where = array(), $like = array(), $offset = 0, $limit = 10, $order = array())
    {
        $this->db->select($select);
        if (count($where)>0) {
            $this->db->where($where);
        }

        if (count($like)>0) {
            $this->db->like($like);
        }

        $this->db->limit($limit, $offset);

        if (count($order)>0) {
            $key = key($order);
            $this->db->order_by($key, $order[$key]);
        }

        $query=$this->db->get('verified_account');
        echo $this->db->last_query();
        $data = array();
        foreach ($query->result() as $r) {
            $data[]=$r;
        }
        return $data;
    }

    function get_total($where = array(), $like = array())
    {
        $this->db->select('COUNT(*) AS total');
        if (count($where)) {
            $this->db->where($where);
        }

        if (count($like)) {
            $this->db->like($like);
        }
        
        $query=$this->db->get('verified_account');
        $totals = $query->result();
        return $totals[0]->total;
    }

    function insert($data)
    {
        $this->db->insert('verified_account', $data);
        return $this->db->insert_id();
    }

    function update($data, $id)
    {
        $this->db->update(
            'verified_account',
            $data,
            array('id'=>$id)
        );
        return $this->db->affected_rows();
    }

    function delete($id)
    {
        $this->db->delete('verified_account', array('id'=>$id));
    }
}
