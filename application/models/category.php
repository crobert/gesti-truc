<?php

class Category extends DataMapper {

    function getAll(){
        $this->db->select('*');
        $this->db->from('categories');
        return $this->db->get()->result();
    }
    function getById($id)
    {
        $this->db->select('*');
        $this->db->from('categories');
        $this->db->where('id', $id);
        return $this->db->get()->row();
    }

    function add($data)
    {
        $this->db->insert('categories', $data);
        return $this->db->insert_id();
    }

    function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('categories');
    }

    function update($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('categories', $data);
    }
}

/* End of file book.php */
/* Location: ./application/models/book.php */
