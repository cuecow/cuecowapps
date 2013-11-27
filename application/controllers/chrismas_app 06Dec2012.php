<?php
class chrismas_app extends CI_Controller{

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
        $this->session->set_userdata('fbappid',$fbappid);
        $this->session->set_userdata('likestatus',$signed_request["page"]["liked"]);
        
        $pid = $this->session->userdata('cpid');
        $like_status = $this->session->userdata('likestatus');
        
        $page_url = $this->facebook->api(array('method' => 'fql.query','query' => "SELECT page_url FROM page WHERE page_id = $pid"));
        
        if(empty($_SERVER['HTTPS']) || $_SERVER['SERVER_PORT'] != 443)
        {
            $rurl = "https".substr($page_url[0]['page_url'],4)."?sk=app_$fbappid";
            echo "<script>top.location.href='$rurl'</script>";
        }
        
        
        $tempinfo = $this->loadtemplates->tempforcanvas($pid,$fbappid);
        $tempid  = $tempinfo[0]['tempid'];
        $this->session->set_userdata('tempid',$tempid);
        $ravealimg  = $tempinfo[0]['ravealimg'];
        $comenddate  = $tempinfo[0]['competitionenddate'];
        $becomefan  = $tempinfo[0]['becomefan'];
        
        $comparr = $this->loadtemplates->getcomponent($tempid);
        foreach($comparr as $comparr)
        {
            $components[] = $this->loadtemplates->gettempdata($comparr['position'],$tempid,$pid,$fbappid);
        }
        
        $chirmas_subpagesdata = $this->loadtemplates->getchrismasapp_subpages($pid,$fbappid);
        $daylist = "";
        if(count($chirmas_subpagesdata)>0)
        {
            foreach($chirmas_subpagesdata['subpagesdata'] as $linkdays)
            {
                $daylist[] =  $linkdays['linkdate'];
            }
        }
        
        //echo "<pre>"; print_r($components); echo "</pre>";
        $innetdata['appid'] = $fbappid;
        $innetdata['tempid'] = $tempid;
        $innetdata['tempdata'] = $components;
        $innetdata['pageurl'] = $page_url[0]['page_url'];
        $innetdata['daylist'] = $daylist;
        
        //$todaydate = strtotime(date('Y-m-d h:i:s'));
        //$getdate = strtotime($comenddate);
        
        if($becomefan=="Yes")
        {
            if($like_status)
            {
                $this->load->view('apps/canvastemp'.$tempid, $innetdata);
            }
            else            
            {
                $rdata['ravealimg'] = $ravealimg;
                $this->load->view('apps/reveal',$rdata);
            }
        }
        else
        {
            $this->load->view('apps/canvastemp'.$tempid, $innetdata);
        }
        
    }
    public function showpgdaydata()
    {
        $today = date('d');
        if($_REQUEST['subpgday']>$today)
        {
            echo "  Can not be opened yet";
        }
        else
        {
            $getdaydata = $this->loadtemplates->showpgdaydata();
            $subpgdata['subpgdata'] = $getdaydata;
            $this->load->view('apps/canvastemp14_subpg'.$getdaydata['subpgtype'],$subpgdata);
        }
    }
    public function savevistor()
    {
        $this->loadtemplates->do_savevistor();
        redirect("chrismas_app?signed_request=".$_REQUEST['signed_request']."&appid=".$_REQUEST['appid']."&issubmit=1");
    }
}