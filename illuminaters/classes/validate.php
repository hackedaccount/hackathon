<?php

class validate{
    private $_passed = false,
            $_errors = array(),
            $_db = null;

    public function __construct()
    {
        $this->_db = DB::getInstance();
    }

    public function check($source , $items = array())
    {
        foreach($items as $item => $rules)
        {
            foreach($rules as $rule => $rule_value)
            {
                $value = trim($source[$item]);

                if($rule === 'required' && empty($value))
                {
                    $this->addError("{$item} is required");
                }
                else if(!empty($value))
                {
                    switch($rule)
                    {
                        case 'min':
                        if(strlen($value) < $rule_value)
                        {
                            $this->addError("{$item} must contain minimum {$rule_value} characters");
                        }
                        break;
                        case 'max':
                        if(strlen($value) > $rule_value)
                        {
                            $this->addError("{$item} must contain maximum {$rule_value} characters");
                        }
                        break;
                        case 'unique':
                            $check = $this->_db->get($rule_value, array($item, '=', $value));
                            if($check->count())
                            {
                                $this->addError("{$item} already exist");
                            }
                        break;
                        case 'matches':
                            if($value != $source[$rule_value])
                            {
                                $this->addError("{$item} must match {$rule_value}");
                            }
                        break;
                        case 'type':
                            if($rule_value == 'numeric')
                            {
                                if(!is_numeric($value))
                                {
                                    $this->addError("{$item} must be numeric");
                                }
                            }
                            else if($rule_value == 'phone_no')
                            {
                                if(!preg_match("/^([+][9][1]|[9][1]|[0]){0,1}([7-9]{1})([0-9]{9})$/", $value))
                                {
                                    $this->addError("Enter valid phone number");
                                }
                            }
                            else if($rule_value == 'email')
                            {
                                if(!filter_var($value, FILTER_VALIDATE_EMAIL))
                                {
                                    $this->addError("Enter valid email address");
                                }
                            }
                    }
                }
            }
        }

        if(empty($this->_errors))
        {
            $this->_passed = true;
        }

        return $this;
    }

    private function addError($err)
    {
        $this->_errors[] = $err;
    }

    public function errors()
    {
        return $this->_errors;
    }

    public function passed()
    {
        return $this->_passed;
    }
}