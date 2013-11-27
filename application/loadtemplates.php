<?php
class loadtemplates extends CI_Model{
    
    public function __construct()
    {    
        $this->load->database();
    }	
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
    public function copytemdata($pid,$tempid,$fbappid)
    {
        $countqry =   $this->db->query("Select count(*) from apptemp_fieldsvalue where pid=$pid and fb_appid=$fbappid and isdell=0");
        $countr = $countqry->result_array();
        $chktempr =  $countr[0]['count(*)'];
        
        if($chktempr==0)
        {
            $datatempq = $this->db->query("Select * from apptemp_fieldsdata where tempid=$tempid");
            $datatempr = $datatempq->result_array();
            
            foreach($datatempr as $data)
            {
                $value  = addslashes($data['value']);
                $qry = "INSERT INTO apptemp_fieldsvalue (value,fieldid,pid,tempid,fb_appid)values('".$value."','".$data['fieldid']."','".$pid."','".$tempid."',$fbappid)";
                $this->db->query($qry);
                //echo "<pre>"; print_r($datatempr); echo "</pre><br><br><br>";
            }
        }
        //echo "<pre>"; print_r($r); echo "</pre>";
    }
    public function copyquizdata($pid,$tempid,$fbappid)
    {
        $quizq = $this->db->query("Select * from app_quizdata where tempid=$tempid");
        $quizr = $quizq->result_array();
        //echo "<pre>"; print_r($quizr); echo "</pre>";
        
        $cntqry =   $this->db->query("Select id from app_quiz where tempid=$tempid and pid=$pid and fb_appid=$fbappid and isdell=0"); //
        $cntr = $cntqry->result_array();
        //echo "<pre>"; print_r($cntr); echo "</pre>"; //echo count($cntr[0]); echo $cntr[0]['id'];              
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
                       $sql2 = "INSERT into app_quizoptions (optiontxt,questionid,pid,tempid,is_true,fb_appid) values ('".$quizr[0]['option'.$i]."','".$linsid."','".$pid."','".$tempid."','".($i==1 ? '1':'0')."',$fbappid)";
                       $this->db->query($sql2);
                    }
                }
            }
            
        }
    }
    public function getcomponent($tid)
    {
        $qry = "Select position from apptemp_component where tempid=$tid";
        $query =   $this->db->query($qry);
        return $query->result_array();
    }
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
    public function getchrismasapp_subpages($pid,$fbappid)
    {
        /*$qry = "Select linkdate,subpgtype from chrismassapp_subpgvalue where pid=$pid and fb_appid=$fbappid and isdell=0";
        $query =   $this->db->query($qry);
        return  $query->result_array();*/
        if(isset($_REQUEST['subpgid']))
        {
            $subpgday = $this->session->userdata('subpgday');
            $subpgid = $_REQUEST['subpgid'];
            $qry = "Select * from chrismassapp_subpgvalue where pid=$pid and fb_appid=$fbappid and subpgtype='".$subpgid."' and linkdate='".$subpgday."' and isdell=0";
            $query = $this->db->query($qry);
            $returdata = $query->result_array();
            return $returdata[0];
        }
        else
        {
            $qry = "Select * from chrismassapp_subpgvalue where pid=$pid and fb_appid=$fbappid and isdell=0";
            $query =   $this->db->query($qry);
            return  $query->result_array();
        }
    }
    
    public function getquizdata($tempid,$pid,$fbappid)
    {
        $qzqry = "Select * from app_quiz where tempid=$tempid and pid=$pid and fb_appid=$fbappid and isdell=0";
        //echo $qzqry;
        $query =   $this->db->query($qzqry);
        $quizrr =  $query->result_array();
        //echo "<pre>"; print_r($quizrr); echo "</pre>";
        
        $optinquery =   $this->db->query("Select * from app_quizoptions where questionid=".$quizrr[0]['id']." and isdell=0");
        $optinarr =     $optinquery->result_array();        
        
        return array('quiz'=>$quizrr,'options'=>$optinarr);
    }
    
    public function tempforcanvas($pid,$fbappid)
    {
        $qry1 = "Select * from installed_apps where pid='".$pid."' and fbappid='".$fbappid."' and isdell=0";
        $query =   $this->db->query($qry1);
        return $query->result_array();
    }
    
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
            //if(count($votes)>0)
            //{
            //foreach($votes as $vote)
            //{                
            //  $finpicdata[] = array('picdata'=>$pic,'votes'=>$vote['count(*)']);
            //}
            //}
            //else
            //{
            //  $finpicdata[] = array('picdata'=>$pic,'votes'=>'');
            //}
                        
        }        
        //echo "<pre>"; print_r($finpicdata); echo "</pre>";        
        /*if(isset($_REQUEST['mode']))
        {
            echo json_encode(print_r($finpicdata));
        }*/
        $returnarr = array('finpicdata'=>$finpicdata,'prm'=>array('pages'=>$totalpages,'pgno'=>$pgno,'mode'=>$mode));
        return $returnarr;
        
    }
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
            $error .=' You have already voted for this picture!';
            
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
    public function showpgdaydata($pid,$fbappid)
    {
        $subpgday = $_REQUEST['subpgday'];
        $qry = "Select * from chrismassapp_subpgvalue where pid=$pid and fb_appid=$fbappid and linkdate='".$subpgday."' and isdell=0";
        $query = $this->db->query($qry);
        $returdata = $query->result_array();        
        return $returdata[0];
    }
}