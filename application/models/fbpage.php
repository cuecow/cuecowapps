<?php
class fbpage extends CI_Model {
	
    public function __construct()
    {
        parent::__construct(); 
        $this->load->model('facebookobj');
        $this->facebookobj->admin_makeobj(APPID,APPSECRET);
        date_default_timezone_set('Europe/Zagreb');
        $this->load->database();        
    }	
    public function pagedetail($pid)
    {
       try {
            $pagedetail = $this->facebook->api($pid);
            return  $pagedetail;
        } catch (FacebookApiException $e){
            error_log($e);
        }
    }
    
    public function pagedetail_picture($pid)
    {
        try {
            $pagedetail_profilepic = $this->facebook->api($pid.'/photos?fields=picture');
        } catch (FacebookApiException $e){
            error_log($e);
        }
        return  $pagedetail_profilepic;
    }
    public function pagetabs($pid,$ptoken,$fbuserid)
    {   
        try{
            $tabarg = array('access_token' => $ptoken);
            $tabs = $this->facebook->api($pid.'/tabs',$tabarg);
            $pagetab = array();
            foreach($tabs['data'] as $tab){
                if(isset($tab['application']['name'])){                        
                    $pagetab[] = $tab;
                }
            }
        }catch(FacebookApiException $e){
            error_log($e);
        }      
                        
        $date = date('Y-m-d G:i:s');
        $qry = "Select iapp.*,al.app_type from installed_apps iapp ,apps_list al where iapp.dbappid=al.id and iapp.pid=$pid and iapp.userid=".$fbuserid." and iapp.flag=0 and iapp.unpublish < '$date' and isdell=0 order by iapp.published DESC";
        $query = $this->db->query($qry);
        $arrg = $query->result_array();
            
        $archivedtab = array();     

        foreach($arrg as $arrgs)
        {                
            $archivedtab[] = 
            array(
                'id' => $arrgs['appid_url'],
                'lid' => $arrgs['id'],
                'image_url' => base_url()."images/tabicons/".$arrgs['tabicon'],
                'tabicon' =>$arrgs['tabicon'],
                'name' => $arrgs['tabname'],
                "application" => array("name"=>""),
                'position' => 0,
                'flag' => $arrgs['flag'],
                'tempid' => $arrgs['tempid'],
                'dbappid' => $arrgs['dbappid'],
                'fbappid' => $arrgs['fbappid'],
                'fbappsecret' => $arrgs['fbappsecret'],
                'app_type' => $arrgs['app_type'],
                'published' => $arrgs['published'],
                'unpublish' => $arrgs['unpublish'],
                'bitly_link' => $arrgs['bitly_link'],
            );
        }

       $pqry = "Select iapp.*,al.app_type from installed_apps iapp ,apps_list al where iapp.dbappid=al.id and iapp.pid=$pid and iapp.userid=".$fbuserid." and iapp.flag=0 and iapp.unpublish > '$date' and isdell=0 order by iapp.published DESC";
        $pquery = $this->db->query($pqry);
        $parrg = $pquery->result_array();
            
        $pendingapps = array();     
        foreach($parrg as $parrgs)
        {                
            $pendingapps[] = 
            array(
                'id' => $parrgs['appid_url'],
                'lid' => $parrgs['id'],
                'image_url' => base_url()."images/tabicons/".$parrgs['tabicon'],
                'tabicon' =>$parrgs['tabicon'],
                'name' => $parrgs['tabname'],
                "application" => array("name"=>""),
                'position' => 0,
                'flag' => $parrgs['flag'],
                'tempid' => $parrgs['tempid'],
                'dbappid' => $parrgs['dbappid'],
                'fbappid' => $parrgs['fbappid'],
                'fbappsecret' => $parrgs['fbappsecret'],
                'app_type' => $parrgs['app_type'],
                'published' => $parrgs['published'],
                'unpublish' => $parrgs['unpublish'], 
                'bitly_link' => $parrgs['bitly_link'],
            );
        }
        return array('activetabs'=>$pagetab,'archivedtab'=>$archivedtab,'pendingapps'=>$pendingapps);
    }
    
    public function getdbappidurl($pid,$userid)
    {           //throw new Exception('page model');
        $data = array();
        $qry = "Select appid_url from installed_apps where pid=$pid and userid=".$userid." and isdell=0";
        $query =   $this->db->query($qry);
        foreach($query->result_array() as $appidds)
        {
            $data [] = $appidds['appid_url'];
        }
        return $data;
    }
    
   //get match tabs info for showing page tabs details 
    public function getdbmatchinfo($tabname,$pid,$appid_url)
    {   
        $qry = "Select iapp.*,al.app_type,al.id as dbappid from installed_apps iapp ,apps_list al, apps_fbappinfo ainf where iapp.fbappid=ainf.fb_appid and ainf.app_typeid=al.id and iapp.tabname='".$tabname."' and iapp.pid=$pid and iapp.appid_url='".$appid_url."' and iapp.isdell=0";
        $query = $this->db->query($qry);
        return $query->result_array();
    }   
    
   function getinsat_user_detail($fbuserid,$pid,$fbappid,$tempid)
   {
        $pqry = "Select * FROM instg_users WHERE fb_userid='".$fbuserid."' AND pid='".$pid."' AND fbappid='".$fbappid."' AND tempid='".$tempid."'";
        $pquery = $this->db->query($pqry);
        return $pquery->result_array();   
   }
}