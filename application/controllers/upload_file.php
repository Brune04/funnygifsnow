 <?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Upload_file extends CI_Controller{

	
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->database();
		$this->load->library('form_validation');
	}


	function upload_it() {
		//load the helper
		$this->load->helper('form');
		$this->load->model('upload/writer', 'writer');
		//Configure
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
    
		//if not successful, set the error message
		if (!$this->upload->do_upload('userfile')) {
			$data = array('msg' => $this->upload->display_errors());

		} else { //else, set the success message
			$data = array('msg' => "Upload success!");
      
      		$data['upload_data'] = $this->upload->data();
      		$data['upload_data']['title'] = $_POST['title'];
      		$this->writer->insert($data['upload_data']);
		}
		$data['logged_in'] = (isset($this->session->userdata['user_id']) ? true : false);
		$data['title'] = 'Upload';
		$data['description'] = '';
		$data['ogimage'] = '';
		//load the view/upload.php
		$this->load->view('templates/header', $data);
		$this->load->view('pages/upload', $data);
	}

}