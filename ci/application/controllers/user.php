<?php
class User extends MY_Controller{
  public function index(){
  	$this->load->helper('form');
  	$this->load->model('articlesmodel');
  	$this->load->library('pagination');
		$config =[
			'base_url'=>base_url('user/index'),
			'per_page'=>5,
			'total_rows'=>$this->articlesmodel->count_all_articles(),
			'full_tag_open'=>'<ul class="pagination">',
			'full_tag_close'=>'</ul>',
			'next_tag_open'	=>'<li class="page-item"><span class="page-link">',
			'next_tag_close'=>'</span></li>',
			'prev_tag_open'=>'<li class="page-item"><span class="page-link">',
			'prev_tag_close'=>'</span></li>',
			'num_tag_open'=>'<li class="page-item"><span class="page-link">',
			'num_tag_close'=>'</span></li>',
			'cur_tag_open'=>'<li class="page-item active"><span class="page-link">',
			'cur_tag_close'=>'</span></li>'
		]; 
		$this->pagination->initialize($config);
		$articles = $this->articlesmodel->all_articles_list($config['per_page'],$this->uri->segment(3));
  		$this->load->view('public/articles_list',['articles'=>$articles]);
	}
	public function search(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('query','Search','required');
		if(! $this->form_validation->run())
		{
			return $this->index();
		}
			$query = $this->input->post('query');
			return redirect("user/search_results/$query");
			/*$this->load->model('articlesmodel');
			$articles = $this->articlesmodel->search($query);
			$this->load->view('public/search_results',['articles'=>$articles]);*/

	}
	public function search_results($query){
		$this->load->helper('form');
  	$this->load->model('articlesmodel');
  	$this->load->library('pagination');
		$config =[
			'base_url'=>base_url("user/search_results/$query"),
			'per_page'=>5,
			'total_rows'=>$this->articlesmodel->count_search_results($query),
			'full_tag_open'=>'<ul class="pagination">',
			'full_tag_close'=>'</ul>',
			'next_tag_open'	=>'<li class="page-item"><span class="page-link">',
			'next_tag_close'=>'</span></li>',
			'prev_tag_open'=>'<li class="page-item"><span class="page-link">',
			'prev_tag_close'=>'</span></li>',
			'num_tag_open'=>'<li class="page-item"><span class="page-link">',
			'num_tag_close'=>'</span></li>',
			'cur_tag_open'=>'<li class="page-item active"><span class="page-link">',
			'cur_tag_close'=>'</span></li>'
		]; 
		$this->pagination->initialize($config);
		$articles = $this->articlesmodel->search($query, $config['per_page'],$this->uri->segment(4));
		$this->load->view('public/search_results',['articles'=>$articles]);

	}

}
?>