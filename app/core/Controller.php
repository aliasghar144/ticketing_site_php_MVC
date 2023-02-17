<?php

class Controller
{
    public function __construct()
    {

    }
    public function view($view_path, $data = []): void
    {
        require 'views/' . $view_path . '.php';
    }

    public function header($header_path,$data = []): void
    {
        require "views/layout/" . $header_path . ".php";
    }

    public function model($model_name)
    {
        $filename = $model_name . 'Model';
        require 'app/models/' . $filename . '.php';
        return new $filename;
    }
}