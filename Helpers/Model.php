<?php

namespace Helpers;

use Helpers\Database;


class Model
{

    private $_db;
    protected $_table = '';
    protected $_whereStr = '';
    protected $_whereArr = [];
    protected $_attributes = [];

    public function __construct($_table) {
        $this->_db = new Database();
        $this->_table = $_table;
    }

    public function get() {
        $query_str = 'SELECT * FROM ' . $this->_table;

        if (!empty($this->_whereStr)){
            $query_str .= $this->_whereStr;
        }

        $result = $this->_db->query($query_str, $this->_whereArr)->fetchAll();

        return $result;
    }

    public function first() {
        $query_str = 'SELECT * FROM ' . $this->_table;

        if (!empty($this->_whereStr)){
            $query_str .= $this->_whereStr;
        }


        $query_str .= ' limit 1';

        $result = $this->_db->query($query_str, $this->_whereArr)->fetchAll();


        if (empty($result[0])) {
            return null;
        }

        foreach($result[0] as $key => $value){
            $this->{$key} = $value;
            $this->_attributes[$key] = $value;
        }

    }

    public function save(){
        if (!empty($this->id)){     //update

        } else {        //insert

        }
    }

    public function where($column, $operator, $data) {

        if (!empty($this->_whereArr)){
            $prefix = 'and';
        } else {
            $prefix = 'where';
        }

        $this->_whereStr .= ' ' . $prefix . ' ' . $column . ' ' . $operator . '?';

        $this->_whereArr[] = $data;
    }

}
