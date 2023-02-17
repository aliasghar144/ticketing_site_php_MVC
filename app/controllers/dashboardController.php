<?php

class dashboardController extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = [
            'name' => $_SESSION['name'],
            'type' => $_SESSION['type']
        ];
        $this->header('header',$data);
        $this->view('layout/navbar', $data);
    }

}