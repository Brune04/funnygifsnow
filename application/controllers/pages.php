<?php

class Pages extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->library('image_lib');
	}

	public function view()
	{
		show_404();
	}

	public function gif()
	{
		$data['title'] = 'Funny Gifs';
		$data['description'] = '';
		$data['ogimage'] = '';
		$data['page_description'] = '<h2>Check out the newest gifs uploaded!</h2>
					<p><a href="'.$_SERVER["SCRIPT_NAME"].'/upload">Upload</a> a new gif and share with your friends!</p>';
		$data['logged_in'] = (isset($this->session->userdata['user_id']) ? true : false);
		$this->load->model('gif/reader', 'reader');
		$config['base_url'] = 'http://localhost/~peterbrune/index.php/gif/';
		$data['image'] = '/~peterbrune/application/images/';
		$this->set_up_post_page($config, $data);
	}

	public function meme()
	{
		$data['title'] = 'Funny Memes';
		$data['description'] = '';
		$data['ogimage'] = '';
		$data['page_description'] = '<h2>Check out the newest memes and images uploaded!</h2>
					<p><a href="'.$_SERVER["SCRIPT_NAME"].'/upload">Upload</a> a new meme and share with your friends!</p>';
		$data['logged_in'] = (isset($this->session->userdata['user_id']) ? true : false);
		$this->load->model('meme/reader', 'reader');
		$config['base_url'] = 'http://localhost/~peterbrune/index.php/meme/';
		$data['image'] = '/~peterbrune/application/images/';
		$this->set_up_post_page($config, $data);
	}

	public function popular()
	{
		$data['title'] = 'Popular Gifs, Popular Memes, and Popular Images';
		$data['description'] = '';
		$data['ogimage'] = '';
		$data['page_description'] = '<h2>Check out the most popular gifs and memes of all time!</h2>
					<p><a href="'.$_SERVER["SCRIPT_NAME"].'/upload">Upload</a> a new meme or gif and see if your upload becomes popular!</p>';
		$data['logged_in'] = (isset($this->session->userdata['user_id']) ? true : false);
		$this->load->model('popular/reader', 'reader');
		$config['base_url'] = 'http://localhost/~peterbrune/index.php/popular/';
		$data['image'] = '/~peterbrune/application/images/';
		$this->set_up_post_page($config, $data);
	}

	public function featured()
	{
		$data['title'] = 'Funny Gifs, Funny Memes, and Funny Images For Everyone to Share!';
		$data['description'] = '';
		$data['ogimage'] = '';
		if(!$this->uri->segment(1))
		{
			$data['page_description'] = '<h2>Welcome to Funny Gifs Now!</h2>
					<p>Funny Gifs Now is an entertainment site where users can enjoy funny gifs, memes, and images and share them with their friends!</p>';
		}
		else
		{
			$data['page_description'] = '<h2>Check out the featured gifs and memes of the month!</h2>
					<p><a href="'.$_SERVER["SCRIPT_NAME"].'/upload">Upload</a> a new meme or gif and see if your upload is featured!</p>';
		}
		$data['logged_in'] = (isset($this->session->userdata['user_id']) ? true : false);
		$this->load->model('featured/reader', 'reader');
		$config['base_url'] = 'http://localhost/~peterbrune/index.php/popular/';
		$data['image'] = '/~peterbrune/application/images/';
		$this->set_up_post_page($config, $data);
	}

	private function set_up_post_page($config, $data)
	{
		$this->load->library('pagination');
		$config['total_rows'] = $this->reader->record_count();
		$config['per_page'] = 12; 
		$config['uri_segment'] = 2;
		$config['last_link'] = false;
		$config['use_page_numbers'] = true;

		$page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 1;
		$page -= 1;

		$this->pagination->initialize($config); 

		$data['data'] = $this->reader->get($config["per_page"], $page*$config['per_page']);
		$data['popular'] = $this->reader->get_popular_posts();

		foreach($data['data'] as $key => $value)
		{
			$config['image_library'] = 'gd2';
			$config['source_image']	= $value->image;
			$config['create_thumb'] = TRUE;
			$config['maintain_ratio'] = TRUE;
			$config['width']	= 195;
			$config['height']	= 220;

			$this->load->library('image_lib', $config); 

			$this->image_lib->resize();
		}

		if ( ! $this->image_lib->resize())
		{
		    echo $this->image_lib->display_errors();
		}

		$data['links'] = $this->pagination->create_links();

		$this->load->view('templates/header', $data);
		$this->load->view('pages/posts.php', $data);
	}
}