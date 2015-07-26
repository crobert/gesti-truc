<?php

class Item extends CI_Model {

    function getAll(){
        $this->db->select('*');
        $this->db->from('items');
        return $this->db->get()->result();
    }
    function getById($id)
    {
        $this->db->select('*');
        $this->db->from('items');
        $this->db->where('id', $id);
        return $this->db->get()->row();
    }

    function getByCategory($id)
    {
        $this->db->select('*');
        $this->db->from('items');
        $this->db->where('category_id', $id);
        return $this->db->get()->result();
    }

    function add($data)
    {
        $this->db->insert('items', $data);
        return $this->db->insert_id();
    }

    function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('items');
    }

    function update($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('items', $data);
    }
}

/* End of file book.php */
/* Location: ./application/models/book.php */
