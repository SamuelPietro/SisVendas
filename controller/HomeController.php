<?php

namespace controller;

require_once 'model/HomeModel.php';

class Controller
{
    public function __construct()
    {
        $this->model = new \model\HomeModel();
    }
    public function index()
    {
        require('view/header.php');
        require('view/Home/HomeView.php');
        require('view/footer.php');
    }
}
