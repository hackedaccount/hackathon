<?php
class complaint
{
    private  $_db;

    public function __construct()
    {
        $this->_db = DB::getInstance();
    }

    public function create($fields = array())
    {
        $test = $this->_db->insert('complaints', $fields);
        if(!$test)
        {
            throw new Exception('there was some problem creating your account');
        }
    }
}