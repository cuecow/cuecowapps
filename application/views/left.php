<!--<div class="container">--> 
<div class="span3">
            <!--<div class="accordion" id="accordion1">close ki 16april-->
            <div id="accordion1">
                 <!--<div class="accordion-group">close ki 16 april-->
                <div>
<!--                    <div class="accordion-heading">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapseOne" title="Click to open/close">
                            Manage Wall
                        </a>
                    </div>-->
                    <!--<div id="collapseOne" class="accordion-body collapse in">-->
                    <!--<div class="accordion-inner"> close ki 16 april--> 
                    <div>    
                        <table class="table table-bordered">
                            <thead> 
                            <tr> 
                                <th style="font-size:13px;"><strong>Facebook page</strong></th> 
                                <th style="font-size:13px;"><strong>Fans</strong></th> 
                            </tr> 
                            </thead> 
                          <tbody>
                            <?php
                            
                           if($pid == NULL)
                           {
                               $pid = $pages[0]['page']['id'];
                           }
                            foreach($pages as $page){ //print_r($page['page']['id']);
                                if($page['page']['id'] == $pid){
                                    ?>
                                    <tr style="background-color:#F2F2F2;">
                                    <td style="font-size:13px;"><a class="name-text" href="<?=base_url();?>index.php/page?pid=<?=$page['page']['id'];?>&tkn=<?=(isset($page['page']['access_token'])? base64_encode($page['page']['access_token']) : '');?>"><?=$page['page']["name"]?></a></td>
                                     <td align="center" style="font-size:13px;"><?=(isset($page['pagedetail']['likes']) ? $page['pagedetail']['likes'] : '');?></td> 
                                     
                            </tr>
                                    
                                <?php } 
                                    
                            else{ ?>
                                    
                                
                            <tr> 
                                <td style="font-size:13px;"><a class="name-text" href="<?=base_url();?>index.php/page?pid=<?=$page['page']['id'];?>&tkn=<?=(isset($page['page']['access_token'])? base64_encode($page['page']['access_token']) : '');?>"><?=$page['page']["name"]?></a></td>
                                <td align="center" style="font-size:13px;"><?=(isset($page['pagedetail']['likes']) ? $page['pagedetail']['likes'] : '');?></td> 
                                
                            </tr>
                            <?php }
                            
                            }?>
                          </tbody>
                        </table>
                    </div>
                    <!--</div>-->    
                </div>
             </div>
         </div>
   <!--</div>--> 