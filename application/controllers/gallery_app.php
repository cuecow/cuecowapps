<?php
class gallery_app extends CI_Controller {

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
        $this->session->set_userdata('fbappid',$fbappid);
        $this->facebookobj->makeobj($fbappid);
        
        $this->load->helper(array('form', 'url'));
        $mode = (isset($_REQUEST['mode']) ? $_REQUEST['mode'] : '');        
        
        $signed_request = $this->facebook->getSignedRequest();
        $this->session->set_userdata('pid',$signed_request["page"]["id"]);
        $this->session->set_userdata('likestatus',$signed_request["page"]["liked"]);
        $pid = $this->session->userdata('pid');
        $page_url = $this->facebook->api(array('method' => 'fql.query','query' => "SELECT page_url FROM page WHERE page_id = $pid"));
        $this->session->set_userdata('page_url',$page_url[0]['page_url']);        
        $like_status = $this->session->userdata('likestatus');
        $tempinfo = $this->loadtemplates->tempforcanvas($pid,$fbappid);
        $tempid  = $tempinfo[0]['tempid'];
        $tempbgcolor = $this->loadtemplates->gettempbgcolor($tempid);
        $innetdata['tempbgclr'] = $tempbgcolor;
        $this->session->set_userdata('tempid',$tempid);
        $ravealimg  = $tempinfo[0]['ravealimg'];
        $comenddate  = $tempinfo[0]['competitionenddate'];
        $becomefan  = $tempinfo[0]['becomefan'];        
        
        
        
        $comparr = $this->loadtemplates->getcomponent($tempid);        
        // echo "<pre>";print_r($comparr);echo "</pre>";
        foreach($comparr as $comparr)
        {
            $components[] = $this->loadtemplates->gettempdata($comparr['position'],$tempid,$pid,$fbappid);
        }
        $adminflag = 0;
        $pictures = $this->loadtemplates->galleryapp_getpics($adminflag);
        
        //echo "<pre>"; print_r($pictures); echo "</pre>";
        $innetdata['mode'] = $mode;
        $innetdata['appid'] = $fbappid;
        $innetdata['tempid'] = $tempid;
        $innetdata['pictures'] = $pictures['finpicdata'];
        $innetdata['prm'] = $pictures['prm'];
        $innetdata['tempdata'] = $components;
        
        $todaydate = strtotime(date('Y-m-d h:i:s'));
        $getdate = strtotime($comenddate);
        
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
    
    public function addpic()
    {
        $error = "";
        $result = "";
     
        if(!empty($_FILES['file']['name']))
        {
            $imgfile = strtolower($_FILES['file']['name']);
            $ex = array_pop(explode(".", $imgfile));
            $allowtype = array("jpg", "png", "gif", "jpeg","gif");
            if(in_array($ex, $allowtype) )
            {
                $newname = rand().substr(trim($_FILES["file"]["name"]),0,3).".".$ex;
                $path = "images/images/galleryimages/";
                $m = move_uploaded_file($_FILES["file"]["tmp_name"],$path.$newname);             
                if($m)
                {
                    $result .= "SUCCESS";
                }                
            }else{ $error .= "This file type not allowed";}
         echo json_encode(array('error' => $error, 'image' => $newname,"result"=>$result));
        }
        
        if(isset($_REQUEST['values']))
        {                       
           $pid = $this->session->userdata('pid');
           $tempid = $this->session->userdata('tempid');
           $comparr = $this->loadtemplates->galleryapp_doaddpic($tempid,$pid);
        }
        
    }
    public function vote()
    {
        $error = "";
        $result = "";
        if(isset($_REQUEST['id']))
        {                       
            $comparr = $this->loadtemplates->galleryapp_dovote();
        }
        
    }       
    public function get_submit()
    {
        $this->loadtemplates->galleryapp_getpics();
    }       
    
}