<?php

class Writer extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    public function insert($id, $comment)
    {
        date_default_timezone_set('GMT');
        $date = date('Y-m-d H:i:s');
        $user_id = $this->session->userdata['user_id'];
        $post_data = array(
            'post_id' => $id,
            'comment' => $comment,
            'comment_time' => $date,
            'user_id' => $user_id
        );
        $this->db->insert('main.post_comments',$post_data);
        return $this->db->insert_id();
    }

    public function insert_like($id, $type)
    {
        if($type == 'like')
        {
            $insert = "INSERT INTO main.posts_info (post_id,likes,dislikes,favorites) VALUES (".$this->db->escape($id).",1,0,0)
                ON DUPLICATE KEY UPDATE likes=likes+1";
            $update = "UPDATE main.posts SET score = score + 1 WHERE id = ".$this->db->escape($id)."";
        }
        else if($type == 'dislike')
        {
            $insert = "INSERT INTO main.posts_info (post_id,likes,dislikes,favorites) VALUES (".$this->db->escape($id).",0,1,0)
                ON DUPLICATE KEY UPDATE dislikes=dislikes+1";
            $update = "UPDATE main.posts SET score = score - 1 WHERE id = ".$this->db->escape($id)."";
        }
        else{}

        $this->db->query($insert);

        $this->db->query($update);
    }

    public function insert_favorite($id, $user_id)
    {
        $sql = "INSERT INTO main.posts_info (post_id,likes,dislikes,favorites) VALUES (".$this->db->escape($id).",0,0,1)
                ON DUPLICATE KEY UPDATE favorites=favorites+1";

        $this->db->query($sql);

        $sql = "INSERT INTO main.user_favs (user_id, post_id) VALUES (".$this->db->escape($user_id).", ".$this->db->escape($id).")";

        $this->db->query($sql);

        $update = "UPDATE main.posts SET score = score + 3 WHERE id = ".$this->db->escape($id)."";

        $this->db->query($update);
    }

    public function add_view($id)
    {
        $sql = "UPDATE main.posts SET views = views + 1 WHERE id = ".$this->db->escape($id)."";
        $this->db->query($sql);
    }

}

?>