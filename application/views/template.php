<!--/********************Tabs**********************************-->
<script src="<?=base_url();?>js/tabs/jquery-ui.min.js"></script>
<script src="<?=base_url();?>js/manage_scroll.js"></script>
<?php $tabid = (isset($_REQUEST['tabid']) ? $_REQUEST['tabid'] : 0 );?>
<script>
$(document).ready(function() {
$("#tabs").tabs()
$("#tabs").tabs("option", "selected",<?=$tabid;?>)
});
</script>
<!--/********************End Tabs**********************************-->
<link rel="stylesheet" href="<?=base_url();?>js/facefiles/facebox.css" />
<script src="<?=base_url();?>js/facefiles/facebox.js"></script>	
<!--<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" />
<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>-->

<script>
jQuery(document).ready(function($){
    
    // Save scroll position on editing any field
    $('.editdiv').click( function() { saveScroll(); } );
    $('.editlink').click( function() { saveScroll(); } );
    // Load the scroll, saved at the time of editing
    loadScroll(true);
    
    
    $(".editdiv").facebox();
    $('a[rel*=facebox]').facebox();
    
    
    
//    $('#hideshow').live('click', function(event) {
//        $('.tempeditpng').toggle('show');
//        if($('#hideshow').text()=="Preview")
//        {
//            //alert('Edit');
//            $(this).text("Edit");            
//        }
//        else if($('#hideshow').text()=="Edit")
//        {
//            //alert('Preview');
//            $(this).text("Preview");            
//        }        
//    });

    //window.scrollTo(0,530)
    
});

function prew_hide() {
        $('.tempeditpng').toggle('show');
        $("#hideprew").hide();
        $("#hideedit").show(); 
    }
 function prew_show() {
        $('.tempeditpng').toggle('show');
        $("#hideedit").hide();
        $("#hideprew").show();
    }
</script>
<script>
function select_theme(tempid,tempname,dbappid,parent_id)
{       //alert(tempid);alert(tempname);alert(dbappid);alert(parent_id);
    $.ajax({
                type: 'POST',
                            'url': 'getThemes',
                            'data': {
                                'dbapp_id': dbappid
                             },
                            'dataType': 'json',
                'success': function(response) {
                    result=response['result'];
                    var dataHTML = '<h3>Please Select Theme</h3>';
                        dataHTML += '<select id="selectevent"><option selected="selected">Select Theme</option>';

                      for ( var i=0;i<result.length;i++ ) {
                          dataHTML += '<option id="'+result[i]['temp_name']+'">'+result[i]['temp_name']+'</option>';
                      }
                      dataHTML += '</select>'
                      dataHTML += '<a href="#" onClick="copytempalte('+tempid+',\''+tempname+'\','+dbappid+','+parent_id+')">Submit</a>'
                      jQuery.facebox(dataHTML,'styleclass');
                },
                'error': function(){
                    console.log('Error');
                }
            });  
}
function copytempalte(tempid,tempname_org,dbappid,parent_id)
{
  themename_selected = $('#facebox select:first').val(); 
            $.ajax({
             type: 'POST',
                        'url': 'copytemp',
                        'data': {
                            'tempid': tempid,
                            'tempnameorg': tempname_org,
                            'dbapp_id': dbappid,
                            'parentid': parent_id,
                            'themenameselected': themename_selected
                        },
                        'dataType': 'json',
            'success': function(response) {
                jQuery.facebox('<h3 style="color:#000">Your Template Copy is Created Sucessfully!</h3>');
            },
            'error': function(){
                alert('Error');
            }
            });
}
function saveas_default(tempid)
{
             $.ajax({
             type: 'POST',
                        'url': 'save_asdefault',
                        'data': {
                            'tempid': tempid
                        },
                        'dataType': 'json',
            'success': function(response) {
                jQuery.facebox('<h3 style="color:#000">Your Template data is Saved Sucessfully as default!</h3>');
                console.log('saved');
            },
            'error': function(){
                alert('Error');
            }
            });   
}

function warning_msg(temp_url)
{
   jQuery.facebox('<h4 style="color:#000; margin-left:30px; margin-bottom:10px; margin-top:5px;">Changing the template now will make you start all over!</h4><a style="margin-left:74px;" class="btn btn-success" href="'+temp_url+'">Continue</a><input style="margin-left:66px;" class="btn" type="button" value="Close" onClick="cancelfbb()"/>');
}

function cancelfbb()
{
    $.facebox.close = function(){
    $(document).trigger('close.facebox')
    return false
   }
   $.facebox.close();   
}
</script> 
<div class="span9">
    <div id="contentdata">
        <div class="title-crumbs">
            <h2 style="margin-bottom:5px;">Edit your app: Select template, edit contents & settings and publish</h2>
            <h5>Remember that your content will not be visible until you save & publish</h5>
            <br />
        </div>
        <div class="content-menutemp">
            <ul class="nav nav-tabs" id="myTab"> 
                <li><a href="#" onClick="warning_msg('<?=base_url();?>index.php/page/templates?aid=<?=$this->session->userdata("coded_dbappid");?>'); return false;">Select Template</a></li>
                <li class="active"><a href="<?=base_url()?>index.php/page/viewtemplate">Edit Contents</a></li>
                <li><a href="<?=base_url()?>index.php/page/app_settings/">Publish Settings</a></li>
                <li><a></a></li>
                <a href="<?=base_url()?>index.php/page/app_settings/" class="btn btn-primary">Next</a>
            </ul>    
        </div>
        <div style="clear:both;"></div>
        <div class="tempeditpageborder">
            <div class="prenewdefaultbtn">
                <!--<a href="#" id='hideshow' class="btn btn-info">Preview</a>-->
                <a href="#" id='hideprew' class="btn btn-info" onclick="return prew_hide();">Preview</a>
                <a href="#" id='hideedit' style="display:none" class="btn btn-info" onclick="return prew_show();">Edit</a>
               
               <?php if($this->session->userdata('dbappid')!=2 && $this->session->userdata('adminid')==1){ ?>
                <a href="#" id='dflt-tmplt' class="btn btn-success" style="float: right;"  onclick="saveas_default(<?=$tempid;?>)">Save as default template</a>
                <?php } if($this->session->userdata('adminid')==1) {?>
                <a href="#" id='dflt-tmplt' class="btn btn-success" style="float: right; margin-right: 10px;" onclick="select_theme(<?=$tempid;?>,'<?=$templatedata[0][0]['temp_name'];?>',<?=$templatedata[0][0]['dbappid'];?>,<?=$templatedata[0][0]['parent_id'];?>)">Save as new template</a>
                <?php } ?>
                <div style="clear:both;"></div>
            </div>
            <!--<div><a href="<?=$bitly_link;?>"><?=$bitly_link;?></a></div>-->
            <?php 
            $innetdata = array();
            if($this->session->userdata('dbappid')==2)
            {
                $innetdata['tempdata'] = $tempdata;
                $innetdata['quiz'] = $quizdata['quiz'][0];
                $innetdata['options'] = $quizdata['options'];
                $innetdata['quiz_tags'] = '<ul><li><a><p><b><strong><i><em><h1><h2><h3><h4><h5><h6><font><br>';
            }    
            $this->load->view('temp'.$tempid , $innetdata);
            ?>
        </div>  
    </div>
<div id="dialog" title="Warning" style="display: none">
  <h4>Your All Data will be lose!</h4>
  <a class="btn btn-success" href="<?=base_url();?>index.php/page/templates?aid=<?=$this->session->userdata("coded_dbappid");?>">Continue</a><input class="btn" type="button" value="Cancel" onClick="cancelfbb()"/>'
</div>    
</div>
<div style="clear: both;"></div>