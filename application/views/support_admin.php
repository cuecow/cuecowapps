<script>
  $(document).ready(function(){
        console.log("I am ready");
        setTimeout(function() {            
            document.getElementById('dalerts').style.display='none';
        }, 1500);        
        
  });  
</script>
<?php
$inf_msg = $this->session->userdata('INF_MSG_FILE');
$err_msg = $this->session->userdata('ERR_MSG_FILE');
if(!empty($inf_msg)){?>
     <div class="alert alert-success" id="dalerts"> 
          <button type="button" class="close" data-dismiss="alert">&times;</button>   
         <?php 
            echo $inf_msg; 
            $this->session->unset_userdata('INF_MSG_FILE');
            ?>
        </div>
<?php }else if(!empty($err_msg)){?>
     <div class="alert alert-error" id="dalerts"> 
         <button type="button" class="close" data-dismiss="alert">&times;</button>  
          <?php 
            echo $err_msg;
            $this->session->unset_userdata('ERR_MSG_FILE');
            ?>
    </div>
<?php }?>
<div class="title-crumbs">
    <h2 style="margin-bottom:5px;" align="center">Manage Deploy File</h2>
    <br />
</div>
<div id="mainraper" style="background-color:#FFFFFF;">
    <div id="setting-page-content-main" class="setting-page-content-main" style="float: right;width:800px;">
       <form id="frm" name="frm" method="post" action="<?=  base_url()?>index.php/page/create_deployFile" >  
            <div class="span4" style="width:100px;">
                <h4>Time:</h4>
            </div><!--- span6 --->
            <div class="span4">
                <input type="text" style="float:left; width:206px !important" name="deploytime" id="deploytime" class="timepicker input-cnt-44-one" value="<?php if(isset($deploy_time)) {echo $deploy_time; } ?>" />
            </div><!--- span5 --->
            <div class="clearfix"></div>
            <div class="span4"  style="width:100px;">
                <h4>Date:</h4>
            </div><!--- span6 --->
            <div class="span4">
                <input type="text" id="deploydate" class="datepicker input-cnt-44-two" style=" width:206px !important;" name="deploydate" value="<?php if(isset($deploy_date)){ echo $deploy_date;} ?>" />
            </div><!--- span5 --->
            <div class="clearfix"></div> 
             <div class="span4"  style="width:100px;">
                <h4>Message:</h4>
            </div><!--- span6 --->
            <div class="span4">
                <div class="feild-cnt">
                    <textarea name="message"><?php if(isset($deploy_msg)) echo $deploy_msg; ?></textarea>
                </div><!--- radio btns ---->
            </div><!--- sett-input-content --->
            <div class="clearfix"></div>
            <div style="width:478px; float:right; margin-top:16px">
                <?php  if(isset($file_exist) && $file_exist=="file_exist")
                 { ?>
                  <button type="submit" class="btn btn-success">Update</button> 
                <?php  } else { ?>
                  <button type="submit" class="btn btn-success">Create</button>
               <?php  }?>
            </div>
        </form> 
        <div class="clearfix"></div>
        <form id="frm" name="frm" method="post" action="<?=  base_url()?>index.php/page/delete_deployFile" >
            <div style="margin-top: -30px; float: left; margin-left: 158px;">
                <?php if(isset($file_exist) && $file_exist=="file_exist")
                    { ?>
                      <button type="submit" class="btn btn-success">Delete</button> 
                <?php } ?> 
           </div>           
        </form>
            <div style="clear:both"></div>								
    </div><!-- setting-page-content-main -->
</div>	