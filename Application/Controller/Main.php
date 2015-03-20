<?php

namespace Application\Controller;

use Application\Base\BaseController;

class Main extends BaseController{

    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $this->setupTwig();

        $this->load_module("\\Application\\Models\\tabs\\FirstClass","first");

        $this->session->test();
        $this->first->first();

        echo $this->twig->render('index.html');

    }

} 