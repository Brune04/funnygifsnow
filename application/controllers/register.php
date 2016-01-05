<?php

class Register extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_register');
	}

	public function index()
	{
		$data['title'] = 'Sign up';
		$data['description'] = '';
		$data['ogimage'] = '';
		$this->load->database();
		$data['logged_in'] = (isset($this->session->userdata['user_id']) ? true : false);
		$this->load->view('templates/header', $data);
		$this->load->view('pages/sign_up.php', $data);
	}

	public function register_user()
	{
		$this->load->library('form_validation');
		
		parse_str($_SERVER['QUERY_STRING'], $vars);
		
		$errors = array();

		if(empty($_GET['agree']))
		{
			$errors[] = "PLEASE AGREE TO TERMS OF SERVICE.";
			$return = array(
				'status' => 'error',
				'errors' => $errors
			);
			header('Content-Type: application/json');
			echo json_encode( $return );
			return;
		}

		$errors = $this->check_errors();

		if(empty($errors))
		{

			if($_GET['password'] != $_GET['confirm'])
			{
				$errors[] = "PASSWORD DOES NOT MATCH CONFIRM.";
				$return = array(
					'status' => 'error',
					'errors' => $errors
				);
				header('Content-Type: application/json');
				echo json_encode( $return );
			}

			$this->load->database();

			$result = $this->model_register->insert_user($vars);

			if($result)
			{
				$return = array(
					'status' => 'success',
					'errors' => $errors
				);
				header('Content-Type: application/json');
				echo json_encode( $return );
			}
			else
			{
				$errors[] = "SORRY, THERE WAS A PROBLEM SIGNING UP.";
				$return = array(
					'status' => 'error',
					'errors' => $errors
				);
				header('Content-Type: application/json');
				echo json_encode( $return );
			}
		}
		else
		{
			$return = array(
				'status' => 'error',
				'errors' => $errors
			);
			header('Content-Type: application/json');
			echo json_encode( $return );
		}
	}

	public function check_errors()
	{
		$username = $_GET['username'];
		$firstname = $_GET['firstname'];
		$lastname = $_GET['lastname'];
		$email = $_GET['email'];
		$password = $_GET['password'];
		$confirm = $_GET['confirm'];
		$errors = array();

		if(empty($username))
		{
			$errors[] = "THE USERNAME FIELD IS REQUIRED.";	
		}

		if(empty($email))
		{
			$errors[] = "THE EMAIL FIELD IS REQUIRED.";
		}

		if(empty($password))
		{
			$errors[] = "THE PASSWORD FIELD IS REQUIRED.";
		}

		return $errors;
	}
}

?>