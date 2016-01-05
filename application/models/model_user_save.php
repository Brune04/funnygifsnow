<?php

class Model_user_save extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	public function update_user($username)
	{
		$firstname = $this->input->post('firstname');
		$lastname = $this->input->post('lastname');
		$email = $this->input->post('email');
		$bio = $this->input->post('bio');
		$user_id = $this->session->userdata['user_id'];

		$data = array(
           'firstname' => $firstname,
           'lastname' => $lastname,
           'email' => $email,
           'bio' => $bio
        );

        $this->db->where('id', $user_id);
		return $this->db->update('main.user', $data);
	}

	public function upload_photo($data, $username)
	{
		$user_id = $this->session->userdata['user_id'];
		$data = array(
			'user_image' => 'http://localhost//~peterbrune/application/views/uploads/' . $data['file_name']
		);

		$this->db->where('id', $user_id);
		return $this->db->update('main.user', $data);
	}

}

?>