<?php

namespace model;

class HomeModel
{
    public function __construct()
    {
        $this->dao = new \dao\Dao();
    }
}
