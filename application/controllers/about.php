<?php

class About extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['title'] = 'About';
		$data['description'] = '';
		$data['ogimage'] = '';
		$data['logged_in'] = (isset($this->session->userdata['user_id']) ? true : false);
		$this->load->view('templates/header', $data);
		$this->load->view('pages/about.php', $data);
	}
}

?>