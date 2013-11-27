<?php
class common extends CI_Model{
    
    public function __construct()
    {    
        $this->load->database();
        $this->load->model('facebookobj');
        $this->facebookobj->admin_makeobj(APPID,APPSECRET);
        date_default_timezone_set('Europe/Zagreb');
    }	
    public function app_detail($dbappid,$pid)
    {
        //retrun the same object selecting from availble apps saved again this $id ,this id represent app typeeg quiz,signup
        //$query =   $this->db->query("SELECT l.*,a.* FROM apps_list l ,apps_fbappinfo a where a.app_typeid=l.id and l.id=$dbappid and a.tempid=$tempid");
        $qry1 = "Select fbappid from installed_apps where dbappid=$dbappid and pid=$pid and isdell=0";
        $query1 =   $this->db->query($qry1);
        $result1 = $query1->result_array();
        $appidslist = 0;
        foreach($result1 as $rz1)
        {
            $appidslist .= $rz1['fbappid'].",";
        }
       $appidslist = substr($appidslist,0,-1);
       if(empty($appidslist)){ $appidslist = 0;}
       
       $qry2 = "Select l.app_type,a.fb_appid,a.fb_appsecret,a.id from apps_list l ,apps_fbappinfo a where l.id=$dbappid and a.fb_appid not in ($appidslist) and a.app_typeid=$dbappid limit 0,1";
       $query2 =   $this->db->query($qry2);
       return $query2->result_array();
    }
    public function editmode_app_detail($dbappid,$appid_url)
    {
       $qry2 = "Select i.fbappid,i.fbappsecret,al.app_type from apps_list al,installed_apps i where i.appid_url='".$appid_url."' and al.id=$dbappid and i.isdell=0";
       $query2 =   $this->db->query($qry2);
       return $query2->result_array();
    }
    public function loadappsettings($pid,$fbappid,$fbuserid,$tempid,$dbappid)
    {    
        $query =   $this->db->query("Select * from installed_apps where pid='$pid' and fbappid='".$fbappid."' and userid='$fbuserid' and isdell=0");
        $appdata = $query->result_array();
        
        $query1 =   $this->db->query("Select * from app_quizoptions where pid=$pid and tempid=$tempid  and  fb_appid='".$fbappid."' and isdell=0");
        $anslist = $query1->result_array();
        
        // For Quiz App
        $resultcount = "";
        if($dbappid==2)
        {
            $countqry = "select count(*) from appquiz_result where pid=$pid and tempid=$tempid and fb_appid=$fbappid and isdell=0";
            $query2 =   $this->db->query($countqry);
            $resultcount = $query2->result_array();
            $resultcount = $resultcount[0]['count(*)'];
        }
        
        //For Gallery and Vote and Win App
        if(in_array($dbappid,array(4,5)))
        {
            $countqry = "select count(*) from gallery_appimgsvotes where pid=$pid and tempid=$tempid and fb_appid=$fbappid and isdell=0";
            $query2 =   $this->db->query($countqry);
            $resultcount = $query2->result_array();
            $resultcount = $resultcount[0]['count(*)'];
        }
        //For Chrismas App
        if($dbappid==6)
        {
            $countqry = "select count(*) from  chrismassapp_competition_vistors where pid=$pid and tempid=$tempid and fb_appid=$fbappid and isdell=0";
            $query2 =   $this->db->query($countqry);
            $resultcount = $query2->result_array();
            $resultcount = $resultcount[0]['count(*)'];
        }
        
        return array('appdata'=>$appdata,'anslist'=>$anslist,'resultcount'=>$resultcount);
    }
    
    public function dosave_appsettings($tabicons,$ravealimage)
    {
        $pid = $this->session->userdata('pid');
        $ptoken = $this->session->userdata('ptoken');
        $tempid = $this->session->userdata('tempid');
        $fbappid = $this->session->userdata("fbappid");
        $fbappsecret = $this->session->userdata("fbappsecret");        
        $fbuserid = $this->session->userdata("fbuserid");
        $fbuaccesstoken= $this->session->userdata("fbuaccesstoken");
        $dbappid = $this->session->userdata("dbappid");
        
        
        $tabname = $this->input->post('tabname');
        $tabiconimg = $tabicons;
        $pubdate = $this->input->post('pubdate');
        $unpubdate = $this->input->post('unpubdate');
        $becomefan = $this->input->post('becomefan');
        $ravealimg = $ravealimage;
        $correctans = $this->input->post('correctans');
        $autowinner = $this->input->post('autowinner');
        $winnercorrectans = $this->input->post('winnercorrectans');
        $competitionenddate = $this->input->post('competitionenddate');
        $comadminemail = $this->input->post('comadminemail');
        
        //if(strtotime($unpubdate)<=strtotime($pubdate)){ $this->session->set_userdata('ERR_MSG','Unpublish date must be greater than publish date'); redirect('page/app_settings/');}
        //if(strtotime($competitionenddate)<=strtotime(date('Y-m-d G:i:s')) && !empty($competitionenddate)){ $this->session->set_userdata('ERR_MSG','Competition Date must be greater than tody'); redirect('page/app_settings/');}
        
        if(!empty($correctans))
        {
            $correctans = $this->input->post('correctans');
            $qry1 = "Update app_quizoptions Set is_true=0 where pid=$pid and tempid=$tempid and fb_appid=$fbappid";
            $this->db->query($qry1);
            $qry2 = "Update app_quizoptions Set is_true=1 where pid=$pid and tempid=$tempid and id=$correctans and fb_appid=$fbappid";
            $this->db->query($qry2);
            //echo $qry1."<br>".$qry2;
        }       
        
        $qry3 = "Select id from installed_apps where pid='$pid' and fbappid='".$fbappid."' and userid='".$fbuserid."' and isdell=0";
        $query3 =   $this->db->query($qry3);
        $res3 = $query3->result_array();
        $count =  count($res3);
        if($count>0)
        {
            $recid = $res3[0]['id'];
            $qry4 = "Update installed_apps set tempid='".$tempid."',pid='".$pid."',fbappid='".$fbappid."',fbappsecret='".$fbappsecret."',
		uaccess_token = '".$fbuaccesstoken."',paccess_token='".$ptoken."',userid='$fbuserid',tabname='".$tabname."',
                ".($tabiconimg!='' ? "tabicon='".$tabiconimg."'," : '')." appid_url='".$pid."/tabs/app_".$fbappid."',dbappid='".$dbappid."',published='".(empty($pubdate) ? 'NULL' : $pubdate)."',unpublish='".$unpubdate."',
                becomefan='".$becomefan."',".($ravealimg!='' ? "ravealimg='".$ravealimg."'," : '')." autowinner='".$autowinner."',winnercorrectans='".$winnercorrectans."',
		competitionenddate='".$competitionenddate."',comadminemail='".$comadminemail."' where id=".$recid." ";
        }
        else
        {
            $qry4 = "INSERT into installed_apps (userid,pid,fbappid,fbappsecret,uaccess_token,paccess_token,tempid,tabname,tabicon,appid_url,dbappid,published,unpublish,
		becomefan,ravealimg,autowinner,winnercorrectans,competitionenddate,comadminemail) values 
		('".$fbuserid."','".$pid."','".$fbappid."','".$fbappsecret."','".$fbuaccesstoken."','".$ptoken."','$tempid','".$tabname."',
		'".$tabiconimg."','".$pid."/tabs/app_".$fbappid."','".$dbappid."','".$pubdate."','".$unpubdate."','".$becomefan."','".$ravealimg."','".$autowinner."',
                '".$winnercorrectans."','".$competitionenddate."','".$comadminemail."')";
        }      
        $this->db->query($qry4);        
        //echo "<pre>";print_r($res1[0]); echo "</pre>";
    }
    public function loadtempvalues($val_id,$ftype)
    {   
        if($ftype=='quizans')
        {
            $query =  $this->db->query("Select optiontxt from app_quizoptions where id=".$val_id."");
            return $query->result_array();
        }
        else if($ftype=='quizhead' || $ftype=='quizdes')
        {
            $query = $this->db->query("Select qheading,qdescription from app_quiz where id=".$val_id."");
            return $query->result_array();
        }
        else
        {
            $query = $this->db->query("select value from apptemp_fieldsvalue where id=$val_id");
            return $query->result_array();
        }        
    } 
	
    public function doupdatetempvalues($valimgname)
    { 	  
        $valimgname = $valimgname;
        $val_id = $this->input->post('val_id');
        $ftype = $this->input->post('ftype');
        $tselect = $this->input->post('tselect');
        $value = addslashes($this->input->post('value'));
        //echo $val_id."<br>".$ftype."<br>".$tselect."<br><br><br><br>";

        if($ftype=='quizhead')
        {
            $qry = "Update app_quiz set qheading='".$value."' where id=".$val_id."";
        }
        if($ftype=='quizdes')
        {
            $qry = "Update app_quiz set qdescription='".$value."' where id=".$val_id."";
        }
        if($ftype=='quizans')
        {
            $qry = "Update app_quizoptions set optiontxt='".$value."' where id=".$val_id."";
        }
        if(in_array($ftype,array(1,2)))
        {
            $qry = "Update apptemp_fieldsvalue set value='".$value."' where id=".$val_id."";
        }
        if($ftype==3)
        {
            $qry = "Update apptemp_fieldsvalue set value='".$valimgname."' where id=".$val_id."";
        }                
        $this->db->query($qry);
    } 
    public function do_updateabout()
    {
        $pid = $this->session->userdata('pid');
        $ptoken = $this->session->userdata('ptoken');
        try
        {
            $data = array( 
                'access_token' => $ptoken,
                'about' => $this->input->post('abouttxt')
            );
            $this->facebook->api($pid,'POST',$data);
        }catch(FacebookApiException $e)
        {
            error_log($e);
        }
    }     
    public function do_setcoverpic($pic)
    {
        $user = $this->session->userdata('fbuserid');
        $pid = $this->session->userdata('pid');
        $ptoken = $this->session->userdata('ptoken');
        
        $this->facebook->setFileUploadSupport(true);
	$file = $pic;	
	$full_image_path = realpath("images/imglib/".$user."/".$file);
        try
        {
            $args = array( 
                'access_token' => $ptoken,
                'image' => '@'.$full_image_path
            );
            $data = $this->facebook->api("/".$pid."/photos",'post',$args);
            $pictue = $this->facebook->api('/'.$data['id']);				
            
            $cover_args =
                array(
                    "access_token" => $ptoken,
                    "cover" => $pictue['id']
            );
            $this->facebook->api("/".$pid."/",'post', $cover_args);
        }catch(FacebookApiException $e)
        {
            //var_dump($e);
            error_log($e);
            //exit();
        }
    }  
    
    public function updatetabcontent($tabicon,$ravealimage)
    {
        $ptoken = $this->session->userdata('ptoken');
        $appid_url = $this->input->post('appid_url');
        
        try
        {
            $data = array( 
                'access_token' => $ptoken,
                'custom_name' => $this->input->post('tabname')
            );
            $this->facebook->api($appid_url,'post',$data);
            
        }catch(FacebookApiException $e)
        {
            error_log($e);
        }
        
        if(!empty($tabicon))
        {
            $this->facebook->setFileUploadSupport(true);
            $full_image_path = realpath('images/tabicons/'.$tabicon);
            try
            {
                $args = array( 
                    'access_token' => $ptoken,
                    'custom_image' => '@' . $full_image_path,
                );
                $this->facebook->api($appid_url,'post',$args);

            }catch(FacebookApiException $e)
            {
                error_log($e);
            }
        }
    }     
    
    public function dodelltab($lid,$tempid,$fbappid,$dbappid)
    {   
        $pid = $this->session->userdata("pid");
        
        $this->db->query("Update installed_apps set isdell=1 where id='".$lid."'");
        $this->db->query("Update apptemp_fieldsvalue set isdell=1 where fb_appid=$fbappid and pid=$pid");
        if($dbappid==2)
        {
            $this->db->query("Update app_quiz set isdell=1 where fb_appid=$fbappid and pid=$pid");
            $this->db->query("Update app_quizoptions set isdell=1 where fb_appid=$fbappid and pid=$pid");
            $this->db->query("Update appquiz_result set isdell=1 where fb_appid=$fbappid and pid=$pid");
        }
        if(in_array($dbappid, array(4,5)))
        {
            $this->db->query("Update gallery_appimgs set isdell=1 where fb_appid=$fbappid and pid=$pid");
            $this->db->query("Update gallery_appimgsvotes set isdell=1 where fb_appid=$fbappid and pid=$pid");
        }
        $this->session->set_userdata('INF_MSG','Tab Deleted Successfully');
    }
    
    public function do_genrate_csv($pid,$fbappid,$tempid)
    {
        
        $dbappid = $this->session->userdata('dbappid');
        $this->load->helper('download');
        //define separator (defines columns in excel & tabs in word) 
        
        if($dbappid==2)
        {
            $sep = ","; //tabbed character 
            $fp = fopen('images/participating-visitors-data.csv', "w"); 
            $schema_insert = "";
            $schema_insert_rows = ""; 

            //start of adding column names as names of MySQL fields 
            $headings = "Name".$sep."Email".$sep."Address".$sep."Phone".$sep."Correct Answer".$sep."Correct Answer Text".$sep."IP Address".$sep."Datetime\r\n";
            fwrite($fp, $headings);

            $query = $this->db->query("Select * from appquiz_result where pid=$pid and tempid=$tempid and fb_appid=$fbappid and isdell=0");
            $result = $query->result_array();
            foreach ($result as $row)
            {
                //echo "<pre>"; print_r($row); echo "</pre><br><br>";
                $query1 = $this->db->query("Select id,optiontxt from app_quizoptions where questionid=".$row['qid']." and is_true=1 and isdell=0");
                $result1 = $query1->result_array();
                $rz = $result1[0];
                $data =  $row['name'].$sep.$row['email'].$sep.$row['address'].$sep.$row['phone'].$sep.($row['option']==$rz['id'] ? "Yes" : 'No').$sep.preg_replace('/[.,]/', '', $sep.$rz['optiontxt']) .$sep.$row['ipaddress'].$sep.$row['datetime']."\r\n"; //data
                fwrite($fp, $data);
            }
            $fc = fclose($fp);
            $fdata = $data = file_get_contents('images/participating-visitors-data.csv');
        }
        if(in_array($dbappid, array(4,5)))
        {
                ///////////////////////////
                $query1 = $this->db->query("SELECT i.id,i.picture,i.pid FROM gallery_appimgs i WHERE i.active=1 AND i.pid=".$pid." and i.fb_appid=$fbappid AND i.tempid=".$tempid." and i.isdell=0 ");
                $result1 = $query1->result_array();
                //$rzz = $result1;
                
                //define separator (defines columns in excel & tabs in word) 
                $sep = ","; //tabbed character 
                $csvfile = 'images/participating-visitors-data.csv';
                $fp = fopen($csvfile, "w"); 
                $schema_insert = "";
                $schema_insert_rows = ""; 

                //start of adding column names as names of MySQL fields 
                $headings = "Picture Name".$sep."Name".$sep."Email".$sep."IP Address"."\r\n";
                fwrite($fp, $headings);
                $lstpic = "";
                foreach($result1 as $rz)
                {                    
                    //echo "<br><pre>"; print_r($rz); echo "<pre>";
                    $query2 = $this->db->query("SELECT * FROM gallery_appimgsvotes WHERE picid=".$rz['id']." ");
                    $result2 = $query2->result_array();
                    //echo ($lstpic==$rz['picture'] ? '2' : '1')."<br>";
                    //echo $rz['picture']." - > lstpic". $lstpic."<br>";
                    $current_pic = "";
                    foreach ($result2 as $rz2)
                    {
                        if(!empty($rz2['name']))
                        {
                            $data =  $rz['picture'].$sep.$rz2['name'].$sep.$rz2['email'].$sep.$rz2['ip']."\r\n"; //data
                            fwrite($fp, $data);
                        }
                        
                    }
                }
                
                $fc = fclose($fp);
            //////////////////////////
        }
        
        if($dbappid==6)
        {
            ///////////////////////////
            $query1 = $this->db->query("Select * from chrismassapp_subpgvalue where pid=$pid and fb_appid=$fbappid and tempid=$tempid and subpgtype=2");
            $result1 = $query1->result_array();
            //$rzz = $result1;

            //define separator (defines columns in excel & tabs in word) 
            $sep = ","; //tabbed character 
            $csvfile = 'images/participating-visitors-data.csv';
            $fp = fopen($csvfile, "w"); 
            $schema_insert = "";
            $schema_insert_rows = ""; 

            //start of adding column names as names of MySQL fields 
            $headings = "Competition Name".$sep."Name".$sep."Email"."\r\n";
            fwrite($fp, $headings);
            $lstpic = "";
            foreach($result1 as $rz)
            {                    
                $query2 = $this->db->query("SELECT * FROM  chrismassapp_competition_vistors WHERE competition_id=".$rz['id']." ");
                $result2 = $query2->result_array();
                
                foreach ($result2 as $rz2)
                {
                    $data =  strip_tags($rz['rheading'],'').$sep.$rz2['name'].$sep.$rz2['email']."\r\n"; //data
                    fwrite($fp, $data);
                }
            }
            $fc = fclose($fp);
            //////////////////////////
        }
        
        $fdata = $data = file_get_contents('images/participating-visitors-data.csv');
        force_download('images/participating-visitors-data.csv', $fdata);
        exit();       
    }     
    
    public function hidequizoption($val_id)
    {
        $this->db->query("Update app_quizoptions set is_hide= not is_hide where id='".$val_id."'");
    }
    
    public function galleryapp_getpic($tempid,$pid)
    {
         $query = $this->db->query("Select * from gallery_appimgs pid=$pid and tempid=$tempid and isdell=0");
         return $query->result_array();
    }
    public function do_galleryapp_pactions($id,$action,$mode)
    {
        $picture = (isset($_REQUEST['picture']) ? base64_decode($_REQUEST['picture']) : '' );
        if($action=="do")
        {
            $query = $this->db->query("Update gallery_appimgs set active=1 where id=$id");
        }
        if($action=="dell")
        {
            $query = $this->db->query("delete from  gallery_appimgs where id=$id");
            if($query)
            {
                try{
                    if(file_exists('images/images/galleryimages/'.$picture))
                    {
                        unlink('images/images/galleryimages/'.$picture);
                    }    
                } catch (Exception $e) {
                    log_message($e->getMessage());
                }
                
            }
        }
    }
    
    public function do_galleryapp_adminpicupload($image)
    {
        $pid = $this->session->userdata('pid');
        $tempid = $this->session->userdata('tempid');
        $fbappid = $this->session->userdata('fbappid');
        
        $name = (isset($_REQUEST['name']) ? $_REQUEST['name'] : '');
        $email = (isset($_REQUEST['email']) ? $_REQUEST['email'] : '');
        $age = (isset($_REQUEST['age']) ? $_REQUEST['age'] : '');
        $age = (isset($_REQUEST['age']) ? $_REQUEST['age'] : '');
        $image = $image;
        $text = (isset($_REQUEST['text']) ? $_REQUEST['text'] : '');
        $ip= $_SERVER['REMOTE_ADDR']; 
        
        $qry = "INSERT INTO gallery_appimgs (picture, pid, name, email, age, imgtxt, tempid, ip, fb_appid , active) VALUES ('".$image."','".$pid."','".$name."','".$email."','".$age."','".$text."','".$tempid."','".$ip."','".$fbappid."' , 1)";
        $this->db->query($qry);
    }
   
    public function gettempdata_nsettings($pid,$fbappid,$dbappid)
    {
        $rzlt1 = "";$rzlt2 = "";$rzlt3 = "";$rzlt4 = "";
        $qry1 = "Select * from installed_apps where pid=$pid and fbappid=$fbappid and isdell=0";
        $query1 =   $this->db->query($qry1);
        $rzlt1 = $query1->result_array();
        
        $qry2 = "Select * from apptemp_fieldsvalue where pid=$pid and fb_appid=$fbappid and isdell=0";        
        $query2 =   $this->db->query($qry2);
        $rzlt2 = $query2->result_array();
        
        if($dbappid==2)
        {            
            $qry3 = "Select * from app_quiz where pid=$pid and fb_appid=$fbappid and isdell=0";
            $query3 =   $this->db->query($qry3);
            $getquizdata = $query3->result_array();
            $quizrz = $getquizdata[0];
            
            $qry4 = "Select * from app_quizoptions where pid=$pid and fb_appid=$fbappid and questionid=".$quizrz['id']." and isdell=0";
            $query4 =   $this->db->query($qry4);
            $quizoptions = $query4->result_array();
            
            
            $rzlt3 = array(
              'quiz'=>$quizrz,
              'quizoptions'=>$quizoptions
            );
        }
        
        if(in_array($dbappid, array(5)))
        {
            $qry5 = "Select * from gallery_appimgs where pid=$pid and fb_appid=$fbappid and isdell=0";
            $query5 =   $this->db->query($qry5);
            $rzlt4 = $query5->result_array();
        }
        
        return array(
            'settings_arrg'=>$rzlt1,
            'tempdata_arrg'=>$rzlt2,
            'quizdata_arrg'=>$rzlt3,
            'gallerydata_arrg'=>$rzlt4,
        );
        
        //echo "<pre>"; print_r($rzlt2); echo "</pre>";exit();
    }
    
    public function cloneapp_data($data)
    {
        $pid = $this->session->userdata('pid');
        $ptoken = $this->session->userdata('ptoken');
        $tempid = $this->session->userdata('tempid');
        $fbappid = $this->session->userdata("fbappid");
        $fbappsecret = $this->session->userdata("fbappsecret");        
        $fbuserid = $this->session->userdata("fbuserid");
        $fbuaccesstoken= $this->session->userdata("fbuaccesstoken");
        $dbappid = $this->session->userdata("dbappid");
        
        $insdata = $data['settings_arrg'][0];
        $tempdata = $data['tempdata_arrg'];
        
        
        foreach($tempdata as $vdata)
        {
            $value  = addslashes($vdata['value']);
            $qry1 = "INSERT INTO apptemp_fieldsvalue 
            (value,fieldid,pid,tempid,fb_appid)values
            ('".$value."','".$vdata['fieldid']."','".$pid."','".$tempid."',$fbappid)";            
            $this->db->query($qry1);
        }
        
        $qry2 = "INSERT into installed_apps 
        (userid,pid,fbappid,fbappsecret,uaccess_token,paccess_token,tempid,tabname,tabicon,appid_url,dbappid,published,
        unpublish,becomefan,ravealimg,autowinner,winnercorrectans,competitionenddate,comadminemail)
        values 
        ('".$fbuserid."','".$pid."','".$fbappid."','".$fbappsecret."','".$fbuaccesstoken."','".$ptoken."','$tempid',
         '".$insdata['tabname']."','".$insdata['tabicon']."','".$pid."/tabs/app_".$fbappid."','".$dbappid."','".date("Y-m-d H:i:s", time()+1440*60)."',
         '".date("Y-m-d H:i:s", time()+14400*60)."','".$insdata['becomefan']."','".$insdata['ravealimg']."','".$insdata['autowinner']."',
         '".$insdata['winnercorrectans']."','".$insdata['competitionenddate']."','".$insdata['comadminemail']."'
         )";
        $this->db->query($qry2);
        
        if($dbappid==2)
        {
            $qdata = $data['quizdata_arrg']['quiz'];
            $opdata = $data['quizdata_arrg']['quizoptions'];
            
            $sql = "INSERT into app_quiz (qheading,qdescription,tempid,pid,userid,fb_appid) values 
            ('".$qdata['qheading']."','".$qdata['qdescription']."',".$tempid.",".$pid.",".$fbuserid.",$fbappid)";
            $ex = $this->db->query($sql);
            if($ex)
            {
                $linsid = $this->db->insert_id();
                foreach($opdata as $optdata)
                {
                    $sql2 = "INSERT into app_quizoptions (optiontxt,questionid,pid,tempid,is_true,fb_appid) values 
                    ('".$optdata['optiontxt']."','".$linsid."','".$pid."','".$tempid."','".$optdata['is_true']."',$fbappid)";
                    $this->db->query($sql2);
                }
            }
        }
        
        if(in_array($dbappid, array(5)))
        {
            $getgdata = $data['gallerydata_arrg'];
            foreach($getgdata as $gdata)
            {
                $qry3 = "INSERT INTO gallery_appimgs 
                (picture, pid,name,email,age,imgtxt,tempid,ip,fb_appid,active) VALUES 
                ('".$gdata['picture']."','".$pid."','".$gdata['name']."','".$gdata['email']."','".$gdata['age']."',
                 '".$gdata['imgtxt']."','".$tempid."','".$gdata['ip']."','".$fbappid."' ,'".$gdata['active']."')";
                $this->db->query($qry3);
            }
        }
    }
    
    public function chirsmas_docopysubpgdata($subpgid)
    {
        $pid = $this->session->userdata('pid');
        $tempid = $this->session->userdata('tempid');
        $fbappid = $this->session->userdata("fbappid");
        $fbuserid = $this->session->userdata("fbuserid");
        
        $subpgday = $_REQUEST['subpgday'];
        //echo $subpgid."<br>".$subpgid;
        
        $qry1 = "Select * from chrismassapp_subpgdata where id=$subpgid";
        $query1 = $this->db->query($qry1);
        $getpgdefaultval = $query1->result_array();
        $pgval = $getpgdefaultval[0];
        //echo "<pre>"; print_r($getpgdefaultval); echo "</pre>";
        //var_dump($getpgdefaultval);
        
        $countqry = "Select id from chrismassapp_subpgvalue where pid=$pid and fb_appid=$fbappid and linkdate='".$subpgday."' and isdell=0";
        $countexe = $this->db->query($countqry);
        $getcountval = $countexe->result_array();
        
        if(count($getcountval)==0)
        {
            $qry2 = "INSERT INTO chrismassapp_subpgvalue
            (mainimage,imgcaption,beforeprice,afterprice,rheading,rsubheading,description,buytxt,buytxtlink,leftdaytxt,
            labletxt1,txtfieldvalue1,labletxt2,txtfieldvalue2,submitbtntxt,thankyoutxt,sharebtntoptxt,shareimg,
            shareimglink,pid,tempid,fb_appid,subpgtype,linkdate) VALUES 
            ('".$pgval['mainimage']."','".$pgval['imgcaption']."','".$pgval['beforeprice']."','".$pgval['afterprice']."',
            '".$pgval['rheading']."','".$pgval['rsubheading']."','".$pgval['description']."','".$pgval['buytxt']."',
            '".$pgval['buytxtlink']."','".$pgval['leftdaytxt']."','".$pgval['labletxt1']."','".$pgval['txtfieldvalue1']."',
            '".$pgval['labletxt2']."','".$pgval['txtfieldvalue2']."','".$pgval['submitbtntxt']."','".$pgval['thankyoutxt']."',
            '".$pgval['sharebtntoptxt']."','".$pgval['shareimg']."','".$pgval['shareimglink']."',
            $pid,$tempid,$fbappid,'".$subpgid."','".$subpgday."'
            )";
            $this->db->query($qry2);
            $pgvalid = $this->db->insert_id();
            
            $qry3 = "Select * from chrismassapp_subpgvalue where id=$pgvalid";
            $query3 = $this->db->query($qry3);
            $returdata = $query3->result_array();
            $returdata = $returdata[0];
            
            $subpgsessiondata = array(
                'pgvalid'  => $pgvalid,
                'mainimage'  => $returdata['mainimage'],
                'imgcaption'  => $returdata['imgcaption'],
                'beforeprice'  => $returdata['beforeprice'],
                'afterprice'  => $returdata['afterprice'],
                'rheading'  => $returdata['rheading'],
                'rsubheading'  => $returdata['rsubheading'],
                'description'  => $returdata['description'],
                'buytxt'  => $returdata['buytxt'],
                'buytxtlink'  => $returdata['buytxtlink'],
                'leftdaytxt'  => $returdata['leftdaytxt'],
                'labletxt1'  => $returdata['labletxt1'],
                'txtfieldvalue1'  => $returdata['txtfieldvalue1'],
                'labletxt2'  => $returdata['labletxt2'],
                'txtfieldvalue2'  => $returdata['txtfieldvalue2'],
                'submitbtntxt'  => $returdata['submitbtntxt'],
                'thankyoutxt'  => $returdata['thankyoutxt'],
                'sharebtntoptxt'  => $returdata['sharebtntoptxt'],
                'shareimg'  => $returdata['shareimg'],
                'shareimglink'  => $returdata['shareimglink'],
                'subpgtype'  => $returdata['subpgtype'],
                'linkdate'  => $returdata['linkdate'],
                'subpgday'  => $returdata['linkdate'],
            );
            $this->session->set_userdata($subpgsessiondata);
        }
        else
        {
            $pgvalid = $getcountval[0]['id'];
            
            $qry3 = "Select * from chrismassapp_subpgvalue where id=$pgvalid";
            $query3 = $this->db->query($qry3);
            $returdata = $query3->result_array();
            $returdata = $returdata[0];
            
            $subpgsessiondata = array(
                'pgvalid'  => $pgvalid,
                'mainimage'  => $returdata['mainimage'],
                'imgcaption'  => $returdata['imgcaption'],
                'beforeprice'  => $returdata['beforeprice'],
                'afterprice'  => $returdata['afterprice'],
                'rheading'  => $returdata['rheading'],
                'rsubheading'  => $returdata['rsubheading'],
                'description'  => $returdata['description'],
                'buytxt'  => $returdata['buytxt'],
                'buytxtlink'  => $returdata['buytxtlink'],
                'leftdaytxt'  => $returdata['leftdaytxt'],
                'labletxt1'  => $returdata['labletxt1'],
                'txtfieldvalue1'  => $returdata['txtfieldvalue1'],
                'labletxt2'  => $returdata['labletxt2'],
                'txtfieldvalue2'  => $returdata['txtfieldvalue2'],
                'submitbtntxt'  => $returdata['submitbtntxt'],
                'thankyoutxt'  => $returdata['thankyoutxt'],
                'sharebtntoptxt'  => $returdata['sharebtntoptxt'],
                'shareimg'  => $returdata['shareimg'],
                'shareimglink'  => $returdata['shareimglink'],
                'subpgtype'  => $returdata['subpgtype'],
                'linkdate'  => $returdata['linkdate'],
                'subpgday'  => $returdata['linkdate'],
            );
            $this->session->set_userdata($subpgsessiondata);
        }
    }
    
    public function chrismas_update_subpgval($valimgname)
    {
        $fid = $_REQUEST['fid'];
        $fname = $_REQUEST['fname'];
        $frmsubvalue = (isset($_REQUEST['frmsubvalue'])? $_REQUEST['frmsubvalue'] : '');
        $ftype = $_REQUEST['ftype'];
        if($ftype==3)
        {
            $frmsubvalue = $valimgname;
        }
        
        $qry = "Update chrismassapp_subpgvalue set $fname='".$frmsubvalue."' where id=$fid";
        $this->db->query($qry);
    }
    public function chirsmas_dellsubpg()
    {
        $id = $_REQUEST['pgvalid'];
        $qry = "Delete from chrismassapp_subpgvalue where id=$id";
        $this->db->query($qry);
    }
    
    public function do_chrismas_app_updtsettings($tabid)
    {
        $valid = $_REQUEST['valid'];
        $fvalue = $_REQUEST['fvalue'];
        $qry = "Update apptemp_fieldsvalue set value='".$fvalue."' where id=$valid";
        $this->db->query($qry);
    }

    public function updatequizdata($valimgname)
    { 	  
        $valimgname = $valimgname;
        $fid = $_REQUEST['fid'];
        $ftype =$_REQUEST['ftype'];
        $tbl = $_REQUEST['tbl'];
        $fname=$_REQUEST['fname'];
        if($tbl==1&&$ftype==2)
        {
           $fval = $_REQUEST['fval'];
            $qry = "Update app_quizoptions set ".$fname."='".$fval."' where id=".$fid."";
        }
        else if($tbl==0&&$ftype==1)
        {
            $fval = $_REQUEST['fval'];
            $qry = "Update app_quiz set ".$fname."='".$fval."' where id=".$fid."";
        }
        else
        {
            $qry = "Update app_quizoptions set ".$fname."='".$valimgname."' where id=".$fid."";
        }                
        $this->db->query($qry);
    }
    
}