
<!--<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>-->

<link rel="stylesheet" href="https://www.datatables.net/media/blog/bootstrap_2/DT_bootstrap.css">
<script src="<?= base_url(); ?>assets/js/jquery.dataTables.js"></script>

<script type="text/javascript" src="https://www.datatables.net/media/blog/bootstrap_2/DT_bootstrap.js"></script>


<!-- <script type="text/javascript">
        $(window).load(function() {
                $('#table_user').dataTable( {
                        "sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
                        "sPaginationType": "bootstrap",
                        "oLanguage": {
                                "sLengthMenu": "_MENU_ records per page"
                        }
                } );
                //$(window).resize();
        });
</script>-->

<script>
$(document).ready(function() {
    $('#activetable').dataTable({
        "sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
//                        "sPaginationType": "bootstrap",
                        
        "aoColumns": [
            null,
            null,
            null
        ],
        "oLanguage": {
                                "sLengthMenu": "_MENU_ records per page"
                        }
    } );
} );

</script>



 
<!--<form name="status" method="post" action="<?=base_url();?>index.php/page/changeStatus">    -->
    <div class="row-fluid error_width">
    <div class="span12">
    <p style="font-size: 14px">Here You can Publish and Unpublish all applications of any user </p>
    
        <?php if(isset($res)){?>
            
            <div class="alert alert-dismissable alert-error">
                <button class="close" data-dismiss="alert" type="button">x</button>
                <strong>Error!</strong>
                Selected user has not valid facebook authorization (so cannot publish apps), ask user to validate with facebook now.
            </div>
           <?php }?>
    </div>
</div>
    <table id="activetable" class="table table-striped" cellspacing="0" cellpadding="0">
<!--    <table border="1" id="table_user" class="table table-striped table-bordered table-hover">-->
    <thead>
    <tr>
        <th>UserName</th>
        <th>Email account</th>
        <th width="15%">App publishing</th>
    </tr>
    </thead>

<?php for($i= 0 ; $i< count($user); $i++){ ?>
    
    <tr>
        <td width="400"><?php echo $user[$i]['username'] ?></td>
        <td width="300"><?php echo $user[$i]['email'] ?></td>
        
        <?php
        if($user[$i]['admin_publish'] == 0)
        { ?>
            <td width="200"><a href="<?=base_url();?>index.php/page/changeStatus?id=<?=$user[$i]['facebook_id']; ?>&flag=1 "> <input type="button" class="btn btn-small" name="button" value="Off" /></a></td>
        <?php        
        }
        else{ ?>
            <td width="200"><a href="<?=base_url();?>index.php/page/changeStatus?id=<?=$user[$i]['facebook_id']; ?>&flag=0 "> <input type="button" class="btn btn-small btn-success" name="button" value="On" /></a></td>
        <?php         
        }       
        ?>
        
    </tr>
    <?php } ?>


    </table>
<!--    <div id="content_floatingdiv" style="display: block;">
        <p>Hello</p>
    </div>-->
<!--</form>-->
    
    
   
