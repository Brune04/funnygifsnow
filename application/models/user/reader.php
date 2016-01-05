<?php

class Reader extends CI_Model {

	function __construct()
    {
        parent::__construct();
    }

    public function get_user($username)
    {
    	$this->db->where('username', $username);
    	$query = $this->db->get("main.user");

    	return $query->row();
    }

    public function get_user_posts($id)
    {
    	$this->db->where('author_id', $id);
    	$query = $this->db->get("main.posts");

    	return $query->result();
    }

    public function get_user_favs($id)
    {
    	$sql = $this->db->query("SELECT * FROM main.user_favs f LEFT JOIN main.posts p ON p.id = f.post_id WHERE user_id = ".$this->db->escape($id)."");
    	
    	return $sql->result();
    }

    public function get_popular_posts()
    {
        $query = $this->db->query("SELECT * FROM main.posts ORDER BY score desc LIMIT 5");

        return $query->result();
    }

    public function get_featured_posts()
    {
        $query = $this->db->query("SELECT * FROM main.posts ORDER BY featured desc LIMIT 5");

        return $query->result();
    }

}
?>