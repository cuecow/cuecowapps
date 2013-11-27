<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if(!function_exists('email_Mgr'))
{
    function email_Mgr($email_frm,$email_to,$email_cc,$subject,$message,$attach,$account_name,$rowid,$pgid,$tempid,$fbappid,$app_type,$app_name)
    {
        $CI =& get_instance();
        $CI->load->model('helper_model');
        $CI->load->library('email');
        $CI->email->clear();

        $CI->email->from($email_frm);
        $CI->email->to($email_to); 
        if($email_cc!=""){$CI->email->cc($email_cc);}

        $CI->email->subject($subject);
        $CI->email->message($message);
        if($attach!=""){$CI->email->attach($attach);}
        if($CI->email->send())
        {  
          $CI->helper_model->insert_recordEmails($email_frm,$email_to,$account_name,$pgid,$tempid,$fbappid,$subject,$message,$app_type,$app_name);
          if($rowid!="")
           {
            $CI->helper_model->update_instalapps($rowid);  
            $CI->helper_model->insert_logtable();
           }
        }else
            {
              $CI->helper_model->insert_logtable();
            } 
    }
}  