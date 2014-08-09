<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shopping_controller extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('fruits_class_model');
	}
		
	public function index()
	{
		$result = $this->fruits_class_model->search_fruits_class();
		$data = array('result' => $result);
		$this->load->view('shopping_view', $data);
		
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */