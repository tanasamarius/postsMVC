<?php
/*
base controller
this loads the models and views
 */
class Controller
{
    //load model
    public function Model($model)
    {
        //require model file
        require_once '../app/models/' . $model . '.php';
        //instantiate model
        return new $model;

    }

    //load view
    public function view($view, $data = [])
    {
        //check if view file exists
        if (file_exists('../app/views/' . $view . '.php')) {
            require_once '../app/views/' . $view . '.php';
        } else {
            //if not exists
            die('page dont exists');
        }
    }
}
