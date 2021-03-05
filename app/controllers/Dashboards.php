<?php

class Dashboards extends Controller
{
    public function __construct()
    {
        //users that are not logged in cant access the views specified
        if (!isLoggedIn()) {
            redirect('users/login');
        }
    }

    public function index()
    {
        $data = [
            'title' => 'posts page',

        ];
        $this->view('Dashboards/index', $data);

    }
}
