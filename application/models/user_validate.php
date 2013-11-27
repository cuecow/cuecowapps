<?php
class user_validate extends CI_Model{
    
    public function __construct()
    {    
        $this->load->model('getpanelsession');       
        if(isset($_GET['yussig']))
        {
            $this->session->unset_userdata('panelsessoinuid');
            $this->session->unset_userdata('fbuserid');
            $this->session->unset_userdata('fbuaccesstoken');

            $str1 = $this->getpanelsession->DecodeVar($_GET['pin']);
            $str2 = substr($_GET['yussig'],-strlen($str1));
            if($str1==$str2)
            {
                $this->session->set_userdata('panelsessoinuid', $str1);
                //echo $this->session->userdata('panelsessoinuid');
            }
            
            $paneluid = $this->session->userdata('panelsessoinuid');
            $panelinfo = $this->getpanelsession->getpanelsessioninfo($paneluid);
            if(count($panelinfo)>0)
            {
                $acctoken = explode("&",$panelinfo[0]['fbtoken'],2);
                $this->session->set_userdata('fbuserid', $panelinfo[0]['facebook_id']);
                $this->session->set_userdata('adminid', $panelinfo[0]['admin_id']);
                $this->session->set_userdata("fname",$panelinfo[0]['fname']);
                $this->session->set_userdata("lname",$panelinfo[0]['lname']);
                $this->session->set_userdata("u_email",$panelinfo[0]['email']);
                $this->session->set_userdata('fbuaccesstoken', $acctoken[0]);
            }
            
        }
        if(!$this->session->userdata('panelsessoinuid'))
        {
            redirect('http://panel.cuecow.com/index.php/site/login');
        }
    }	    
}