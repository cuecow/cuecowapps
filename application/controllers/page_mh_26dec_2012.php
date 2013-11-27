<?php
class page extends CI_Controller {

    public function __construct()
    {
        parent::__construct();        
        $this->load->model('user_validate');
        $this->load->model('common');
        $this->load->model('fbpages');
        
        
        $this->load->model('fbpage');
        $this->load->model('loadapps');
        $this->load->model('loadtemplates');
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
        
        
        //echo "<pre>";print_r($pagetabs);echo "</pre>";
        
        $matchtabsdata = array();
        foreach($pagetabs as $tabs)
        {            
            //echo "<pre>"; print_r($tabs); echo "</pre><br><br>"; $dbappid
            if(in_array($tabs['id'], $appid_url)) 
            {
                $matchtabsdata = $this->fbpage->getdbmatchinfo(trim($tabs['name']),$pid,$tabs['id']);
                //echo "<pre>"; print_r($matchtabsdata); echo "</pre><br><br>";
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
                    );
                }
            }
            $newpagetabs[] = $tabs;
        }		        
        //echo "<pre>"; print_r($newpagetabs); echo "</pre>";
        
        $leftdata['pages'] = $this->fbpages->pages();
        $data['page_details']= $this->fbpage->pagedetail($pid);
        $data['pagetabs']= $newpagetabs;
        $data['archivedtab']= $archivedtab;
        
        $this->load->view('header');
        $this->load->view('left', $leftdata);
        $this->load->view('viewpage', $data);
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
        
        $this->load->view('header');
        $this->load->view('left', $leftdata);
        $this->load->view('editpage', $data);
    }
    
    //*****For Get App List Avaible on Cuecow************//
    public function app()
    {        
        $leftdata['pages'] = $this->fbpages->pages();
        $data['applist'] = $this->loadapps->get_apps();

        $this->load->view('header');
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
                
        $this->load->view('header');
        $this->load->view('left', $leftdata);
        $this->load->view('templist', $data);
    }
    
    //*****For View And Edit Seleted Tempate************//
    public function viewtemplate()
    {        
        if(isset($_REQUEST['tempid']))
        {
            $gettempid = base64_decode($_REQUEST['tempid']);
            $this->session->set_userdata('tempid',$gettempid);
        }
        
        //*** This Part Code Run When Edit App from Tab List**/
        if(isset($_REQUEST['aid']))
        {
            
            $this->session->set_userdata('dbappid',  base64_decode($_REQUEST['aid']));
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
        //echo $fbappid;
        
        if(isset($_REQUEST['action']) && base64_decode($_REQUEST['action'])==1)
        {            
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
        
        $leftdata['pages'] = $this->fbpages->pages();                
        $data['tempid'] = $tempid;
        $data['tempdata'] = $components;
        $this->load->view('header');
        $this->load->view('left', $leftdata);
        $this->load->view('template', $data);
    }
    
    //*****For App Settings For Installtion of Facebook************//
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
        
        
        $this->load->view('header');
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
        $ftype = $_REQUEST['ftype'];
        if(isset($_REQUEST['ins']) && $_REQUEST['ins']=="fdel")
        {
            $this->common->hidequizoption($val_id);
            redirect('page/viewtemplate');
            exit();
        }
        else
        {
            $valrdata = $this->common->loadtempvalues($val_id,$ftype);
            $data['valr'] = $valrdata[0];
            $data['val_id'] = $val_id;
            $data['ftype'] = $ftype;
            $this->load->view('editpopup',$data);
        }
    }
    
    
    //***** Do Facebook Box Popup For Template Content Editting************//
    public function do_editpopup()
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
        
        $this->common->doupdatetempvalues($valimgname);
        redirect('page/viewtemplate');
        exit();
    }
    
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
        redirect('page/editpage?upload=1');
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
                    redirect('page/editpage?upload=1');
                    exit();
                }
                else
                {
                    $this->session->set_userdata('ERR_MSG','Some Problem in image upload please try again!');
                    redirect('page/editpage');
                }
            }
            else
            { 
                $this->session->set_userdata('ERR_MSG','Please Select Valid image for Page Cover');
                redirect('page/editpage');
            }
        }        
    }
    public function setcoverpic()
    {
        $pic = $_REQUEST['file'];
        $this->common->do_setcoverpic($pic);
        redirect('page/editpage');
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
    public function delltabfacebook()
    {
        $appidurl = base64_decode($_REQUEST['appidurl']);
        
        $this->common->dodelltab_facebook($appidurl);
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
        $data['tempimg'] = $_REQUEST['tempid'];
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
}