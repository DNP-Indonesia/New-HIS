<?php

class index extends MY_Controller{

    public function __construct(){
        parent::__construct();
    }

    public function index(){
        redirect('auth/c_auth');
    }
}