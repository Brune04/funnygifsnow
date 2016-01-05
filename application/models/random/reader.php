<?php

class Reader extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    public function get_min_value()
    {
        $query = $this->db->query("SELECT id FROM main.posts WHERE id = ( SELECT MIN(id) FROM main.posts )");
        $min = $query->row();
        return $min->id;
    }

    public function get_max_value()
    {
        $query = $this->db->query("SELECT id FROM main.posts WHERE id = ( SELECT MAX(id) FROM main.posts )");
        $max = $query->row();
        return $max->id;
    }

    public function get($id)
    {
        $query = $this->db->query("SELECT *
            FROM main.posts
            WHERE id >= ".$this->db->escape($id));

        return $query->result();
    }

    public function get_comments($id)
    {
        $query = $this->db->query("SELECT c.post_id, c.comment, c.comment_time, c.user_id, u.id, u.username, u.firstname, u.lastname, u.user_image
            FROM main.post_comments c, main.user u
            WHERE c.post_id = ".$this->db->escape($id)." AND c.user_id = u.id");

        return $query->result();
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