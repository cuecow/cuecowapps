<?php
class quiz_app extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('facebookobj');
        $this->load->model('loadtemplates');        
        $this->load->database();   
        date_default_timezone_set('Europe/Zagreb');
    }	
    
    public function index()
    {           
        $fbappid = $_REQUEST['appid'];
                
        $this->facebookobj->makeobj($fbappid);
        $this->load->helper(array('form', 'url'));
        
        $signed_request = $this->facebook->getSignedRequest();
        
        $this->session->set_userdata('cpid',$signed_request["page"]["id"]);
        $this->session->set_userdata('likestatus',$signed_request["page"]["liked"]);
        
        $pid = $this->session->userdata('cpid');
        $like_status = $this->session->userdata('likestatus');
        
        $tempinfo = $this->loadtemplates->tempforcanvas($pid,$fbappid);
        
        $tempid  = $tempinfo[0]['tempid'];
        $ravealimg  = $tempinfo[0]['ravealimg'];
        $comenddate  = $tempinfo[0]['competitionenddate'];
        $becomefan  = $tempinfo[0]['becomefan'];
        $tempbgcolor = $this->loadtemplates->gettempbgcolor($tempid);
        $innetdata['tempbgclr'] = $tempbgcolor;        
        $comparr = $this->loadtemplates->getcomponent($tempid);        
        // echo "<pre>";print_r($comparr);echo "</pre>";
        foreach($comparr as $comparr)
        {
            $components[] = $this->loadtemplates->gettempdata($comparr['position'],$tempid,$pid,$fbappid);
        }
        
        $quizdata = $this->loadtemplates->getquizdata($tempid,$pid,$fbappid);
        if(count($quizdata)>0)
        {
            $quizarrg = $quizdata['quiz'][0];
            $quizoptions = $quizdata['options'];
        }
        
        $innetdata['appid'] = $fbappid;
        $innetdata['tempid'] = $tempid;
        $innetdata['quiz'] = $quizarrg;
        $innetdata['options'] = $quizoptions;
        $innetdata['tempdata'] = $components;
        
        $todaydate = strtotime(date('Y-m-d h:i:s'));
        $getdate = strtotime($comenddate);
        
        if($becomefan=="Yes")
        {
            if($like_status)
            {
                if(!empty($getdate) && $getdate < $todaydate)
                {
                    $this->load->view('apps/comp_date_end.php', $innetdata);
                }
                else
                {
                    if(isset($_POST['qid']))
                    {
                        $this->loadtemplates->canvas_savequiz($tempid,$pid,$fbappid);
                        redirect("quiz_app?signed_request=".$_REQUEST['signed_request']."&appid=".$_REQUEST['appid']."&issubmit=1");
                        //$this->load->view('apps/thankstemp'.$tempid, $innetdata);
                    }
                    else
                    {
                        $this->load->view('apps/canvastemp'.$tempid, $innetdata);
                    }
                }
            }
            else            
            {
                $rdata['ravealimg'] = $ravealimg;
                $this->load->view('apps/reveal',$rdata);
            }     
        }
        else
        {
            if(!empty($getdate) && $getdate < $todaydate)
            {
                $this->load->view('apps/comp_date_end', $innetdata);
            }
            else
            {
                if(isset($_POST['qid']))
                {
                    $this->loadtemplates->canvas_savequiz($tempid,$pid,$fbappid);
                    redirect("quiz_app?signed_request=".$_REQUEST['signed_request']."&appid=".$_REQUEST['appid']."&issubmit=1");
                    //$this->load->view('apps/thankstemp'.$tempid, $innetdata);
                }
                else
                {
                    $this->load->view('apps/canvastemp'.$tempid, $innetdata);
                }
            }
        }
        
    }    
}