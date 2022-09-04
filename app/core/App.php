<?php 
    namespace App\Core;
    class App {
        protected $controller = 'Home'; 
        protected $method = 'index';
        protected $params = [];
        public function __construct()
        {
            session_start();
           $url = $this->parseUrl();
           if(isset($url[0])){
               if(file_exists('app/controllers/'.$url[0].'.php')){
                   $this->controller = $url[0];
                   unset($url[0]);
                }
            }
           require_once 'app/controllers/'.$this->controller.'.php';
           $this->controller = new $this->controller;

           if(isset($url[1])){
               if(method_exists($this->controller,$this->method)){
                   $this->method = $url[1];
                   unset($url[1]);
                }
            }
            // params 
            if(!empty($url)){
                $this->params = array_values($url);
            }
            
            call_user_func_array([$this->controller,$this->method],$this->params);


        }
        public function parseUrl()
        {
            if(isset($_GET['url'])){
                $url = $_GET['url'];
                $url = rtrim($url,'/');
                $url = filter_var($url,FILTER_SANITIZE_URL);
                $url= explode('/',$url);
                return $url;
            }
        }
    }