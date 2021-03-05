<?php
/*
 * app core class
 * creates URL and loads core controller
 * url format - /controller/method/params
 */
class Core
{
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct()
    {
        //print_r($this->getUrl());
        $url = $this->getUrl();
        //look in url array for first value to see if controller exist with the same name
        if (isset($url[0])) {
            if (file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {
                // if exists, set as controller
                $this->currentController = ucwords($url[0]);
                //unset $url[0];
                unset($url[0]);
            }
        }

        //require the controller
        require_once '../app/controllers/' . $this->currentController . '.php';
        //instantiate the controller
        $this->currentController = new $this->currentController;

        //check for second index
        if (isset($url[1])) {
            //check if method exists in controller
            if (method_exists($this->currentController, $url[1])) {
                //if is there
                $this->currentMethod = $url[1];
                //unset index 1
                unset($url[1]);
            }
        }

        //get params , $url[2]
        $this->params = $url ? array_values($url) : [];

        //call a callback with array of params
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);

    }

    public function getUrl()
    {
        if (isset($_GET['url'])) { //here will take the url value
            $url = rtrim($_GET['url'], '/'); //will trim right side of any '/'
            $url = filter_var($url, FILTER_SANITIZE_URL); //sanitize for any unaccepted caracters
            $url = explode('/', $url); //make $url in a array
            return $url;
        }
    }

}
