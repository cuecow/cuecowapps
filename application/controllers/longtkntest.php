<?php
class longtkntest extends CI_Controller {

    public function __construct()
    { 
        parent::__construct();
    }
    
    public function index()
    {
           $this->load->helper('url');
           $config = array(
              'appId'  => '554023317992306',
              'secret' => '85a9d4f4c83b5c5b6312fce1c3a4109a', 
              'fileUpload' => true,
              );
           $this->load->library('Facebook', $config);
           $uid = $this->facebook->getUser();
    
    if($uid=="NULL")
        {
              $params = array(
                              'scope' => 'email,user_birthday',
                              'redirect_uri' => 'http://apps2.cuecow.com/index.php/longtkntest'
                            );
             $loginUrl = $this->facebook->getLoginUrl($params);
             echo "<script>top.location.href='$loginUrl'</script>";
        }
        if($uid!="NULL")
        {
              try {
                        $this->facebook->getUser();
                        echo $this->facebook->setExtendedAccessToken();
                        echo $accessToken = $this->facebook->getAccessToken();
                    } catch (FacebookApiException $e) {
                        echo "getAccessToken<br/><pre>"; var_dump($e); echo "</pre>"; die();
                    }
        }  
    }
}