<?php
class cronemodel extends CI_Model{
    
    public function __construct()
    {    
        $this->load->database();
        $this->load->helper('imagemgr');
        $this->load->helper('emailmgr');
        $this->load->model('facebookobj');
        $this->facebookobj->admin_makeobj(APPID,APPSECRET);
        $this->load->database();
        date_default_timezone_set('Europe/Zagreb');
    }	
    
    public function dopublish_tab()
    {
        $date = date('Y-m-d G:i:s');
        $qry = "Select * from installed_apps where published<= '$date' and unpublish > '$date' and flag=0 and isdell=0 AND admin_unpublish=0";
        //echo "<br>".$qry."<br>";
        $query = $this->db->query($qry);
        $rss = $query->result_array();
        
        if(count($rss)>0)
        {
            foreach($rss as $r)
            {
                $this->facebook->setAccessToken($r['uaccess_token']);
                try{              
                    $args = 
                        array(
                        "access_token" => $r['paccess_token'], 
                        "app_id" => $r['fbappid'],
                        );
                        //var_dump($args);
                    $addtab = $this->facebook->api("/".$r['pid']."/tabs/",'post',$args);				
                    $this->facebook->setFileUploadSupport(true);
                    $folderPath = "https://apps2.cuecow.com/images/tabicons/".$r['tabicon'];//'@' . $full_image_path realpath("images/tabicons/".$r['tabicon']);
                    //var_dump($folderPath);
                    $full_image_path_flder = image_resize($r['tabicon'],111,74,$folderPath);
                    $full_image_path=base_url().$full_image_path_flder; 
                    $args2 =
                        array(
                            "access_token" => $r['paccess_token'],
                            "custom_name" => $r['tabname'], 
                            'custom_image_url' => $full_image_path,	
                        );

                    $updatetab = $this->facebook->api("/".$r['pid']."/tabs/app_".$r['fbappid']."",'post',$args2);		
                    $tabid = $r['pid']."/tabs/app_".$r['fbappid'];
                    $this->db->query("UPDATE installed_apps SET flag=1,appid_url='".$tabid."' where id=".$r['id']."");
                    $this->db->query("Insert into log_table (name,message,pid,addedtime) values ('Publish Crone',' Tab Publish','".$r['pid']."',now())");
                }catch(Exception $e){
                    echo "<br/><pre>"; echo print_r($e); echo "</pre>";
                    $this->db->query("Insert into log_table (name,message,pid,addedtime) values ('Publish Crone','Tab Not Publish Some Problem','".$r['pid']."',now())");
                }
            }
        } 
    }
    
    public function do_reycletab()
    {
        $date = date('Y-m-d G:i:s');
        $qry = "Select * from installed_apps where published > '$date' and flag=1 and isdell=0";
        //echo "<br>".$qry."<br>";
        $query = $this->db->query($qry);
        $rss = $query->result_array();
        
        //echo "<pre>"; print_r($rss); echo "</pre>";        
        //echo "<pre>"; print_r($rs); "<pre>";
        if(count($rss)>0)
        {
            foreach($rss as $r)
            {
                $this->facebook->setAccessToken($r['uaccess_token']);
                try{
                    $del_args =
                        array(
                            "access_token" => $r['paccess_token'],
                        );		
                    $deltab = $this->facebook->api("/".$r['pid']."/tabs/app_".$r['fbappid']."",'delete',$del_args);
                    $this->db->query("Insert into log_table (name,message,pid,addedtime) values ('Recycle Publish Crone',' Recycle Tab Unpublish','".$r['pid']."',now())");
                    $this->db->query("Update installed_apps set flag=0 where id='".$r['id']."'");                    

                }catch(Exception $e){
                    //echo "<br><pre>"; print_r($e); echo "</pre>";
                }
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
                      //start of adding column names as names of MySQL fields 
                    $headings = "Name".$sep."Email".$sep."Address".$sep."Phone".$sep."Correct Answer".$sep."Correct Answer Text".$sep."IP Address".$sep."Datetime\r\n";
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
                //$query1 = $this->db->query("SELECT i.id,i.picture,i.pid,iv.votecount FROM gallery_appimgs i INNER JOIN (SELECT picid,COUNT(picid) AS votecount  FROM gallery_appimgsvotes GROUP BY picid ) AS iv ON iv.picid = i.id WHERE i.active=1 AND i.pid=".$row['pid']." AND i.tempid=".$row['tempid']."");
                $query1 = $this->db->query("SELECT i.id,i.picture,i.pid FROM gallery_appimgs i WHERE i.active=1 AND i.pid=".$row['pid']." AND i.tempid=".$row['tempid']." AND i.fb_appid=".$row['fbappid']." and isdell=0");
                $result1 = $query1->result_array();
                //$rzz = $result1;
                
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
        }catch (Exception $e) {
            $this->db->query("Insert into log_table (name,message,pid,addedtime) values ('CSV file Crone',' ".$e->getMessage()."','".$row['pid']."',now())");
            //echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
        }
    }
    
    public function dounpublish_tab()
    {
        $date = date('Y-m-d G:i:s');
        $qry = "Select * from installed_apps where unpublish<= '$date' and flag=1 and isdell=0";
        
        //echo "<br><pre>"; print_r($qry); echo "</pre>";
        
        $query = $this->db->query($qry);
        $rss = $query->result_array();
        
        if(count($rss)>0)
        {
            foreach($rss as $r)
            {
                $this->facebook->setAccessToken($r['uaccess_token']);
                try{
                    $del_args =
                        array(
                            "access_token" => $r['paccess_token'],
                        );		
                    $deltab = $this->facebook->api("/".$r['pid']."/tabs/app_".$r['fbappid']."",'delete',$del_args);
                    $this->db->query("Insert into log_table (name,message,pid,addedtime) values ('Publish Crone',' Tab Unpublish','".$r['pid']."',now())");

                    if($r['dbappid']==2)
                    {
                        $this->do_csvfilecrone();
                    }
                    
                    if(in_array($r['dbappid'],array(4,5)))
                    {
                        $this->do_gallerycsvfilecrone();                        
                    } 
                    
                    $this->db->query("Update installed_apps set flag=0 where id='".$r['id']."'");
                }catch(Exception $e){
                    //echo "<br><pre>"; print_r($e); echo "</pre>";
                }
            }
        }   
    }
    public function chrismasapp_choosedaywinner()
    {
        $date = date('Y-m-d G:i:s');
        $qry = "Select * from installed_apps where flag=1 and dbappid=6 and isdell=0";
        $query = $this->db->query($qry);
        $getrz = $query->result_array();
        foreach($getrz as $rz)
        {
        $paneldb = $this->load->database("paneldb" , TRUE); 
        $qry5 = "Select * from user where admin_id=1 and  facebook_id=".$rz['userid']."";
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
            $qry1 = $this->db->query("Select app_type from apps_list where id=".$rz['dbappid'].""); 
            $apptype = $qry1->result_array();
            $app_type= $apptype[0]['app_type'];
            $app_name= $rz['tabname'];
            $qry1 = "Select id,rheading,linkdate from chrismassapp_subpgvalue where pid=".$rz['pid']." and fb_appid=".$rz['fbappid']." and subpgtype=2";
            $query1 = $this->db->query($qry1);
            $getrz1 = $query1->result_array();
            //var_dump($getrz1);
            foreach($getrz1 as $rz1)
            {
                $qry2 = "SELECT * FROM `chrismassapp_competition_vistors` WHERE competition_id=".$rz1['id']." order by rand() limit 1";
                $query2 = $this->db->query($qry2);
                $getrz2 = $query2->result_array();
                //var_dump($getrz2); die();
                if(count($getrz2)>0)
                {
                    $rz2 = $getrz2[0];
                    
                    $qry3 = "Insert into chrismassapp_competition_winners 
                    (name,email,pid,fb_appid,tempid,competition_id,competition_name,linkdate,addeddate) values
                    ('".$rz2['name']."','".$rz2['email']."','".$rz['pid']."','".$rz['fbappid']."','".$rz['tempid']."',
                    '".$rz1['id']."','".strip_tags($rz1['rheading'],'')."','".$rz1['linkdate']."',now()
                    )";
                    $query3 = $this->db->query($qry3);
                   //var_dump($query3); die();
                    if($query3)
                    {
                        $email_frm="info@apps.cuecow.com, Cuecow Apps";
                        $email_to=$rz2['email'];
                        $email_cc="mhussain324@yahoo.com";
                        $subject=$rz2['name']." you are being picked winner of th day on ".$rz['tabname']."";
                        $message = "hi, ".$rz2['name']."

                        You are being picked winner of the day on ".$rz['tabname']."
                        --
                        This is an automated message from ".$account_name."";
                        $attach="";
                        $rowid="";
                        //email_Mgr($email_frm,$email_to,$email_cc,$subject,$message,$attach,$account_name,$rowid,$rz['pid'],$rz['tempid'],$rz['fbappid'],$app_type,$app_name);  
                    }
                }
            }
        }        
    }
    
  function post_fanofweek()
  {
    $dy= getdate ();
    $curr_tim=$dy['hours'].':'.$dy['minutes'];
    $curr_dy=$dy['weekday'];  
    
    $qry = $this->db->query("Select pageid from autofan_time where autotime like '%".$curr_tim."%' and autoday='".$curr_dy."'");
    //print_r("Select pageid from autofan_time where autotime like '%".$curr_tim."%' and autoday='".$curr_dy."'");
    $reslt=$qry->result_array();
    //var_dump($reslt);
    if($reslt)
        {
        //dbqury here
            $qry = $this->db->query("SELECT fan_ofweek_candidate.fb_userid,fan_ofweek_candidate.user_name,fan_ofweek_candidate.app_id,fan_ofweek_candidate.acctoken,count(fan_week_voter.cand_id) cnt 
                                    FROM fan_week_voter,fan_ofweek_candidate
                                    WHere fan_week_voter.cand_id=fan_ofweek_candidate.fb_userid
                                    AND fan_ofweek_candidate.is_cand=1
                                    AND fan_week_voter.page_id=fan_ofweek_candidate.page_id
                                    Group by fan_week_voter.cand_id
                                    ORDER BY cnt DESC");
            $reslt= $qry->result_array();
          //  var_dump($reslt);
        try {
        $allpost = array(
                    "access_token" => $reslt[0]['acctoken'], 
                    //"app_id" => $reslt[0]['app_id'],
                    //"link"=>  'http://www.facebook.com/pages/FB-APP-Guru/522343561111611?sk=app_462986640429737',//http://www.facebook.com/pages/FB-APP-Guru/522343561111611?sk=app_'.$reslt[0]['app_id'],
                    "picture"=>'https://devbx.com/cuecow/images/images/postimg.png',
                    "name"=> "Fan of the Week",
                    "message"=>'Our Fan of the week is '.$reslt[0]['user_name'].'...! Congratulations.'
                     );
            $this->facebook->api('/'.$reslt[0]['fb_userid'].'/feed', 'post', $allpost);
            }catch(Exception $e){
                $errormsg = $e->getMessage();
                return $errormsg;
            } 
        }
  }
  
  function crone_fanofweek()
  {
        //dbqury here
            $qry = $this->db->query("SELECT fan_ofweek_candidate.fb_userid,fan_ofweek_candidate.user_name,fan_ofweek_candidate.app_id,fan_ofweek_candidate.acctoken,count(fan_week_voter.cand_id) cnt 
                                    FROM fan_week_voter,fan_ofweek_candidate
                                    WHere fan_week_voter.cand_id=fan_ofweek_candidate.fb_userid
                                    AND fan_ofweek_candidate.is_cand=1
                                    AND fan_week_voter.page_id=fan_ofweek_candidate.page_id
                                    Group by fan_week_voter.cand_id
                                    ORDER BY cnt DESC");
            $reslt= $qry->result_array();
	if(count($reslt)>0)
	{		
        try {
        $allpost = array(
                    "access_token" => $reslt[0]['acctoken'], 
                    //"app_id" => $reslt[0]['app_id'],
                    //"link"=>  'http://www.facebook.com/pages/FB-APP-Guru/522343561111611?sk=app_462986640429737',//http://www.facebook.com/pages/FB-APP-Guru/522343561111611?sk=app_'.$reslt[0]['app_id'],
                    "picture"=>'https://devbx.com/cuecow/images/images/postimg.png',
                    "name"=> "Fan of the Week",
                    "message"=>'Our Fan of the week is '.$reslt[0]['user_name'].'...! Congratulations.'
                     );
            $this->facebook->api('/'.$reslt[0]['fb_userid'].'/feed', 'post', $allpost);
            }catch(Exception $e){
                $errormsg = $e->getMessage();
                return $errormsg;
            }
	}			
  } 
}