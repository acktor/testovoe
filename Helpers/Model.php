<?php

namespace Helpers;

use Helpers\Database;
use ReflectionObject;
use ReflectionProperty;


class Model
{

    private $_db;
    protected $_table = '';
    protected $_whereStr = '';
    protected $_whereArr = [];
    protected $_attributes = [];

    public function __construct($_table)
    {
        $this->_db = new Database();
        $this->_table = $_table;
    }

    public function get()
    {
        $query_str = 'SELECT * FROM ' . $this->_table;

        if (!empty($this->_whereStr)) {
            $query_str .= $this->_whereStr;
        }

        $result = $this->_db->query($query_str, $this->_whereArr)->fetchAll();

        return $result;
    }

    public function first()
    {
        $query_str = 'SELECT * FROM ' . $this->_table;

        if (!empty($this->_whereStr)) {
            $query_str .= $this->_whereStr;
        }


        $query_str .= ' limit 1';

        $result = $this->_db->query($query_str, $this->_whereArr)->fetchAll();


        if (empty($result[0])) {
            return null;
        }

        foreach ($result[0] as $key => $value) {
            $this->{$key} = $value;
            $this->_attributes[$key] = $value;
        }

    }

    public function save()
    {
        $costil = ''; //???

        $properties = (new ReflectionObject($this))->getProperties(ReflectionProperty::IS_PUBLIC);

        foreach ($properties as $property) {
            $columns[$property->name] = $this->{$property->name};
            $costil .= '?,';
        }

//        $this->id = 1;

//        var_dump(substr_count(count($columns), ","));die;
//
        if (!empty($this->id)) {     //update
            $query_str = 'UPDATE ' . $this->_table . ' SET ' .  implode(' = ?, ', array_keys($columns)). ' = ?' . ' where id = ' . $this->id;
        } else {        //insert
            $query_str = 'INSERT INTO ' . $this->_table . '(' . implode(',', array_keys($columns)) . ') VALUES (' . substr($costil,0,-1) . ')';
        }

        $this->_db->query($query_str, array_values($columns));

    }

    public function where($column, $operator, $data)
    {

        if (!empty($this->_whereArr)) {
            $prefix = 'and';
        } else {
            $prefix = 'where';
        }

        $this->_whereStr .= ' ' . $prefix . ' ' . $column . ' ' . $operator . '?';

        $this->_whereArr[] = $data;
    }

}
