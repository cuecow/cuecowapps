<?php
class iframe1_app extends CI_Controller {

    public function __construct()
    {
        parent::__construct();        
        $this->load->model('facebookobj');        
        $this->load->model('loadtemplates');        
        $this->load->database();         
    }
    
    public function index()
    {

        //$this->load->view('ifm');  
        $fbappid = $_REQUEST['appid'];
       // var_dump($fbappid);
        $this->facebookobj->makeobj($fbappid);
        
        $signed_request = $this->facebook->getSignedRequest();
        $like_status = $signed_request["page"]["liked"];
        $this->session->set_userdata('cpid',$signed_request["page"]["id"]);
        if($like_status){ 
            $this->session->set_userdata('likestatus',"yes");
        }else{ 
            $this->session->set_userdata('likestatus',"no");
        }
        $pid = $this->session->userdata('cpid');
       // var_dump($pid);
        $tempinfo = $this->loadtemplates->tempforcanvas($pid,$fbappid);
        //var_dump($tempinfo);
        $tempid  = $tempinfo[0]['tempid'];
        $becomefan  = $tempinfo[0]['becomefan'];
        $ravealimg  = $tempinfo[0]['ravealimg'];
        $comparr = $this->loadtemplates->getcomponent($tempid);        
       // echo "<pre>";print_r($comparr);echo "</pre>";
        foreach($comparr as $comparr)
        {
            $components[] = $this->loadtemplates->gettempdata($comparr['position'],$tempid,$pid,$fbappid);
        }                
       // var_dump($components); die();
        //echo "<pre>"; print_r($components); echo "</pre>";
        $data['tempid'] = $tempid;
        $data['tempdata'] = $components;
        $data['appid'] = $fbappid;
        if($becomefan=="Yes")
        {
            if($like_status)
                {
                $this->load->view('apps/canvastemp'.$tempid, $data);
                }else
                    {
                    $rdata['ravealimg'] = $ravealimg;
                    $this->load->view('apps/reveal',$rdata);
                    }
        }else
            {
            $this->load->view('apps/canvastemp'.$tempid, $data);
            }        
    }    
}