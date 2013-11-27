<?php
class loadapps extends CI_Model{
    
    public function __construct()
    {    
        $this->load->database();
    }	
    public function get_apps()
    {
        $uid = $this->session->userdata('panelsessoinuid');
        /*if(in_array($uid,array(16,4)))
        {
            $qry = "Select * from apps_list";
        }
        else
        {
            $qry = "Select * from apps_list where id not in (6)";
        }*/
        
        $qry = "Select * from apps_list";
        $query =   $this->db->query($qry);
        return $query->result_array();
    }	    
}