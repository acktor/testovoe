<?php

namespace Helpers;

use Helpers\Database;


class Model
{

    protected $_table = '';
    private $_db;

    public function __construct($_table) {
        $this->_db = new Database();
    }

    public function get($attributes = []){
        $query_str = 'SELECT * FROM ' . $this->_table;

        if (!empty($attributes)){
            foreach ($attributes as $key => $value){
                $query_str .= 'test';
            }
        }

        $query = $this->_db->query($query_str);
    }

    public function first(){

    }

    public function update(){

    }

}
