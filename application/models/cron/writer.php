<?php

class Writer extends CI_Model {

	function __construct()
    {
        parent::__construct();
    }

    public function insert($data)
    {
    	$sql = "
    		INSERT INTO main.posts (`key`, url, title, author, score, type, created_at, image) VALUES 
    	";
    	$insert = '';
    	foreach($data as $key => $value)
    	{
    		$insert .= '('.$this->db->escape($value['key']).', '.$this->db->escape($value['url']).', '.$this->db->escape($value['title']).', '.$this->db->escape($value['author']).', '.$this->db->escape($value['score']).', '.$this->db->escape($value['type']).', '.$this->db->escape($value['created_at']).', '.$this->db->escape($value['image']).'),';
    	}
    	$sql .= trim($insert, ',') . " ON DUPLICATE KEY UPDATE `key` = `key`";

    	$this->db->query($sql);
    }
}

?>