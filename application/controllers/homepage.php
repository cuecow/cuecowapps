<?php
class homepage extends CI_Controller {

    function __construct()
    {
        parent::__construct();        
        // $this->load->view('maintaince_app');
        $this->load->model('user_validate');
        $this->load->model('fbpages');
        $this->load->model('fbpage');
		$this->load->model('loadtemplates');
        $this->load->model('common');
		$this->load->helper('file');
        
        // check deploy file exist
        $filedata = read_file('./deployfile/deploy.txt');
        if($filedata==TRUE)
            {
             $this->session->set_userdata('maintenanceTime','maintenanceTime');
              $file_data= explode("\@", $filedata);
              $deploy_time=$file_data[0];
              $deploy_msg=$file_data[2];
			  $deploy_date=$file_data[1];
			  $this->session->set_userdata('deploy_date',$deploy_date);
              $this->session->set_userdata('deploy_time',$deploy_time);
              $this->session->set_userdata('deploy_msg',$deploy_msg);
            }  else {
            $this->session->unset_userdata('maintenanceTime');    
            }
    }	
    function index()
    {   
        $userid = $this->session->userdata('fbuserid');
        if($userid==FALSE)
        {
            $username['user_fname']="fname";
            $username['user_lname']="lname";
            $this->load->view('header',$username);
            $this->load->view('authorize');
        }else
         {
        $leftdata['pages'] = $this->fbpages->pages();
        //var_dump($leftdata); die();
        if(count($leftdata['pages'])===0)
        {
           $fname = $this->session->userdata("fname");
           $lname = $this->session->userdata("lname");
           $username['user_fname']=$fname;
           $username['user_lname']=$lname;
           $this->load->view('header',$username);
           $this->load->view('page_warning');
        } 
        elseif(count($leftdata['pages'])>0 && isset($leftdata['pages']['acctknerror']))
        {
           $fname = $this->session->userdata("fname");
           $lname = $this->session->userdata("lname");
           $username['user_fname']=$fname;
           $username['user_lname']=$lname;
           $this->load->view('header',$username);
           $data['message']=$leftdata['pages']['message'];
           $this->load->view('acctkn_warning',$data);
        } 
        else{
            
        $pgid=$leftdata['pages'][0]['page']['id'];
        $pgacctoken=$leftdata['pages'][0]['page']['access_token'];
        $this->session->set_userdata('pid',$pgid);
        $this->session->set_userdata('ptoken', $pgacctoken);
        $pid = $this->session->userdata("pid");
        $ptoken = $this->session->userdata("ptoken");
        $user = $this->session->userdata("fbuserid");
        $appid_url = $this->fbpage->getdbappidurl($pid,$user);
        $alltabsdata = $this->fbpage->pagetabs($pid,$ptoken,$user);
        $pagetabs = $alltabsdata['activetabs'];
        $archivedtab = $alltabsdata['archivedtab'];
        $pendingapps = $alltabsdata['pendingapps'];
        
        //var_dump($appid_url); die();
        
        $matchtabsdata = array();
        $newpagetabs=array();
        foreach($pagetabs as $tabs)
        {            
            //var_dump($tabs); die();
            if(in_array($tabs['id'], $appid_url)) 
            {
                $matchtabsdata = $this->fbpage->getdbmatchinfo(trim($tabs['name']),$pid,$tabs['id']);
                 //var_dump($matchtabsdata); die();
                if(!empty($matchtabsdata))
                {
                    $tabs = 
                    array(
                        'id' => $matchtabsdata[0]['appid_url'],
                        'lid' => $matchtabsdata[0]['id'],
                        'image_url' => base_url()."images/tabicons/".$matchtabsdata[0]['tabicon'],
                        'name' => $matchtabsdata[0]['tabname'],
                        "application" => array("name"=>""),
                        'position' => 23,
                        'flag' => $matchtabsdata[0]['flag'],
                        'tempid' => $matchtabsdata[0]['tempid'],
                        'dbappid' => $matchtabsdata[0]['dbappid'],
                        'fbappid' => $matchtabsdata[0]['fbappid'],
                        'fbappsecret' => $matchtabsdata[0]['fbappsecret'],
                        'app_type' => $matchtabsdata[0]['app_type'],
                        'published' => $matchtabsdata[0]['published'],
                        'unpublish' => $matchtabsdata[0]['unpublish'],
                        'bitly_link' => $matchtabsdata[0]['bitly_link'],
                    );
                }
            }
            $newpagetabs[] = $tabs;
        }
        
        for($k=0;$k<count($leftdata['pages']);$k++)
        {
            $pagename=$leftdata['pages'][$k]['page']['name'];
            $pageid=$leftdata['pages'][$k]['page']['id'];
            $pageacctkn=$leftdata['pages'][$k]['page']['access_token'];
            $pgarray[$pageid]=array(
                                    'pagename'=>$pagename,
                                    'pageid' =>$pageid,
                                    'pageacctkn' =>$pageacctkn
                                   );
        }
        //unset($pgarray['100110956839460']);
        $this->session->set_userdata('pgarray',$pgarray);

        $page_pic= $this->fbpage->pagedetail_picture($pid);
        $data['page_pic']=$page_pic;
        $data['page_details']= $this->fbpage->pagedetail($pid);
        $data['pagetabs']= $newpagetabs;
        $data['archivedtab']= $archivedtab;
        $data['pendingapps']= $pendingapps;
		
		$content_mgrdata[] = $this->loadtemplates->getcontent_mgrdata_indx();
		$username['content_mgrdata_popup'] = $content_mgrdata; 
        $fname = $this->session->userdata("fname");
        $lname = $this->session->userdata("lname");
        $username['user_fname']=$fname;
        $username['user_lname']=$lname;
        $this->load->view('header',$username);
        $this->load->view('left', $leftdata);
        $this->load->view('viewpage', $data);
    
         }
    }
  }
/*
 * 
 */

  public function get_user_pages_app_copy()
    {
        $error="";
        $pgarray = $this->session->userdata('pgarray');

        $pid=$_REQUEST['pid'];
        $fbappid=$_REQUEST['fbappid'];
        $fbuesrid=$this->session->userdata('fbuserid');
        unset($pgarray[$pid]);
        $result=$pgarray;
        //var_dump($result);
        foreach($result as $pagid)
        {
            $p_id=$pagid['pageid'];
            $result2=$this->common->check_same_appalready($p_id,$fbappid,$fbuesrid);
            if(count($result2) > 0)
            {
             unset($pgarray[$p_id]);
             $result=$pgarray;   
            }
        }
        echo json_encode(array('error' => $error,'result'=>$result));
    } 
 public function copy_toother_wall()
 {
        $error="";
        $lid=$_REQUEST['lid'];
        $dbappid=$_REQUEST['dbappid'];
        $fbappid=$_REQUEST['fbappid'];
        $tempid=$_REQUEST['tempid'];
        $selectedpage_arry=$_REQUEST['selectedpage_arry'];
        $pid=$_REQUEST['pid'];
        $fbuesrid=$this->session->userdata('fbuserid');
        $result=$this->common->copy_to_other_wall($lid,$dbappid,$fbappid,$tempid,$pid,$fbuesrid,$selectedpage_arry);
        echo json_encode(array('error' => $error,'result'=>$result));   
 }
 /*
  * 
  */ 
  public function get_user_pages()
    {
        $error="";
        $pgarray = $this->session->userdata('pgarray');

        $pid=$_REQUEST['pid'];
        unset($pgarray[$pid]);
        $result=$pgarray;
        echo json_encode(array('error' => $error,'result'=>$result));
    } 
 public function copy_coverpic()
 {
        $error="";
        $covername=$_REQUEST['covername'];
        $coverurl=$_REQUEST['coverurl'];
        $selectedpage_arry=$_REQUEST['selectedpage_arry'];
        $fbuesrid=$this->session->userdata('fbuserid');
        $result=$this->common->copy_cover_pic($covername,$fbuesrid,$selectedpage_arry,$coverurl);
        echo json_encode(array('error' => $error,'result'=>$result));   
 }
 
  function chk_deploy_file()
 {
   $error="";
   
   // check deploy file exist
        $filedata = read_file('./deployfile/deploy.txt');
        if($filedata==TRUE)
            {
             $result="deploy_file_exist";
             $this->session->set_userdata('maintenanceTime','maintenanceTime');
              $file_data= explode("\@", $filedata);
              $deploy_time=$file_data[0];
              $deploy_msg=$file_data[2];
              $this->session->set_userdata('deploy_time',$deploy_time);
              $this->session->set_userdata('deploy_msg',$deploy_msg);
            }  else {
            $result="deploy_file_not_exist";    
            $this->session->unset_userdata('maintenanceTime');    
            }
   echo json_encode(array('error' => $error,'result'=>$result));
 }
 function save_edit_content()
 {
    $error="";
	$result="";
    $autoid=$_REQUEST['auto_id'];
	$content_txt=$_REQUEST['content_txt'];
	$this->common->do_update_popup_content($autoid,$content_txt);
    echo json_encode(array('error' => $error,'result'=>$result));
 }
}