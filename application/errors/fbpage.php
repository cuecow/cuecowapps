<?php
class fbpage extends CI_Model {
	
    public function __construct()
    {
        parent::__construct(); 
        $this->load->model('facebookobj');
        
    }	
    public function pagedetail($pid)
    {  
        try {
            $pagedetail = $this->facebook->api($pid);
        } catch (FacebookApiException $e){
            error_log($e);
        }
        return  $pagedetail;
    }
    public function pagetabs($pid,$ptoken)
    {   
        try {
            $tabarg = array('access_token' => $ptoken);
            $tabs = $this->facebook->api($pid.'/tabs',$tabarg);
            foreach($tabs['data'] as $tab){                
                if(isset($tab['application']['name'])){                        
                    return $pagetab[] = $tab;
                }
            }
        } catch (FacebookApiException $e){
            error_log($e);
        }        
    }
    public function loaddbtabs($pid,$ptoken)
    {   
        try {
            $tabarg = array('access_token' => $ptoken);
            $tabs = $this->facebook->api($pid.'/tabs',$tabarg);
            foreach($tabs['data'] as $tab){                
                if(isset($tab['application']['name'])){                        
                    return $pagetab[] = $tab;
                }
            }
            
        } catch (FacebookApiException $e){
            error_log($e);
        }        
    }
}