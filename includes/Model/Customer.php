<?php

class Customer 
{
    protected $fname;
    protected $lname;
    protected $age;
    function __construct($fname,$lname,$age)
    {
        $this->fname = $fname;
        $this->lname = $lname;
        $this->age = $age;
    }

    public function getFname()
    {
        return $this->fname;
    }

    public function getLname()
    {
        return $this->fname;
    }

    public function getAge()
    {
        return $this->age;
    }


    public function __toString()
    {
        return (string) $this->fname." ".$this->lname." ".$this->age;
    }
}
