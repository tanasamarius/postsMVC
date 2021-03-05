<?php
class Pages extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        if (isLoggedIn()) {
            redirect('posts');
        }
        $data = [
            'title' => 'Shared Posts',
            'description' => 'simple social network',
        ];

        $this->view('pages/index', $data);
    }

    public function about()
    {
        $data = [
            'title' => 'About Us',
            'description' => 'all rights reserved',
        ];
        $this->view('pages/about', $data);
    }
}
