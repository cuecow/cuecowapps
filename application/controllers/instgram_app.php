<?php
class instgram_app extends CI_Controller {

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
        $signed_request = $this->facebook->getSignedRequest();
        $this->session->set_userdata('signed_request',$signed_request);
        $like_status = $signed_request["page"]["liked"];
        $this->session->set_userdata('cpid',$signed_request["page"]["id"]);
        if($like_status){ 
            $this->session->set_userdata('likestatus',"yes");
        }else{ 
            $this->session->set_userdata('likestatus',"no");
        }
        $pid = $this->session->userdata('cpid');
        
        $page_url = $this->facebook->api(array('method' => 'fql.query','query' => "SELECT page_url FROM page WHERE page_id = $pid"));
        $pageurl=$page_url[0]['page_url'];
        $this->session->set_userdata('page_url',$page_url[0]['page_url']);
        $appurl=$pageurl.'?sk=app_'.$fbappid;
        $this->session->set_userdata('appurl',$appurl);
        
        $tempinfo = $this->loadtemplates->tempforcanvas($pid,$fbappid);
        $tempid  = $tempinfo[0]['tempid'];
        $becomefan  = $tempinfo[0]['becomefan'];
        $ravealimg  = $tempinfo[0]['ravealimg'];
        $tempbgcolor = $this->loadtemplates->gettempbgcolor($tempid);
        $data['tempbgclr'] = $tempbgcolor;
       
        $insat_info=$this->loadtemplates->get_insat_user_tknid($tempid,$pid,$fbappid);
        $insta_user_id=$insat_info[0]['instag_userid'];
        $insta_acc_tkn=$insat_info[0]['insatg_acc_tkn'];
        $hashtag=$insat_info[0]['hash_tag'];
        $data['insta_user_id'] = $insta_user_id;
        $data['insta_acc_tkn'] = $insta_acc_tkn;
        $data['hashtag'] = $hashtag;
        $comparr = $this->loadtemplates->getcomponent($tempid);        
       // echo "<pre>";print_r($comparr);echo "</pre>";
        foreach($comparr as $comparr)
        {
            $components[] = $this->loadtemplates->gettempdata($comparr['position'],$tempid,$pid,$fbappid);
        }                
        //echo "<pre>"; print_r($components); echo "</pre>";
        $data['tempid'] = $tempid;
        $data['tempdata'] = $components;
        $data['pid']=$pid;
        $data['appurl']=$appurl;
        $data['appid'] = $fbappid;
        $data['signed_request']=$signed_request;
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
    
    function showfullimage()
    {
      $imgurl=$_REQUEST['imgurl'];
      $captxt=$_REQUEST['captiontxt'];
      $appid=$_REQUEST['appid'];
      $username=$_REQUEST['username'];
      $commnent=$_REQUEST['commnent'];
      $pid = $_REQUEST['pid'];
      $data['imgurl']=$imgurl;
      $data['captxt']=$captxt;
      $data['appid']=$appid;
      $data['username']=$username;
      $data['commnent']=$commnent;
      $data['pid']=$pid;
     //var_dump($data); die();
      $this->load->view('apps/subcanvastemp111', $data);   
    }
    function show_allimages()
    {
        $fbappid = $_REQUEST['appid'];  
        $pid = $_REQUEST['pid'];
        $tempinfo = $this->loadtemplates->tempforcanvas($pid,$fbappid);
        $tempid  = $tempinfo[0]['tempid'];
        $tempbgcolor = $this->loadtemplates->gettempbgcolor($tempid);
        $data['tempbgclr'] = $tempbgcolor;
       
        $insat_info=$this->loadtemplates->get_insat_user_tknid($tempid,$pid,$fbappid);
        $insta_user_id=$insat_info[0]['instag_userid'];
        $insta_acc_tkn=$insat_info[0]['insatg_acc_tkn'];
        $data['insta_user_id'] = $insta_user_id;
        $data['insta_acc_tkn'] = $insta_acc_tkn;
        
        $comparr = $this->loadtemplates->getcomponent($tempid);        
       // echo "<pre>";print_r($comparr);echo "</pre>";
        foreach($comparr as $comparr)
        {
            $components[] = $this->loadtemplates->gettempdata($comparr['position'],$tempid,$pid,$fbappid);
        }                
        //echo "<pre>"; print_r($components); echo "</pre>";
        $data['tempid'] = $tempid;
        $data['tempdata'] = $components;
        $data['pid']=$pid;
        $data['appid'] = $fbappid;
        $this->load->view('apps/canvastemp'.$tempid, $data);         
    }
    function showallimages()
    {
        $appid=$_REQUEST['appid'];
        $pid = $_REQUEST['pid'];
        redirect("instgram_app/show_allimages?appid=".$appid."&pid=".$pid);
    }
}