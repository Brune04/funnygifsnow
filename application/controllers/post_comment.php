<?php

class Post_comment extends CI_Controller {

	public function add_comment()
    {
    	$comment = $_GET['comment'];
    	$id = $_GET['id'];
    	$this->load->database();
        $data['logged_in'] = (isset($this->session->userdata['user_id']) ? true : false);
    	$this->load->model('view_post/writer', 'writer');
    	$this->load->model('view_post/reader', 'reader');
        $insert_id = $this->writer->insert($id, $comment);
    	$data['data'] = $this->reader->get_comment($insert_id);
    	$this->load->view('templates/comment.php', $data);
    }

}