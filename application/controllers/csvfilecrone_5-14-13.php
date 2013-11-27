<?php
class csvfilecrone extends CI_Controller {

    public function __construct()
    {
        parent::__construct();        
        $this->load->model('common');
        $this->load->model('cronemodel');
    }	
    
    public function index()
    {     
        $this->cronemodel->do_csvfilecrone();
        $this->cronemodel->do_gallerycsvfilecrone();
    }
}