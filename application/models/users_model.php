<?php
  /**
   *
   */
class users_model extends CI_Model
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

        $this->db->limit($offset, $limit);

        if (count($order)>0) {
            $key = key($order);
            $this->db->order_by($key, $order[$key]);
        }

        $query=$this->db->get('users');
        return $result->result();
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
        
        $query=$this->db->get('users');
        $totals = $query->result();
        return $totals[0]->total;
    }

    function insert($data)
    {
        $data['date_created']=date('Y-m-d H:i:s');
        $data['date_updated']=date('Y-m-d H:i:s');
        $this->db->insert('users', $data);
        return $this->db->insert_id();
    }

    function update($data, $id)
    {
        $data['date_updated']=date('Y-m-d H:i:s');
        $this->db->update(
            'users',
            $data,
            array('id'=>$id)
        );
        return $this->db->affected_rows();
    }

    function delete($id)
    {
        $this->db->delete('users', array('id'=>$id));
    }
}
