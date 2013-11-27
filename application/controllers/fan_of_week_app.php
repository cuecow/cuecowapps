<?php
class fan_of_week_app extends CI_Controller {

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
        $appdata['appid']=$fbappid;
        $appsecret=$this->loadtemplates->appscret($fbappid);
        $data['appsecret']=$appsecret[0]['fb_appsecret'];
        $fbappsecret = $appsecret[0]['fb_appsecret'];
        //var_dump($appsecret);
        $data['fbapid']=$fbappid;
        $this->session->set_userdata('fbappid',$fbappid);
        $this->facebookobj->makeobj($fbappid);
        //$this->facebookobj->getlongToken($fbappid);
        $signed_request = $this->facebook->getSignedRequest();
        $this->session->set_userdata('cpid',$signed_request["page"]["id"]);
        $pid = $this->session->userdata('cpid');
        $page_url = $this->facebook->api(array('method' => 'fql.query','query' => "SELECT page_url FROM page WHERE page_id = $pid"));
        $this->session->set_userdata('pageurl',$page_url[0]['page_url']);
        $pageurl=$this->session->userdata('pageurl');
        if(isset($signed_request['app_data']))
        {
          $pagurl=$pageurl.'?sk=app_'.$fbappid.'&app_data='.$signed_request['app_data'];
        }
        else{
          $pagurl=$pageurl.'?sk=app_'.$fbappid;   
        }
        $appdata['pagurl']=$pagurl;
        if(isset($signed_request['user_id']))
        {
          $uid=$signed_request['user_id'];
        }else {$uid="NULL";}
        if($uid=="NULL")
        {
            $this->load->view('apps/fbaccess',$appdata);
//           $this->load->helper('url');
//           $config = array(
//              'appId'  => $fbappid,
//              'secret' => $fbappsecret, 
//              'fileUpload' => true,
//              );
//           $this->load->library('Facebook', $config);
//              $params = array(
//                              'scope' => 'email,user_birthday',
//                              'redirect_uri' => $pagurl
//                            );
//             $loginUrl = $this->facebook->getLoginUrl($params);
//             echo "<script>top.location.href='$loginUrl'</script>";
        }
        $data['isadmin']=$signed_request['page']['admin'];
        if(isset($signed_request['app_data'])&& isset($signed_request['user_id']))
        {
          $this->session->set_userdata('cand_id',$signed_request['app_data']);
            
          $this->session->set_userdata('voterid',$signed_request['user_id']);
          
          $alredyvoted=$this->loadtemplates->check_alredyvoted($signed_request['user_id'],$signed_request['app_data'],$this->session->userdata('cpid'),$fbappid);
          
            if(!empty($alredyvoted))
              {
               $data['voter_status']='alredyvoted';
              }
            else {
               
                    $cand_id=$this->loadtemplates->check_iscandidate($signed_request['app_data'],$this->session->userdata('cpid'),$fbappid);
                    $data['cand_name']=$cand_id[0]['userinfo']['user_name'];
                    $data['cand_id']=$this->session->userdata('cand_id');
                    $vote_for_userid=$signed_request['app_data'];
                    $data['voter_status']='notalredyvoted';
                    $data['vote_for_userid']=$signed_request['app_data'];
                 }  
        }  else {
        $data['voter_status']='nothing';    
        $vote_for_userid='already_candidate';
        }
        $like_status = $signed_request["page"]["liked"];
        $this->session->set_userdata('cpid',$signed_request["page"]["id"]);
        if($like_status){ 
            $this->session->set_userdata('likestatus',"yes");
        }else{ 
            $this->session->set_userdata('likestatus',"no");
        }
        $secret=$this->loadtemplates->getsecret($fbappid);
        $scrkey=$secret[0]['fb_appsecret'];
        //var_dump($scrkey);
        
       
        $config = array(
                'appId'  => $fbappid,
                'secret' => $scrkey
            );
        $facebook = new Facebook($config);        //var_dump($facebook->getUser());
        if($facebook->getUser()!=0)
        {   
        try {
        $userInfo = $facebook->api('/me');
        $this->session->set_userdata('fb_username',$userInfo['name']);
        $this->session->set_userdata('delid',$userInfo['id']);
        $app_userid=$userInfo['id'];
        $data['admin_idd']=$userInfo['id'];    // change sat
            // database qyery to check user already a candidate
        $cand_id=$this->loadtemplates->check_iscandidate($app_userid,$this->session->userdata('cpid'),$fbappid);
        if($cand_id)
            {
                if($cand_id[0]['userinfo']['fb_userid']==$app_userid)
                {
                  $data['admin_name']=$cand_id[0]['userinfo']['user_name']; 
                  $data['admin_vote']=$cand_id[0]['voteinfo']; 
                  $data['admin_pageid']=$cand_id[0]['userinfo']['page_id']; 
                  $data['admin_appid']=$cand_id[0]['userinfo']['app_id'];
                  $app_userid='already_candidate';  
                }
                else{
                    $app_userid='notalready_candidate';
                }
             $data['app_userid'] = $app_userid;   
            }
            else {
                $data['app_userid'] = 'notalready_candidate';
            }
           
          $all_cand=$this->loadtemplates->all_candidate($userInfo['id'],$this->session->userdata('cpid'),$fbappid);
          if($all_cand)
          {
            $data['cand_list']=$all_cand;
          }
         } catch ( Exception $e ) {
           //  print_r($e); 
        }
        
        $tempinfo = $this->loadtemplates->tempforcanvas($pid,$fbappid);
        $becomefan  = $tempinfo[0]['becomefan'];
        $ravealimg  = $tempinfo[0]['ravealimg'];
        $data['admin_id']=$this->session->userdata('voterid');
        $tempid  = $tempinfo[0]['tempid'];
                        // get template bg color
        $tempbgcolor = $this->loadtemplates->gettempbgcolor($tempid);
        $data['tempbgclr'] = $tempbgcolor;
        $comparr = $this->loadtemplates->getcomponent($tempid);
        $autotime = $this->loadtemplates->getautotime($pid,$fbappid);
       // echo "<pre>";print_r($comparr);echo "</pre>";
        foreach($comparr as $comparr)
        {
            $components[] = $this->loadtemplates->gettempdata($comparr['position'],$tempid,$pid,$fbappid);
        }                
        //echo "<pre>"; print_r($components); echo "</pre>";
        $pageurl=$this->session->userdata('pageurl');
        $pagurl=$pageurl.'?sk=app_'.$fbappid;
        //echo("<script> top.location.href='".$pagurl."'</script>");
        $data['pagurl'] = $pagurl;
        $data['tempid'] = $tempid;
        $data['tempdata'] = $components;
        $data['pgid']=$this->session->userdata('cpid');
        $data['appid'] = $fbappid;
        $data['autotime']=$autotime;
        $data['fbuserid']=$userInfo['id'];
        if($becomefan=="Yes")
           {
               if($like_status)
               {
                $this->load->view('apps/canvastemp'.$tempid, $data);
               }else {
                  $rdata['ravealimg'] = $ravealimg;
                  $this->load->view('apps/reveal',$rdata); 
               }
           }else
               {
               $this->load->view('apps/canvastemp'.$tempid, $data);
               }    
     } 
    } 

function save_fandata()
    {
        $error = "";
        $result = "";
        $uid=$_REQUEST['values'];
        $acctoken=$_REQUEST['acctoken'];
        $pid = $this->session->userdata('cpid');
        $fbname = $this->session->userdata('fb_username');
        $fbappid = $this->session->userdata('fbappid');
        $pageurl=$this->session->userdata('pageurl');
        $pagurl=$pageurl.'?sk=app_'.$fbappid;
        
        $this->loadtemplates->fan_of_week($uid,$pid,$fbname,$fbappid,$acctoken);
        $result = $pagurl;
        echo json_encode(array('error' => $error,'result'=>$result)); 
    }
 
function save_vote()
{
  $cand_id=$_REQUEST['cndid'];
  $voterid=$_REQUEST['vtrid'];
  $fbappid = $this->session->userdata('fbappid');
  $pid = $this->session->userdata('cpid');
  $pageurl=$this->session->userdata('pageurl');
  $pagurl=$pageurl.'?sk=app_'.$fbappid;
  $this->loadtemplates->savevote($cand_id,$voterid,$fbappid,$pid);
   echo("<script> top.location.href='".$pagurl."'</script>");   
}
 
function delete_cand()
{
  $fbappid = $this->session->userdata('fbappid');
  $pageurl=$this->session->userdata('pageurl');
  $pagurl=$pageurl.'?sk=app_'.$fbappid;   
  
  $del_id = $this->session->userdata('delid');
  $this->loadtemplates->delet_cand($del_id);
  
  echo("<script> top.location.href='".$pagurl."'</script>"); 
}

function saveautotime()
{
    $dy=$_REQUEST['dayoption'];
    $tim=$_REQUEST['timeoption'];
    $fbappid = $this->session->userdata('fbappid');
    $pid = $this->session->userdata('cpid');
    $this->loadtemplates->savedate_forautofan($dy,$tim,$pid,$fbappid);
    $pageurl=$this->session->userdata('pageurl');
    $pagurl=$pageurl.'?sk=app_'.$fbappid;   
    echo("<script> top.location.href='".$pagurl."'</script>"); 
}

function alredyvoted()
    {
        $error = "";
        $result = "";
        $voterid=$_REQUEST['voterid'];
        $candid=$_REQUEST['candid'];
        $alredyvoted=$this->loadtemplates->check_alredyvoted($voterid,$candid,$this->session->userdata('cpid'),$this->session->userdata('fbappid'));
        if($alredyvoted)
        {
         $result = "SUCCESS";
        }
        echo json_encode(array('error' => $error,'result'=>$result));
    }
 function fanofweekupdate()
 {
        $error = "";
        $result = "";
        $fbuserid=$_REQUEST['fbuserid'];
        $pagid=$_REQUEST['pagid'];
        $appid=$_REQUEST['appid'];
        $update=$this->loadtemplates->updateuserinfo($fbuserid,$pagid,$appid);
        if($update)
        {
         $result = "SUCCESS";
        }
        echo json_encode(array('error' => $error,'result'=>$result));     
 }
function clearlist()
 {
  $fbappid = $this->session->userdata('fbappid');
  $pageurl=$this->session->userdata('pageurl');
  $pagurl=$pageurl.'?sk=app_'.$fbappid;   
  
  $this->loadtemplates->clearcand_list();
  
  echo("<script> top.location.href='".$pagurl."'</script>");   
    
 }
}