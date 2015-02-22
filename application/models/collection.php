<?php

class Collection extends DataMapper {

    var $has_many = array('user');
    var $has_one = array('parameter','state');

    var $validation = array(
        'name' => array(
            'label' => 'Name',
            'rules' => array('required', 'trim', 'unique',  'min_length' => 1, 'max_length' => 250),
        ),
        'description' => array(
            'label' => 'Description',
            'rules' => array('required', 'trim'),
        ),
        'type' => array(
            'label' => 'Type',
            'rules' => array('required', 'trim'),
        )
    );
}

/* End of file book.php */
/* Location: ./application/models/book.php */