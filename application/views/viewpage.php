<?php
$this->load->helper('imageMgr');
$pid = $this->session->userdata("pid");
$ptoken = $this->session->userdata("ptoken");
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
$baseurl= base_url();
$temp_url = str_replace("https://", $protocol, $baseurl);
$temp_url_copy = str_replace("http://apps2.cuecow.com/homepage/get_user_pages", "http://apps2.cuecow.com/index.php/homepage/get_user_pages", "http://apps2.cuecow.com/index.php/homepage/get_user_pages");
?>
<link rel="stylesheet" href="<?=base_url();?>js/facefiles/facebox.css" />
<script src="<?=base_url();?>js/facefiles/facebox.js"></script>
<script type="text/javascript" src="<?=base_url();?>js/gs_sortable.js"></script>
<script type="text/javascript" src="<?=base_url();?>js/tablefilter.js"></script>

<script type="text/javascript">
<!--
var TSort_Data = new Array ('archivedtable', 's', 's','s','s','s');
tsRegister();
// -->
    $(function() { 
        var theTable = $('#activetable') //table.styled
        theTable.find("tbody > tr").find("td:eq(1)").mousedown(function(){});
        $("#filter").keyup(function() {
            $.uiTableFilter( theTable, this.value );
        })
        $('#filter-form').submit(function(){
            theTable.find("tbody > tr:visible > td:eq(1)").mousedown();
            return false;
        }).focus(); //Give focus to input field
    });
    
jQuery(document).ready(function($){ 
    $('a[rel*=facebox]').facebox(); 
});    
</script>
<script>
<?php if(isset($_REQUEST['upload'])){?>
        $(document).ready(function() { 
        $.facebox.settings.opacity = 0.5; 
        $.get('<?=$temp_url;?>index.php/page/coverlib', function(html){
            $.facebox(html);
        });
});
<? }?>
</script>
<script>
var result;
function copy_to_otherwall(l_id,dbapp_id,fbapp_id,temp_id,p_id,tabname)
{
    urlappday=window.location.href;
    var urlappdys = urlappday.split("://");
    var urlappdays=urlappdys[0];  
    $.ajax({
                type: 'POST',
                            'url': urlappdays+'://apps2.cuecow.com/index.php/homepage/get_user_pages_app_copy',
                            'data': {
                                'pid':p_id,
                                'fbappid':fbapp_id
                             },
                            'dataType': 'json',
                'success': function(response) {
                    result=response['result'];
                    console.log(result);
                    var dataHTML = '<h3>Please Select wall name</h3>';
                    $.each( result, function( key, value ) {
                      pagid=key;
                      pagname=result[key]['pagename'];
                      pagacctkon=result[key]['pageacctkn'];
                      dataHTML += '<div class="chkbx"><input style="float:left;" type="checkbox" name='+pagid+' id='+pagid+' value='+pagid+'><label style="padding-top:2px; font-size:12px; color:#0088CC; padding-left:18px; width:180px;">'+pagname+'</label></input></div>';
                    });
                      //dataHTML += '<a href="#" onClick="copytappstowall('+l_id+','+dbapp_id+','+fbapp_id+','+temp_id+','+p_id+',\''+tabname+'\')">Submit</a>'
                      dataHTML +='<div style="clear:both"></div><a style="margin-left:74px; margin-top:25px;" class="btn btn-success" href="#" onClick="copytappstowall('+l_id+','+dbapp_id+','+fbapp_id+','+temp_id+','+p_id+',\''+tabname+'\')">Copy</a><input style="margin-left:66px; margin-top:25px;" class="btn" type="button" value="Cancel" onClick="cancelfbb()"/>';
                      jQuery.facebox(dataHTML,'copywall,chkbx');
                },
                'error': function(){
                    console.log('Error');
                }
            });  
}

function copytappstowall(l_id,dbapp_id,fbapp_id,temp_id,p_id,tabname)
{ 
    urlappday=window.location.href;
    var urlappdys = urlappday.split("://");
    var urlappdays=urlappdys[0];  
    
    var selected_page = [];
    $.each( result, function( key, value ) 
    {
    if ($('#'+key).is(":checked"))
        {
           pagid=$('#'+key).val();
           pagname=result[key]['pagename'];
           pagacctkon=result[key]['pageacctkn'];

                var pages = {  
                        "pagid" :pagid,                                
                        "pagname" :pagname,
                        "pagacctkon" :pagacctkon 
                         };
     selectpage = { "pages" : pages };
     selected_page.push(selectpage);                   
        }
    });
  //console.log(selected_page[0]);
  var numberofselectedpage=selected_page.length;
  console.log(selected_page);
    $.ajax({
              type: 'POST',
                          'url': urlappdays+'://apps2.cuecow.com/index.php/homepage/copy_toother_wall',
                          'data': {
                              'lid':l_id,
                              'dbappid':dbapp_id,
                              'fbappid':fbapp_id,
                              'tempid':temp_id,
                              'selectedpage_arry':selected_page,
                              'pid':p_id
                           },
                          'dataType': 'json',
              'success': function(response) {
                  result=response['result'];
                  console.log(result);
                  var dataHTML = '<h3>App '+tabname+' copied to '+numberofselectedpage+' walls</h3>';
                  jQuery.facebox(dataHTML,'styleclass');
              },
              'error': function(){
                  console.log('Error');
              }
          }); 
}


var result2;
function copy_cover_pic(cover_name,p_id,cover_imgeurl)
{
    urlappday=window.location.href;
    var urlappdys = urlappday.split("://");
    var urlappdays=urlappdys[0];
    //console.log(urlappdays);
  $.ajax({
        type: 'POST',
                    'url': urlappdays+'://apps2.cuecow.com/index.php/homepage/get_user_pages',
                    'data': {
                        'pid':p_id
                     },
                    'dataType': 'json',
        'success': function(response) {
            result2=response['result'];
          //  console.log(result2);
            var dataHTML = '<h3>Please Select wall name</h3>';
             dataHTML += '<div class="select-all"><input style="float:left;" type="checkbox" onClick="togglecheckbox(this)"><label style="padding-top:2px; padding-left:5px; float:left;"><b>Selct All</b></label></input></div><div style="clear:both;"></div><div style="overflow: auto; height: 211px;" id="checkbox">';
            $.each( result2, function( key, value ) {
              pagid=key;
              pagname=result2[key]['pagename'];
              pagacctkon=result2[key]['pageacctkn'];
              dataHTML += '<div class="chkbx-fileds"><input style="float:left;" type="checkbox" name="chkbox" id='+pagid+' value='+pagid+'><label style="padding-top:2px; padding-left:5px; float:left;">'+pagname+'</label></input></div>';
            });
              
              dataHTML +='</div><div style="clear:both"></div><a style="margin-left:74px; margin-top:25px;" class="btn btn-success" href="#" onClick="copytcoverpic(\''+cover_name+'\',\''+cover_imgeurl+'\')">Copy</a><input style="margin-left:66px; margin-top:25px;" class="btn" type="button" value="Cancel" onClick="cancelfbb()"/>';
              jQuery.facebox(dataHTML,'copywall,chkbx');
        },
        'error': function(){
            console.log('Error');
        }
    });   
}

function copytcoverpic(cover_name,cover_url)
{
 urlappday=window.location.href;
 var urlappdys = urlappday.split("://");
 var urlappdays=urlappdys[0];    
 var selected_page = [];
    $.each( result2, function( key, value ) 
    {
    if ($('#'+key).is(":checked"))
        {
           pagid=$('#'+key).val();
           pagname=result2[key]['pagename'];
           pagacctkon=result2[key]['pageacctkn'];

                var pages = {  
                        "pagid" :pagid,                                
                        "pagname" :pagname,
                        "pagacctkon" :pagacctkon 
                         };
     selectpage = { "pages" : pages };
     selected_page.push(selectpage);                   
        }
    });
  //console.log(selected_page[0]);
  var numberofselectedpage=selected_page.length;
  
  console.log(selected_page);
    $.ajax({
        type: 'POST',
                    'url': urlappdays+'://apps2.cuecow.com/index.php/homepage/copy_coverpic',
                    'data': {
                        'covername':cover_name,
                        'selectedpage_arry':selected_page,
                        'coverurl':cover_url
                     },
                    'dataType': 'json',
        'success': function(response) {
            result=response['result'];
           // console.log(result);
            var dataHTML = '<h3>Cover picture copied to '+numberofselectedpage+' walls</h3>';
            jQuery.facebox(dataHTML,'styleclass');
        },
        'error': function(){
            console.log('Error');
        }
    });    
}
function cancelfbb()
{
   $.facebox.close();   
}

function togglecheckbox(source) {
  checkboxes = document.getElementsByName('chkbox');
  for(var i=0, n=checkboxes.length;i<n;i++) {
    checkboxes[i].checked = source.checked;
  }
}
</script>
<!--<div class="page_setting">-->
<div class="span9">
    <div style="height:308px;"> 
        <div>
            <div class="cover_picture" style="position:absolute;" >
                <?php if(isset($page_details['cover']['source'])){?>
                   <img src="<?=$page_details['cover']['source'];?>"  style="width:831px; height: 308px" />
                <?php } else { ?>   
                   <img src="<?=base_url();?>images/transimg.png"  style="width:831px; height: 268px" />
                <?php } ?>
                <div class="change_cover" style="position: absolute; bottom: 35px; right: 20px;">
                    <a href="<?=$temp_url;?>index.php/page/coverlib" rel="facebox" class="btn btn-small">Change Cover Picture</a>
                </div>
                <?php if(isset($page_details['cover']['source'])){
                    $parts = explode('/', $page_details['cover']['source']);
                    $cover_name = end($parts);
                    ?>   
                        <div class="change_cover" style="position: absolute; bottom: 5px; right: 30px;">
                            <a href="#" class="btn btn-small" onclick="copy_cover_pic('<?=$cover_name;?>',<?=$this->session->userdata("pid");?>,'<?=$page_details['cover']['source'];?>'); return false;" >Copy to Other Walls</a>
                        </div>
                <?php } ?>  
            </div>
        </div>
    </div>
    
    <div class="clear"></div>
    <div class="top_content_main" >
<!--    <div class="" style="position: absolute; bottom: 260px; right: 529px;">
         <a href="<?=$temp_url;?>index.php/page/proflie_pic" rel="facebox" class="btn btn-small">Change Profile Picture</a>
    </div>        -->
        <div class="fblogoimg"><img src="https://graph.facebook.com/<?=$page_details['id'];?>/picture?height=170&width=170" alt="Profile Photo" style="height: 145px; display: block" /></div>
        <div class="page_namelike">
             <strong><?=$page_details['name']?></strong><br />
            <span><?=(isset($page_details['likes']) ? $page_details['likes'] : 0 );?> like(s)</span>
        </div>    
        <div class="catagry_about">					
            <div  style="margin-top:5px;margin-left:8px; color: gray;"><?=$page_details['category'];?></div>
            <div class="clear"></div>
            <div style="margin-left:8px; margin-top: 1px; text-align:left; line-height: 13px; font-size: 12px; white-space: normal; word-break: normal;"><?php if(isset($page_details['about'])){ echo $page_details['about']; }else{ echo "About Not updated yet";}?></div>
        </div>
        <div style="float:right">
            <div class="pic-tab">
                    <div style="position:absolute;left:50px;top:25px;color:#1C2A47;font-size:20px;">
                    <strong>
                    <?=(isset($page_details['likes']) ? $page_details['likes'] : '');?>
                    </strong>
                    </div>
                <?php
                    $folderPath=base_url().'images/likesimg.jpg';
                    $imgname='likesimg.jpg';
                    $returnedpath = image_resize($imgname,102,67,$folderPath);
                ?>
                    <img src="<?=base_url().$returnedpath;?>" />
                <div class="clear"></div>
                <span >Likes</span>
            </div>
            <div class="pic-tab">
                <?php if(isset($page_pic['data'][0]['picture'])){?>
                        <img src="<?=$page_pic['data'][0]['picture'];?>" />
                  <?php } ?>      
                <div class="clear"></div>
                <span>Photos</span>
            </div>
                <?php if(isset($pagetabs[1]['image_url'])){?>
            <div class="pic-tab">
                    <?php
                    $folderPath=$pagetabs[1]['image_url'];
                    //list($a,$b,$c,$d,$e,$f)=explode('/',$folderPath);
                    //$returnedpath = image_resize($f,110,90,$folderPath);
                    ?>
                    <?php if(isset($pagetabs[1]['image_url'])){?>
                    <img src="<?=$folderPath;?>" />
                    <?php }else{?>
                    <img src="<?=base_url();?>images/pic-tab-four_06_01_03.png" />
                    <?php }?>
                <div class="clear"></div>
                <span><?=$pagetabs[1]['name'];?></span>
            </div>
                <?php } if(isset($pagetabs[2]['image_url'])){?>
            <div class="pic-tab">
                    <?php
                    $folderPath=$pagetabs[2]['image_url'];
                   // list($a,$b,$c,$d,$e,$f)=explode('/',$folderPath);
                   // $returnedpath = image_resize($f,110,90,$folderPath);
                    ?>
                    <?php if(isset($pagetabs[2]['image_url'])){?>
                    <img src="<?=$folderPath;?>"  />
                    <?php }else{?>
                    <img src="<?=base_url();?>images/pic-tab-four_06_01_03.png" />
                    <?php }?>
                <div class="clear"></div>
                <span><?=$pagetabs[2]['name'];?></span>
            </div>
                <?php }?>
                <div class="flip-btn">
                    <div class="tabs-count">
                        <div class="tabs-count-left"><strong><?=count($pagetabs);?></strong></div>
                        <div class="tabs-count-right"><img src="<?=base_url();?>images/tb-arrow_03.png" width="7" style="width: 7px;"/></div>
                    </div><!---- end tabs-count ------------->		
                </div>						
            </div>
            <div class="clear"></div>
    </div>
    <div class="clear"></div>
  <div align="right">
        <div style="padding-top:20px">
          <div class="page_nameactiveapps">
              <strong> <?=$page_details['name']?></strong>
              <span>Active Apps</span>            
          </div>        
          <div  class="edit_setting">
              <a href="<?=base_url();?>index.php/page/app" class="btn btn-success">Add New App</a>
          </div>
        </div>    
        <div class="clear"></div>
       <div class="midddle-content-data">
            <div class="clear"></div>
            <div class="middle-content-table">
                <table class="table" style="border:none;"> 
                    <tr>
                        <td colspan="0" class="fltr">
                            <form id="filter-form">Filter: <input type="text" name="filter" id="filter" placeholder="App name"></form>
                        </td>
                    </tr>
                    <tr>
                        <td class="activeapps" style="border:none;">
                            <table  id="activetable" class="table table-striped" cellpadding="0" cellspacing="0"> 
                                <thead> 
                                    <tr> 
                                        <th style="font-size:13px;width:45px;"><strong>Icon</strong></th>
                                        <th style="font-size:13px;width:330px;"><strong>Title</strong></th> 
                                        <th style="font-size:13px;width:210px;"><strong>Type</strong></th> 
                                        <th style="font-size:13px;width:35px;"><strong>Position</strong></th>
                                        <th style="font-size:13px;width:145px;"><strong>Published</strong></th>
                                        <th style="font-size:13px;width:145px;"><strong>Unpublished</strong></th>
                                        <th style="font-size:13px;width:40px;"><strong>Active</strong></th>
                                        <th style="font-size:13px;width:30px;  padding-left: 38px"><strong>Action</strong></th> 
                                    </tr> 
                                </thead> 
                                <tbody> 
                                    <?php 
                                     // var_dump($pagetabs);
                                    if(empty($pagetabs)){ $pagetabs = array();}
                                    foreach($pagetabs as $tabs){
                                        if(isset($tabs['flag'])){ $flag = $tabs['flag'];}else{ $flag = "";}
                                    ?>
                                    <tr>
                                        <td align="center" style="font-size:13px; width:135px; height: 60px">  
                                        <?php if ( $tabs['name']=="Photos" || $tabs['name']=="Events" || $tabs['name']=="Videos" ){
                                            ?>
                                            <img src="<?=base_url();?>images/photos.png" width="35" height="35" style="width: 35px; height: 35px;" />                                        
                                        <?php } else {
                                                $folderPath=$tabs['image_url'];  
                                                $parts = explode('/', $folderPath);
                                                $last = end($parts);
                                                $returnedpath = image_resize($last,60,60,$folderPath);
                                            ?>
                                            <img src="<?=base_url().$returnedpath;?>" width="60" height="60" style="height: 60px; width: 60px;"/>
                                        <?php }?>													
                                        </td> 
                                        <td align="center" style="font-size:13px;">
                                        <?php if($flag!=""){?>
                                        <a href="<?=base_url();?>index.php/page/viewtemplate?app=<?=base64_encode($tabs['id']);?>&tempid=<?=base64_encode($tabs['tempid']);?>&aid=<?=base64_encode($tabs['dbappid']);?>">
                                        <?=$tabs['name'];?>
                                        </a>
                                        <?php }else{?>
                                        <?=$tabs['name'];?>
                                        <?php }?>
                                        </td>
                                        <td align="center" style="font-size:13px;"><?php if($flag!=""){ echo $tabs['app_type']; }else{ echo "-"; }?></td>
                                        <td align="center" style="font-size:13px;"><?=$tabs['position'];?></td>
                                        <td align="center" style="font-size:13px;"><?php if($flag!=""){ echo date('Y-m-d', strtotime($tabs['published'])); }else{ echo "-";}?></td>
                                        <td align="center" style="font-size:13px;"><?php if($flag!=""){ echo date('Y-m-d', strtotime($tabs['unpublish'])); }else{ echo "-";}?></td>
                                        <td align="center" style="font-size:13px;">
                                        <?php 
                                        if($flag!="")
                                        {
                                            if($flag==1){ echo "Yes";}
                                            if($flag==0){ echo "No";}
                                        }
                                        else{ echo "Yes";}
                                        ?>
                                        </td>
                                        <td align="center" style="font-size:13px;">
                                            <div class="btn-group">
                                                <?php 
                                                if($flag!=""){?>
                                                    <a class="btn" href="<?=base_url();?>index.php/page/viewtemplate?app=<?=base64_encode($tabs['id']);?>&tempid=<?=base64_encode($tabs['tempid']);?>&aid=<?=base64_encode($tabs['dbappid']);?>" title="Edit" >
                                                        <i class="icon-edit"></i>
                                                    </a>
                                                    <a class="btn"  href="<?=base_url();?>index.php/page/clone_app?lid=<?=base64_encode($tabs['lid']);?>&dbappid=<?=base64_encode($tabs['dbappid']);?>&fbappid=<?=base64_encode($tabs['fbappid']);?>&tempid=<?=base64_encode($tabs['tempid']);?>" title="Clone App" >
                                                        <i class="icon-th-large"></i> 
                                                    </a>
                                                    <a class="btn"  href="<?=base_url();?>index.php/page/delltab?appid=<?=base64_encode($tabs['id']);?>&lid=<?=base64_encode($tabs['lid']);?>&tempid=<?=base64_encode($tabs['tempid']);?>&fbappid=<?=base64_encode($tabs['fbappid']);?>&dbappid=<?=base64_encode($tabs['dbappid']);?>&flag=<?=$flag;?>" onclick=" return confirm('Are you sure you want to delete this tab?');">
                                                        <i class="icon-trash"></i>
                                                    </a>
                                                    <a class="btn" href="<?=$tabs['bitly_link'];?>" target="_blank" title="Right click to copy link, Left click to follow link">
                                                        <i class="icon-share"></i>
                                                    </a>
                                                <?php }else{?>
                                                    <a class="btn disabled" href="#" >
                                                        <i class="icon-edit"></i>
                                                    </a>
                                                    <a class="btn disabled"  href="#" >
                                                        <i class="icon-th-large"></i> 
                                                    </a>
                                                    <a class="btn"  href="<?=base_url();?>index.php/page/delltabfacebook?appidurl=<?=base64_encode($tabs['name']);?>" onclick=" return confirm('Are you sure you want to delete this tab from facebook?');">
                                                        <i class="icon-trash"></i>
                                                    </a>
                                                    <a class="btn disabled" href="#">
                                                        <i class="icon-share"></i>
                                                    </a>
                                                <?php }?>																
                                            </div>
                                           <?php 
                                                if($flag!=""){?>
                                                <div style="margin-top: 5px;">
                                                    <a class="btn"  href="#" title="Copy to other Facebook walls" onclick="copy_to_otherwall(<?=$tabs['lid'];?>,<?=$tabs['dbappid'];?>,<?=$tabs['fbappid'];?>,<?=$tabs['tempid'];?>,<?=$this->session->userdata("pid");?>,'<?=$tabs['name'];?>'); return false;"> 
                                                       Copy to walls
                                                    </a>
                                                </div>   
                                           <?php }?>  
                                        </td>
                                    </tr>
                                    <?php }?>
                                </tbody> 
                            </table>
                        </td>
                    </tr>
                    <!--pending apps start-->
                   <tr>
                        <td height="20" style="border:none;">
                            <div class="page_namearchiveapps"><strong><?=$page_details['name']?></strong> 
                           <span>Pending Apps</span></div>
                        </td>
                    </tr>
<!--                   Pending App Grid-->
                    <tr>
                        <td class="activeapps" style="border:none;">
                            <table id="pendingtable" class="table table-striped styled" cellpadding="0" cellspacing="0"> 
                                <thead>  
                                    <tr> 
                                        <th style="font-size:13px;width:45px;"><strong>Icon</strong></th>
                                        <th style="font-size:13px;width:330px;"><strong>Title</strong></th> 
                                        <th style="font-size:13px;width:130px;width:210px;"><strong>Type</strong></th> 
                                        <th style="font-size:13px;width:35px;"><strong>Position</strong></th>
                                        <th style="font-size:13px;width:145px;"><strong>Published</strong></th>
                                        <th style="font-size:13px;width:145px;"><strong>Unpublished</strong></th>
                                        <th style="font-size:13px;width:40px;"><strong>Active</strong></th>
                                        <th style="font-size:13px;width:30px; padding-left: 38px"><strong>Action</strong></th> 
                                    </tr> 
                                </thead> 
                                <tbody> 
                                    <?php 
                                    if(empty($pendingapps)){ $pendingapps = array();}
                                    foreach($pendingapps as $ptabs){?>
                                    <tr>
                                        <td align="center" style="font-size:13px; width:135px; height: 60px">
                                            <?php
                                              $folderPath=$ptabs['image_url'];
                                              list($a,$b,$c,$d,$e,$f)= explode('/', $ptabs['image_url']);
                                              $returnedpath = image_resize($f,60,60,$folderPath);
                                            ?>
                                            <img src="<?=base_url().$returnedpath;?>" width="60" height="60" style="height: 60px; width: 60px;" /></td>
                                        <td align="center" style="font-size:13px;">
                                            <a href="<?=base_url();?>index.php/page/viewtemplate?app=<?=base64_encode($ptabs['id']);?>&tempid=<?=base64_encode($ptabs['tempid']);?>&aid=<?=base64_encode($ptabs['dbappid']);?>">
                                                <?=$ptabs['name'];?>
                                            </a>
                                        </td>
                                        <td align="center" style="font-size:13px;"><?=$ptabs['app_type'];?></td>
                                        <td align="center" style="font-size:13px;"><?=$ptabs['position'];?></td>
                                        <td align="center" style="font-size:13px;"><?=date('Y-m-d', strtotime($ptabs['published']));?></td>
                                        <td align="center" style="font-size:13px;"><?=date('Y-m-d', strtotime($ptabs['unpublish']));?></td>
                                        <td align="center" style="font-size:13px;">No</td>
                                        <td align="center" style="font-size:13px;">
                                            <div class="btn-group">
                                                    <a class="btn" href="<?=base_url();?>index.php/page/viewtemplate?app=<?=base64_encode($ptabs['id']);?>&tempid=<?=base64_encode($ptabs['tempid']);?>&aid=<?=base64_encode($ptabs['dbappid']);?>" title="Edit" >   
                                                        <i class="icon-edit"></i>
                                                         <!--<img src="<?=base_url();?>images/edit-icon_07.png" width="23" />-->
                                                    </a>
                                                    <a class="btn" href="<?=base_url();?>index.php/page/clone_app?lid=<?=base64_encode($ptabs['lid']);?>&dbappid=<?=base64_encode($ptabs['dbappid']);?>&fbappid=<?=base64_encode($ptabs['fbappid']);?>&tempid=<?=base64_encode($ptabs['tempid']);?>" title="Clone App" >
                                                       <i class="icon-th-large"></i> 
                                                       <!--<img src="<?=base_url();?>images/cloneimg.png" width="23" />-->
                                                    </a>
                                                    <a class="btn" href="<?=base_url();?>index.php/page/delltab_ac?lid=<?=base64_encode($ptabs['lid']);?>&tempid=<?=base64_encode($ptabs['tempid']);?>&fbappid=<?=base64_encode($ptabs['fbappid']);?>&dbappid=<?=base64_encode($ptabs['dbappid']);?>" onclick=" return confirm('Are you sure you want to delete this tab?');" title="Delete">
                                                        <i class="icon-trash"></i>
                                                    </a>
                                                    <a class="btn" href="<?=$ptabs['bitly_link'];?>" target="_blank" title="Right click to copy link, Left click to follow link">
                                                        <i class="icon-share"></i>
                                                    </a>
                                            </div>
                                            <div style="margin-top: 5px;">
                                                <a class="btn"  href="#" title="Copy to other Facebook walls" onclick="copy_to_otherwall(<?=$tabs['lid'];?>,<?=$tabs['dbappid'];?>,<?=$tabs['fbappid'];?>,<?=$tabs['tempid'];?>,<?=$this->session->userdata("pid");?>,'<?=$tabs['name'];?>'); return false;"> 
                                                   Copy to walls
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php }?>
                                </tbody> 
                            </table>
                        </td>
                    </tr> <!--End pending App Grid--> 
                    <tr>
                        <td height="20" style="border:none;">
                            <div class="page_namearchiveapps"><strong><?=$page_details['name']?></strong> 
                           <span>Archived Apps</span></div>
                        </td>
                    </tr>
<!--                    Archived App Grid-->
                    <tr>
                        <td class="activeapps" style="border:none;">
                            <table id="archivedtable" class="table table-striped styled" cellpadding="0" cellspacing="0"> 
                                <thead>  
                                    <tr> 
                                        <th style="font-size:13px;width:45px;"><strong>Icon</strong></th>
                                        <th style="font-size:13px;width:330px;"><strong>Title</strong></th> 
                                        <th style="font-size:13px;width:130px;width:210px;"><strong>Type</strong></th> 
                                        <th style="font-size:13px;width:35px;"><strong>Position</strong></th>
                                        <th style="font-size:13px;width:145px;"><strong>Published</strong></th>
                                        <th style="font-size:13px;width:145px;"><strong>Unpublished</strong></th>
                                        <th style="font-size:13px;width:40px;"><strong>Active</strong></th>
                                        <th style="font-size:13px;width:30px; padding-left: 38px"><strong>Action</strong></th> 
                                    </tr> 
                                </thead> 
                                <tbody> 
                                <!--<pre><?php //print_r($archivedtab);?></pre>-->
                                    <?php 
                                    // $getappid = array(1,2,32,4);
                                    if(empty($archivedtab)){ $archivedtab = array();}
                                    foreach($archivedtab as $atabs){?>
                                    <tr>
                                        <td align="center" style="font-size:13px; width:135px; height: 60px">
                                            <?php
                                              $folderPath=$atabs['image_url'];
                                              list($a,$b,$c,$d,$e,$f)= explode('/', $atabs['image_url']);
                                              $returnedpath = image_resize($f,60,60,$folderPath);
                                            ?>
                                            <img src="<?=base_url().$returnedpath;?>" width="60" height="60" style="height: 60px; width: 60px;" /></td>
                                        <td align="center" style="font-size:13px;">
                                            <a href="<?=base_url();?>index.php/page/viewtemplate?app=<?=base64_encode($atabs['id']);?>&tempid=<?=base64_encode($atabs['tempid']);?>&aid=<?=base64_encode($atabs['dbappid']);?>">
                                                <?=$atabs['name'];?>
                                            </a>
                                        </td>
                                        <td align="center" style="font-size:13px;"><?=$atabs['app_type'];?></td>
                                        <td align="center" style="font-size:13px;"><?=$atabs['position'];?></td>
                                        <td align="center" style="font-size:13px;"><?=date('Y-m-d', strtotime($atabs['published']));?></td>
                                        <td align="center" style="font-size:13px;"><?=date('Y-m-d', strtotime($atabs['unpublish']));?></td>
                                        <td align="center" style="font-size:13px;">No</td>
                                        <td align="center" style="font-size:13px;">
                                            <div class="btn-group">
                                                    <a class="btn" href="<?=base_url();?>index.php/page/viewtemplate?app=<?=base64_encode($atabs['id']);?>&tempid=<?=base64_encode($atabs['tempid']);?>&aid=<?=base64_encode($atabs['dbappid']);?>" title="Edit" >   
                                                        <i class="icon-edit"></i>
                                                         <!--<img src="<?=base_url();?>images/edit-icon_07.png" width="23" />-->
                                                    </a>
                                                    <a class="btn" href="<?=base_url();?>index.php/page/clone_app?lid=<?=base64_encode($atabs['lid']);?>&dbappid=<?=base64_encode($atabs['dbappid']);?>&fbappid=<?=base64_encode($atabs['fbappid']);?>&tempid=<?=base64_encode($atabs['tempid']);?>" title="Clone App" >
                                                       <i class="icon-th-large"></i> 
                                                       <!--<img src="<?=base_url();?>images/cloneimg.png" width="23" />-->
                                                    </a>
                                                    <a class="btn" href="<?=base_url();?>index.php/page/delltab_ac?lid=<?=base64_encode($atabs['lid']);?>&tempid=<?=base64_encode($atabs['tempid']);?>&fbappid=<?=base64_encode($atabs['fbappid']);?>&dbappid=<?=base64_encode($atabs['dbappid']);?>" onclick=" return confirm('Are you sure you want to delete this tab?');" title="Delete">
                                                        <i class="icon-trash"></i>
                                                    </a>
                                                    <a class="btn" href="<?=$atabs['bitly_link'];?>" target="_blank" title="Right click to copy link, Left click to follow link">
                                                        <i class="icon-share"></i>
                                                    </a>
                                            </div>
                                            <div style="margin-top: 5px;">
                                                <a class="btn"  href="#" title="Copy to other Facebook walls" onclick="copy_to_otherwall(<?=$tabs['lid'];?>,<?=$tabs['dbappid'];?>,<?=$tabs['fbappid'];?>,<?=$tabs['tempid'];?>,<?=$this->session->userdata("pid");?>,'<?=$tabs['name'];?>'); return false;"> 
                                                   Copy to walls
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php }?>
                                </tbody> 
                            </table>
                        </td>
                    </tr> <!--End Archived App Grid-->
                </table>
            </div>
            <br />
        </div>
         <!--end middle right--> 
    </div> 
</div>
</div
<div style="clear:both;"></div>
