<?php

class Scrape extends CI_Controller {

  	public function index()
  	{
      if(!$this->input->is_cli_request())
      {
        show_404();
        return;
      }
      $this->load->database();
      $this->load->model('cron/writer', 'writer');
      $this->load->model('cron/reader', 'reader');
  		$gif = $this->get_gif();
      $meme = $this->get_meme();
      $result = array_merge($gif, $meme);
      $this->insert($result);
  	}

    public function get_gif()
    {
      $popular = $this->reader->get_gif_pop();
      $new = $this->reader->get_gif_new();
      return array_merge($popular, $new);
    }

    public function get_meme()
    {
      $popular = $this->reader->get_meme_pop();
      $new = $this->reader->get_meme_new();
      return array_merge($popular, $new);
    }

    public function insert($results)
    {
      return $this->writer->insert($results);
    }
}

?>