<?php

/**
 * 
 */
class loadtemplates extends CI_Model{
    
    /**
     * 
     */
    public function __construct()
    {    
        $this->load->database();
    }	
    
    /**
     *
     * @param type $uid
     * @param type $dbappid
     * @return type 
     */
    public function get_templates($uid,$dbappid)
    {
        if(in_array($uid,array(10,21,13))){
            $qry = "Select * from app_template  WHERE id NOT IN (5,6) and dbappid='$dbappid'";
        }else if($uid==22){
            $qry = "Select * from app_template  WHERE id NOT IN (4) and dbappid='$dbappid'";
        }else if($uid==16){
            $qry = "Select * from app_template  WHERE dbappid='$dbappid'";
        }else{
            $qry = "Select * from app_template  WHERE id NOT IN (4,5,6) and dbappid='$dbappid'";
        }
        $query =   $this->db->query($qry);
        return $query->result_array();
    }
    
    /**
     *
     * @param type $pid
     * @param type $tempid
     * @param type $fbappid 
     */
    public function copytemdata($pid,$tempid,$fbappid)
    {
        $countqry =   $this->db->query("Select count(*) from apptemp_fieldsvalue where pid=$pid and fb_appid=$fbappid and isdell=0");
        $countr = $countqry->result_array();
        $chktempr =  $countr[0]['count(*)'];
        
        if($chktempr> 0)
        {
            $countqry =   $this->db->query("Delete from apptemp_fieldsvalue where pid=$pid and fb_appid=$fbappid and isdell=0");
        }
        
        $datatempq = $this->db->query("Select * from apptemp_fieldsdata where tempid=$tempid");
        $datatempr = $datatempq->result_array();

        foreach($datatempr as $data)
        {
            $value  = addslashes($data['value']);
            $qry = "INSERT INTO apptemp_fieldsvalue (value,fieldid,pid,tempid,fb_appid)values('".$value."','".$data['fieldid']."','".$pid."','".$tempid."',$fbappid)";
            $this->db->query($qry);
        }
        
    }
    
    /**
     *
     * @param type $pageId
     * @param type $templateId
     * @param type $fbAppId 
     */
    public function saveTemplateAsDefault($pageId, $templateId, $fbAppId) {
        
        $appFieldQuery = $this->db->query("SELECT * FROM apptemp_fieldsvalue WHERE tempid=$templateId AND pid=$pageId AND fb_appid=$fbAppId AND isdell=0" );
        $appFieldResults = $appFieldQuery->result_array();
        
        foreach ($appFieldResults as $appField) {
            
            $value  = addslashes($appField['value']);
            $templateFieldsQuery = "UPDATE apptemp_fieldsdata SET value='".$value."' WHERE tempid=$templateId AND fieldid=".$appField['fieldid'];
            $this->db->query($templateFieldsQuery); 
            
        }
        
    }
    
    /**
     *
     * @param type $tid
     * @return type 
     */
    public function getcomponent($tid)
    {
        $qry = "Select position from apptemp_component where tempid=$tid";
        $query =   $this->db->query($qry);
        return $query->result_array();
    }
    
    /**
     *
     * @param type $position
     * @param type $tempid
     * @param type $pid
     * @param type $fbappid
     * @return type 
     */
    public function gettempdata($position,$tempid,$pid,$fbappid)
    {
        $qry = "SELECT apptc.com_name,apptc.id as comp_id,apptc.position,appf.field_name,appfv.id,appfv.value,appf.typeid,appfv.is_hide
	from app_template appt Inner join apptemp_component apptc on appt.id = apptc.tempid and apptc.position=".$position."
	inner join 
	apptemp_fields appf on apptc.id = appf.compid inner join apptemp_fieldsvalue 
	appfv on appf.id = appfv.fieldid where appt.id=".$tempid." and appfv.pid=".$pid." and appfv.fb_appid=$fbappid and appfv.isdell=0";
        
        $query =   $this->db->query($qry);
        return $query->result_array();	
    }
    
    /**
     *
     * @param type $pid
     * @param type $fbappid
     * @return type 
     */
    public function getchrismasapp_subpages($pid,$fbappid)
    {
        $subpagesdata = "";
        $winnerofday = "";
        
        if(isset($_REQUEST['subpgid']))
        {
            $subpgday = $this->session->userdata('subpgday');
            $subpgid = $_REQUEST['subpgid'];
            
            $qry = "Select * from chrismassapp_subpgvalue where pid=$pid and fb_appid=$fbappid and subpgtype='".$subpgid."' and linkdate='".$subpgday."' and isdell=0";
            $query = $this->db->query($qry);
            $returdata = $query->result_array();
            
            if(count($returdata)>0)
            {
                $returdata =  $returdata[0];
                $subpgsessiondata = array(
                    'pgvalid'  => $returdata['id'],
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
            }
            else
            {
                $subpgsessiondata = "";
            }
            
            $this->session->set_userdata($subpgsessiondata);
        }
        else
        {
            $qry = "Select * from chrismassapp_subpgvalue where pid=$pid and fb_appid=$fbappid and isdell=0";
            $query =   $this->db->query($qry);
            $subpagesdata = $query->result_array();
        }
        
        $qry2 = "Select * from chrismassapp_competition_winners where pid=$pid and fb_appid=$fbappid and isdell=0";
        $query2 =   $this->db->query($qry2);
        $winnerofday =  $query2->result_array();
        
        return array(
            'subpagesdata' => $subpagesdata,
            'winnerofday' => $winnerofday,
        );
        
    }
    
    public function getquizdata($tempid,$pid,$fbappid)
    {
        $quizrr = "";
        $optinarr = "";
        $qzqry = "Select * from app_quiz where tempid=$tempid and pid=$pid and fb_appid=$fbappid and isdell=0";
        $query =   $this->db->query($qzqry);
        $quizrr =  $query->result_array();
        
        if(count($quizrr)>0)
        {
            $optinquery =   $this->db->query("Select * from app_quizoptions where questionid=".$quizrr[0]['id']." and isdell=0");
            $optinarr =     $optinquery->result_array();        
        }
        
        
        
        return array('quiz'=>$quizrr,'options'=>$optinarr);
    }
    
    /**
     *
     * @param type $pid
     * @param type $fbappid
     * @return type 
     */
    public function tempforcanvas($pid,$fbappid)
    {
        $qry1 = "Select * from installed_apps where pid='".$pid."' and fbappid='".$fbappid."' and isdell=0";
        $query =   $this->db->query($qry1);
        return $query->result_array();
    }
    
    /**
     *
     * @param type $tempid
     * @param type $pid
     * @param type $fbappid 
     */
    public function canvas_savequiz($tempid,$pid,$fbappid)
    {
        $qid = $this->input->post('qid');
        $option = $this->input->post('option');
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $address = $this->input->post('address');
        $phone = $this->input->post('phone');
        
        $qry = "INSERT INTO `appquiz_result` (`name`, `email`, `phone`, `address`, `qid`, `option`, `tempid`, `pid`, `ipaddress`, `datetime`,fb_appid) 
        VALUES ('".$name."','".$email."','".$phone."','".$address."','".$qid."','".$option."','".$tempid."','".$pid."','".$_SERVER['REMOTE_ADDR']."',now(),$fbappid)";
        
        $this->db->query($qry);
    }
    
    /**
     *
     * @param type $tempid
     * @param type $pid 
     */
    public function galleryapp_doaddpic($tempid,$pid)
    {
        $error = "";
        $result = "";
        
        $name = $_REQUEST['values']['name'];
        $email = $_REQUEST['values']['email'];
        $age = $_REQUEST['values']['age'];
        $image = $_REQUEST['values']['image'];
        $text = $_REQUEST['values']['text'];
        $ip= $_SERVER['REMOTE_ADDR']; 
        $fbappid = $this->session->userdata('fbappid');
        
        $qry = "INSERT INTO `gallery_appimgs` (`picture`, `pid`, `name`, `email`, `age`, `imgtxt`, `tempid`, `ip`,fb_appid , active) VALUES ('".$image."','".$pid."','".$name."','".$email."','".$age."','".$text."','".$tempid."','".$ip."','".$fbappid."', 0)";
        if($this->db->query($qry))
        {
            $result .='SUCCESS';            
            echo json_encode(array('error' => $error,'result'=>$result));
        }
    }
    
    /**
     *
     * @param type $adminflag
     * @return type 
     */
    public function galleryapp_getpics($adminflag)
    {
        $pid = $this->session->userdata('pid');
        $tempid = $this->session->userdata('tempid');
        $fbappid = $this->session->userdata('fbappid');
        
        $pgno = (isset($_REQUEST['pgno']) ? $_REQUEST['pgno'] : 1);
        $prelimit = ($pgno-1) *8;
        
        if($adminflag==0){  $limit = "Limit $prelimit,8";}else{ $limit = "";}
        
        $mode = (isset($_REQUEST['mode'])? $_REQUEST['mode'] : '');        
        
        
        if($mode=="pending")
        {
            $qry = "Select * from gallery_appimgs where pid=$pid and tempid=$tempid and fb_appid=$fbappid and active=0 and isdell=0  order by id $limit";
            $totalqry = "Select count(*) from gallery_appimgs where pid=$pid and tempid=$tempid and active=0 and isdell=0  order by id";
        }
        else if($mode=="popular")
        {
            $qry = "SELECT * FROM gallery_appimgs INNER JOIN (SELECT picid,COUNT(picid) AS votecount FROM gallery_appimgsvotes
            GROUP BY picid ) AS Tabl ON Tabl.picid = gallery_appimgs.id  where pid=$pid and tempid=$tempid and fb_appid=$fbappid and active=1 and isdell=0 ORDER BY votecount DESC $limit";
            $totalqry = "SELECT count(*) FROM gallery_appimgs INNER JOIN (SELECT picid,COUNT(picid) AS votecount FROM gallery_appimgsvotes
            GROUP BY picid ) AS Tabl ON Tabl.picid = gallery_appimgs.id  where pid=$pid and tempid=$tempid and fb_appid=$fbappid and active=1 and isdell=0 ORDER BY votecount DESC";
        }
        else if($mode=="archive")
        {
            $qry = "Select * from gallery_appimgs where pid=$pid and tempid=$tempid and fb_appid=$fbappid and isdell=0 $limit";
            $totalqry = "Select count(*) from gallery_appimgs where pid=$pid and tempid=$tempid and fb_appid=$fbappid and isdell=0";
        }
        else if($mode=="search")
        {
            $searchval = (isset($_POST['searchval']) ? $_POST['searchval'] : '');
            $qry = "Select * from gallery_appimgs where pid=$pid and tempid=$tempid and and fb_appid=$fbappid active=1 and isdell=0 and imgtxt LIKE '%$searchval%'  order by id desc";
            $totalqry = "Select count(*) from gallery_appimgs where pid=$pid and tempid=$tempid and fb_appid=$fbappid and active=1 and isdell=0 and imgtxt LIKE '%$searchval%'  order by id desc";
        }        
        else
        {
            $qry = "Select * from gallery_appimgs where pid=$pid and tempid=$tempid and fb_appid=$fbappid and active=1 and isdell=0  order by id desc $limit";
            $totalqry = "Select count(*) from gallery_appimgs where pid=$pid and tempid=$tempid and fb_appid=$fbappid and active=1 and isdell=0  order by id desc";
        }
        //echo $qry;
        $query =   $this->db->query($qry);
        $pics = $query->result_array();
        
        /*************Total Record Query****************/
        $totalquery =   $this->db->query($totalqry);
        $totalr = $totalquery->result_array();       
        $totalpages=ceil($totalr[0]['count(*)']/8);
        /*************End Total Record Query****************/        
        
        $finpicdata = array();
        foreach($pics as $pic)
        {
            $picid = $pic['id'];
            $query1 =   $this->db->query("Select count(*) from gallery_appimgsvotes where picid=$picid and isdell=0");
            $votes = $query1->result_array();
            //echo "<pre>"; print_r($votes); echo "</pre>";
            foreach($votes as $vote)
            {                
                $finpicdata[] = array('picdata'=>$pic,'votes'=>$vote['count(*)']);
            }
        }        
        
        $returnarr = array('finpicdata'=>$finpicdata,'prm'=>array('pages'=>$totalpages,'pgno'=>$pgno,'mode'=>$mode));
        return $returnarr;
        
    }
    
    /**
     * 
     */
    public function galleryapp_dovote()
    {
        $votecount = "";
        $error = "";
        $result = "";
        
        $id = $_REQUEST['id'];
        $fbuserid = $_REQUEST['fbuserid'];
        $ip= $_SERVER['REMOTE_ADDR'];
        $userdetail= $_REQUEST['userdetail'];
        $fbappid= $_REQUEST['fbappid'];
        
        $pid = $this->session->userdata('pid');
        $tempid = $this->session->userdata('tempid');
        
        //echo "<script>console.log(". print_r($userdetail) .")</script>";
        
        $query1 =   $this->db->query("Select id from gallery_appimgsvotes where picid=$id and fbuserid='$fbuserid' and isdell=0");
        $getcountdata1 = $query1->result_array();
        $votecount = count($getcountdata1);
        if($votecount>0)
        {
            $result .= "ERROR";
           // $error .=' You have already voted for this picture!';
            
        }
        else
        {
            $qry = "INSERT INTO `gallery_appimgsvotes` (picid,fbuserid,name,email,ip,pid,tempid,fb_appid,addedtime) VALUES ('".$id."','".$fbuserid."','".$userdetail['name']."','".$userdetail['email']."','".$ip."',$pid,$tempid,$fbappid,now())";
            if($this->db->query($qry))
            {
                $result .='SUCCESS';
            }
            
            $query2 =   $this->db->query("Select id from gallery_appimgsvotes where picid=$id and isdell=0");
            $getcountdata2 = $query2->result_array();
            $votecount = count($getcountdata2);
        }
        
        echo json_encode(
        array(
            'error' => array('message'=>$error),'result'=>$result,'submit'=>array('votes'=>$votecount),
            'picid'=>$id
        ));
        
    }
    
    /**
     *
     * @return type 
     */
    public function showpgdaydata()
    {
        $subpgday = $_REQUEST['subpgday'];
        $pid = $_REQUEST['pid'];
        $fbappid = $_REQUEST['appid'];
        
        $qry = "Select * from chrismassapp_subpgvalue where pid=$pid and fb_appid=$fbappid and linkdate='".$subpgday."' and isdell=0";
        
        try {
            $query = $this->db->query($qry);
            $returdata = $query->result_array();        
            return $returdata[0];
        } catch (Exception $e) {
            var_dump($e->getMessage());
        }
    }
    
    /**
     * 
     */
    public function do_savevistor()
    {
        $pid = $this->session->userdata('cpid');
        $fbappid = $this->session->userdata('fbappid');
        $tempid = $this->session->userdata('tempid');
        
        $name = $_REQUEST['name'];
        $email = $_REQUEST['email'];
        $competition_id = $_REQUEST['competition_id'];
        $subpgtype = $_REQUEST['subpgtype'];
        $linkdate = $_REQUEST['linkdate'];        
        
        $qry = "Insert into chrismassapp_competition_vistors 
        (name,email,pid,fb_appid,tempid,competition_id,subpgtype,linkdate,addedtime) values 
        ('".$name."','".$email."','".$pid."','".$fbappid."','".$tempid."','".$competition_id."','".$subpgtype."',
        '".$linkdate."',now())
        ";
        $query = $this->db->query($qry);
    }
    
    /**
     *
     * @param type $pid
     * @param type $tempid
     * @param type $fbappid 
     */    
public function copyquizdata($pid,$tempid,$fbappid)
    {
        $quizq = $this->db->query("Select * from app_quizdata where tempid=$tempid");
        $quizr = $quizq->result_array();
        //echo "<pre>"; print_r($quizr); echo "</pre>";
        
        $cntqry =   $this->db->query("Select id from app_quiz where tempid=$tempid and pid=$pid and fb_appid=$fbappid and isdell=0"); //
        $cntr = $cntqry->result_array();
        //echo "<pre>"; print_r($cntr); echo "</pre>"; exit(); //echo count($cntr[0]); echo $cntr[0]['id'];              
        if(count($cntr)==0)
        {
            $sql = "INSERT into app_quiz (qheading,qdescription,tempid,pid,userid,fb_appid) values ('".$quizr[0]['qheading']."','".$quizr[0]['qdescription']."',".$tempid.",".$pid.",".$this->session->userdata('fbuserid').",$fbappid)";
            $ex = $this->db->query($sql);
            $linsid = $this->db->insert_id();
            if($ex)
            {
                for($i=1;$i<8;$i++)
                {
                    if($quizr[0]['option'.$i]!="")
                    {
                        //echo $quizr[0]['option'.$i]." ".($i==1 ? '1':'')." <br> ".$i;
                      $sql2 = "INSERT into app_quizoptions (optiontxt,optionimg1,optionimg2,optionimg3,questionid,pid,tempid,is_true,fb_appid) values ('".$quizr[0]['option'.$i]."','".$quizr[0]['optionimg1_1']."','".$quizr[0]['optionimg1_2']."','".$quizr[0]['optionimg1_3']."','".$linsid."','".$pid."','".$tempid."','".($i==1 ? '1':'0')."',$fbappid)";
                         //echo count($cntr[0]); echo $cntr[0]['id'];  
                      $this->db->query($sql2);
                    }
                }
                if($tempid==15)
                {
                    for($l=1;$l<3;$l++)
                    {
                       $optionimg1=$quizr[0]['optionimg1_'.$l];
                       $optionimg2=$quizr[0]['optionimg2_'.$l];
                       $optionimg3=$quizr[0]['optionimg3_'.$l];
                       $sql2 = "Update app_quizoptions SET optionimg1='".$optionimg1."',optionimg2='".$optionimg2."',optionimg3='".$optionimg3."' WHERE pid=$pid AND tempid=$tempid AND fb_appid=$fbappid";
                       $this->db->query($sql2); 
                    }          
                }

            }
            
        }
    }
    
    /**
     *
     * @param type $tempid
     * @param type $pid
     * @param type $fbappid 
     */
     public function canvas_save_email($tempid,$pid,$fbappid)
    { 
         $name = $this->input->post('name');
         $email = $this->input->post('email');
         $phone = $this->input->post('phone');
         $subject=$this->input->post('subject');
         $message = $this->input->post('message');
         $admin_mail = $this->input->post('admin_email');

        $this->load->library('email');
        $this->email->clear();
        $this->email->from($email,$name);
        $this->email->to($admin_mail);
        $this->email->subject('From Facebook:'.$subject);
        $email_msg = "
        Name: $name\n Phone: ".$phone."\n Message: $message ";
        $this->email->message($email_msg);
        $this->email->send();

        $qry = "INSERT INTO `contact_app` (`name`, `email`, `phone`, `message`, `pid`, `fb_appid`, `tempid`) 
        VALUES ('".$name."','".$email."','".$phone."','".$message."','".$pid."','".$fbappid."','".$tempid."')";        
        $this->db->query($qry);  
    }
 function fan_of_week($uid,$pid,$fbname,$fbappid,$acctoken)
 {
     $fb_userid=$uid;
     $user_name=$fbname;
     $page_id=$pid;
     $app_id=$fbappid;
     $is_cand=1;
     $qry = "INSERT INTO `fan_ofweek_candidate` (`fb_userid`, `user_name`, `page_id`, `app_id`, `is_cand`, `acctoken`) 
     VALUES ('".$fb_userid."','".$user_name."','".$page_id."','".$app_id."','".$is_cand."','".$acctoken."')";        
     $this->db->query($qry);    
 }
 
    function check_iscandidate($app_userid,$pgid,$apid)
    {
       $qrry = "Select * from fan_ofweek_candidate where fb_userid=$app_userid and page_id=$pgid and app_id=$apid and is_cand=1";
       $qry = $this->db->query($qrry);
       $getresult = $qry->result_array();
       $findata = array();
       $findatacan=array();
       foreach ($getresult as $result) {
           $qry1 = "SELECT count(*) as vcount FROM fan_week_voter WHERE cand_id=".$result['fb_userid']." AND page_id=".$result['page_id']." AND app_id=".$result['app_id']."";
           $qry2 = $this->db->query($qry1);
           $result2 = $qry2->result_array();
           
           $votedata = (isset($result2[0]['vcount']) ? $result2[0]['vcount'] : '');
           
           //echo "<pre>"; print_r(]); echo "</pre> <br>";
           
           $findatacan[] = array('userinfo'=>$result,'voteinfo'=>$votedata);
       }
       return $findatacan;
      // echo "<pre>"; print_r($findatacan); echo "</pre> <br>";
       //exit();          
    }

   function savevote($cand_id,$voterid,$fbappid,$pid)
    {
        $qry = "INSERT INTO `fan_week_voter` (`voter_id`, `cand_id`, `page_id`, `app_id`) 
        VALUES ('".$voterid."','".$cand_id."','".$pid."','".$fbappid."')";        
        $this->db->query($qry);   
    }

   function check_alredyvoted($voterid,$cand_id,$pgid,$apid)
    {
       $qry = $this->db->query("Select * from fan_week_voter where voter_id=$voterid and cand_id=$cand_id and page_id=$pgid and app_id=$apid" );
       return $qry->result_array();    
    }
    
   function delet_cand($del_id)
   {
    $delqry = "Update fan_ofweek_candidate SET is_cand=0 WHERE fb_userid=$del_id";
    $this->db->query($delqry);    
   }

   function all_candidate($fid,$pgid,$apid)
   {
       $qrry = "Select * from fan_ofweek_candidate where fb_userid!=$fid and page_id=$pgid and app_id=$apid and is_cand=1";
       $qry = $this->db->query($qrry);
       $getresult = $qry->result_array();
       //var_dump($getresult);
       $findata = array();
       foreach ($getresult as $result) {
           $qry1 = "SELECT count(*) as vcount FROM fan_week_voter WHERE cand_id=".$result['fb_userid']." AND page_id=".$result['page_id']." AND app_id=".$result['app_id']."";
           $qry2 = $this->db->query($qry1);
           $result2 = $qry2->result_array();
           
           $votedata = (isset($result2[0]['vcount']) ? $result2[0]['vcount'] : '');
           
           //echo "<pre>"; print_r(]); echo "</pre> <br>";
           
           $findata[] = array('userinfo'=>$result,'voteinfo'=>$votedata);
       }
       return $findata;
       //echo "<pre>"; print_r($findata); echo "</pre> <br>";
       //exit();      
   }
   
   function savedate_forautofan($dy,$tim,$pid,$fbappid)
   {
        $qry = $this->db->query("Select pageid from autofan_time where pageid=$pid and appid=$fbappid");
        $reslt= $qry->result_array();
        var_dump($reslt);
        if($reslt[0]['pageid'])
        {
        $updqry = "Update autofan_time SET autoday='".$dy."',autotime='".$tim."' WHERE pageid=$pid and appid=$fbappid";
        $this->db->query($updqry);   
        }
        else{
        $qry = "INSERT INTO `autofan_time` (`autoday`, `autotime`, `pageid`, `appid`) 
        VALUES ('".$dy."','".$tim."','".$pid."','".$fbappid."')";        
        $this->db->query($qry);  
        }
   }
   
  function getsecret($fbappid)
  {
    $qry = $this->db->query("Select fb_appsecret from apps_fbappinfo where fb_appid=$fbappid and app_typeid=8");
    return $reslt= $qry->result_array();  
  }
  
  function updateuserinfo($fbuserid,$pagid,$appid)
  {
    $date = date('Y-m-d H:i:s');
    $upqry="UPDATE fan_ofweek_candidate SET is_fanofweek=1,fan_date='".$date."' WHERE fb_userid=$fbuserid AND page_id=$pagid AND app_id=$appid AND is_cand=1";
    $this->db->query($upqry);
    
  }
  
  function clearcand_list()
  {
    $upqry="UPDATE fan_ofweek_candidate SET is_cand=0 WHERE is_cand=1";
    $this->db->query($upqry);   
  }

function copytemplates($tempid)
  {
     //$tempid=12; $_REQUEST['tempid'];
                                        // copy template data
     $template = $this->db->query("SELECT * FROM `app_template` WHERE id=$tempid");
     $templatedata= $template->result_array();
    
     $tempname=$templatedata[0]['temp_name'];
     $abappid=$templatedata[0]['dbappid'];
     $templatenamecount = $this->db->query("select count(temp_name) FROM  app_template WHERE dbappid=$abappid AND temp_name like '".$tempname."%'");
     $tempnamecount= $templatenamecount->result_array();
     
     $newtempname=$templatedata[0]['temp_name'].' '. $tempnamecount[0]['count(temp_name)'];
     $newtemplate = "INSERT INTO `app_template` (`temp_name`, `temp_picture`, `dbappid`, `temp_type`) 
                                                                VALUES ('".$newtempname."','".$templatedata[0]['temp_picture']."','".$templatedata[0]['dbappid']."',1)";        
    $this->db->query($newtemplate);  
    $newtempid=$this->db->insert_id(); 
                                        // copy apptemp_component data
    $tempcomponent = $this->db->query("SELECT * FROM `apptemp_component` WHERE tempid=$tempid");
    $tempcomponentdata= $tempcomponent->result_array();
    foreach ($tempcomponentdata as $newcompdata) 
             {
               $compname = $newcompdata['com_name'];
               $position = $newcompdata['position'];
               $tempidd=$newtempid;
               
               $newcomp = "INSERT INTO `apptemp_component` (`com_name`, `position`, `tempid`) 
                                                                VALUES ('".$compname."','".$position."','".$tempidd."')";        
               $this->db->query($newcomp);
             }
             
                                    // copy apptemp_fields data
            $oldtempid_comp = $this->db->query("SELECT id FROM `apptemp_component` WHERE tempid=$tempid ");
            $oldtempid_compid= $oldtempid_comp->result_array(); // Old Ids
            $newtempid_comp = $this->db->query("SELECT id FROM `apptemp_component` WHERE tempid=$newtempid ");
            $newtempid_compid = $newtempid_comp->result_array(); // New Ids
            $newfieldcompid = array();
                for ( $i=0; $i<count($oldtempid_compid); $i++ )
                 {
                    $newfieldcompid[$oldtempid_compid[$i]['id']] = $newtempid_compid[$i]['id'];
                    
                 }
            $tempfield = $this->db->query("SELECT * FROM `apptemp_fields` WHERE compid in(SELECT id FROM `apptemp_component` WHERE tempid=$tempid)");
            $tempfielddata= $tempfield->result_array(); // Old Fields 
            for ( $i=0; $i<count($tempfielddata); $i++ )
            {
                $this->db->query("INSERT INTO apptemp_fields (field_name, compid, typeid ) 
                                            VALUES ('".$tempfielddata[$i]['field_name']."', ".$newfieldcompid[$tempfielddata[$i]["compid"]].", ".$tempfielddata[$i]['typeid'].")"); 
            }
            
                                    // copy apptemp_fieldsdata` data

            $newapptemp_fields = $this->db->query("SELECT id FROM  apptemp_fields WHERE compid in (SELECT id FROM apptemp_component WHERE tempid=$newtempid)");
            $newapptemp_fieldsdata= $newapptemp_fields->result_array();
            $apptemp_fieldsdata = $this->db->query("SELECT * FROM apptemp_fieldsdata WHERE tempid=$tempid order by fieldid");
            $newapptemp_fieldsdata_data= $apptemp_fieldsdata->result_array();
            for($l=0; $l<count($newapptemp_fieldsdata); $l++)
            {
                $value=$newapptemp_fieldsdata_data[$l]['value'];
                $fieldid=$newapptemp_fieldsdata[$l]['id'];
                $tempiddd=$newtempid;
                $this->db->query("INSERT INTO apptemp_fieldsdata(value, fieldid,tempid) 
                                            VALUES('".$value."', ".$fieldid.", ".$tempiddd.")");
           
            }
            if($templatedata[0]['dbappid']==2)
            {
               $quizdata = $this->db->query("SELECT * FROM `app_quizdata` WHERE tempid=$tempid");
               $quizdata_data= $quizdata->result_array();

               $qheading=$quizdata_data['0']['qheading'];
               $qdescription=$quizdata_data['0']['qdescription'];
               $option1=$quizdata_data['0']['option1'];
               $option2=$quizdata_data['0']['option2'];
               $option3=$quizdata_data['0']['option3'];
               $option4=$quizdata_data['0']['option4'];
               $option5=$quizdata_data['0']['option5'];
               $option6=$quizdata_data['0']['option6'];
               $option7=$quizdata_data['0']['option7'];
               $optionimg1_1=$quizdata_data['0']['optionimg1_1'];
               $optionimg1_2=$quizdata_data['0']['optionimg1_2'];
               $optionimg1_3=$quizdata_data['0']['optionimg1_3'];
               $optionimg2_1=$quizdata_data['0']['optionimg2_1'];
               $optionimg2_2=$quizdata_data['0']['optionimg2_2'];
               $optionimg2_3=$quizdata_data['0']['optionimg2_3'];
               $optionimg3_1=$quizdata_data['0']['optionimg3_1'];
               $optionimg3_2=$quizdata_data['0']['optionimg3_2'];
               $optionimg3_3=$quizdata_data['0']['optionimg3_3'];

               $this->db->query("INSERT INTO app_quizdata(qheading, qdescription,option1,option2,option3,option4,option5,option6,option7,optionimg1_1,optionimg1_2,optionimg1_3,optionimg2_1,optionimg2_2,optionimg2_3,optionimg3_1,optionimg3_2,optionimg3_3,tempid) 
                                   VALUES('".$qheading."', '".$qdescription."','".$option1."', '".$option2."','".$option3."', '".$option4."','".$option5."', '".$option6."','".$option7."', '".$optionimg1_1."','".$optionimg1_2."', '".$optionimg1_3."','".$optionimg2_1."', '".$optionimg2_2."','".$optionimg2_3."', '".$optionimg3_1."','".$optionimg3_2."','".$optionimg3_3."', ".$newtempid.")"); 
            }
      return $newtempid;      
  }
  
  function delttemplates($tempid)
  {
      $template = $this->db->query("SELECT * FROM `app_template` WHERE id=$tempid");
      $templatedata= $template->result_array();
    
      $abappid=$templatedata[0]['dbappid'];
    
      $this->db->query("Delete FROM `app_template` WHERE id=$tempid");
      $this->db->query("Delete from apptemp_component WHERE tempid=$tempid");
      $this->db->query("Delete FROM `apptemp_fields` WHERE compid in(SELECT id FROM `apptemp_component` WHERE tempid=$tempid)");
      $this->db->query("Delete from apptemp_fieldsdata WHERE tempid=$tempid");
      if($abappid==2)
      {
       $this->db->query("Delete from app_quiz where WHERE tempid=$tempid");   
      }
  }
 function appscret($fbappid)
 {
       $appsecret = $this->db->query("SELECT fb_appsecret FROM `apps_fbappinfo` WHERE fb_appid=$fbappid");
      return $appsecret->result_array();    
 }
}