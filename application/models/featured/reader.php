<?php

class Reader extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    public function record_count() {
        $this->db->where('featured', 1);
        $query = $this->db->get("main.posts");

        return count($query->result());
    }

    public function get($limit, $start)
    {
    	$this->db->limit($limit, $start);
    	$this->db->where('featured', 1);
        $this->db->order_by('featured', 'desc');
        $query = $this->db->get("main.posts");

        return $query->result();
    }

    public function get_popular_posts()
    {
        $query = $this->db->query("SELECT * FROM main.posts ORDER BY score desc LIMIT 5");

        return $query->result();
    }
}

?>