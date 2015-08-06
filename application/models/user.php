<?php

class User extends CI_Model {


    function getAll(){
        $this->db->select('*');
        $this->db->from('users');
        return $this->db->get()->result();
    }
    function getById($id)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('id', $id);
        return $this->db->get()->row();
    }

    function add($data)
    {
        $this->db->insert('users', $data);
        return $this->db->insert_id();
    }

    function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('users');
    }

    function update($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('users', $data);
    }

    function check_credentials()
    {
        //TODO really check the users
        // Login succeeded
        return TRUE;
    }

}

/* End of file user.php */
/* Location: ./application/models/user.php */