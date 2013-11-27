<?php
class helper_model extends CI_Model{
    
    public function __construct()
    {    
        $this->load->database();
        date_default_timezone_set('Europe/Zagreb');
    }
   
  function insert_recordEmails($email_frm,$email_to,$account_name,$pgid,$tempid,$fbappid,$subject,$message,$app_type,$app_name)
  {
    $emltime = date('G:i:s');
    $qry = "Insert into email_record(email_frm,to_email,subject,message,email_date,app_type,app_name,account_name,tempid,pgid,fbappid,email_time) values ('".$email_frm."','".$email_to."','".$subject."','".$message."',now(),'".$app_type."','".$app_name."','".$account_name."','".$tempid."','".$pgid."','".$fbappid."','".$emltime."')";
    $this->db->query($qry);      
  }
  
  function update_instalapps($rowid)
  {
    $this->db->query("Update installed_apps set mailflag=1 where id=".$rowid."");    
  }
  
  function insert_logtable()
  {
      $this->db->query("Insert into log_table (name,message,addedtime) values ('Publish Crone',' CSV file sent ',now())");   
  }
}  