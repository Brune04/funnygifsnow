<?php

class Model_login extends CI_Model {

	public function login_user($username, $password)
	{
		$sql = "SELECT * FROM main.user WHERE username = ".$this->db->escape($username)." LIMIT 1";
		$result = $this->db->query($sql);
		$row = $result->row();

		if($result->num_rows() === 1)
		{
			if($row->password === sha1($this->config->item('salt') . $password))
			{
				$session_data = array(
					'user_id' => $row->id,
					'firstname' => $row->firstname,
					'lastname' => $row->lastname,
					'username' => $row->username,
					'email' => $row->email,
					'bio' => $row->bio,
					'user_image' => $row->user_image
				);
				$this->set_session($session_data);
				return 'logged_in';
			}
			else
			{
				return 'incorrect_password';
			}
		}
		else
		{
			return 'username_not_found';
		}
	}

	public function set_session($session_data)
	{

		$sess_data = array(
			'user_id' => $session_data['user_id'],
			'firstname' => $session_data['firstname'],
			'lastname' => $session_data['lastname'],
			'username' => $session_data['username'],
			'email' => $session_data['email'],
			'bio' => $session_data['bio'],
			'user_image' => $session_data['user_image'],
			'logged_in' => 1
		);

		$this->session->set_userdata($sess_data);
	}

}
	
?>