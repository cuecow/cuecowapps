<?php
class youtube_app extends CI_Controller {

  
    public function __construct()
    {
        parent::__construct();        
        $this->load->model('facebookobj');        
        $this->load->model('loadtemplates');        
        $this->load->database();         
    }
    
    public function index()
    {
        $fbappid = $_REQUEST['appid'];
        $this->facebookobj->makeobj($fbappid);
        
        $signed_request = $this->facebook->getSignedRequest();
        $like_status = $signed_request["page"]["liked"];
        $this->session->set_userdata('cpid',$signed_request["page"]["id"]);
        if($like_status){ 
            $this->session->set_userdata('likestatus',"yes");
        }else{ 
            $this->session->set_userdata('likestatus',"no");
        }
        $pid = $this->session->userdata('cpid');
        $tempinfo = $this->loadtemplates->tempforcanvas($pid,$fbappid);
        $tempid  = $tempinfo[0]['tempid'];
        $becomefan  = $tempinfo[0]['becomefan'];
        $ravealimg  = $tempinfo[0]['ravealimg'];
        $tempbgcolor = $this->loadtemplates->gettempbgcolor($tempid);
        $data['tempbgclr'] = $tempbgcolor;
        $comparr = $this->loadtemplates->getcomponent($tempid);        
       // echo "<pre>";print_r($comparr);echo "</pre>";
        foreach($comparr as $comparr)
        {
            $components[] = $this->loadtemplates->gettempdata($comparr['position'],$tempid,$pid,$fbappid);
        }                
        //echo "<pre>"; print_r($components); echo "</pre>";
		if($components[0][0]['com_name']=="youtube_Advanc_contents")
			{
						 //$channel_id1 = "majalis5point";
				   // $channel_id1 = "NBCTheVoice";
				   //$channel_id1 = "UCeiR1suBF_jMllnVHUUdGdg";
				   //$channel_id1 = "UCdhP9_Z58OKQIy7_dv9acCw";
				   $channel_id1 = $components[0][1]['value'];
				   $yt_url = "http://gdata.youtube.com/feeds/api/videos?author=".$channel_id1."&v=2&alt=json&start-index=1&max-results=35&orderby=published";
				   $ch = curl_init();
				   curl_setopt($ch, CURLOPT_URL, $yt_url);
				   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				   curl_setopt($ch, CURLOPT_REFERER, "https://apps2.cuecow.com/index.php/youtube_app");
				   $body = curl_exec($ch);
				   curl_close($ch);
				   
					// now, process the JSON string
				   $json = json_decode($body);
				   $channelVideos = $json->feed->entry;
				   //echo "<pre>"; print_r($channelVideos); echo "</pre>"; die();
				   for($k=0;$k < count($channelVideos);$k++)
				   {
					 // change seconds to Hours, monutes, seconds
					 $Video_Duration = $channelVideos[$k]->{'media$group'}->{'yt$duration'}->seconds;
					 $Video_Duration = gmdate("H:i:s", $Video_Duration);
					 
					 // change published date to Days, Hours
					 $Video_uploaded = $channelVideos[$k]->{'media$group'}->{'yt$uploaded'}->{'$t'};
					 $Video_upload = explode("T",$Video_uploaded);
					 $Video_uploadTime = explode(".000Z",$Video_upload[1]);
					 $Video_uploadDateTime = $Video_upload[0]." ".$Video_uploadTime[0];
					 $now_date = strtotime (date ('Y-m-d H:i:s')); // the current date 
					 $key_date = strtotime (date ($Video_uploadDateTime));
					 $diff = $now_date - $key_date;
					 $days = floor($diff/(60*60*24));
					 $hours = floor(($diff-($days*60*60*24))/(60*60));
					 $uploaded_at = $days." days ago";
					 if($days==0)
						{
						 $uploaded_at = $hours." hours ago";
						}
					 if($days > 29)
						{
						 $uploaded_at = floor(($days % 365) /30)." months ago";
						}
					 if($days > 364)
						{
						 $uploaded_at = floor($days/365)." year ago";
						}			

					$Video_viewCount = $channelVideos[$k]->{'yt$statistics'}->viewCount;
					$Video_viewCount = number_format($Video_viewCount);
				   $channel_videos[] = 
							  array(
									  'Video_Auther' => $channelVideos[$k]->{'author'}[0]->name->{'$t'},
									  'Video_title' => $channelVideos[$k]->title->{'$t'},
									  'Video_uploaded' => $uploaded_at,
									  'Video_id' => $channelVideos[$k]->{'media$group'}->{'yt$videoid'}->{'$t'},
									  'Video_Duration' => $Video_Duration, 
									  'Video_viewCount' => $Video_viewCount,
									  'Video_thumbnail' => $channelVideos[$k]->{'media$group'}->{'media$thumbnail'}[1]->url,
								  );	   
				   }

					// Get Channel deatil
				   $channel_id = $channelVideos[0]->{'media$group'}->{'media$credit'}[0]->{'$t'};
				   $yt_url = "https://gdata.youtube.com/feeds/api/channels?q=".$channel_id."&alt=json&v=2";
				   $ch = curl_init();
				   curl_setopt($ch, CURLOPT_URL, $yt_url);
				   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				   curl_setopt($ch, CURLOPT_REFERER, "https://apps2.cuecow.com/index.php/youtube_app");
				   $body = curl_exec($ch);
				   curl_close($ch);
				   
				   // now, process the JSON string
				   $json = json_decode($body);
				   //echo "<pre>"; print_r($json); echo "</pre>"; die();
				   $channelDetail = $json->feed->entry[0];
				   
					   $Channel_titl=$json->feed->title->{'$t'};
					   $Channel_ttle = explode("Channels matching: ",$Channel_titl);
				
					   $Channel_title = $Channel_ttle[1];
					   $Channel_subscriberCount=$channelDetail->{'yt$channelStatistics'}->subscriberCount;
					   $Channel_subscriberCount = number_format($Channel_subscriberCount);
					   $Channel_viewCount=$channelDetail->{'yt$channelStatistics'}->viewCount;
					   $Channel_viewCount = number_format($Channel_viewCount);
					   $Channel_thumbnail=$channelDetail->{'media$thumbnail'}[0]->url;
					   
				 if($channelDetail->{'yt$channelStatistics'}->subscriberCount=="")
					{
					   $channel_id = $channel_id1;
					   $yt_url = "https://gdata.youtube.com/feeds/api/channels?q=".$channel_id."&alt=json&v=2";
					   $ch = curl_init();
					   curl_setopt($ch, CURLOPT_URL, $yt_url);
					   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
					   curl_setopt($ch, CURLOPT_REFERER, "https://apps2.cuecow.com/index.php/youtube_app");
					   $body = curl_exec($ch);
					   curl_close($ch);
					   
					   // now, process the JSON string
					   $json = json_decode($body);
					   $channelDetail = $json->feed->entry[0];
					   
						   $Channel_titl=$json->feed->title->{'$t'};
						   $Channel_ttle = explode("Channels matching: ",$Channel_titl);
				
						   $Channel_title = $Channel_ttle[1];
						   $Channel_subscriberCount=$channelDetail->{'yt$channelStatistics'}->subscriberCount;
						   $Channel_subscriberCount = number_format($Channel_subscriberCount);
						   $Channel_viewCount=$channelDetail->{'yt$channelStatistics'}->viewCount;
						   $Channel_viewCount = number_format($Channel_viewCount);
						   $Channel_thumbnail=$channelDetail->{'media$thumbnail'}[0]->url;
					}
					
					$data['channel_videos']=$channel_videos;
					$data['Channel_title']=$Channel_title;
					$data['Channel_subscriberCount']=$Channel_subscriberCount;
					$data['Channel_viewCount']=$Channel_viewCount;
					$data['Channel_thumbnail']=$Channel_thumbnail;
					//echo "<pre>"; print_r($data); echo "</pre>"; die();
			}
        $data['tempid'] = $tempid;
        $data['tempdata'] = $components;
        $data['appid'] = $fbappid;
        if($becomefan=="Yes")
        {
            if($like_status)
                {
                $this->load->view('apps/canvastemp'.$tempid, $data);
                }else
                    {
                    $rdata['ravealimg'] = $ravealimg;
                    $this->load->view('apps/reveal',$rdata);
                    }
        }else
            {
            $this->load->view('apps/canvastemp'.$tempid, $data);
            }        
    } 

 function getChannelVideosDeatil()
   {
       //$channel_id1 = "majalis5point";
	   $channel_id1 = "NBCTheVoice";
	   //$channel_id1 = "UCeiR1suBF_jMllnVHUUdGdg";
	   //$channel_id1 = "UCdhP9_Z58OKQIy7_dv9acCw";
       $yt_url = "http://gdata.youtube.com/feeds/api/videos?author=".$channel_id1."&v=2&alt=json&start-index=1&max-results=35&orderby=published";
       $ch = curl_init();
       curl_setopt($ch, CURLOPT_URL, $yt_url);
	   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
       curl_setopt($ch, CURLOPT_REFERER, "https://apps2.cuecow.com/index.php/youtube_app");
       $body = curl_exec($ch);
       curl_close($ch);
       
		// now, process the JSON string
       $json = json_decode($body);
       $channelVideos = $json->feed->entry;
	   //echo "<pre>"; print_r($channelVideos); echo "</pre>"; die();
       for($k=0;$k < count($channelVideos);$k++)
       {
		 // change seconds to Hours, monutes, seconds
	     $Video_Duration = $channelVideos[$k]->{'media$group'}->{'yt$duration'}->seconds;
	     $Video_Duration = gmdate("H:i:s", $Video_Duration);
		 
		 // change published date to Days, Hours
		 $Video_uploaded = $channelVideos[$k]->{'media$group'}->{'yt$uploaded'}->{'$t'};
		 $Video_upload = explode("T",$Video_uploaded);
		 $Video_uploadTime = explode(".000Z",$Video_upload[1]);
		 $Video_uploadDateTime = $Video_upload[0]." ".$Video_uploadTime[0];
		 $now_date = strtotime (date ('Y-m-d H:i:s')); // the current date 
		 $key_date = strtotime (date ($Video_uploadDateTime));
		 $diff = $now_date - $key_date;
		 $days = floor($diff/(60*60*24));
		 $hours = floor(($diff-($days*60*60*24))/(60*60));
		 $uploaded_at = $days." days ago";
		 if($days==0)
			{
			 $uploaded_at = $hours." hours ago";
			}
		 if($days > 29)
			{
			 $uploaded_at = floor(($days % 365) /30)." months ago";
			}
		 if($days > 364)
			{
			 $uploaded_at = floor($days/365)." year ago";
			}			

	   $channel_videos[] = 
                  array(
                          'Video_Auther' => $channelVideos[$k]->{'author'}[0]->name->{'$t'},
                          'Video_title' => $channelVideos[$k]->title->{'$t'},
                          'Video_uploaded' => $uploaded_at,
                          'Video_id' => $channelVideos[$k]->{'media$group'}->{'yt$videoid'}->{'$t'},
                          'Video_Duration' => $Video_Duration, 
                          'Video_viewCount' => $channelVideos[$k]->{'yt$statistics'}->viewCount,
                          'Video_thumbnail' => $channelVideos[$k]->{'media$group'}->{'media$thumbnail'}[1]->url,
                      );	   
       }

		// Get Channel deatil
	   $channel_id = $channelVideos[0]->{'media$group'}->{'media$credit'}[0]->{'$t'};
	   $yt_url = "https://gdata.youtube.com/feeds/api/channels?q=".$channel_id."&alt=json&v=2";
       $ch = curl_init();
       curl_setopt($ch, CURLOPT_URL, $yt_url);
	   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
       curl_setopt($ch, CURLOPT_REFERER, "https://apps2.cuecow.com/index.php/youtube_app");
       $body = curl_exec($ch);
       curl_close($ch);
	   
       // now, process the JSON string
       $json = json_decode($body);
	   //echo "<pre>"; print_r($json); echo "</pre>"; die();
       $channelDetail = $json->feed->entry[0];
	   
		   $Channel_titl=$json->feed->title->{'$t'};
		   $Channel_ttle = explode("Channels matching: ",$Channel_titl);
	
		   $Channel_title = $Channel_ttle[1];
           $Channel_subscriberCount=$channelDetail->{'yt$channelStatistics'}->subscriberCount;
		   $Channel_viewCount=$channelDetail->{'yt$channelStatistics'}->viewCount;
		   $Channel_thumbnail=$channelDetail->{'media$thumbnail'}[0]->url;
		   
	 if($channelDetail->{'yt$channelStatistics'}->subscriberCount=="")
		{
		   $channel_id = $channel_id1;
		   $yt_url = "https://gdata.youtube.com/feeds/api/channels?q=".$channel_id."&alt=json&v=2";
		   $ch = curl_init();
		   curl_setopt($ch, CURLOPT_URL, $yt_url);
		   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		   curl_setopt($ch, CURLOPT_REFERER, "https://apps2.cuecow.com/index.php/youtube_app");
		   $body = curl_exec($ch);
		   curl_close($ch);
		   
		   // now, process the JSON string
		   $json = json_decode($body);
		   $channelDetail = $json->feed->entry[0];
		   
			   $Channel_titl=$json->feed->title->{'$t'};
			   $Channel_ttle = explode("Channels matching: ",$Channel_titl);
	
			   $Channel_title = $Channel_ttle[1];
			   $Channel_subscriberCount=$channelDetail->{'yt$channelStatistics'}->subscriberCount;
			   $Channel_viewCount=$channelDetail->{'yt$channelStatistics'}->viewCount;
			   $Channel_thumbnail=$channelDetail->{'media$thumbnail'}[0]->url;
		}
		
		$data['channel_videos']=$channel_videos;
	    $data['Channel_title']=$Channel_title;
		$data['Channel_subscriberCount']=$Channel_subscriberCount;
		$data['Channel_viewCount']=$Channel_viewCount;
		$data['Channel_thumbnail']=$Channel_thumbnail;
		//echo "<pre>"; print_r($data); echo "</pre>"; die();
		$this->load->view('apps/canvastemp113',$data);		
  }	  
}