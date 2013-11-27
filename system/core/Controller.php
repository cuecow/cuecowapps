<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package		CodeIgniter
 * @author		ExpressionEngine Dev Team
 * @copyright	Copyright (c) 2008 - 2011, EllisLab, Inc.
 * @license		http://codeigniter.com/user_guide/license.html
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * CodeIgniter Application Controller Class
 *
 * This class object is the super class that every library in
 * CodeIgniter will be assigned to.
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Libraries
 * @author		ExpressionEngine Dev Team
 * @link		http://codeigniter.com/user_guide/general/controllers.html
 */
class CI_Controller {

	private static $instance;

	/**
	 * Constructor
	 */
	public function __construct()
	{
		self::$instance =& $this;
		
		// Assign all the class objects that were instantiated by the
		// bootstrap file (CodeIgniter.php) to local class variables
		// so that CI can run as one big super object.
		foreach (is_loaded() as $var => $class)
		{
			$this->$var =& load_class($class);
		}

		$this->load =& load_class('Loader', 'core');

		$this->load->initialize();
                set_exception_handler
                (function($e){
   
                                                    /*catch exception*/   
                $CI =& get_instance();
                $CI->load->library('airbrake');
                $guid=$CI->airbrake->notifyOnException($e);
                $uel="https://apps2.cuecow.com/index.php/page/show_error?guid=".$guid."";
                redirect($uel);
                });
                
                set_error_handler(function($errno, $errstr, $errfile, $errline)
                {
                                                    /*generate GUID*/
                $seed = 'JvKcuPpsCEWPsThaOWuH';
                $hash = sha1(uniqid($seed . mt_rand(), true));
                $gu_id = substr($hash, 0, 5);
                $guid = "ERR-".$gu_id;
                $guid = strtoupper($guid);
                                                    /*catch exception*/                   
                $CI =& get_instance();

                $fname=$CI->session->userdata("fname");
                $flname=$CI->session->userdata("lname");
                $usernmae=$fname." ".$flname;
                $email=$CI->session->userdata("u_email");
                $CI->load->library('airbrake');
                    $msg='';
                
                    switch ($errno) {
                    
                       case E_USER_ERROR:
                        $msg.= "<b>User name:</b>$usernmae<br/><b>User Email:</b>$email<br />\n";
                        $msg.= "<b>GUID:</b>".$guid."<br/>";   
                        $msg.= "<b>Fatal ERROR</b> [$errno] $errstr<br />\n";  
                        $msg.= "  Fatal error on line $errline in file $errfile";
                        $msg.= ", PHP " . PHP_VERSION . " (" . PHP_OS . ")<br />\n";
                        $CI->session->set_userdata("error_msg",$msg);
                        $CI->airbrake->notifyOnError($msg);
                        header('Location: https://apps2.cuecow.com/index.php/page/show_error?guid='.$guid.'');
                        exit(1);
                        break;

                    case E_USER_WARNING:
                        $msg.= "<b>User name:</b>$usernmae<br/><b>User Email:</b>$email<br />\n";
                        $msg.= "<b>GUID:</b>".$guid;
                        $msg.= "<b>Apps WARNING</b> [$errno] $errstr<br />\n";
                       // $CI->airbrake->notifyOnError($msg);
                        break;

                    case E_USER_NOTICE:
                        //$msg.= "<b>Apps NOTICE</b> [$errno] $errstr<br />\n";
                        //var_dump($msg);
                        break;

                    default:
                        $msg.= "<b>User name:</b>$usernmae<br/><b>User Email:</b>$email<br />\n";
                        $msg.= "Unknown error type: [$errno] $errstr<br />\n";
                        //show_error('We are sorry, an error has occured. A notification has been sent to our customer service team.');
                        break;
                    }
                    
                  });
		/***************************************/
                  
		log_message('debug', "Controller Class Initialized");
	}

	public static function &get_instance()
	{
		return self::$instance;
	}
}
// END Controller class

/* End of file Controller.php */
/* Location: ./system/core/Controller.php */