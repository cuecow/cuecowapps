
<link rel="stylesheet" href="<?=base_url();?>js/facefiles/facebox.css" />
<script src="<?=base_url();?>js/facefiles/facebox.js"></script>
<?php 
date_default_timezone_set('Europe/Zagreb');
$date = date('m/d/Y' ,strtotime ('-7 day'));
?>
<script>
 jQuery(document).ready(function($){ 

        $('a[rel*=facebox]').facebox();
});

function searchemails()
   {
    datefrm=$("#frmdate").val();
    dateto=$("#todate").val(); 
    cuecowacc=$("#coecowacc").val();
    emailto=$("#eamilto").val();
    
    $.ajax({
             type: 'POST',
                        'url': 'search_emails',
                        'data': {
                            'date_frm': datefrm,
                            'date_to': dateto,
                            'cuecow_acc': cuecowacc,
                            'email_to': emailto
                        },
                        'dataType': 'json',
            'success': function(response) {
                emails_data=response['result'];
                $('#emailsdata').empty();
                $('#emailsdata').append('<tr><thead><th>Email From</th><th>Email To</th><th>Subject</th><th style="width: 80px;">App type</th><th style="width: 80px;">App Name</th><th style="width: 114px;">Account Name</th><th>Date</th><th>Time</th></tr></thead>');
                if(emails_data.length==0){$('#norecord').show();}
                if(emails_data.length > 0){$('#norecord').hide();}
                $('#emailsdata').append('<tbody>');
                for(s=0;s<emails_data.length;s++) 
                     {
                      $('#emailsdata').append('<tr class="white-row" id=emildata'+s+'></tr>');
                      emalidate=emails_data[s]['email_date'];
                      dateslpit=emalidate.split('-');
                      email_date=dateslpit[1]+"/"+dateslpit[2]+"/"+dateslpit[0];
                              $('#emildata'+s).append('<td class="text-align">'+emails_data[s]['email_frm']+'</td>');
                              $('#emildata'+s).append('<td class="text-align">'+emails_data[s]['to_email']+'</td>');    
                              $('#emildata'+s).append('<td><a href="#" onClick="full_email('+emails_data[s]['id']+'); return false;">'+emails_data[s]['subject']+'</a></td>');
                              $('#emildata'+s).append('<td class="text-align">'+emails_data[s]['app_type']+'</td>');
                              $('#emildata'+s).append('<td class="text-align">'+emails_data[s]['app_name']+'</td>');
                              $('#emildata'+s).append('<td class="text-align">'+emails_data[s]['account_name']+'</td>');
                              $('#emildata'+s).append('<td class="text-align">'+email_date+'</td>');
                              $('#emildata'+s).append('<td class="text-align">'+emails_data[s]['email_time']+'</td>');
                     }
                $('#emailsdata').append('</tbody>');     
            },
            'error': function(){
                console.log('Error');
            }
        });   
   }
   
 function full_email(emilid)
 {
  $.ajax({
             type: 'POST',
                        'url': 'get_fullemial',
                        'data': {
                            'emil_id': emilid
                        },
                        'dataType': 'json',
                'success': function(response) {
                resultdata=response['result'];
                
                email_frm=resultdata[0]['email_frm'];
                to_email=resultdata[0]['to_email'];
                subject=resultdata[0]['subject'];
                message=resultdata[0]['message'];
                apptype=resultdata[0]['app_type'];
                appname=resultdata[0]['app_name'];
                accname=resultdata[0]['account_name'];
                emldate=resultdata[0]['email_date'];
                emltime=resultdata[0]['email_time'];
                    var dataHTML = '<h3 style="padding:5px 0; text-align:center;">Email Detail</h3>';
                    dataHTML += '<div style="height:335px; width:635px;overflow: auto;">';
                    dataHTML += '<div><strong style="float:left;margin-right: 5px;">Email From: </strong> <p style="float:left">' +email_frm+'</p></div><div class="clear"></div>';
                    dataHTML += '<div><strong style="float:left;margin-right: 5px;">Email To: </strong><p style="float:left"> ' +to_email+'</p></div><div class="clear"></div>';
                    dataHTML += '<div><strong style="float:left;margin-right: 5px;">Subject: </strong><p style="float:left"> ' +subject+'</p></div><div class="clear"></div>';
                    dataHTML += '<div><strong style="float:left;">Message:</strong></div><div class="clear"></div><div><pre>'+message+'</pre></div><div class="clear"></div>';
                    dataHTML += '<div><strong style="float:left;margin-right: 5px;">App type: </strong><p style="float:left"> ' +apptype+'</p></div><div class="clear"></div>';
                    dataHTML += '<div><strong style="float:left;margin-right: 5px;">App name: </strong><p style="float:left"> ' +appname+'</p></div><div class="clear"></div>';
                    dataHTML += '<div><strong style="float:left;margin-right: 5px;">Account Name: </strong><p style="float:left"> ' +accname+'</p></div><div class="clear"></div>';
                    dataHTML += '<div><strong style="float:left;margin-right: 5px;">Date: </strong><p style="float:left"> ' +emldate+'</p></div><div class="clear"></div>';
                    dataHTML += '<div><strong style="float:left;margin-right: 5px;">Time: </strong><p style="float:left"> ' +emltime+'</p></div><div class="clear"></div>';
                    dataHTML += '<div style="margin-right: 2px;"><button type="button" class="btn btn-primary"  style="float:right" onClick="resend_email('+emilid+');">Resend Email</button><div>';
                    dataHTML += '</div>';
                    jQuery.facebox(dataHTML,'styleclass');
            }
   });  
   return false;
 }
 
function resend_email(emlid)
{
  $.ajax({
             type: 'POST',
                        'url': 'resend_emial',
                        'data': {
                            'emilid': emlid
                        },
                        'dataType': 'json',
                'success': function(response) {
                    jQuery.facebox('<div class="alert alert-success">Email resend Successfully</div>','styleclass');
                }
  });     
}
</script>    
<div class="span9" style="95% !important">
    <div id="contentdata">
        <h3 style="margin-left: 390px; margin-bottom: 10px;">Email Administration</h3>
        <div id="mainraper" style="background-color:#FFFFFF;">
            <form id="frm" name="frm" method="post" action="#">   
            <div id="setting-page-content-main" class="setting-page-content-main" style="margin-left: 28%">
                <div class="clearfix"></div>
                <div class="span4" style="width:260px;">
                    <h4>Date:</h4>
                </div><!--- span6 --->
                <div class="span4" style="width:240px">
                    <input type="text" style=" width:90px !important;" id="frmdate" class="datepicker input-cnt-44-two" name="frmdate" value="<?=$date;?>" /> To <input type="text" style="float: right; width:90px !important;" id="todate" class="datepicker input-cnt-44-two" name="todate" value="" />
                </div><!--- span5 --->
                <div class="clearfix"></div>
                <div class="span4" style="width:260px;">
                    <h4>Cuecow Account:</h4>
                </div><!--- span6 --->
                <div class="span4" style="width:235px">
                    <input type="text" style=" width:220px !important;" id="coecowacc" name="coecowacc" value="" />
                </div><!--- span5 --->
                <div class="clearfix"></div>
                <div class="span4" style="width:260px;">
                    <h4>Email To:</h4>
                </div><!--- span6 --->
                <div class="span4" style="width:235px">
                    <input type="text" style=" width:220px !important;" id="eamilto" name="eamilto"  value="" />
                </div><!--- span5 --->
                <div class="clearfix"></div>
                <div style="width:115px; float:right;">
                    <a href="#" class="btn btn-primary" onclick="searchemails(); return false;">Search</a>
                </div>
                <div style="clear:both"></div>
            </div><!-- setting-page-content-main -->
           </form> 
<div class="clear"></div>
<div style="height:600px; overflow: auto; margin-top: 20px; width:1111px">
 <table id="emailsdata" class="table table-striped" cellpadding="0" cellspacing="0">
   <thead>
     <tr>
         <th>Email From</th>
         <th>Email To</th>
         <th>Subject</th>
         <th>App type</th>
         <th>App Name</th>
         <th>Account Name</th>
         <th>Date</th>
         <th>Time</th>
   </tr>
   </thead> 
 </table>
 <div id="norecord" class="alert alert-error" >There is no recored found</div>   
 </div> 

        </div>    
    </div>
</div>