<?php

class Model_register extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	public function insert_user($vars)
	{
		$password = sha1($this->config->item('salt') . $vars['password']);

		$sql = "INSERT INTO main.user (firstname, lastname, username, email, password, user_image)
			VALUES (".$this->db->escape($vars['firstname']).",
					".$this->db->escape($vars['lastname']).",
					".$this->db->escape($vars['username']).",
					'".$vars['email']."',
					'".$password."',
					'http://localhost/~peterbrune/application/images/default-user.png')";
		
		$result = $this->db->query($sql);

		if($this->db->affected_rows() === 1)
		{
			$session = array(
				'firstname' => $vars['firstname'],
				'lastname' => $vars['lastname'],
				'email' => $vars['email'],
				'username' => $vars['username']
			);
			$this->set_session($session);
			return $vars['username'];
		}
		else
		{
			return false;
		}
	}

	public function set_session($session)
	{
		$sql = "SELECT id FROM main.user WHERE username = '".$session['username']."' LIMIT 1";
		$result = $this->db->query($sql);
		$row = $result->row();

		$sess = array(
			'id' => $row->id,
			'firstname' => $session['firstname'],
			'lastname' => $session['lastname'],
			'email' => $session['email'],
			'username' => $session['username'],
			'logged_in' => 1
		);

		$this->session->set_userdata($session);
	}

}

?>