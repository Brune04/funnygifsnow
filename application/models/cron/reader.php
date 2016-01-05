<?php

class Reader extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    public function get_meme_pop()
    {
    	return $this->set_up('http://www.reddit.com/r/meme/hot.json', 'meme');
    }

    public function get_meme_new()
    {
    	return $this->set_up('http://www.reddit.com/r/meme/new.json', 'meme');
    }

    public function get_gif_pop()
    {
    	return $this->set_up('http://www.reddit.com/r/gifs/hot.json', 'gif');
    }

    public function get_gif_new()
    {
    	return $this->set_up('http://www.reddit.com/r/gifs/new.json', 'gif');
    }

    private function set_up($url, $type)
    {
    	$return = json_decode(file_get_contents($url), true);
    	$url = array();
        $image_type = array(1 => 'jpg', 2 => 'jpeg', 3 => 'png', 4 => 'gif');
    	foreach($return['data']['children'] as $key => $value)
		{
            if($value['data']['over_18'] != true)
            {
                $votes = $value['data']['ups'] + $value['data']['downs'];
                date_default_timezone_set('GMT');
                $ext = explode(".",$value['data']['url']);
                $ext = end($ext);
                $image = NULL;
                if($ext == 'gif') {
                   $image = imagecreatefromgif($value['data']['url']);
                   imagepng($image, 'application/views/uploads/'.$value['data']['name'] . $value['data']['created_utc'].'.png');
                }
                if(in_array($ext, $image_type))
                {
                    $url[$value['data']['name'] . $value['data']['created_utc']]['key'] = $value['data']['name'] . $value['data']['created_utc'];
                    $url[$value['data']['name'] . $value['data']['created_utc']]['url'] = $value['data']['url'];
                    $url[$value['data']['name'] . $value['data']['created_utc']]['title'] = $value['data']['title'];
                    $url[$value['data']['name'] . $value['data']['created_utc']]['author'] = $value['data']['author'];
                    $url[$value['data']['name'] . $value['data']['created_utc']]['score'] = $votes;
                    $url[$value['data']['name'] . $value['data']['created_utc']]['type'] = $type;
                    $url[$value['data']['name'] . $value['data']['created_utc']]['created_at'] = date('M d, Y', $value['data']['created_utc']);
                    if(!empty($image))
                    {
                        $url[$value['data']['name'] . $value['data']['created_utc']]['image'] = 'http://localhost/~peterbrune/application/views/uploads/'.$value['data']['name'] . $value['data']['created_utc'].'.png';
                    }
                    else
                    {
                        $url[$value['data']['name'] . $value['data']['created_utc']]['image'] = '';
                    }
                }
            }
		}

		return $url;
    }
}

?>