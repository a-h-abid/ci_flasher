<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Flasher_test extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->library('flasher');
		$this->load->helper('url');
	}

	public function index()
	{
		$this->flasher->success('Object Success');
		$this->flasher->info('Object Info');
		
		Flasher::addSuccess('Static Success');
		Flasher::addWarning('Static Warning');
		Flasher::addError('Static Error');
		
		$this->load->view('flasher_test');
	}

	public function redirect()
	{
		$this->flasher->warning('Redirect Object Warning');
		Flasher::addError('Redirect Static Error');
		
		redirect('flasher_test');
	}
}

/* End of file Flasher_test.php */
/* Location: ./application/controllers/Flasher_test.php */