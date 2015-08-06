<?php

class Collection extends CI_Model {

    function getAll(){
        $this->db->select('*');
        $this->db->from('collections');
        return $this->db->get()->result();
    }
    function getById($id)
    {
        $this->db->select('*');
        $this->db->from('collections');
        $this->db->where('id', $id);
        return $this->db->get()->row();
    }

    function add($data)
    {
        $this->db->insert('collections', $data);
        return $this->db->insert_id();
    }

    function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('collections');
    }

    function update($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('collections', $data);
        return $id;
    }

    function getList(){
        $this->db->select('id, name');
        $this->db->from('collections');
        return $this->db->get()->result();
    }
}

/* End of file book.php */
/* Location: ./application/models/book.php */