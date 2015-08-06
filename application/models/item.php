<?php

class Item extends CI_Model
{

    function getAll()
    {
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
        if ($data['collectedDate'] != '') {
            $d = new DateTime($data['collectedDate']);
            $data['collectedDate'] = $d->format('Y-m-d');
        }
        if ($data['date'] != '') {
            $d = new DateTime($data['date']);
            $data['date'] = $d->format('Y-m-d');
        }
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
        if ($data['collectedDate'] != '') {
            $d = new DateTime($data['collectedDate']);
            $data['collectedDate'] = $d->format('Y-m-d');
        }
        if ($data['date'] != '') {
            $d = new DateTime($data['date']);
            $data['date'] = $d->format('Y-m-d');
        }

        $this->db->where('id', $id);
        $this->db->update('items', $data);
    }
}

/* End of file item.php */
/* Location: ./application/models/item.php */
