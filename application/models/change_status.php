<?php
class change_status extends CI_Model{
    
    public function __construct()
    {    
        $this->load->database();
    }	
    
    public function getuser()
    {
        $qry = "SELECT userid FROM installed_apps GROUP BY userid";
        
        $result = $this->db->query($qry);
        return $result->result_array();
    }
    
    
    public function show_users($limit, $start)
    {
        $qry = "SELECT * FROM panel_cuecow.user LIMIT $limit,$start";
        $result = $this->db->query($qry);
        
        return $result->result_array();      
    }
    
    public function get_facebookid()
    {
        $paneldb = $this->load->database("paneldb" , TRUE);
        $qry_user = "SELECT email,facebook_id,username,admin_publish FROM user";
        $result_user = $paneldb->query($qry_user);
        //$result_user = $this->db->query($qry_user);
  
        return $result_user->result_array();
     
    }
    
    public function removeApps($id)
    {
        $paneldb = $this->load->database("paneldb" , TRUE);
        $qry = "UPDATE user SET admin_publish = 1 WHERE facebook_id = $id ";
        $result = $paneldb->query($qry);
        
        
        $qry1 = "UPDATE installed_apps SET admin_unpublish = 1 WHERE userid = $id ";
        $result1 = $this->db->query($qry1);
    }
    
    public function removeFromFacebook($id)
    {
        $qry = "Select * from installed_apps where userid = $id AND flag=1 AND isDell=0";
        
        $query = $this->db->query($qry);
        $rss = $query->result_array();
        
        if(count($rss)>0)
        {
            
            foreach($rss as $r)
            {
                //$this->facebook->setAccessToken($r['uaccess_token']);
                try{
                    $del_args =
                        array(
                            "access_token" => $r['paccess_token'],
                        );		
                    $deltab = $this->facebook->api("/".$r['pid']."/tabs/app_".$r['fbappid']."",'delete',$del_args);
                    $this->db->query("Update installed_apps set flag=0 where id='".$r['id']."'");
                }catch(Exception $e){
                    echo $e;
                }
            }
        }
        
    }
    
    public function publishApp($id)
    {
        $paneldb = $this->load->database("paneldb" , TRUE);
        $qry = "UPDATE user SET admin_publish = 0 WHERE facebook_id = '".$id."' ";
        $result = $paneldb->query($qry);
        
        
        
        $qry1 = "UPDATE installed_apps SET admin_unpublish = 0 WHERE userid = $id ";
        $result1 = $this->db->query($qry1);
    }
    

    
}
