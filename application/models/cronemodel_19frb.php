<?php
class cronemodel extends CI_Model{
    
    public function __construct()
    {    
        $this->load->database();
        $this->load->model('facebookobj');
        $this->facebookobj->admin_makeobj(APPID,APPSECRET);
        $this->load->database();
        date_default_timezone_set('Europe/Zagreb');
    }	
    
    public function dopublish_tab()
    {
        $date = date('Y-m-d G:i:s');
        $qry = "Select * from installed_apps where published<= '$date' and unpublish > '$date' and flag=0 and isdell=0";
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
                    $args = 
                        array(
                        "access_token" => $r['paccess_token'], 
                        "app_id" => $r['fbappid'],
                        );		
                    $addtab = $this->facebook->api("/".$r['pid']."/tabs/",'post',$args);				
                    $this->facebook->setFileUploadSupport(true);
                    $full_image_path = realpath("images/tabicons/".$r['tabicon']);
                    $args2 =
                        array(
                            "access_token" => $r['paccess_token'],
                            "custom_name" => $r['tabname'], 
                            'custom_image' => '@' . $full_image_path,	
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
        $crnqry = "Select id,pid,tempid,comadminemail from installed_apps where competitionenddate < '$date' and competitionenddate<>'0000-00-00 00:00:00' and dbappid=2 and mailflag=0 and isdell=0";
        $query = $this->db->query($crnqry);
        $result = $query->result_array();
        if(count($result))
        {
            foreach ($result as $row)
            {      
                //echo "<pre>"; print_r($row); echo "</pre><br><br>";
                $query1 = $this->db->query("Select id,optiontxt from app_quizoptions where questionid=".$row['qid']." and is_true=1 and isdell=0");
                $result1 = $query1->result_array();
                $rz = $result1[0];

                //define separator (defines columns in excel & tabs in word) 
                $sep = ","; //tabbed character 
                $csvfile = 'images/participating-visitors-data.csv';
                $fp = fopen($csvfile, "w"); 
                $schema_insert = "";
                $schema_insert_rows = ""; 

                //start of adding column names as names of MySQL fields 
                $headings = "Name".$sep."Email".$sep."Address".$sep."Phone".$sep."Correct Answer".$sep."Correct Answer Text".$sep."IP Address".$sep."Datetime\r\n";
                fwrite($fp, $headings);

                $data =  $row['name'].$sep.$row['email'].$sep.$row['address'].$sep.$row['phone'].$sep.($row['option']==$rz['id'] ? "Yes" : 'No').$sep.preg_replace('/[.,]/', '', $sep.$rz['optiontxt']) .$sep.$row['ipaddress'].$sep.$row['datetime']."\r\n"; //data
                fwrite($fp, $data);

                $fc = fclose($fp);
                $this->load->library('email');
                $this->email->clear();

                $this->email->from('info@apps.cuecow.com', 'CueCow Apps');
                $this->email->to($row['comadminemail']); 
                $this->email->cc('useevs@gmail.com');
                //$this->email->bcc(' csv@cuecow.com');  //kim.hvidkjaer@gmail.com


                $this->email->subject('Cuecow Apps Competition Result');
                $this->email->message('Find Attached Result file of your competition on Cuecow Apps <br>
                --
                <br>
                This is an automated message from http://apps.cuecow.com');	
                $this->email->attach($csvfile);
                if($this->email->send())
                {
                    $this->db->query("Update installed_apps set mailflag=1 where id=".$row['id']."");
                    $this->db->query("Insert into log_table (name,message,addedtime) values ('Publish Crone',' CSV file sent ',now())");
                }
                else
                {
                    $this->db->query("Insert into log_table (name,message,addedtime) values ('Publish Crone',' Mail not send',now())");
                }
            }
        }        
    }
    
    public function do_gallerycsvfilecrone()
    {
        $date = date('Y-m-d G:i:s');
        $crnqry2 = "Select id,pid,tempid,comadminemail,fbappid from installed_apps where competitionenddate < '$date' and competitionenddate<>'0000-00-00 00:00:00' and mailflag=0 and isdell=0";
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
                
                $this->load->library('email');
                $this->email->clear();

                $this->email->from('info@apps.cuecow.com', 'CueCow Apps');
                $this->email->to($row['comadminemail']); 
                $this->email->cc('useevs@gmail.com');
                //$this->email->bcc(' csv@cuecow.com');  //kim.hvidkjaer@gmail.com


                $this->email->subject('Cuecow Apps Competition Result');
                $this->email->message('Find Attached Result file of your competition on Cuecow Apps 
                --
                
                This is an automated message from http://apps2.cuecow.com');	
                $this->email->attach($csvfile);
                if($this->email->send())
                {
                    $this->db->query("Update installed_apps set mailflag=1 where id=".$row['id']."");
                    $this->db->query("Insert into log_table (name,message,pid,addedtime) values ('CSV file Crone',' CSV file sent ','".$row['pid']."',now())");
                }
                else
                {
                    $this->db->query("Insert into log_table (name,message,pid,addedtime) values ('CSV file Crone',' Mail not send','".$row['pid']."',now())");
                }
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
        //echo "<pre>"; print_r($getrz); echo "</pre><br>";
        //exit();
        foreach($getrz as $rz)
        {
            $qry1 = "Select id,rheading,linkdate from chrismassapp_subpgvalue where pid=".$rz['pid']." and fb_appid=".$rz['fbappid']." and subpgtype in (2,3) and winbit=0";
            $query1 = $this->db->query($qry1);
            $getrz1 = $query1->result_array();
            foreach($getrz1 as $rz1)
            {
                $qry2 = "SELECT * FROM `chrismassapp_competition_vistors` WHERE competition_id=".$rz1['id']." order by rand() limit 1";
                $query2 = $this->db->query($qry2);
                $getrz2 = $query2->result_array();
                if(count($getrz2)>0)
                {
                    $rz2 = $getrz2[0];
                    
                    $qry3 = "Insert into chrismassapp_competition_winners 
                    (name,email,pid,fb_appid,tempid,competition_id,competition_name,linkdate,addeddate) values
                    ('".$rz2['name']."','".$rz2['email']."','".$rz['pid']."','".$rz['fbappid']."','".$rz['tempid']."',
                    '".$rz1['id']."','".strip_tags($rz1['rheading'],'')."','".$rz1['linkdate']."',now()
                    )";
                    $query3 = $this->db->query($qry3);
                    /*if($query3)
                    {
                        $this->load->library('email');
                        $this->email->clear();

                        $this->email->from('info@apps.cuecow.com', 'CueCow Apps');
                        $this->email->to($rz2['email']); 
                        //$this->email->cc($ccemail);

                        $email_body = "hi, ".$rz2['name']." <br>

                        You are being picked winner of the day on Cuecow Apps
                        --
                        This is an automated message from http://apps2.cuecow.com";

                        $this->email->subject($rz2['name'].'you are being picked winner of th day on Cuecow Apps');
                        $this->email->message($email_body);
                        $m = $this->email->send();
                    }*/
                    
                }
             
             $qry4 = "Update chrismassapp_subpgvalue set winbit=1 where id=".$rz1['id'];
             $this->db->query($qry4);
             
            }
        }        
    }
}