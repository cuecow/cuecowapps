<?php
class page extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //$this->load->view('maintaince_app'); 
        $this->load->model('user_validate');
        $this->load->helper('emailmgr');
        $this->load->library('bitly');
        $this->load->model('common');
        $this->load->model('change_status');
        $this->load->model('fbpages');
        $this->load->model('fbpage');
        $this->load->model('loadapps');
        $this->load->model('loadtemplates');
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
    //*****For Fan Page Details************//
    public function index()
    {
        global $newpagetabs;
        if(isset($_REQUEST['pid']))
        {
            $this->session->set_userdata('pid',$_REQUEST['pid']);
            $this->session->set_userdata('ptoken', base64_decode($_REQUEST['tkn']));
        }
        
        $pid = $this->session->userdata("pid");
        $ptoken = $this->session->userdata("ptoken");
        $user = $this->session->userdata("fbuserid");
        
        $appid_url = $this->fbpage->getdbappidurl($pid,$user);
        $alltabsdata = $this->fbpage->pagetabs($pid,$ptoken,$user);
        
        $pagetabs = $alltabsdata['activetabs'];
        $archivedtab = $alltabsdata['archivedtab'];
        $pendingapps = $alltabsdata['pendingapps'];
        
     // var_dump($pagetabs); die();
        
        $matchtabsdata = array();
        foreach($pagetabs as $tabs)
        {            
            //echo "<pre>"; print_r($tabs); echo "</pre><br><br>"; $dbappid
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
        //echo "<pre>"; print_r($newpagetabs); echo "</pre>";
        $page_pic= $this->fbpage->pagedetail_picture($pid);
        $data['page_pic']=$page_pic;
        $leftdata['pages'] = $this->fbpages->pages();
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
        $leftdata['pid'] = $pid;
        
        $this->load->view('header',$username);
        $this->load->view('left', $leftdata);
        $this->load->view('viewpage', $data);
    }
    
    public function user_mgm()
    {
        if(isset($_GET['msg']))
        {
            $data['res'] = "success";
        }
        else
        {
            $data['res'] = NULL;
        }
        
        $fname = $this->session->userdata("fname");
	$lname = $this->session->userdata("lname");
	$username['user_fname']=$fname;
	$username['user_lname']=$lname;
        //var_dump($username); die();
        $leftdata['pages'] = $this->fbpages->pages();
        
         //$user_facebookid = $this->change_status->getuser();
        $user_facebookid = $this->change_status->get_facebookid();
        
        //var_dump($user_facebookid); die();
        $data['user']= $user_facebookid;
        $this->load->view('header',$username);
        $this->load->view('alluser', $data);
        
    }
    
    public function changeStatus()
    {
        
        $id = $_REQUEST['id'];
        
        if($id == "")
        {
            redirect('page/user_mgm?msg=1');
        }
        
        $flag = $_REQUEST['flag'];
        if($flag == 1)
        {        
            $this->change_status->removeApps($id);
            $this->change_status->removeFromFacebook($id);
            redirect('page/user_mgm');
        }
        else
        {
           $this->change_status->publishApp($id);
           
           redirect('page/user_mgm');
        }
    }
    
    //*****For Edit Fan Page Details************//
    public function editpage()
    {        
        $pid = $this->session->userdata("pid");
        $fbuserid = $this->session->userdata("fbuserid");
        $ptoken = $this->session->userdata("ptoken");        
        
        $leftdata['pages'] = $this->fbpages->pages();        
        $data['page_details']= $this->fbpage->pagedetail($pid);
        $data['pagetabs']= $this->fbpage->pagetabs($pid,$ptoken,$fbuserid);
        
        $fname = $this->session->userdata("fname");
        $lname = $this->session->userdata("lname");
        $username['user_fname']=$fname;
        $username['user_lname']=$lname;
        $leftdata['pid'] = $pid;
        
        $this->load->view('header',$username);
        $this->load->view('left', $leftdata);
        $this->load->view('editpage', $data);
    }
    
    //*****For Get App List Avaible on Cuecow************//
    public function app()
    {
        $pid = $this->session->userdata("pid");
        $leftdata['pages'] = $this->fbpages->pages();
        $data['applist'] = $this->loadapps->get_apps();
        $fname = $this->session->userdata("fname");
        $lname = $this->session->userdata("lname");
        $this->session->set_userdata("instagram_auth","not auth");
		$content_mgrdata[] = $this->loadtemplates->getcontent_mgrdata_app();
		$username['content_mgrdata_popup'] = $content_mgrdata; 
        $username['user_fname']=$fname;
        $username['user_lname']=$lname;
        $leftdata['pid'] = $pid;
        
        $this->load->view('header',$username);
        $this->load->view('left', $leftdata);
        $this->load->view('applist', $data);
    }
    
    //*****For Get Template List Under the Particular App************//
    public function templates()
    {
        $pid = $this->session->userdata("pid");
        if(isset($_REQUEST['aid']))
        {
            $this->session->set_userdata('dbappid',  base64_decode($_REQUEST['aid']));
            $this->session->set_userdata('coded_dbappid', $_REQUEST['aid']);
            $appdetail = $this->common->app_detail($this->session->userdata("dbappid"),$pid);
            //echo "<pre>"; print_r($appdetail); echo "</pre>";
            if(count($appdetail)>0)
            {
                $this->session->set_userdata('fbappid',  $appdetail[0]['fb_appid']);
                $this->session->set_userdata('fbappsecret',  $appdetail[0]['fb_appsecret']);
                $this->session->set_userdata('apptype',  $appdetail[0]['app_type']);
            }
            else
            {
                $this->session->set_userdata('ERR_MSG', 'You have used maximum quota for this app');
                redirect('page/app');
                exit();
            }
        }
        $this->session->set_userdata('dbappid',  base64_decode($_REQUEST['aid']));
        
        $uid = $this->session->userdata('panelsessoinuid');
        $dbappid = $this->session->userdata('dbappid');
        
        $leftdata['pages'] = $this->fbpages->pages();
        $data['templatelist'] = $this->loadtemplates->get_templates($uid,$dbappid);
                
		$content_mgrdata[] = $this->loadtemplates->getcontent_mgrdata_template();
		$username['content_mgrdata_popup'] = $content_mgrdata;		
        $fname = $this->session->userdata("fname");
        $lname = $this->session->userdata("lname");
        $username['user_fname']=$fname;
        $username['user_lname']=$lname;
        $leftdata['pid'] = $pid;
        
        $this->load->view('header',$username);
        $this->load->view('left', $leftdata);
        $this->load->view('templist', $data);
    }
    
    //*****For View And Edit Seleted Tempate************//
    public function viewtemplate()
    {        
        if(isset($_REQUEST['tempid']))
        {
            $gettempid = base64_decode($_REQUEST['tempid']);
            $this->session->set_userdata('coded_tempid',$_REQUEST['tempid']);
            $this->session->set_userdata('tempid',$gettempid);
        }
        //*** This Part Code Run When Edit App from Tab List**/
        if(isset($_REQUEST['aid']))
        {
            
            $this->session->set_userdata('dbappid',  base64_decode($_REQUEST['aid']));
            $this->session->set_userdata('coded_dbappid', $_REQUEST['aid']);
            $appid_url = base64_decode($_REQUEST['app']);
            $editmode_app_detail = $this->common->editmode_app_detail($this->session->userdata("dbappid"),$appid_url);
            //echo "<pre>"; print_r($editmode_app_detail); echo "</pre>";
            if(count($editmode_app_detail)>0)
            {
                $this->session->set_userdata('fbappid',  $editmode_app_detail[0]['fbappid']);
                $this->session->set_userdata('fbappsecret',  $editmode_app_detail[0]['fbappsecret']);
                $this->session->set_userdata('apptype',  $editmode_app_detail[0]['app_type']);
            }
            
        }
        
        /**------------------------------------------------------------**/        
        $tempid = $this->session->userdata('tempid');
        $uid = $this->session->userdata('panelsessoinuid');
        $pid = $this->session->userdata("pid");
        $ptoken = $this->session->userdata("ptoken");        
        $dbappid = $this->session->userdata("dbappid");
        $fbappid = $this->session->userdata("fbappid");
        $fbappsecret = $this->session->userdata("fbappsecret");        
        
                        //create bitly links
//        $gen_links = 'https://www.facebook.com/'.$pid.'?sk=app_'.$fbappid; 
//        $short_url = $this->bitly->shorten($gen_links);
//        $data['bitly_link'] = $short_url;
        
                        // check user has antheticate instagrgam acc
       $fbuserid = $this->session->userdata("fbuserid");
       $user_insta_info = $this->fbpage->getinsat_user_detail($fbuserid,$pid,$fbappid,$tempid);
       $data['user_insta_info']= $user_insta_info;
       //var_dump($user_insta_info); die();
        
        // Save Template As Default
        if ( isset( $_REQUEST['mode'] ) && $_REQUEST['mode']=='sad' ) {            
            $this->loadtemplates->saveTemplateAsDefault($pid,$tempid,$fbappid);
        }
        
        // Load NEW Template [NOT IN EDIT CASE]
        if(isset($_REQUEST['action']) && base64_decode($_REQUEST['action'])==1)
        {   $this->session->set_userdata('coded_action',$_REQUEST['action']);         
            $this->loadtemplates->copytemdata($pid,$tempid,$fbappid);
            if($dbappid==2)
            {
                $this->loadtemplates->copyquizdata($pid,$tempid,$fbappid);
            }            
        }
        
        $comparr = $this->loadtemplates->getcomponent($tempid);
        //echo "<pre>";print_r($comparr);echo "</pre>";
        foreach($comparr as $comparr)
        {
            $components[] = $this->loadtemplates->gettempdata($comparr['position'],$tempid,$pid,$fbappid);
        }        
        
        // THIS PART FOR QUIZ APP 
        if($dbappid==2)
        {            
            $data['quizdata'] = $this->loadtemplates->getquizdata($tempid,$pid,$fbappid);
        }
        
        // get template bg color
        $tempbgcolor = $this->loadtemplates->gettempbgcolor($tempid);         
        // THIS PART FOR GALLERY  APP         
        if(in_array($dbappid, array(4,5)))
        {
            $adminflag = 1;
            $pictures = $this->loadtemplates->galleryapp_getpics($adminflag);
            $data['pictures'] = $pictures['finpicdata'];
        }
        
        // THIS PART FOR CHRISMAS APP 
        if($dbappid==6)
        {
            $data['chirmas_subpagesdata'] = $this->loadtemplates->getchrismasapp_subpages($pid,$fbappid);
        }
        $templatedata[]=$this->loadtemplates->gettemplate_data($tempid);
        
        $leftdata['pages'] = $this->fbpages->pages();                
        $data['tempid'] = $tempid;
        $data['templatedata']=$templatedata;
        $data['tempdata'] = $components;
        $data['tempbgclr'] = $tempbgcolor;
        $temp_copy=0;
        $data['temp_copy'] = $temp_copy;
		
		$content_mgrdata[] = $this->loadtemplates->getcontent_mgrdata_view_template();
		$username['content_mgrdata_popup'] = $content_mgrdata;
        $fname = $this->session->userdata("fname");
        $lname = $this->session->userdata("lname");
        $data['pid'] = $pid;
        $data['fbappid'] = $fbappid;
        $username['user_fname']=$fname;
        $username['user_lname']=$lname;
        $leftdata['pid'] = $pid;
        
        $this->load->view('header',$username);
        $this->load->view('left', $leftdata);
        $this->load->view('template', $data);
    }
    
    
    //*****For App Settings For Installtion of Facebook************//
    /**
     * 
     */
    public function app_settings()
    {
        $this->load->helper(array('form'));
        
        $pid = $this->session->userdata("pid");
        $ptoken = $this->session->userdata("ptoken");
        $tempid = $this->session->userdata("tempid");
        $fbuserid = $this->session->userdata("fbuserid");
        $fbappid = $this->session->userdata("fbappid");
        $dbappid = $this->session->userdata("dbappid");
        
        $leftdata['pages'] = $this->fbpages->pages();        
        $data['appdataarrg'] = $this->common->loadappsettings($pid,$fbappid,$fbuserid,$tempid,$dbappid);
        //echo "<pre>"; print_r($data['appdataarrg']); echo "</pre>";
        
        $content_mgrdata[] = $this->loadtemplates->getcontent_mgrdata_app_setting();
		$username['content_mgrdata_popup'] = $content_mgrdata;
        $fname = $this->session->userdata("fname");
        $lname = $this->session->userdata("lname");
        $username['user_fname']=$fname;
        $username['user_lname']=$lname;
        $leftdata['pid'] = $pid;
        
        $this->load->view('header',$username);
        $this->load->view('left', $leftdata);
        $this->load->view('app_settings', $data);
        
    }
    
    //*****For Save App Settings From Posted Form App Settings************//
    public function save_appsettings()
    {
        $flag = $this->input->post("flag");
        //echo "<pre>"; print_r($_FILES['tabicon']); echo "<pre>";
        if(!empty($_FILES['tabicon']['name']))
        {
            $tabicon = strtolower($_FILES['tabicon']['name']);
            $ex = array_pop(explode(".", $tabicon));
            $allowtype = array("jpg", "png", "gif", "jpeg");
            if(in_array($ex, $allowtype) )
            {
                $tabiconimg = rand()."tabicon.".$ex;
                $path = "images/tabicons/";	
                $m = move_uploaded_file($_FILES["tabicon"]["tmp_name"],$path.$tabiconimg);
                if($m)
                {
                    $tabicon = $tabiconimg;
                }
            }        
        }else{ $tabicon = "";}
        
        if(!empty($_FILES['ravealimage']['name']))
        {
            $ravealimage = strtolower($_FILES['ravealimage']['name']);
            $ex = array_pop(explode(".", $ravealimage));
            $allowtype = array("jpg", "png", "gif", "jpeg");
            if(in_array($ex, $allowtype) )
            {
                $ravealnimg = rand()."tabicon.".$ex;
                $path = "images/ravealimages/";	
                $m = move_uploaded_file($_FILES["ravealimage"]["tmp_name"],$path.$ravealnimg);
                if($m)
                {
                    $ravealimage = $ravealnimg;
                }               
            }        
        }else{ $ravealimage = "";}
        
        if($flag==1)
        {
            $this->common->updatetabcontent($tabicon,$ravealimage);
        }
        $this->common->dosave_appsettings($tabicon,$ravealimage);
        $this->session->set_userdata('INF_MSG','Settings Save Successfully!');
        redirect('page/');
        exit();
    }    
	
    //*****Facebook Box Popup For Template Content Editting************//
    public function editpopup()
    {
        $val_id = $_REQUEST['val_id'];
        
        if(isset($_REQUEST['val_id_sp']))
        {
            $val_id = $_REQUEST['val_id_sp'];
        }
        //var_dump($val_id); die();
        $val_id_sp = $_REQUEST['val_id_sp'];
        
        $ftype = $_REQUEST['ftype'];
        if(isset($_REQUEST['action']))
            {
                $this->session->set_userdata('aidd',$_REQUEST['action']); 
            }
        if(isset($_REQUEST['ins']) && $_REQUEST['ins']=="fdel")
        {
            $this->common->hidequizoption($val_id);
            redirect('page/viewtemplate');
            exit();
        }
        else
        {
            $valrdata = $this->common->loadtempvalues($val_id,$ftype);
            $data['valr']= $valrdata[0];
            
            
            $data['fname'] = $_REQUEST['fname'];
            $data['fid'] = $_REQUEST['fid'];
            $data['val_id_sp'] = $val_id_sp;
            $data['fval_sp'] = base64_decode($_REQUEST['fval']);
            //var_dump($data['fval_sp']); die;
            
            $data['val_id'] = $val_id;
            $data['ftype'] = $ftype;
            $this->load->view('editpopup',$data);
        }
    }
            //*****Facebook Box Popup For Template Content Editting************//
    public function edit_image()
    {
        
        $val_id = $_REQUEST['val_id'];
        
        if(isset($_REQUEST['val_id_sp']))
        {
            $val_id = $_REQUEST['val_id_sp'];
        }
        //var_dump($val_id); die();
        $val_id_sp = $_REQUEST['val_id_sp'];
        //var_dump($val_id_sp); die();
        
        $ftype = $_REQUEST['ftype'];
        $width = $_REQUEST['width'];
        $height = $_REQUEST['height'];
        if($ftype=='quizimg')
        {
            $fname = $_REQUEST['fname'];
            $data['fname'] = $fname;
        }
        if(isset($_REQUEST['action']))
            {
                $this->session->set_userdata('aidd',$_REQUEST['action']); 
            }
        if(isset($_REQUEST['ins']) && $_REQUEST['ins']=="fdel")
        {
            $this->common->hidequizoption($val_id);
            redirect('page/viewtemplate');
            exit();
        }
        else
        {
            $valrdata = $this->common->loadtempvalues($val_id,$ftype);
            
            $data['fname'] = $_REQUEST['fname'];
            $data['fid'] = $_REQUEST['fid'];
            
            
            $data['valr'] = $valrdata[0];
            $data['val_id'] = $val_id;
            
            $data['val_id_sp'] = $val_id_sp;
            
            $data['ftype'] = $ftype;
            $data['width'] = $width;
            $data['height'] = $height;
            
            $this->load->view('edit_image',$data);
        }
    }
    
    //***** Do Facebook Box Popup For Template Content Editting************//
    public function do_editpopup()
    {    
        $val_id_sp = $_REQUEST['val_id_sp'];
        
        if(!empty($_FILES['newimg']['name']))
        {
            $newimgdata = strtolower($_FILES['newimg']['name']);
            $ex = array_pop(explode(".", $newimgdata));
            $allowtype = array("jpg", "png", "gif", "jpeg");
            if(in_array($ex, $allowtype) )
            {
                $newimgname = rand()."tempimgs.".$ex;
                $path = "images/images/";
                $m = move_uploaded_file($_FILES["newimg"]["tmp_name"],$path.$newimgname);
                if($m)
                {
                    $valimgname = $newimgname;
                }               
            }        
        }else{ $valimgname = ""; $newbigimg = "";}
        
        $this->common->doupdatetempvalues($valimgname,$newbigimg);
        //redirect('page/viewtemplate');
        
        if($val_id_sp == "")
        {
            redirect("page/viewtemplate");
            
        }
        else
        {
            $val_id_sp = $_REQUEST['val_id_sp'];
            //var_dump('123'); die();
            $this->common->chrismas_update_subpgval($valimgname);
            redirect("page/viewtemplate?subpgid=$val_id_sp");
        }
        
        exit();
    }
    
      /**
     * 
     */
    //***** Do Facebook Box Popup For Template Content Editting************//
    public function do_editimage()
    {    
        
        $val_id_sp = $_REQUEST['val_id_sp'];
//            $v = $_REQUEST['fn'];
//            var_dump($v); die();
            
            $subpgid = $_REQUEST['subpgid'];
        
            $width = $_REQUEST['width'];
            $height = $_REQUEST['height'];
            $newimgdata = strtolower($_FILES['newimg']['name']);
            if($newimgdata=="")
            {
             $valimgname="deafult.png";
             $folderPath='images/images/';
             $imgname="deafult.png";
             image_resize($imgname,$width,$height,$folderPath);
            }
            $ex = array_pop(explode(".", $newimgdata));
            $allowtype = array("jpg", "png", "gif", "jpeg");
            if(in_array($ex, $allowtype) )
            {
                $newimgname = rand()."tempimgs.".$ex;
                $path = "images/images/";
                $m = move_uploaded_file($_FILES["newimg"]["tmp_name"],$path.$newimgname);
                if($m)
                {
                    $valimgname = $newimgname;
                    $folderPath='images/images/';
                    $imgname=$newimgname;
                    image_resize($imgname,$width,$height,$folderPath);
                }               
            }        
        $this->common->doupdatetempvalues($valimgname,$newbigimg);
        
        if($val_id_sp == "")
        {
            redirect("page/viewtemplate");
            
        }
        else
        {
            $val_id_sp = $_REQUEST['val_id_sp'];
            //var_dump('123'); die();
            $this->common->chrismas_update_subpgval($valimgname);
            redirect("page/viewtemplate?subpgid=$val_id_sp");
        }
        
//        redirect('page/viewtemplate');
        exit();
    }
    
      /**
     * 
     */  
  public function do_changethumbnail()
    {        
        if(!empty($_FILES['newimg']['name']))
        {
            $tempid=$_REQUEST['val_id'];
            $newimgdata = strtolower($_FILES['newimg']['name']);
            $ex = array_pop(explode(".", $newimgdata));
            $allowtype = array("jpg", "png", "gif","bmp");
            if(in_array($ex, $allowtype) )
            {
                $newimgname = rand()."temp.".$ex;
                $path = "images/tempimgs/";
                move_uploaded_file($_FILES["newimg"]["tmp_name"],$path.$newimgname);
                                
                        // copy temp big images
                $newimg=$newimgname;
                $newbigimg="bigtemp".$tempid.".".$ex;
                $copyfrmoldbigimg = 'images/tempimgs/'.$newimg;
                $copytonewbigimg = 'images/tempimgs/'.$newbigimg;
                copy($copyfrmoldbigimg, $copytonewbigimg) or die("Unable to copy $copyfrmoldbigimg to $copytonewbigimg.");
                
//                  get image for resize
                $imagename = 'images/tempimgs/'.$newimg;
                $size = getimagesize($imagename);
                $imgwidth=$size[0];
                $imgheight=$size[1];
                $THUMB_WIDTH = 109;
                $THUMB_HEIGHT = 158;
                
                if($imgwidth > $THUMB_WIDTH && $imgheight > $THUMB_HEIGHT)
                {                   
                   if($imgwidth > $imgheight)
                   { 
                        $config['image_library'] = 'gd2';
                        $this->load->library('image_lib');
                        $config['source_image']	= 'images/tempimgs/'.$newimg;
                        $config['maintain_ratio'] = TRUE;
                        $config['master_dim'] = 'height';
                        $config['width'] = $THUMB_WIDTH;
                        $config['height'] = $THUMB_HEIGHT;
                        $this->image_lib->clear();
                        $this->image_lib->initialize($config); 
                        if(!$this->image_lib->resize()){
                            echo $this->image_lib->display_errors();}

                   }
                  elseif($imgheight > $imgwidth)
                   {
                        $config['image_library'] = 'gd2';
                        $this->load->library('image_lib');
                        $config['source_image']	= 'images/tempimgs/'.$newimg;
                        $config['maintain_ratio'] = TRUE;
                        $config['master_dim'] = 'width';
                        $config['width'] = $THUMB_WIDTH;
                        $config['height'] = $THUMB_HEIGHT;
                        $this->image_lib->clear();
                        $this->image_lib->initialize($config); 
                        if(!$this->image_lib->resize()){
                            echo $this->image_lib->display_errors();}

                   }else
                   {
                        $config['image_library'] = 'gd2';
                        $this->load->library('image_lib');
                        $config['source_image']	= 'images/tempimgs/'.$newimg;
                        $config['maintain_ratio'] = TRUE;
                        $config['width'] = $THUMB_WIDTH;
                        $config['height'] = $THUMB_HEIGHT;
                        $this->image_lib->clear();
                        $this->image_lib->initialize($config); 
                        if(!$this->image_lib->resize()){
                            echo $this->image_lib->display_errors();}   
                   }
                }
//                  get image to check dimension after resizing
                $imagename = 'images/tempimgs/'.$newimg;
                $size2 = getimagesize($imagename);
                $imgwidth2=$size2[0];
                $imgheight2=$size2[1];  

              if( $imgwidth2 < $THUMB_WIDTH)
                {
                    $config['source_image'] = 'images/tempimgs/'.$newimg;
                    $config['maintain_ratio'] = TRUE;
                    $config['master_dim'] = 'width';
                    $config['width'] = $THUMB_WIDTH;
                    $config['height'] = $imgheight2;
                    $this->image_lib->clear();
                    $this->image_lib->initialize($config);  
                    if(!$this->image_lib->resize()){
                    echo $this->image_lib->display_errors();}   
                }
                elseif( $imgheight2 < $THUMB_HEIGHT)
                {
                    $config['source_image'] = 'images/tempimgs/'.$newimg;
                    $config['maintain_ratio'] = TRUE;
                    $config['master_dim'] = 'height';
                    $config['width'] = $imgwidth2;
                    $config['height'] = $THUMB_HEIGHT;
                    $this->image_lib->clear();
                    $this->image_lib->initialize($config);  
                    $this->image_lib->resize();   
                }
//                  get image to check dimension
                $imagename = 'images/tempimgs/'.$newimg;
                $size3 = getimagesize($imagename);
                $imgwidth3=$size3[0];
                $imgheight3=$size3[1];
                
               if($imgwidth3 > $THUMB_WIDTH)
                {
                    $config['source_image'] = 'images/tempimgs/'.$newimg;
                    $config['maintain_ratio'] = FALSE;
                    $config['width'] = $THUMB_WIDTH;
                    $config['height'] = $THUMB_HEIGHT;
                    $config['x_axis'] = (($imgwidth3 / 2) - ($THUMB_WIDTH / 2));
                    
                    $this->image_lib->clear();
                    $this->image_lib->initialize($config);
                    $this->image_lib->crop();
                }
                elseif( $imgheight3 > $THUMB_HEIGHT)
                {
                    $config['source_image'] = 'images/tempimgs/'.$newimg;
                    $config['maintain_ratio'] = FALSE;
                    $config['width'] = $THUMB_WIDTH;
                    $config['height'] = $THUMB_HEIGHT;
                    $config['y_axis'] = (($imgheight3 / 2) - ($THUMB_HEIGHT / 2));
                    
                    $this->image_lib->clear();
                    $this->image_lib->initialize($config);
                    if(!$this->image_lib->crop())
                    {
                        echo $this->image_lib->display_errors();
                    }   
                }
                $valimgname = $newimgname;               
            }        
        }
        else{ $valimgname = ""; $newbigimg="";}
        
            $this->common->doupdatetempvalues($valimgname,$newbigimg);
            $aid=$this->session->userdata('aidd');    
            $pagurl=base_url().'index.php/page/templates?aid='.$aid;
            echo("<script> top.location.href='".$pagurl."'</script>");   
            exit();
    }
    
    /**
     * 
     */  
    public function update_about()
    {
        $this->common->do_updateabout();
        redirect('page/editpage');
        exit();
    }
    public function coverlib()
    {
        $user = $this->session->userdata('fbuserid');
        global $file,$filedata;
        $doc_file_array = array("jpg", "png", "gif");
        $path = "images/imglib/".$user."/";
        if(is_dir($path))
        {
            if($dh = opendir($path))
            {
                $filedata = array();
                while($file = readdir($dh))
                {
                    $extension = array_pop(explode(".",$file));
                    if($file != '.' && $file != '..')
                    {
                        if(in_array($extension, $doc_file_array))
                        {   
                            $filedata[] = $file;
                        }
                    }
                }
                closedir($dh);
            }
        }
        $data['path'] = $path;
        $data['file'] = $filedata;
        $this->load->view('coverlib',$data);
    }
    public function dellibpic()
    {
        $user = $this->session->userdata('fbuserid');
        $file = $_REQUEST['file'];
        unlink("images/imglib/".$user."/".$file);
        redirect('page/?upload=1');
        exit();
    }
    public function uploadlibimg()
    {
        $user = $this->session->userdata('fbuserid');
        
        if(!empty($_FILES['cover_img']['name']))
        {
            $newimgdata = strtolower($_FILES['cover_img']['name']);
            $ex = array_pop(explode(".", $newimgdata));
            $allowtype = array("jpg", "png", "gif", "jpeg");
            if(in_array($ex, $allowtype) )
            {
                $newimgname = rand()."timg.".$ex;
                $path = "images/imglib/".$user."/";
                if(is_dir($path))
                {
                    $m = move_uploaded_file($_FILES["cover_img"]["tmp_name"],$path.$newimgname);
                }
                else
                {                    
                    if(mkdir($path , 0777))
                    {
                        $m = move_uploaded_file($_FILES["cover_img"]["tmp_name"],$path.$newimgname);
                    }
                }                
                if($m)
                {
                    redirect('page/?upload=1');
                    exit();
                }
                else
                {
                    $this->session->set_userdata('ERR_MSG','Some Problem in image upload please try again!');
                    redirect('page/');
                }
            }
            else
            { 
                $this->session->set_userdata('ERR_MSG','Please Select Valid image for Page Cover');
                redirect('page/');
            }
        }        
    }
    public function setcoverpic()
    {
        $pic = $_REQUEST['file'];
        $this->common->do_setcoverpic($pic);
        redirect('page/');
        exit();
    }
    
    public function delltab()
    {
        $lid = base64_decode($_REQUEST['lid']);
        $tempid = base64_decode($_REQUEST['tempid']);
        $fbappid = base64_decode($_REQUEST['fbappid']);
        $dbappid = base64_decode($_REQUEST['dbappid']);
        
        $this->common->dodelltab($lid,$tempid,$fbappid,$dbappid);
        redirect('page/');
        exit();
    }
    public function delltab_ac()
    {
        $lid = base64_decode($_REQUEST['lid']);
        $tempid = base64_decode($_REQUEST['tempid']);
        $fbappid = base64_decode($_REQUEST['fbappid']);
        $dbappid = base64_decode($_REQUEST['dbappid']);
        
        $this->common->ac_dodelltab($lid,$tempid,$fbappid,$dbappid);
        redirect('page/');
        exit();
    }
    
    
    public function genrate_csv()
    {
        $pid = $this->session->userdata('pid');
        $tempid = $this->session->userdata('tempid');
        $fbappid = $this->session->userdata('fbappid');
        //$pid = 205403486151750";
        //$tempid = 4;
        
        $this->common->do_genrate_csv($pid,$fbappid,$tempid);
        exit();
    } 
    
    public function temppreview()
    {
        $tempid=$_REQUEST['tempid']; 
        $bigimgnme = $this->loadtemplates->preview_getpics($tempid);
        $data['bigtempimg'] = $bigimgnme; 
        $this->load->view('previewtemp' , $data);
    }    
    
    public function galleryapp_pactions()
    {
        $id = (isset($_REQUEST['id']) ? $_REQUEST['id'] : '' );
        $action = (isset($_REQUEST['action']) ? $_REQUEST['action'] : '' );
        $mode = (isset($_REQUEST['mode']) ? $_REQUEST['mode'] : '' );        
        $this->common->do_galleryapp_pactions($id,$action,$mode);
        redirect("page/viewtemplate?mode=$mode");
        exit();
    }
    
    public function galleryapp_adminpicupload()
    {
        if(!empty($_FILES['imgfile']['name']))
        {
            $imgfile = strtolower($_FILES['imgfile']['name']);
            $ex = array_pop(explode(".", $imgfile));
            $allowtype = array("jpg", "png", "gif", "jpeg","gif");
            if(in_array($ex, $allowtype))
            {
                $newname = rand()."gt9.".$ex;
                $path = "images/images/galleryimages/";
                $m = move_uploaded_file($_FILES["imgfile"]["tmp_name"],$path.$newname);             
            }
        }
        
        $this->common->do_galleryapp_adminpicupload($newname);
        redirect("page/viewtemplate");
        exit();
    }
    
    
    
    // For Clone App
    public function clone_app()
    {
        $pid = $this->session->userdata("pid");
        $lid = base64_decode($_REQUEST['lid']);
        $this->session->set_userdata('dbappid',  base64_decode($_REQUEST['dbappid']));
        $fbappid = base64_decode($_REQUEST['fbappid']);
        $this->session->set_userdata('tempid',  base64_decode($_REQUEST['tempid']));        
        $dbappid = $this->session->userdata('dbappid');
        
        $appdetail = $this->common->app_detail($dbappid,$pid);
        //echo "<pre>"; print_r($appdetail); echo "</pre>";
        if(count($appdetail)>0)
        {
            $gettempdata_nsettings = $this->common->gettempdata_nsettings($pid,$fbappid,$dbappid);
            
            $this->session->set_userdata('fbappid',  $appdetail[0]['fb_appid']);
            $this->session->set_userdata('fbappsecret',  $appdetail[0]['fb_appsecret']);
            $this->session->set_userdata('apptype',  $appdetail[0]['app_type']);
            
            $this->common->cloneapp_data($gettempdata_nsettings);
            redirect("page/viewtemplate");
            exit();
            //echo "<pre>"; print_r($gettempdata_nsettings['tempdata_arrg']); echo "</pre>";
        }
        else
        {
            $this->session->set_userdata('ERR_MSG', 'You have used maximum quota for this app');
            redirect('page/app');
            exit();
        }
        
    }
    
    // For adding Sub pages in Chrismas App 
    public function chrismas_addsubpg()
    {
        if(isset($_REQUEST['action']) && trim($_REQUEST['action'])=='dell')
        {
            $this->common->chirsmas_dellsubpg($subpgid);
            redirect("page/viewtemplate");
            exit();
        }
        if(isset($_REQUEST['subpgid']))
        {
            $subpgid = $_REQUEST['subpgid'];
            $this->common->chirsmas_docopysubpgdata($subpgid);
            redirect("page/viewtemplate?subpgid=$subpgid");
            exit();
        }
        else
        {
            $this->load->view('temp14_subpglist');
        }
    }
    
    public function subpg_editpopup()
    {
        $subpgid = $_REQUEST['subpgid'];
        $REQUEST_METHOD  = $this->input->server('REQUEST_METHOD');
        if($REQUEST_METHOD=="POST")
        {
            $ftype = $_REQUEST['ftype'];
            if($ftype==3)
            {
                if(!empty($_FILES['subpgimg']['name']))
                {
                    $newimgdata = strtolower($_FILES['subpgimg']['name']);
                    $ex = array_pop(explode(".", $newimgdata));
                    $allowtype = array("jpg", "png", "gif", "jpeg");
                    if(in_array($ex, $allowtype) )
                    {
                        $newimgname = rand()."tempimgs.".$ex;
                        $path = "images/images/";
                        $m = move_uploaded_file($_FILES["subpgimg"]["tmp_name"],$path.$newimgname);
                        if($m)
                        {
                            $valimgname = $newimgname;
                        }               
                    }        
                }
            }
            else
            {
                $valimgname = "";
            }
            
            $this->common->chrismas_update_subpgval($valimgname);
            redirect("page/viewtemplate?subpgid=$subpgid");
            exit();
        }
        else
        {
            $data['subpgid'] = $subpgid;
            $data['fid'] = $_REQUEST['fid'];
            $data['fname'] = $_REQUEST['fname'];
            $data['ftype'] = $_REQUEST['ftype'];
            $data['fval'] = base64_decode($_REQUEST['fval']);
            
            $this->load->view('subpg_editpopup',$data);
        }
    }
    
    public function chrismas_app_updtsettings()
    {
        $tabid = $_REQUEST['tabid'];
        $this->common->do_chrismas_app_updtsettings($tabid);
        redirect("page/viewtemplate?tabid=$tabid");
        exit();
    }

public function editquizpopup()
    {  
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    { 
       if(!empty($_FILES['newimg']['name']))
        {
            $newimgdata = strtolower($_FILES['newimg']['name']);
            $ex = array_pop(explode(".", $newimgdata));
            $allowtype = array("jpg", "png", "gif", "jpeg");
            if(in_array($ex, $allowtype) )
            {
                $newimgname = rand()."tempimgs.".$ex;
                $path = "images/images/";
                $m = move_uploaded_file($_FILES["newimg"]["tmp_name"],$path.$newimgname);
                if($m)
                {
                    $valimgname = $newimgname;
                }               
            }        
        }else{ $valimgname = "";}
        
        $this->common->updatequizdata($valimgname);
        redirect('page/viewtemplate');
        exit();
    }
    else
    {  
     $this->load->view('editquizpopup');
    }
   }
 
 public function save_asdefault() 
 {
    $error="";
    $result="";
    $tempid=$_REQUEST['tempid'];    
    $pid = $this->session->userdata("pid");
    $fbappid = $this->session->userdata("fbappid");
    $this->loadtemplates->saveTemplateAsDefault($pid,$tempid,$fbappid);
    echo json_encode(array('error' => $error,'result'=>$result));
 }
 
  public function getThemes()
 {
   $error="";
   $dbappid=$_REQUEST['dbapp_id'];
   $result=$this->loadtemplates->getThemes_name($dbappid);  
   echo json_encode(array('error' => $error,'result'=>$result));
 }
   public function copytemp()
 {
    $error="";
    $tempid=$_REQUEST['tempid'];
    $tempname_org=$_REQUEST['tempnameorg'];
    $dbappid=$_REQUEST['dbapp_id'];
    $parent_id=$_REQUEST['parentid'];
    $themename_selected=$_REQUEST['themenameselected'];
    $pid = $this->session->userdata("pid");
    $fbappid = $this->session->userdata("fbappid");
    $result=$this->loadtemplates->copytemplates($tempid,$tempname_org,$dbappid,$parent_id,$themename_selected,$pid,$fbappid);                        // copy template file
    
    $frmtemp='temp'.$tempid.'.php';
    $totemp='temp'.$result.'.php';
    $oldtemp = 'application/views/'.$frmtemp;
    $newtemp = 'application/views/'.$totemp;
    copy($oldtemp, $newtemp) or die("Unable to copy $oldtemp to $newtemp.");
                                // copy style file
    $frmstyle='style'.$tempid.'.php';
    $tostyle='style'.$result.'.php';
    $oldstyle = 'application/views/styles/'.$frmstyle;
    $newstyle = 'application/views/styles/'.$tostyle;
    copy($oldstyle, $newstyle) or die("Unable to copy $oldstyle to $newstyle.");
    
                                // copy canvas file
    $frmcan='canvastemp'.$tempid.'.php';
    $toscan='canvastemp'.$result.'.php';
    $oldcan = 'application/views/apps/'.$frmcan;
    $newcan = 'application/views/apps/'.$toscan;
    copy($oldcan, $newcan) or die("Unable to copy $oldcan to $newcan.");
    
                                // copy temp big images
    $frmbigimg='bigtemp'.$tempid.'.png';
    $tobigimg='bigtemp'.$result.'.png';
    $oldbigimg = 'images/tempimgs/'.$frmbigimg;
    $newbigimg = 'images/tempimgs/'.$tobigimg;
    copy($oldbigimg, $newbigimg) or die("Unable to copy $oldbigimg to $newbigimg.");
    echo json_encode(array('error' => $error,'result'=>$result));
//    $aid=$_REQUEST['action'];    
//    $pagurl=base_url().'index.php/page/templates?aid='.$aid;
//    echo("<script> top.location.href='".$pagurl."'</script>");        
 }
 
 function deletetemp()
 {
   $tempid=$_REQUEST['tempid'];
   $this->loadtemplates->delttemplates($tempid);
   
    // to delete template file
//   $deltemp='temp'.$tempid.'.php';
//   unlink('application/views/'.$deltemp);
//      // to delete style file
//   $delstyle='style'.$tempid.'.php';
//   unlink('application/views/styles/'.$delstyle);
//         // to delete canvas file
//   $delcan='canvastemp'.$tempid.'.php';
//   unlink('application/views/apps/'.$delcan);
//              // to delete temp big images
//   $delcan='bigtemp'.$tempid.'.png';
//   unlink('images/tempimgs/'.$delcan);
    $aid=$_REQUEST['action'];    
    $pagurl=base_url().'index.php/page/templates?aid='.$aid;
    echo("<script> top.location.href='".$pagurl."'</script>"); 
 }

    public function admin_email($test)
    {
        if($test=="airbrake")
        {
            $a="okokoko";
            // this is a critical error, log of zero or negative number is undefined
            $d = $this->scale_by_log($a, -2.5); 
        }elseif($test=="air_brake")
        {
            throw new Exception('cuecow live');
        }else
        {
            $fname = $this->session->userdata("fname");
            $lname = $this->session->userdata("lname");
            $username['user_fname']=$fname;
            $username['user_lname']=$lname;
            $this->load->view('header',$username);
            $this->load->view('email_admin');
        }
    }
    
  function search_emails()
  {
    $error="";
    $date_frm=$_REQUEST['date_frm'];
    $date_to=$_REQUEST['date_to'];
    $cuecow_acc=$_REQUEST['cuecow_acc'];
    $email_to=$_REQUEST['email_to'];
    
    $result=$this->loadtemplates->do_search_emails($date_frm,$date_to,$cuecow_acc,$email_to);  
    echo json_encode(array('error' => $error,'result'=>$result));
    
  }
  
function get_fullemial()
{
    $error="";
    $emilid=$_REQUEST['emil_id'];
    
    $result=$this->loadtemplates->do_search_fullemails($emilid);  
    echo json_encode(array('error' => $error,'result'=>$result));    
}

function resend_emial()
{
     $error="";
     $result="success";
    $emilid=$_REQUEST['emilid'];
    
    $rsltdata=$this->loadtemplates->do_search_fullemails($emilid);
    $email_cc="";
    $attach="";
    $rowid="";
    email_Mgr($rsltdata[0]['email_frm'],$rsltdata[0]['to_email'],$email_cc,$rsltdata[0]['subject'],$rsltdata[0]['message'],$attach,$rsltdata[0]['account_name'],$rowid,$rsltdata[0]['pgid'],$rsltdata[0]['tempid'],$rsltdata[0]['fbappid']);
    echo json_encode(array('error' => $error,'result'=>$result));    
}

function save_iframeurl()
{
    $urlvalue=$_REQUEST['iframe_url'];
    $urlid=$_REQUEST['urlid'];
    $this->loadtemplates->save_iframe_url($urlvalue,$urlid);
    redirect('page/viewtemplate');
    exit();
}

function save_youtubeurl()
{
    $urlvalue=$_REQUEST['yutube_url'];
    $urlid=$_REQUEST['urlid'];
    $this->loadtemplates->save_youtube_url($urlvalue,$urlid);
    redirect('page/viewtemplate');
    exit();
}
function update_link()
{
    $error="";
    $result="success";
    $fieldvalueid=$_REQUEST['fieldvalue_id'];
    $urllinkvalue=$_REQUEST['urllink_value'];
    $this->loadtemplates->save_iframe_url($urllinkvalue,$fieldvalueid);  
    echo json_encode(array('error' => $error,'result'=>$result));       
}

function show_error()
{ 
    $guid=$_REQUEST['guid'];
    $error_msg= $this->session->userdata("error_msg");
    $data['error_msg']=$error_msg;
    $data['guid']=$guid;
    $this->load->view('showerror',$data);
}
function show_dberror($guid)
{ 
    var_dump($guid); die();
    //$guid=$_REQUEST['guid'];
    $error_msg= $this->session->userdata("error_msg");
    $data['error_msg']=$error_msg;
    $data['guid']=$guid;
    $this->load->view('showerror',$data);
}
function show_error_email()
{
        $admin_fbid = $this->session->userdata("fbuserid");
        $email_frm=$_REQUEST['uemail']; 
        $msg=$_REQUEST['msg'];
        $guid=$_REQUEST['guid'];
        $this->loadtemplates->do_show_error_email($admin_fbid,$email_frm,$msg,$guid);
        $this->load->view('success_email_support');
}

function maintenance()
{
   $this->load->view('maintaince_app'); 
}

/*
 * 
 */
public function proflie_pic()
    {
        $this->load->view('profile_pic');
    }

public function upload_profile_pic()
    {
        $user = $this->session->userdata('fbuserid');
        
        if(!empty($_FILES['profile_img']['name']))
        {
            $newimgdata = strtolower($_FILES['profile_img']['name']);
            $ex = array_pop(explode(".", $newimgdata));
            $allowtype = array("jpg", "png", "gif", "jpeg");
            if(in_array($ex, $allowtype) )
            {
                $newimgname = rand()."prof.".$ex;
                $path = "images/prof_img/".$user."/";
                if(is_dir($path))
                {
                    $m = move_uploaded_file($_FILES["profile_img"]["tmp_name"],$path.$newimgname);
                }
                else
                {                    
                    if(mkdir($path , 0777))
                    {
                        $m = move_uploaded_file($_FILES["profile_img"]["tmp_name"],$path.$newimgname);
                    }
                }                
                if($m)
                {
                    $this->common->do_set_profilepic($newimgname);
                    exit();
                }
                else
                {
                    $this->session->set_userdata('ERR_MSG','Some Problem in image upload please try again!');
                    redirect('page/');
                }
            }
            else
            { 
                $this->session->set_userdata('ERR_MSG','Please Select Valid image for Page Cover');
                redirect('page/');
            }
        }        
    }
/*
 * 
 */

function gettkn()
{
if($_GET['code']) {

        $code = $_GET['code'];
        $url = "https://api.instagram.com/oauth/access_token";
        $access_token_parameters = array(
                'client_id'                =>     '4785a6e6d4f24857affc87bebc49000d',
                'client_secret'            =>     '8670621c624f4a608713a9ebe80fd96b',
                'grant_type'               =>     'authorization_code',
                'redirect_uri'             =>     'https://apps2.cuecow.com/index.php/page/gettkn',
                'code'                     =>     $code
        );

        $curl = curl_init($url);    // we init curl by passing the url
        curl_setopt($curl,CURLOPT_POST,true);   // to send a POST request
        curl_setopt($curl,CURLOPT_POSTFIELDS,$access_token_parameters);   // indicate the data to send
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);   // to return the transfer as a string of the return value of curl_exec() instead of outputting it out directly.
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);   // to stop cURL from verifying the peer's certificate.

        $result = curl_exec($curl);   // to perform the curl session
        curl_close($curl);   // to close the curl session

        $arr = json_decode($result,true);
        $insta_acc_tkn= $arr['access_token'];   // display the access_token
        $insta_user_id= $arr['user']['id'];   // display the username
        $this->session->set_userdata("insta_user_id","$insta_user_id");
        $this->session->set_userdata("insta_acc_tkn","$insta_acc_tkn");
        
        $fbuserid = $this->session->userdata("fbuserid");
        $this->session->set_userdata("instafbuserid","$fbuserid");
        $pid = $this->session->userdata("pid");
        $this->session->set_userdata("instapid","$pid");
        $tempid = $this->session->userdata('tempid');
        $this->session->set_userdata("instatempid","$tempid");
        $dbappid = $this->session->userdata("dbappid");
        $fbappid = $this->session->userdata("fbappid");
        $this->session->set_userdata("instafbappid","$fbappid");
        $this->session->set_userdata("instagram_auth","instagram_auth");
        
        $this->loadtemplates->insta_user_info($insta_acc_tkn,$insta_user_id,$fbuserid,$pid,$tempid,$fbappid);
        $coded_action=$this->session->userdata('coded_action'); 
        $coded_tempid=$this->session->userdata('coded_tempid');
        redirect('https://apps2.cuecow.com/index.php/page/viewtemplate?tempid='.$coded_tempid.'&action='.$coded_action.'');

    }
}


public function save_hash()
{
    
    $hash = $_POST['hash_value'];
    
    $error="";
    $fbuserid = $this->session->userdata("fbuserid");
    $pid = $this->session->userdata("pid");
    $tempid = $this->session->userdata('tempid');
    $fbappid = $this->session->userdata("fbappid");
    
    $this->loadtemplates->set_hashtag($hash,$fbuserid,$pid,$tempid,$fbappid);
     echo json_encode(array('error' => $error,'result'=>$result));
    
    
}

public function support_admin()
    {
       // $this->load->helper('file');
        $filedata = read_file('./deployfile/deploy.txt');
        if($filedata==TRUE)
            {
                $file_data= explode("\@", $filedata);
                $data['deploy_time']=$file_data[0];
                $data['deploy_date']=$file_data[1];
                $data['deploy_msg']=$file_data[2];
                $data['file_exist']="file_exist";
            }  else {
                $data[]="";
            }
        $fname = $this->session->userdata("fname");
        $lname = $this->session->userdata("lname");
        $username['user_fname']=$fname;
        $username['user_lname']=$lname;
        $this->load->view('header',$username);
        $this->load->view('support_admin',$data);   
    }

public function create_deployFile()
    {
      //$this->load->helper('file');
      
      $sep="\n";
      $time=$_REQUEST['deploytime'];
      $date=$_REQUEST['deploydate'];
      $msg=$_REQUEST['message'];
      
      $data = $time.'\@'.$sep.$date.'\@'.$sep.$msg;
      
        if ( !write_file('./deployfile/deploy.txt', $data))
        {
          $this->session->set_userdata('ERR_MSG_FILE','Unable to write a file');
		  redirect('page/support_admin');		  
        }
        else
        {
            $this->session->set_userdata('INF_MSG_FILE','Deploy file created/updated Succefully');
             redirect('page/support_admin');
        }
    }
    
 function delete_deployFile()
 {
     delete_files('./deployfile/');
     $this->session->set_userdata('INF_MSG_FILE','Deploy file deleted Succefully');
     redirect('page/support_admin');
 }
/*
*
*/
function content_mgr()
{
	$fname = $this->session->userdata("fname");
	$lname = $this->session->userdata("lname");
	$username['user_fname']=$fname;
	$username['user_lname']=$lname;
	$username['contentMgr']="content Mgr";
	$this->load->view('header',$username);
	
	$content_mgrdata[] = $this->loadtemplates->getcontent_mgrdata();
	$data['content_mgrdata'] = $content_mgrdata; 
	$this->load->view('contentManager',$data);
}
function Search_content_mgr()
{
	$searchqry = $_REQUEST['searchqry'];
	$fname = $this->session->userdata("fname");
	$lname = $this->session->userdata("lname");
	$username['user_fname']=$fname;
	$username['user_lname']=$lname;
	$username['contentMgr']="content Mgr";
	$this->load->view('header',$username);
	
	$content_mgrdata[] = $this->loadtemplates->getSearch_content_mgrdata($searchqry);
	$data['content_mgrdata'] = $content_mgrdata; 
	$this->load->view('contentManager',$data);
}

function edit_contents()
{
	$contentid = $_REQUEST['contentid'];
	$fname = $this->session->userdata("fname");
	$lname = $this->session->userdata("lname");
	$username['user_fname']=$fname;
	$username['user_lname']=$lname;
	$username['contentMgr']="content Mgr";
	$this->load->view('header',$username);
	
	$content_mgrdata[] = $this->loadtemplates->getcontent_data($contentid);
	$data['content_mgrdata'] = $content_mgrdata; 
	$this->load->view('edit_Contents',$data);
}

function update_contentMgr()
{
	$content_term_id = $_REQUEST['content_term_id'];
	$cont_id = $_REQUEST['cont_id'];
	for($k=0;$k<1;$k++)
	{
		$content_text = $_REQUEST['content_text_'.$k];
		$cont_auto_id = $_REQUEST['cont_auto_id_'.$k];
		$contentData[] = Array(
							'content_term_id' =>$content_term_id,
							'content_text' =>$content_text,
							'cont_id' =>$cont_id,
							'cont_auto_id' =>$cont_auto_id
							);
	}
	$this->common->do_update_contentMgr($contentData);
	redirect('page/content_mgr');
}
function clear_cache()
{
 redirect('page/content_mgr');
}
 /*
 *
 */
 // extra codes
function bitly_link()
{
          $ids = $this->common->getapp_pgid();
          for($k=0;$k<count($ids);$k++)
          {
            $id = $ids[$k]['id'];
            $pid = $ids[$k]['pid'];
            $appid = $ids[$k]['fbappid'];
            $gen_links = 'https://www.facebook.com/'.$pid.'?sk=app_'.$appid;
            $short_url = $this->bitly->shorten($gen_links);
            $this->common->updatebitly($id,$short_url);
          }
}
function scale_by_log($vect, $scale)
{
    if (!is_numeric($scale) || $scale <= 0) {
        trigger_error("log(x) for x <= 0 is undefined, you used: scale = $scale", E_USER_ERROR);
    }

    if (!is_array($vect)) {
        trigger_error("Incorrect input vector, array of values expected", E_USER_WARNING);
        return null;
    }

    $temp = array();
    foreach($vect as $pos => $value) {
        if (!is_numeric($value)) {
            trigger_error("Value at position $pos is not a number, using 0 (zero)", E_USER_NOTICE);
            $value = 0;
        }
        $temp[$pos] = log($scale) * $value;
    }

    return $temp;
}

function cm()
{
    $this->load->view('contentManager');
}
/*
function edit_contents()
{
	$contentid = $_REQUEST['contentid'];
	$fname = $this->session->userdata("fname");
	$lname = $this->session->userdata("lname");
	$username['user_fname']=$fname;
	$username['user_lname']=$lname;
	$username['contentMgr']="content Mgr";
	$this->load->view('header',$username);
	
	$content_mgrdata[] = $this->loadtemplates->getcontent_data($contentid);
	$data['content_mgrdata'] = $content_mgrdata; 
	$this->load->view('edit_Contents',$data);
}
*/
}