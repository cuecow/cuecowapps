<?php
class cronEveryTenMinutes extends CI_Controller {

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
        echo "\n cronEveryTenMinutes    not describe yet!";
    }
}  
?>