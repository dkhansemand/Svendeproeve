<?php

class HomeModel extends Model
{

    public function __construct()
    {
        parent::__construct();
        
       return $this->query("SELECT * FROM users")->fetchAll();
    }

}
