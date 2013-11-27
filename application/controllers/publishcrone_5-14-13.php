<?php
class publishcrone extends CI_Controller {

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
//        $this->cronemodel->dopublish_tab();
//        $this->cronemodel->dounpublish_tab();
//        $this->cronemodel->do_reycletab();
//        $this->cronemodel->post_fanofweek();
    }
    
   public function publishtest()
    {
        echo $date = date('Y-m-d G:i:s');
        $this->cronemodel->dopublish_tab();
    }
    
   function emailtest()
   {
       //$this->load->view('email_admin');
      $this->cronemodel->chrismasapp_choosedaywinner(); 
   }
}