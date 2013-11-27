<?php
class cronEverySecondDay extends CI_Controller {

    public function __construct()
    {
        parent::__construct();        
        $this->load->model('common');
        $this->load->model('cronemodel');
        date_default_timezone_set('Europe/Zagreb');
    }	
    
    public function index()
    {
        echo $date = date('Y-m-d G:i:s');
        echo "\n cronEverySecondDay    not describe yet!";
    }
}  
?>