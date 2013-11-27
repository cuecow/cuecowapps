<?php
class cron_chirsmaswinner extends CI_Controller {

    public function __construct()
    {
        parent::__construct();        
        $this->load->model('cronemodel');
    }	
    
    public function index()
    {     
        $this->cronemodel->chrismasapp_choosedaywinner();
    }
}