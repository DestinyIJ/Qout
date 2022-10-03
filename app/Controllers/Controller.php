<?php

    class Controller 
    {
        public function model($model) 
        {
            require_once "../app/Models/" . $model . ".php";

            return new $model();
        }

        public function view($view, $data = [])
        {
            require_once "../../quot/resources/views/". $view . ".php";
        }
    }