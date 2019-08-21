<?php 
class my404 extends CI_Controller 
{
    public function __construct() 
    {
        parent::__construct(); 
		$this->load->model('Global_model');
		require_once(APPPATH.'libraries/Globals.php');
    } 

    public function index() 
    { 
        $this->output->set_status_header('404'); 
      	$this->data['menu_active'] = '';

		$this->load->view('error-404', $this->data);
    } 
} 
?> 