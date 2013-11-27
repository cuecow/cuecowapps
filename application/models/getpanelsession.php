<?php
class getpanelsession extends CI_Model{
    
    public function __construct()
    {    
        
    }	
    public function DecodeVar($string)
    {
        $exp = explode('_',$string);
        $user_id = substr($exp[1],strlen($exp[1])-$exp[0],$exp[0]);
        return $user_id;
    }
    public function getpanelsessioninfo($paneluid)
    {
        $paneldb = $this->load->database("paneldb" , TRUE);    
        $query =   $paneldb->query("Select u.admin_id,u.fname,u.lname,u.email,u.facebook_id,at.fbtoken from user u,access_token at where u.user_id='".$paneluid."' and at.user_id=u.user_id");
        return $query->result_array();
    }	
}