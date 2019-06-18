<?php
class Admin extends CI_controller{
	public function dashboard(){
		$this->load->library('pagination');
		$config =[
			'base_url'=>base_url('admin/dashboard'),
			'per_page'=>5,
			'total_rows'=>$this->articlesmodel->num_rows(),
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
		$articles = $this->articlesmodel->articles_list($config['per_page'],$this->uri->segment(3));
		$this->load->view('admin/dashboard',['articles'=>$articles]);
	}
	public function show_article(){
		$data_id = $this->uri->segment(3);
		$data = $this->articlesmodel->find_article($data_id);
		$this->load->view('admin/show_article',['data' => $data]);

	}
	public function add_article(){

		
		$this->load->view('admin/add_article');
	}

	public function store_article(){

		$this->load->library('form_validation');

		if($this->form_validation->run('add_article_rules')){

			$pots = $this->input->post();

			unset($post['Submit']);
			return $this->_flash_massage_and_redirect(
						$this->articlesmodel->add_article($post),
						'Artilce Inserted successfully',
						'there was an Error while 
								Inserting data'
					);
			
		}
		else{
			$this->load->view('admin/add_article');
		}
	}

	public function edit_article($article_id){
		$article= $this->articlesmodel->find_article($article_id);
		$this->load->view('admin/edit_article',['article'=>$article]);
	}


	public function update_article($article_id){
		$this->load->library('form_validation');
		if($this->form_validation->run('add_article_rules')){

			$post = $this->input->post();
			unset($post['Submit']);
			return $this->_flash_massage_and_redirect(
						$this->articlesmodel->update_article($article_id,$post),
						'Artilce Updated successfully',
						'there was an Error while 
								Updating data'
					);
		}
		else{
			$article= $this->articlesmodel->find_article($article_id);
			$this->load->view('admin/edit_article',['article'=>$article]);
		}
	}
	public function delete_article(){
		$article_id = $this->input->post('article_id');
		$this->articlesmodel->delete_article($article_id);
		return $this->_flash_massage_and_redirect(
					$this->articlesmodel->delete_article($article_id),
					'Artilce Deleted successfully',
					'there was an Error while 
							Deleting data'
				);
	}

	public function __construct(){
		parent:: __construct();
		if(! $this->session->userdata('user_id'))
			return redirect('login');
		$this->load->model('articlesmodel');
		$this->load->helper('form');

	}
	private function _flash_massage_and_redirect($successfull , $success_massgage , $fail_massage){
		if($successfull){
			$this->session->set_flashdata('feedback',$success_massgage);
			$this->session->set_flashdata('feedback_class','alert-sucess');
		}
		else{
			$this->session->set_flashdata('feedback',$fail_massage);
			$this->session->set_flashdata('feedback_class','alert-danger');
		}
		return redirect('admin/dashboard');

	}
}
?>