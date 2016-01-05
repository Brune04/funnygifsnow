<?php

class Writer extends CI_Model {

	function __construct()
    {
        parent::__construct();
    }

    public function insert($data)
    {
    	date_default_timezone_set('GMT');
        $date = date('M d, Y');
        $user_id = $this->session->userdata['user_id'];
        $author = $this->session->userdata['username'];
        $url = 'http://localhost//~peterbrune/application/views/uploads/' . $data['file_name'];
        $key = md5($data . $data['title']);
        if($data['file_ext'] == '.gif')
        {
        	$type = 'gif';
            $image = imagecreatefromgif($value['data']['url']);
            imagepng($image, 'application/views/uploads/'.$data['file_name'].'.png');
        }
        else
        {
        	$type = 'meme';
            $image = '';
        }
        $post_data = array(
            'title' => $data['title'],
            'url' => $url,
            'author' => $author,
            'author_id' => $user_id,
            'created_at' => $date,
            'type' => $type,
            'key' => $key,
            'image' => $image
        );
        $this->db->insert('main.posts',$post_data);
        return $this->db->insert_id();
    }

}