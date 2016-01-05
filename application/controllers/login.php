<?php

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_login');
	}

	public function login_user()
	{
		$this->load->library('form_validation');
		$username = $_GET['username'];
		$password = $_GET['password'];
		$errors = array();

		if(empty($username))
		{
			$errors[] = "THE USERNAME FIELD IS REQUIRED.";
		}
		if(empty($password))
		{
			$errors[] = "THE PASSWORD FIELD IS REQUIRED.";
		}

		$data['logged_in'] = (isset($this->session->userdata['user_id']) ? true : false);
		
		if(empty($errors))
		{
			$result = $this->model_login->login_user($username, $password);

			switch ($result)
			{
				case 'logged_in':
					$return = array(
						'status' => 'success',
						'errors' => $errors
					);
					header('Content-Type: application/json');
					echo json_encode( $return );
					break;
				case 'incorrect_password':
					$errors[] = "USERNAME PASSWORD COMBINATION IS INCORRECT.";
					$return = array(
						'status' => 'error',
						'errors' => $errors
					);
					header('Content-Type: application/json');
					echo json_encode( $return );
					break;
				case 'username_not_found':
					$errors[] = "USERNAME PASSWORD COMBINATION IS INCORRECT.";
					$return = array(
						'status' => 'error',
						'errors' => $errors
					);
					header('Content-Type: application/json');
					echo json_encode( $return );
					break;
			}
		}
		else
		{
			header('Content-Type: application/json');
			$return = array(
				'status' => 'error',
				'errors' => $errors
			);
    		echo json_encode( $return );
		}
	}

}

?>