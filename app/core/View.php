<?php 
    namespace App\Core;

    class View{
        public function __construct($view,$data = [],$template)
        {
            $this->renderTemplate('app/views/'.$view.'.php',$data,$template);
        }
        public function renderTemplate($render,$data,$template)
        {
            require_once 'app/views/template/'.$template.'.php';
        }
    }