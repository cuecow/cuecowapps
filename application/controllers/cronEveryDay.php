<?php
class cronEveryDay extends CI_Controller {

    public function __construct()
    {
        parent::__construct();        
        $this->load->model('cronemodel');
    }	
    
    public function index()
    {     
        echo $date = date('Y-m-d G:i:s');
        $this->cronemodel->chrismasapp_choosedaywinner();
		$this->cronemodel->do_csvfilecrone(); 
		$this->cronemodel->do_gallerycsvfilecrone();
		$this->cronemodel->crone_fanofweek();
        if(isset($errmsg) && $errmsg!="")
        {
            $data['errmsg']=$errmsg;
            $this->load->view('dynamic_error',$data);
        }
    }
    
   public function test()
   {
     $this->cronemodel->do_csvfilecrone();  
   }
}  
?>