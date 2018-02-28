<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Login extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('user');
	}
	
	function index()
	{
		$this->load->helper(array('form'));
		$this->load->view('login_view');
	}
}
/*End of file login.php*/
/*Location: .PerjalananDinas/application/controllers/login.php*/
?>