<?php
class common extends CI_Model{
    
    public function __construct()
    {    
        $this->load->database();
        $this->load->helper('imagemgr');
        $this->load->library('bitly');
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
        
                                //create bitly links
        $gen_links = 'https://www.facebook.com/'.$pid.'?sk=app_'.$fbappid; 
        $bitlylink_url = $this->bitly->shorten($gen_links);
        
        
        $tabname = $this->input->post('tabname');
        $tabiconimg = $tabicons;
        $pubdte = $this->input->post('pubdate');
        list($month, $day, $year) = explode('/', $pubdte);
        $pubtim = $this->input->post('pubtime');
        $pubdate=$year.'-'.$month.'-'.$day.' '.$pubtim;
        $unpubdte = $this->input->post('unpubdate');
        list($month1, $day1, $year1) = explode('/', $unpubdte);
        $unpubtim = $this->input->post('unpubtime');
        $unpubdate=$year1.'-'.$month1.'-'.$day1.' '.$unpubtim;
        //var_dump($unpubdate);        die();
        $becomefan = $this->input->post('becomefan');
        $ravealimg = $ravealimage;
        $correctans = $this->input->post('correctans');
        $autowinner = $this->input->post('autowinner');
        $winnercorrectans = $this->input->post('winnercorrectans');
        $competitionenddte = $this->input->post('competitionenddate');
        list($month2, $day2, $year2) = explode('/', $competitionenddte);
        $compendtime = $this->input->post('compendtime');
        $competitionenddate=$year2.'-'.$month2.'-'.$day2.' '.$compendtime;
        $actionurl = $this->input->post('actionurl');
        $comadminemail = $this->input->post('comadminemail');
        
        //if(strtotime($unpubdate)<=strtotime($pubdate)){ $this->session->set_userdata('ERR_MSG','Unpublish date must be greater than publish date'); redirect('page/app_settings/');}
        //if(strtotime($competitionenddate)<=strtotime(date('Y-m-d G:i:s')) && !empty($competitionenddate)){ $this->session->set_userdata('ERR_MSG','Competition Date must be greater than tody'); redirect('page/app_settings/');}
        
        $paneldb = $this->load->database("paneldb" , TRUE);
        $qry_user = "SELECT admin_publish FROM user WHERE facebook_id = '".$fbuserid."' ";
        $result_user = $paneldb->query($qry_user);
        $check_status = $result_user->result_array();
        
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
		competitionenddate='".$competitionenddate."',comadminemail='".$comadminemail."',bitly_link='".$bitlylink_url."' where id=".$recid." ";
        }
        else
        {
            if($check_status[0]['admin_publish'] == 1)
            {
            $qry4 = "INSERT into installed_apps (userid,pid,fbappid,fbappsecret,uaccess_token,paccess_token,tempid,tabname,tabicon,appid_url,dbappid,published,unpublish,
		becomefan,ravealimg,autowinner,winnercorrectans,competitionenddate,comadminemail,isdell,admin_unpublish,bitly_link) values 
		('".$fbuserid."','".$pid."','".$fbappid."','".$fbappsecret."','".$fbuaccesstoken."','".$ptoken."','$tempid','".$tabname."',
		'".$tabiconimg."','".$pid."/tabs/app_".$fbappid."','".$dbappid."','".$pubdate."','".$unpubdate."','".$becomefan."','".$ravealimg."','".$autowinner."',
                '".$winnercorrectans."','".$competitionenddate."','".$comadminemail."',0,1,'".$bitlylink_url."')";
        
            }
            else
            {
                $qry4 = "INSERT into installed_apps (userid,pid,fbappid,fbappsecret,uaccess_token,paccess_token,tempid,tabname,tabicon,appid_url,dbappid,published,unpublish,
		becomefan,ravealimg,autowinner,winnercorrectans,competitionenddate,comadminemail,isdell,admin_unpublish,bitly_link) values 
		('".$fbuserid."','".$pid."','".$fbappid."','".$fbappsecret."','".$fbuaccesstoken."','".$ptoken."','$tempid','".$tabname."',
		'".$tabiconimg."','".$pid."/tabs/app_".$fbappid."','".$dbappid."','".$pubdate."','".$unpubdate."','".$becomefan."','".$ravealimg."','".$autowinner."',
                '".$winnercorrectans."','".$competitionenddate."','".$comadminemail."',0,0,'".$bitlylink_url."')";
            }
        } 
        //var_dump($qry4);        die();
        $this->db->query($qry4);
        if($dbappid==10)
            {
                $qryinsta = "Update instg_users set isactive=1 where fb_userid='".$fbuserid."' AND tempid='".$tempid."' AND pid='".$pid."' AND fbappid='".$fbappid."'";
                $this->db->query($qryinsta);
            }
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
        else if($ftype==4)
        {
            $query = $this->db->query("Select temp_picture from app_template where id=".$val_id."");
            return $query->result_array();
        }
        else if($ftype==5)
        {
            $query = $this->db->query("Select template_subtitle from app_template where id=".$val_id."");
            return $query->result_array();
        }
        else if($ftype==6)
        {
            $query = $this->db->query("Select temp_bgcolor from app_template where id=".$val_id."");
            return $query->result_array();
        }
        else
        {
            $query = $this->db->query("select value from apptemp_fieldsvalue where id=$val_id");
            return $query->result_array();
        }        
    } 
	
    public function doupdatetempvalues($valimgname,$newbigimg)
    { 	  
        $valimgname = $valimgname;
        $newbigimg=$newbigimg;
        $val_id1 = $this->input->post('val_id');
        $val_id=str_replace("'", "\\'", $val_id1);
        $ftype = $this->input->post('ftype');
        $tselect = $this->input->post('tselect');
        $value = addslashes($this->input->post('value'));
        $fname = $this->input->post('fname');
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
        if($ftype==4)
        {
            $qry = "Update app_template set temp_picture='".$valimgname."',pic_preview='".$newbigimg."' where id=".$val_id."";
        }
        if($ftype==5)
        {
            $qry = "Update app_template set template_subtitle='".$value."' where id=".$val_id."";
        }
        if($ftype==6)
        {
            $qry = "Update app_template set temp_bgcolor='".$value."' where id=".$val_id."";
        }
        if($ftype=='quizimg')
        {
            $qry = "Update app_quizoptions set ".$fname."='".$valimgname."' where id=".$val_id."";
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
        $full_image_pth = "https://apps2.cuecow.com/images/imglib/".$user."/".$file;
        image_resize($file,850,500,$full_image_pth);
        $full_image_path = realpath("images/850X500/".$file);
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
            var_dump($e);
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
            //$full_image_path = realpath('images/tabicons/'.$tabicon);
            $folderPath = "https://apps2.cuecow.com/images/tabicons/".$tabicon;
            $full_image_path_flder = image_resize($tabicon,111,74,$folderPath);
            $full_image_path=base_url().$full_image_path_flder;
            try
            {
                $args = array( 
                    'access_token' => $ptoken,
                    'custom_image_url' => $full_image_path,
                );
                $this->facebook->api($appid_url,'post',$args);

            }catch(FacebookApiException $e)
            {
                error_log($e);
            }
        }
    }     
  
 public function do_csvfilecrone()
    {
        $date = date('Y-m-d G:i:s');
        $crnqry = "Select * from installed_apps where competitionenddate < '$date' and competitionenddate<>'0000-00-00 00:00:00' and dbappid=2 and mailflag=0 and isdell=0";
        $query = $this->db->query($crnqry);
        $result = $query->result_array();
        if(count($result))
        {
            foreach ($result as $row)
            {    
            $paneldb = $this->load->database("paneldb" , TRUE); 
            $qry5 = "Select * from user where admin_id=1 and  facebook_id=".$row['userid']."";
            $query5 = $paneldb->query($qry5);
            $getrz5 = $query5->result_array();
                if(count($getrz5)>0)
                    {
                    $account_name=$getrz5[0]['account_name'];
                    }else
                    {
                    $account_name="";    
                    }
                 // get app name
                $qry1 = $this->db->query("Select app_type from apps_list where id=".$row['dbappid'].""); 
                $apptype = $qry1->result_array();
                $app_type= $apptype[0]['app_type'];
                $app_name= $row['tabname'];
                //echo "<pre>"; print_r($row); echo "</pre><br><br>";
                $query1 = $this->db->query("Select id,optiontxt from app_quizoptions where pid=".$row['pid']." and tempid=".$row['tempid']." and fb_appid=".$row['fbappid']." and is_true=1 and isdell=0");  //$row['qid']
                $result1 = $query1->result_array();
                $rz = $result1[0];
                $query4="Select * from appquiz_result where pid=".$row['pid']." and tempid=".$row['tempid']." and fb_appid=".$row['fbappid']." and isdell=0";
                $query5 = $this->db->query("Select * from appquiz_result where pid=".$row['pid']." and tempid=".$row['tempid']." and fb_appid=".$row['fbappid']." and isdell=0");  //$row['qid']
                $result5 = $query5->result_array();
                if(count($result5)>0)
                {

                    //define separator (defines columns in excel & tabs in word) 
                    $sep = ","; //tabbed character 
                    $csvfile = 'images/participating-visitors-data.csv';
                    $fp = fopen($csvfile, "w"); 
                    $schema_insert = "";
                    $schema_insert_rows = ""; 

                    //start of adding column names as names of MySQL fields 
                    $headings = "Name".$sep."Email".$sep."Phone".$sep."Correct Answer".$sep."Correct Answer Text".$sep."IP Address".$sep."Datetime".$sep."Address\r\n";
                    fwrite($fp, $headings);
                    for($k=0;$k<count($result5);$k++){  
                        $rz5 = $result5[$k];
                        $data =  $rz5['name'].$sep.$rz5['email'].$sep.'"'.$rz5['address'].'"'.$sep.$rz5['phone'].$sep.($rz5['option']==$rz['id'] ? "Yes" : 'No').$sep.preg_replace('/[.,]/', '', $sep.$rz['optiontxt']) .$sep.$rz5['ipaddress'].$sep.$rz5['datetime']."\r\n"; //data
                        fwrite($fp, $data);
                    }

                    $fc = fclose($fp);

                    $email_frm="info@apps.cuecow.com, CueCow Apps";
                    $email_to=$row['comadminemail'];
                    $email_cc="mhussain324@yahoo.com";
                    $subject="Cuecow Apps Competition Result";
                    $message="Find Attached Result file of your competition on Cuecow Apps <br>
                    --
                    <br>
                    This is an automated message from ".$account_name."";
                    $attach=$csvfile;
                    email_Mgr($email_frm,$email_to,$email_cc,$subject,$message,$attach,$account_name,$row['id'],$row['pid'],$row['tempid'],$row['fbappid'],$app_type,$app_name);
                }
            }
        }   
    }
    
    public function do_gallerycsvfilecrone()
    {
        $date = date('Y-m-d G:i:s');
        $crnqry2 = "Select * from installed_apps where competitionenddate < '$date' and competitionenddate<>'0000-00-00 00:00:00' and mailflag=0 and isdell=0";
        //echo $crnqry2;
        $query = $this->db->query($crnqry2);
        $result = $query->result_array();
        if(count($result)>0)
        {
        try {
            foreach ($result as $row)
            {
                //echo "<pre>"; print_r($row); echo "</pre><br><br>";
                //$query1 = $this->db->query("SELECT i.id,i.picture,i.pid,iv.votecount FROM gallery_appimgs i INNER JOIN (SELECT picid,COUNT(picid) AS votecount  FROM gallery_appimgsvotes GROUP BY picid ) AS iv ON iv.picid = i.id WHERE i.active=1 AND i.pid=".$row['pid']." AND i.tempid=".$row['tempid']."");
                $query1 = $this->db->query("SELECT i.id,i.picture,i.pid FROM gallery_appimgs i WHERE i.active=1 AND i.pid=".$row['pid']." AND i.tempid=".$row['tempid']." AND i.fb_appid=".$row['fbappid']." and isdell=0");
                $result1 = $query1->result_array();
                //$rzz = $result1;
                 // get account mane
                $paneldb = $this->load->database("paneldb" , TRUE); 
                $qry5 = "Select * from user where admin_id=1 and  facebook_id=".$row['userid']."";
                $query5 = $paneldb->query($qry5);
                $getrz5 = $query5->result_array();
                    if(count($getrz5)>0)
                        {
                        $account_name=$getrz5[0]['account_name'];
                        }else
                        {
                        $account_name="";    
                        }    
                    // get app name
                $qry1 = $this->db->query("Select app_type from apps_list where id=".$row['dbappid'].""); 
                $apptype = $qry1->result_array();
                $app_type= $apptype[0]['app_type'];
                $app_name= $row['tabname'];
                //define separator (defines columns in excel & tabs in word) 
                $sep = ","; //tabbed character 
                $csvfile = 'images/participating-visitors-data.csv';
                $fp = fopen($csvfile, "w"); 
                $schema_insert = "";
                $schema_insert_rows = ""; 

                //start of adding column names as names of MySQL fields 
                $headings = "Picture URL".$sep."Name".$sep."Email".$sep."IP Address"."\r\n";
                fwrite($fp, $headings);
                $lstpic = "";
                foreach($result1 as $rz)
                {                    
                    //echo "<br><pre>"; print_r($rz); echo "<pre>";
                    $query2 = $this->db->query("SELECT * FROM gallery_appimgsvotes WHERE picid=".$rz['id']." and isdell=0");
                    $result2 = $query2->result_array();
                    //echo ($lstpic==$rz['picture'] ? '2' : '1')."<br>";
                    //echo $rz['picture']." - > lstpic". $lstpic."<br>";
                    $current_pic = "";
                    foreach ($result2 as $rz2)
                    {
                        //echo ($rz['picture']!=$lstpic ? '2' : '1')."<br>";
                        //echo $rz['picture']." - > lstpic". $lstpic."<br>";
                        if($current_pic == $rz['picture'])
                        {
                         $image_url = '';   
                        }
                        else
                        {
                            $current_pic = $rz['picture'];
                            $image_url = "https://apps2.cuecow.com/images/images/galleryimages/".$rz['picture'];
                        }
                        
                        $data =  $image_url.$sep.$rz2['name'].$sep.$rz2['email'].$sep.$rz2['ip']."\r\n"; //data
                        fwrite($fp, $data);
                    }
                    
                    //$lstpic = $rz['picture'];
                }
                //echo   "SELECT i.id,i.picture,i.pid,iv.votecount FROM gallery_appimgs i INNER JOIN (SELECT picid,COUNT(picid) AS votecount  FROM gallery_appimgsvotes GROUP BY picid ) AS iv ON iv.picid = i.id WHERE i.active=1 AND i.pid=".$row['pid']." AND i.tempid=".$row['tempid']."";
                //echo "<br><pre>"; print_r($rz); echo "<pre>";
                
                $fc = fclose($fp);

                $email_frm="info@apps.cuecow.com', 'CueCow Apps";
                $email_to=$row['comadminemail']; 
                $email_cc="mhussain654@gmail.com";
                //$this->email->bcc(' csv@cuecow.com');  //kim.hvidkjaer@gmail.com


                $subject="Cuecow Apps Competition Result";
                $message="Find Attached Result file of your competition on Cuecow Apps 
                --
                
                This is an automated message from ".$account_name."";	
                $attach=$csvfile;
                email_Mgr($email_frm,$email_to,$email_cc,$subject,$message,$attach,$account_name,$row['id'],$row['pid'],$row['tempid'],$row['fbappid'],$app_type,$app_name);
            }
        }catch (Exception $e) {
            $this->db->query("Insert into log_table (name,message,pid,addedtime) values ('CSV file Crone',' ".$e->getMessage()."','".$row['pid']."',now())");
            //echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
        }
    }    
    public function dodelltab($lid,$tempid,$fbappid,$dbappid)
    {   
        $pid = $this->session->userdata("pid");
        $qry = "Select * from installed_apps where id='".$lid."' and tempid=$tempid";
        $query = $this->db->query($qry);
        $rss = $query->result_array();
        if($rss[0]['flag']==1)
        {
        $this->facebook->setAccessToken($rss[0]['uaccess_token']);
        try{
            $del_args =
                array(
                    "access_token" => $rss[0]['paccess_token'],
                    );
                $this->facebook->api("/".$rss[0]['pid']."/tabs/app_".$rss[0]['fbappid']."",'delete',$del_args);
                    $this->db->query("Insert into log_table (name,message,pid,addedtime) values ('Publish Crone',' Tab Unpublish','".$rss[0]['pid']."',now())");
                    if($rss[0]['dbappid']==2)
                    {
                        $this->do_csvfilecrone();
                    }

                    if(in_array($rss[0]['dbappid'],array(4,5)))
                    {
                        $this->do_gallerycsvfilecrone();                        
                    } 
                    $this->db->query("Update installed_apps set flag=0 where id='".$lid."' and tempid=$tempid");
                    $this->db->query("Update installed_apps set isdell=1 where id='".$lid."' and tempid=$tempid");
                $this->db->query("Update apptemp_fieldsvalue set isdell=1 where fb_appid=$fbappid and pid=$pid and tempid=$tempid" );
                if($dbappid==2)
                {
                    $this->db->query("Update app_quiz set isdell=1 where fb_appid=$fbappid and pid=$pid and tempid=$tempid");
                    $this->db->query("Update app_quizoptions set isdell=1 where fb_appid=$fbappid and pid=$pid and tempid=$tempid");
                    $this->db->query("Update appquiz_result set isdell=1 where fb_appid=$fbappid and pid=$pid and tempid=$tempid");
                }
                if(in_array($dbappid, array(4,5)))
                {
                    $this->db->query("Update gallery_appimgs set isdell=1 where fb_appid=$fbappid and pid=$pid and tempid=$tempid");
                    $this->db->query("Update gallery_appimgsvotes set isdell=1 where fb_appid=$fbappid and pid=$pid and tempid=$tempid");
                }
                $this->session->set_userdata('INF_MSG','Tab Deleted Successfully');
            }catch(Exception $e){
                //echo "<br><pre>"; print_r($e); echo "</pre>";
            }
          }
          
            
    }
   public function ac_dodelltab($lid,$tempid,$fbappid,$dbappid)
   {
        $pid = $this->session->userdata("pid");
        $qry = "Select * from installed_apps where id='".$lid."'";
        $query = $this->db->query($qry);
        $rss = $query->result_array();
        if(count($rss)>0)
        {
        if($rss[0]['dbappid']==2)
            {
                $this->do_csvfilecrone();
            }

            if(in_array($rss[0]['dbappid'],array(4,5)))
            {
                $this->do_gallerycsvfilecrone();                        
            } 
        $this->db->query("Update installed_apps set flag=0 where id='".$lid."' and tempid=$tempid");
        $this->db->query("Update installed_apps set isdell=1 where id='".$lid."' and tempid=$tempid");
        $this->db->query("Update apptemp_fieldsvalue set isdell=1 where fb_appid=$fbappid and pid=$pid and tempid=$tempid");
        if($dbappid==2)
        {
            $this->db->query("Update app_quiz set isdell=1 where fb_appid=$fbappid and pid=$pid and tempid=$tempid");
            $this->db->query("Update app_quizoptions set isdell=1 where fb_appid=$fbappid and pid=$pid and tempid=$tempid");
            $this->db->query("Update appquiz_result set isdell=1 where fb_appid=$fbappid and pid=$pid and tempid=$tempid");
        }
        if(in_array($dbappid, array(4,5)))
        {
            $this->db->query("Update gallery_appimgs set isdell=1 where fb_appid=$fbappid and pid=$pid and tempid=$tempid");
            $this->db->query("Update gallery_appimgsvotes set isdell=1 where fb_appid=$fbappid and pid=$pid and tempid=$tempid");
        }
        $this->session->set_userdata('INF_MSG','Tab Deleted Successfully');
    }
  $this->session->set_userdata('INF_MSG','Facebook Tab Deleted Successfully');  
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
        //$fname = $_REQUEST['fname'];
        $fname = $_REQUEST['fname'];
        $frmsubvalue = (isset($_REQUEST['frmsubvalue'])? $_REQUEST['frmsubvalue'] : '');
        //$frmsubvalue = (isset($_REQUEST['value'])? $_REQUEST['value'] : '');
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
           $fvall = $_REQUEST['fval'];
           $fval=mysql_real_escape_string($fvall); 
            $qry = "Update app_quizoptions set ".$fname."='".$fval."' where id=".$fid."";
        }
        else if($tbl==0&&$ftype==1)
        {

            $fvall = $_REQUEST['fval'];
            $charactr = array("&","<br>");
            $replacewith   = array("","");
            $fval = str_replace($charactr, $replacewith, $fvall);
           
           //var_dump($fval); die();
            $qry = "Update app_quiz set ".$fname."='".$fval."' where id=".$fid."";
            //var_dump($qry); die();
        }
        else
        {
            $qry = "Update app_quizoptions set ".$fname."='".$valimgname."' where id=".$fid."";
        }                
        $this->db->query($qry);
    }
  /*
   * 
   */
 function check_same_appalready($pid,$fbappid,$fbuesrid)
 {
      $qryfrom_instaledapp = "Select * from installed_apps where pid='$pid' and fbappid='".$fbappid."' and userid='".$fbuesrid."' and isdell=0"; 
      $qry_instaledapp = $this->db->query($qryfrom_instaledapp);
      return $qry_instaledapp->result_array();    
 }    
   /*
    * 
    */ 
 function copy_to_other_wall($lid,$dbappid,$fbappid,$tempid,$pid,$fbuesrid,$selectedpage_arry)
    {
      $qryfrom_instaledapp = "Select * from installed_apps where pid='$pid' and id='".$lid."' and fbappid='".$fbappid."' and userid='".$fbuesrid."'and tempid='".$tempid."' and isdell=0"; 
      $qry_instaledapp = $this->db->query($qryfrom_instaledapp);
      $returdata = $qry_instaledapp->result_array();
      
      for($k=0;$k<count($selectedpage_arry);$k++)
      {
        $gen_links = 'https://www.facebook.com/'.$selectedpage_arry[$k]['pages']['pagid'].'?sk=app_'.$fbappid;
        $bitly_link = $this->bitly->shorten($gen_links);
        
        $qry4 = "INSERT into installed_apps (userid,pid,fbappid,fbappsecret,uaccess_token,paccess_token,tempid,tabname,tabicon,appid_url,dbappid,published,unpublish,
                  becomefan,ravealimg,autowinner,winnercorrectans,competitionenddate,comadminemail,isdell,bitly_link) values 
                  ('".$fbuesrid."','".$selectedpage_arry[$k]['pages']['pagid']."','".$fbappid."','".$returdata[0]['fbappsecret']."','".$returdata[0]['uaccess_token']."','".$selectedpage_arry[$k]['pages']['pagacctkon']."','$tempid','".$returdata[0]['tabname']."',
                  '".$returdata[0]['tabicon']."','".$selectedpage_arry[$k]['pages']['pagid']."/tabs/app_".$fbappid."','".$dbappid."','".$returdata[0]['published']."','".$returdata[0]['unpublish']."','".$returdata[0]['becomefan']."','".$returdata[0]['ravealimg']."','".$returdata[0]['autowinner']."',
                  '".$returdata[0]['winnercorrectans']."','".$returdata[0]['competitionenddate']."','".$returdata[0]['comadminemail']."','0','".$bitly_link."')";
        $this->db->query($qry4);
  /*
   * 
   */
              // Copy apptemp_fieldsvalue
        $qryfrom_fieldsvalue = "Select * from apptemp_fieldsvalue where pid='$pid' and fb_appid='".$fbappid."' and tempid='".$tempid."' and isdell=0"; 
        $qry_fieldsvalue = $this->db->query($qryfrom_fieldsvalue);
        $returdata2 = $qry_fieldsvalue->result_array();
        foreach($returdata2 as $returdata2)
            {
            $qry1 = "INSERT INTO apptemp_fieldsvalue 
                  (value,fieldid,pid,tempid,fb_appid)values
                  ('".$returdata2['value']."','".$returdata2['fieldid']."','".$selectedpage_arry[$k]['pages']['pagid']."','".$tempid."',$fbappid)";            
            $this->db->query($qry1);
            }
  /*
   * 
   */    
        // Copy Quiz data 
          if($dbappid==2)
          {
              $qryfrom_app_quizoptions = "Select * from app_quizoptions where pid='$pid' and fb_appid='".$fbappid."' and tempid='".$tempid."' and isdell=0"; 
              $qry_app_quizoptions = $this->db->query($qryfrom_app_quizoptions);
              $opdata = $qry_app_quizoptions->result_array();

              $qryfrom_app_quiz = "Select * from app_quiz where pid='$pid' and fb_appid='".$fbappid."' and tempid='".$tempid."' and isdell=0"; 
              $qry_app_quiz = $this->db->query($qryfrom_app_quiz);
              $returdata3 = $qry_app_quiz->result_array();

              $sql = "INSERT into app_quiz (qheading,qdescription,tempid,pid,userid,fb_appid) values 
              ('".$returdata3[0]['qheading']."','".$returdata3[0]['qdescription']."',".$tempid.",".$selectedpage_arry[$k]['pages']['pagid'].",".$fbuesrid.",$fbappid)";
              $ex = $this->db->query($sql);
              if($ex)
              {
                  $linsid = $this->db->insert_id();
                  foreach($opdata as $optdata)
                  {
                      $sql2 = "INSERT into app_quizoptions (optiontxt,questionid,pid,tempid,is_true,fb_appid) values 
                      ('".$optdata['optiontxt']."','".$linsid."','".$selectedpage_arry[$k]['pages']['pagid']."','".$tempid."','".$optdata['is_true']."',$fbappid)";
                      $this->db->query($sql2);
                  }
              }   
          }

  /*
   * 
   */
        if(in_array($dbappid, array(4,5)))
        {
          $qryfrom_gallery_appimgs = "Select * from gallery_appimgs where pid='$pid' and fb_appid='".$fbappid."' and tempid='".$tempid."' and isdell=0"; 
          $qry_gallery_appimgs = $this->db->query($qryfrom_gallery_appimgs);
          $getgdata = $qry_gallery_appimgs->result_array();

              foreach($getgdata as $gdata)
              {
                  $qry3 = "INSERT INTO gallery_appimgs 
                  (picture, pid,name,email,age,imgtxt,tempid,ip,fb_appid,active) VALUES 
                  ('".$gdata['picture']."','".$selectedpage_arry[$k]['pages']['pagid']."','".$gdata['name']."','".$gdata['email']."','".$gdata['age']."',
                   '".$gdata['imgtxt']."','".$tempid."','".$gdata['ip']."','".$fbappid."' ,'".$gdata['active']."')";
                  $this->db->query($qry3);
              }
        }
      if($dbappid==6)
        {
          $countqry = "Select * from chrismassapp_subpgvalue where pid=$pid and fb_appid=$fbappid and isdell=0";
          $countexe = $this->db->query($countqry);
          $pgval = $countexe->result_array();

            $qry2 = "INSERT INTO chrismassapp_subpgvalue
            (mainimage,imgcaption,beforeprice,afterprice,rheading,rsubheading,description,buytxt,buytxtlink,leftdaytxt,
            labletxt1,txtfieldvalue1,labletxt2,txtfieldvalue2,submitbtntxt,thankyoutxt,sharebtntoptxt,shareimg,
            shareimglink,pid,tempid,fb_appid,subpgtype,linkdate) VALUES 
            ('".$pgval[0]['mainimage']."','".$pgval[0]['imgcaption']."','".$pgval[0]['beforeprice']."','".$pgval[0]['afterprice']."',
            '".$pgval[0]['rheading']."','".$pgval[0]['rsubheading']."','".$pgval[0]['description']."','".$pgval[0]['buytxt']."',
            '".$pgval[0]['buytxtlink']."','".$pgval[0]['leftdaytxt']."','".$pgval[0]['labletxt1']."','".$pgval[0]['txtfieldvalue1']."',
            '".$pgval[0]['labletxt2']."','".$pgval[0]['txtfieldvalue2']."','".$pgval[0]['submitbtntxt']."','".$pgval[0]['thankyoutxt']."',
            '".$pgval[0]['sharebtntoptxt']."','".$pgval[0]['shareimg']."','".$pgval[0]['shareimglink']."',
            '".$selectedpage_arry[$k]['pages']['pagid']."',$tempid,$fbappid,'".$pgval[0]['subpgtype']."','".$pgval[0]['linkdate']."'
            )";
            $this->db->query($qry2);
        }
      if($dbappid==10)
        {
          $instauser = "SELECT * FROM instg_users WHERE fb_userid=$fbuesrid AND tempid=$tempid AND pid=$pid and fbappid=$fbappid";
          $instauserdata = $this->db->query($instauser);
          $instauser_data = $instauserdata->result_array();

            $qry2 = "INSERT INTO instg_users
            (fb_userid,instag_userid,insatg_acc_tkn,pid,tempid,fbappid,isactive) VALUES 
            ('".$instauser_data[0]['fb_userid']."','".$instauser_data[0]['instag_userid']."',
             '".$instauser_data[0]['insatg_acc_tkn']."','".$selectedpage_arry[$k]['pages']['pagid']."',
             '".$instauser_data[0]['tempid']."','".$instauser_data[0]['fbappid']."','1')";
            $this->db->query($qry2);
        } 
      } // end of main for loop 

    } // end of function 
    
   /*
     * 
     */
    
  public function copy_cover_pic($covername,$fbuesrid,$selectedpage_arry,$coverurl)
    {
     for($k=0;$k<count($selectedpage_arry);$k++)
      {
        $pid=$selectedpage_arry[$k]['pages']['pagid']; 
        $ptoken =$selectedpage_arry[$k]['pages']['pagacctkon'];
        
        $this->facebook->setFileUploadSupport(true);
	$file = $covername;
        $full_image_pth = $coverurl;//"https://apps2.cuecow.com/images/imglib/".$fbuesrid."/".$file;
        image_resize($file,850,500,$full_image_pth);
        $full_image_path = realpath("images/850X500/".$file);
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
    } // end of function  
    
  /*
   * 
   */      /*
     * 
     */
public function do_set_profilepic($pic)
    {
        $user = $this->session->userdata('fbuserid');
        $pid = $this->session->userdata('pid');
        $ptoken = $this->session->userdata('ptoken');
        
        $this->facebook->setFileUploadSupport(true);
	$file = $pic;
        $full_image_pth = "https://apps2.cuecow.com/images/prof_img/".$user."/".$file;
        image_resize($file,170,170,$full_image_pth);
        $full_image_path = realpath("images/prof_img/".$user."/".$file);
        //$full_image_path=base_url().$full_image_path_flder;
        try
        {
            $args = array( 
                'access_token' => $ptoken,
          //      'custom_image_url' => $full_image_path,
                'image' => '@'.$full_image_path
            );
            $data = $this->facebook->api("/".$pid."/photos",'post',$args);
            $pictue = $this->facebook->api('/'.$data['id']);				
            
            $fb_image_link = $pictue['link']."&makeprofile=1";   //redirect to uploaded photo url and change profile picture 
            echo "<script type='text/javascript'>top.location.href='$fb_image_link'; </script>";
            
        }catch(FacebookApiException $e)
        {
            //var_dump($e);
            error_log($e);
            //exit();
        }
    }
    
  /*
   * 
   */  
    
 function getapp_pgid()
 {
        $query =   $this->db->query("Select id,pid,fbappid,isdell,flag from installed_apps where isdell=0 AND id > 257");
        return $query->result_array();  
 }

  function updatebitly($id,$bitlylink)
 {
    $this->db->query("Update installed_apps set bitly_link='".$bitlylink."'where id=$id"); 
 }
 
function get_insatlpgid()
 {
  $query =   $this->db->query("Select pid from installed_apps where userid=616315964 AND id > 257");
  $data_page=$query->result_array();
  for($k=0;$k<count($data_page);$k++){
  
   $qry2 = "INSERT INTO instg_users
            (fb_userid,instag_userid,insatg_acc_tkn,pid,tempid,fbappid,isactive) VALUES 
            ('616315964','386785028',
             '386785028.4785a6e.939bb165bce0435fbb867bc5375297a7','".$data_page[$k]['pid']."',
             '111','396387207139425','1')";
            $this->db->query($qry2);
  }
 } 
 
 function do_update_contentMgr($contentData)
 {
	 for($a=0;$a<1;$a++)
	 { 
		$qry = "Update contentMgr_data set content_txt='".$contentData[$a]['content_text']."' where id=".$contentData[$a]['cont_auto_id']." AND cont_id=".$contentData[$a]['cont_id']."";
		$this->db->query($qry); 
	 }
 }
 
 function do_update_popup_content($autoid,$content_txt)
 {
	$qry = "Update contentMgr_data set content_txt='".$content_txt."' where id=".$autoid."";
	$this->db->query($qry); 
 }
}