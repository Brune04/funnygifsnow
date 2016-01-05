<?php

class Post_like extends CI_Controller {

	public function add_like()
    {
    	$id = $_GET['id'];
    	$this->load->database();
        $data['logged_in'] = (isset($this->session->userdata['user_id']) ? true : false);
    	$this->load->model('view_post/writer', 'writer');
    	$this->load->model('view_post/reader', 'reader');
        $insert_id = $this->writer->insert_like($id, 'like');
    }

    public function add_dislike()
    {
    	$id = $_GET['id'];
    	$this->load->database();
        $data['logged_in'] = (isset($this->session->userdata['user_id']) ? true : false);
    	$this->load->model('view_post/writer', 'writer');
    	$this->load->model('view_post/reader', 'reader');
        $this->writer->insert_like($id, 'dislike');
    }

    public function add_favorite()
    {
    	$id = $_GET['id'];
    	$this->load->database();
        $data['logged_in'] = (isset($this->session->userdata['user_id']) ? true : false);
        if($data['logged_in'])
        {
        	$user_id = $this->session->userdata['user_id'];
        }
        else
        {
        	$user_id = 0;
        }
    	$this->load->model('view_post/writer', 'writer');
    	$this->load->model('view_post/reader', 'reader');
        $insert_id = $this->writer->insert_favorite($id, $user_id);
    }

}

?>