<?php
class fbpages extends CI_Model {
	
	public function __construct()
	{
            $this->load->model('facebookobj');
            $this->facebookobj->admin_makeobj(APPID,APPSECRET);
            $this->load->database();
            $this->load->driver('cache', array('adapter' => 'file'));
        }	
	public function userid()
	{
            return $userid = $this->session->userdata('fbuserid');
	}
	public function pages()
	{
            
            $paneluid = $this->session->userdata('panelsessoinuid');
            //var_dump($paneluid);
            $qry = "Select pid from hidepages where userid=$paneluid";
            $pqry = $this->db->query($qry);
            $hpid = array();
            foreach($pqry->result_array() as $respids)
            {
                $hpid[] = $respids['pid'];
            }
            $user = $this->userid();
            //var_dump($user);
            $pages = array();            
            $dpage="";
            $pgcachefilename = 'pages_data'.$paneluid;
           // var_dump($pgcachefilename);die();
            if(!$this->cache->get($pgcachefilename))
            {
                $pages_args = array(
                "access_token" => $this->session->userdata('fbuaccesstoken'),
                );
                //var_dump($pages_args);// die();
                try {
                    $my_pages = $this->facebook->api($user."/accounts",'get',$pages_args);
                  // var_dump($my_pages["data"]); die();
                    foreach($my_pages["data"] as $page)
                    {
                       // var_dump($page["category"]);
                        if($page["category"]!="Application" && $page["id"]!="191094717691535"){
                            try {
                            $dpage = $this->facebook->api($page['id']); 
                            //var_dump($dpage); die();
                            }catch (FacebookApiException $e){
                                    error_log($e);
                            }
                            if(!in_array($page['id'], $hpid))
                            {
                                $pages[] = array("page"=>$page,"pagedetail"=>$dpage);
                            }
                        }	
                    }
                    //var_dump(count($pages));  
                }catch (FacebookApiException $e){
                    error_log($e);
                    $errormsg=$e->getMessage();
                    $tknexceptions = array("acctknerror"=>"acc_tkn_invalid","message"=>$errormsg);
                    return $tknexceptions;
                }

                //$this->session->set_userdata('pages_session',$pages);
                $this->cache->save($pgcachefilename, $pages, 18000);
                
                $returnarrg = $this->cache->get($pgcachefilename);
                
            }
            else
            {
                //$pages_data = $this->cache->get('pages_data');                
                $returnarrg =  $this->cache->get($pgcachefilename);
            }
            //echo "<pre>"; print_r($pages_data); echo "</pre>";
            return $returnarrg;
	}
}