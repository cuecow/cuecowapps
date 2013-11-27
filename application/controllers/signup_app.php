<?php
class signup_app extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('facebookobj');
        $this->load->model('loadtemplates');        
        $this->load->database();
    }	
    
    public function index()
    {   
        $fbappid = $_REQUEST['appid'];
        $this->facebookobj->makeobj($fbappid);
        $this->load->helper(array('form', 'url'));
        
        if(!isset($_REQUEST['qid']))
        {
            $signed_request = $this->facebook->getSignedRequest();
            $this->session->set_userdata('cpid',$signed_request["page"]["id"]);
            $this->session->set_userdata('likestatus',$signed_request["page"]["liked"]);
        }
        
        $pid = $this->session->userdata('cpid');
        $like_status = $this->session->userdata('likestatus');
        
        $tempinfo = $this->loadtemplates->tempforcanvas($pid,$fbappid);
        $tempid  = $tempinfo[0]['tempid'];
        $becomefan  = $tempinfo[0]['becomefan'];
        $ravealimg  = $tempinfo[0]['ravealimg'];
        $comenddate  = $tempinfo[0]['competitionenddate'];
        $tempbgcolor = $this->loadtemplates->gettempbgcolor($tempid);
        $innetdata['tempbgclr'] = $tempbgcolor;
        $comparr = $this->loadtemplates->getcomponent($tempid);        
        // echo "<pre>";print_r($comparr);echo "</pre>";
        foreach($comparr as $comparr)
        {
            $components[] = $this->loadtemplates->gettempdata($comparr['position'],$tempid,$pid,$fbappid);
        }
        
        //echo "<pre>"; print_r($components); echo "</pre>";
        $innetdata['appid'] = $fbappid;
        $innetdata['tempid'] = $tempid;
        $innetdata['tempdata'] = $components;
        if($becomefan=="Yes")
        {
            if($like_status)
            {
                if(isset($_REQUEST['sgnid']))
                {
                    $this->loadtemplates->canvas_savesignup($tempid,$pid,$fbappid);
                    redirect("signup_app?signed_request=".$_REQUEST['signed_request']."&appid=".$_REQUEST['appid']."&issubmit=1");
                }
                else
                {
                    $this->load->view('apps/canvastemp'.$tempid, $innetdata);
                }            
            }
            else
            {
                $rdata['ravealimg'] = $ravealimg;
                $this->load->view('apps/reveal',$rdata);
            }
        } else
            {
            if(isset($_REQUEST['sgnid']))
                {
                    $this->loadtemplates->canvas_savesignup($tempid,$pid,$fbappid);
                    redirect("signup_app?signed_request=".$_REQUEST['signed_request']."&appid=".$_REQUEST['appid']."&issubmit=1");
                }
                else
                {
                    $this->load->view('apps/canvastemp'.$tempid, $innetdata);
                }          
            }  
    }    
}