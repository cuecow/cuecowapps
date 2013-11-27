<?php
class facebookobj extends CI_Model{
    
    public function __construct()
    {
        parent::__construct();        
        $this->load->database();
    }
    
    public function makeobj($objappid)
    {
        $qry = "Select fb_appsecret from  apps_fbappinfo where fb_appid='".$objappid."'";
        $query =   $this->db->query($qry);
        $rz =  $query->result_array();
        
        $appId = $objappid;
        $secret = $rz[0]['fb_appsecret'];
        
        $this->load->helper('url');        
        $config = array(
            'appId'  => $appId,
            'secret' => $secret,
            'fileUpload' => true, // Indicates if the CURL based @ syntax for file uploads is enabled.
            );
       // echo "<pre>";print_r($config); echo "<pre>";        
        $this->load->library('Facebook', $config);
    }
    
    public function admin_makeobj($appId,$secret)
    {
        $this->load->helper('url');        
        $config = array(
            'appId'  => $appId,
            'secret' => $secret,
            'fileUpload' => true, // Indicates if the CURL based @ syntax for file uploads is enabled.
            );
        $this->load->library('Facebook', $config);
    }
    
   public function getlongToken($objappid)
    {
        $qry = "Select fb_appsecret from  apps_fbappinfo where fb_appid='".$objappid."'";
        $query =   $this->db->query($qry);
        $rz =  $query->result_array();
        
        $appId = $objappid;
        $secret = $rz[0]['fb_appsecret'];
        
        $this->load->helper('url');        
        $config = array(
            'appId'  => $appId,
            'secret' => $secret,
            'redirect_uri' => 'https://apps2.cuecow.com/',
            'fileUpload' => true, // Indicates if the CURL based @ syntax for file uploads is enabled.
            );
       // echo "<pre>";print_r($config); echo "<pre>";        
        $this->load->library('Facebook', $config);
        
        $user = $this->facebook->getUser();
        $fb_info = array();
            if ($user) 
            {
                $this->facebook->setExtendedAccessToken();            
                $accessToken = $this->facebook->getAccessToken();
                var_dump($accessToken); die();
                $fb_info['user_access_token'] = $accessToken;
            } 
         return TRUE;   
    }
}
