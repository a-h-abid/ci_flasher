<?php if(!defined('BASEPATH')) die('No Direct Access Allowed.');

/**
 * Flasher Library
 *
 * A Simple Flash Messaging Library to easily store flash data
 * in session and view it in your page when loaded. It works
 * on both current page request and redirected page request.
 *
 * Developed Using Codeigniter 3.0-dev (2014-May-01)
 * 
 * @package		CodeIgniter
 * @subpackage	Library
 * @category	Flasher
 * @author		Ahmedul Haque Abid <a_h_abid@hotmail.com>
 * @license		The MIT License, http://opensource.org/licenses/MIT
 * @link		https://github.com/abdmaster/ci_flasher
 * @version		1.0
 */
class Flasher {

	/**
	 * Codeigniter Controller Object
	 * 
	 * @var CI_Controller
	 */
	protected $CI;

	/**
	 * Flasher key used as the session key
	 * 
	 * @var string
	 */
	protected $_flasher_key = 'flasher';

	/**
	 * Store Flasher instance
	 * 
	 * @var Flasher
	 */
	protected static $instance;


	/**
	 * Constructor
	 */
	public function __construct()
	{
		$this->CI =& get_instance();

		$this->_load_session_library();
	}


	/**
	 * Get Instance of this class
	 * 
	 * @return Flasher
	 */
	public static function get_instance()
	{
		if (!self::$instance)
		{
			$CI =& get_instance();
			
			if (!isset($CI->flasher))
			{
				$CI->load->library('flasher');
			}

			self::$instance =& $CI->flasher;
		}

		return self::$instance;
	}


	/**
	 * Get all flash data
	 *
	 * @return  array -	associative array with keys ['success','error','warning','info']
	 *                   + your own key types if given
	 */
	public function get()
	{
		return $this->CI->session->userdata($this->_flasher_key);
	}


	/**
	 * Static Method
	 *
	 * Get all flash data
	 * 
	 * @return  array -	associative array with keys ['success','error','warning','info']
	 *                   + your own key types if given
	 */
	public static function getAll()
	{
		return self::get_instance()->get();
	}


	/**
	 * Clear the flash seesion data
	 */
	public function clear()
	{
		$this->CI->session->unset_userdata($this->_flasher_key);
	}


	/**
	 * Static Method
	 * 
	 * Clear all flash session data
	 */
	public static function clearAll()
	{
		self::get_instance()->clear();
	}


	/**
	 * Add message with own custom type  
	 * 
	 * @param string $message
	 * @param string $type
	 */
	public function message($message, $type)
	{
		$this->_add($type, $message);
	}


	/**
	 * Static Method
	 * 
	 * Add message with own custom type  
	 * 
	 * @param string $message
	 * @param string $type
	 */
	public function addMessage($message, $type)
	{
		self::get_instance()->message($message, $type);
	}


	/**
	 * Add a success type message
	 * 
	 * @param  string $message
	 */
	public function success($message)
	{
		$this->_add('success', $message);
	}


	/**
	 * Static method
	 * 
	 * Add a success type message
	 * 
	 * @param  string $message
	 */
	public static function addSuccess($message)
	{
		self::get_instance()->success($message);
	}

	/**
	 * Add an error type message
	 * 
	 * @param  string $message
	 */
	public function error($message)
	{
		$this->_add('error', $message);
	}

	/**
	 * Static method
	 * 
	 * Add an error type message
	 * 
	 * @param  string $message
	 */
	public static function addError($message)
	{
		self::get_instance()->error($message);
	}

	/**
	 * Add a warning type message
	 * 
	 * @param  string $message
	 */
	public function warning($message)
	{
		$this->_add('warning', $message);
	}

	/**
	 * Static method
	 * 
	 * Add a warning type message
	 * 
	 * @param  string $message
	 */
	public static function addWarning($message)
	{
		self::get_instance()->warning($message);
	}

	/**
	 * Add an info type message
	 * 
	 * @param  string $message
	 */
	public function info($message)
	{
		$this->_add('info', $message);
	}

	/**
	 * Static method
	 * 
	 * Add an info type message
	 * 
	 * @param  string $message
	 */
	public static function addInfo($message)
	{
		self::get_instance()->info($message);
	}


	/**
	 * Load the CI Session class if not loaded
	 */
	protected function _load_session_library()
	{
		if (!class_exists('CI_Session'))
			$this->CI->load->driver('session');
	}


	/**
	 * Add Message to Flasher Session data
	 * 
	 * @param string $type
	 * @param string $message
	 */
	protected function _add($type, $message)
	{
		if ( !$this->CI->session->has_userdata($this->_flasher_key) )
			$this->CI->session->set_userdata($this->_flasher_key, array());

		$flashes = $this->CI->session->userdata($this->_flasher_key);

		if ( !isset($flashes[$type]) || !is_array($flashes[$type]) )
			$flashes[$type] = array();

		$flashes[$type][] = $message;

		$this->CI->session->set_userdata($this->_flasher_key, $flashes);
	}

}
/* End of file Flasher.php */
/* Location: ./application/libraries/Flasher.php */