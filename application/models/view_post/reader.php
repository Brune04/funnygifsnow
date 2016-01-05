<?php

class Reader extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    public function get($key)
    {
    	$this->db->where('id', $key);
        $query = $this->db->get("main.posts");

        $return = $query->result();

        if(!empty($return[0]))
        {
            return $return[0];
        }
        else
        {
            return false;
        }
    }

    public function get_comments($id)
    {
        $query = $this->db->query("SELECT c.post_id, c.comment, c.comment_time, c.user_id, u.id, u.username, u.firstname, u.lastname, u.user_image
            FROM main.post_comments c, main.user u
            WHERE c.post_id = ".$this->db->escape($id)." AND c.user_id = u.id ORDER BY c.comment_time desc");

        return $query->result();
    }

    public function get_comment($key)
    {
        $query = $this->db->query("SELECT c.post_id, c.comment, c.comment_time, c.user_id, u.id, u.username, u.firstname, u.lastname, u.user_image
            FROM main.post_comments c, main.user u
            WHERE c.id = ".$this->db->escape($key)." AND c.user_id = u.id");

        return $query->row();
    }

    public function get_likes($id)
    {
        $query = $this->db->query("SELECT p.likes, p.dislikes, p.favorites
            FROM main.posts_info p
            WHERE p.post_id = " . $this->db->escape($id));

        return $query->row();
    }

    public function get_popular_posts()
    {
        $query = $this->db->query("SELECT * FROM main.posts ORDER BY score desc LIMIT 5");

        return $query->result();
    }
}

?>