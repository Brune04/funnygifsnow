<?php

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user/reader', 'reader');
		$this->load->model('user/writer', 'writer');
		$this->load->model('model_user_save');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['logged_in'] = (isset($this->session->userdata['user_id']) ? true : false);
		$data['image'] = '/~peterbrune/application/images/';
		$username = $this->uri->segment(2);
		$data['title'] = $username;
		$data['description'] = '';
		$data['ogimage'] = '';
		$data['user'] = $this->reader->get_user($username);
		$data['popular'] = $this->reader->get_popular_posts();
		if(!empty($data['user']))
		{
			$data['user_posts'] = $this->reader->get_user_posts($data['user']->id);
			$data['user_favorites'] = $this->reader->get_user_favs($data['user']->id);
		}
		else
		{
			show_404();
		}
		$this->load->view('templates/header', $data);
		$this->load->view('pages/user.php', $data);
	}

	public function edit()
	{
		$data['logged_in'] = (isset($this->session->userdata['user_id']) ? true : false);
		$data['image'] = '/~peterbrune/application/images/';
		$username = $this->uri->segment(2);
		$data['title'] = $username . ' - Edit';
		$data['description'] = '';
		$data['ogimage'] = '';
		$data['user'] = $this->reader->get_user($username);
		$data['popular'] = $this->reader->get_featured_posts();
		if($data['user']->username != $username)
		{
			show_404();
		}
		$this->load->view('templates/header', $data);
		$this->load->view('pages/user_edit.php', $data);
	}

	public function save()
	{
		$this->load->library('form_validation');
		$data['logged_in'] = (isset($this->session->userdata['user_id']) ? true : false);
		$username = $this->uri->segment(2);
		$this->form_validation->set_rules('firstname', 'Firstname', 'required');
		$this->form_validation->set_rules('lastname', 'Lastname', 'required');

		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('templates/header', $data);
			$this->load->view('pages/user_edit.php', $data);
		}
		else
		{
			$this->load->database();
			//set the path where the files uploaded will be copied. NOTE if using linux, set the folder to permission 777
			$config['upload_path'] = 'application/views/uploads/';	
	    	// set the filter image types
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = 0;
			
			//load the upload library
			$this->load->library('upload', $config);
	    	$this->upload->initialize($config);
	    
	    	$this->upload->set_allowed_types('*');

			$data['upload_data'] = '';
			//if not successful, set the success message
			if ($this->upload->do_upload('user_image')) {
				$data = array('msg' => "Upload success!");
	      		$data['upload_data'] = $this->upload->data();
	      		$this->model_user_save->upload_photo($data['upload_data'], $username);
			}
			$result = $this->model_user_save->update_user($username);
		}

		$data['logged_in'] = (isset($this->session->userdata['user_id']) ? true : false);
		$data['image'] = '/~peterbrune/application/images/';
		$username = $this->uri->segment(2);
		$data['title'] = $username . ' - Edit';
		$data['description'] = '';
		$data['ogimage'] = '';
		$data['user'] = $this->reader->get_user($username);
		$data['popular'] = $this->reader->get_featured_posts();
		if($data['user']->username != $username)
		{
			show_404();
		}
		$this->load->view('templates/header', $data);
		$this->load->view('pages/user_edit.php', $data);
	}

}

?>