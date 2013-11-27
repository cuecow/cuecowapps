<?php
class publishcronemodel extends CI_Model{
    
    public function __construct()
    {    
        $this->load->database();
        $this->load->model('facebookobj');
        $this->facebookobj->admin_makeobj(APPID,APPSECRET);
        $this->load->database();
        date_default_timezone_set('Europe/Zagreb');
    }	
    
    public function dopublish_tab()
    {
        $date = date('Y-m-d G:i:s');
        $qry = "Select * from installed_apps where published<='$date' and flag=0";
        $query = $this->db->query($qry);
        $rss = $query->result_array();
        //echo "<pre>"; print_r($rs); "<pre>";
        foreach($rss as $r)
        {
          $this->facebook->setAccessToken($r['uaccess_token']);
          try{
              
            $args = 
                array(
                "access_token" => $r['paccess_token'], 
                "app_id" => $r['fbappid'],
                );		
            $addtab = $this->facebook->api("/".$r['pid']."/tabs/",'post',$args);				
            $this->facebook->setFileUploadSupport(true);
            $full_image_path = realpath("images/tabicons/".$r['tabicon']);
            $args2 =
                array(
                    "access_token" => $r['paccess_token'],
                    "custom_name" => $r['tabname'], 
                    'custom_image' => '@' . $full_image_path,	
                );

            $updatetab = $this->facebook->api("/".$r['pid']."/tabs/app_".$r['fbappid']."",'post',$args2);		
            $tabid = $r['pid']."/tabs/app_".$r['fbappid'];
            $this->db->query("UPDATE installed_apps SET flag=1,appid='".$tabid."' where id=".$r['id']."");
          }catch(Exception $e){
              
          }
        }
    }
    
    public function dounpublish_tab()
    {
        $date = date('Y-m-d G:i:s');
        $qry = "Select * from installed_apps where unpublish<='$date' and flag=1";
        $query = $this->db->query($qry);
        $rss = $query->result_array();
        
        foreach($rss as $r)
        {
          $this->facebook->setAccessToken($r['uaccess_token']);
          try{
              $del_args =
                array(
                    "access_token" => $r['paccess_token'],
                );		
            $deltab = $this->facebook->api("/".$r['pid']."/tabs/app_".$r['fbappid']."",'delete',$del_args);
            
            $this->db->query("delete from installed_apps where id='".$r['id']."'");
            $this->db->query("delete from apptemp_fieldsvalue where pid='".$r['pid']."' and tempid='".$r['tempid']."'");                
            $this->db->query("delete from app_quiz where pid='".$r['pid']."' and tempid='".$r['tempid']."'");
            $this->db->query("delete from app_quizoptions where pid='".$r['pid']."' and tempid='".$r['tempid']."'");
            $this->db->query("delete from appquiz_result where pid='".$r['pid']."' and tempid='".$r['tempid']."'");
            
          }catch(Exception $e){
              
          }
        }
    }
}   