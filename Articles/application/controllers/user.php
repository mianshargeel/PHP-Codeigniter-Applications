<?php
ob_start();
	class User extends My_Controller {
		public function index() {
			//$this->load->library('pagination'); autoload.php
			$this->load->model('article_model');

			$config['base_url'] = base_url('user/index'); //pagination will be at
			$config['per_page'] = 5;  //satndered 10 per page
			$config['total_rows'] = $this->article_model->count_all_articles();//total rows
			//next config are optional to decorate
			$config['full_tag_open'] = "<ul class='pagination'>";
			$config['full_tag_close'] = "</ul>";
			$config['first_tag_open'] = '<li>';
			$config['first_tag_close'] = '</li>';
			$config['last_tag_open'] = '<li>';
			$config['first_link'] = 'prev';
			$config['last_link'] = 'next';
			$config['last_tag_close'] = '</li>';
			$config['next_tag_open'] = '<li>';
			$config['next_tag_close'] = '</li>';
			$config['prev_tag_open'] = '<li>';
			$config['prev_tag_close'] = '</li>';
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$config['cur_tag_open'] = "<li class='active'><a>";
			$config['cur_tag_close'] = '</a></li>';
			

			$this->pagination->initialize($config);

			$articles = $this->article_model->all_articles_list($config['per_page'],$this->uri->segment(3));
			//$data['links'] = $this->pagination->create_links();

			//$this->load->view('public/articles_list',['articles'=>$articles]); 
			$this->load->view('public/articles_list',compact('articles')); //same to above line
		}

		public function search() {
			$this->load->library('form_validation');

			$this->form_validation->set_rules('query','Query','required|alpha|trim|alpha_numeric_spaces');

			if(! $this->form_validation->run() ) {

				$this->index(); 

			} else {

				$query = $this->input->post('query');

				return redirect("user/search_results/$query"); //note variable cannot pass in single quotes
			}
			//print_r($query);
			
		}

		public function search_results($query) {

			$this->load->model('article_model');

			$config['base_url'] = base_url("user/search_results/$query");
			$config['per_page'] = 5;  //satndered 10 per page
			$config['total_rows'] = $this->article_model->count_search_results($query);

			$config['uri_segment'] = 4;

			$config['full_tag_open'] = "<ul class='pagination'>";
			$config['full_tag_close'] = "</ul>";
			$config['first_tag_open'] = '<li>';
			$config['first_tag_close'] = '</li>';
			$config['last_tag_open'] = '<li>';
			$config['first_link'] = 'prev';
			$config['last_link'] = 'next';
			$config['last_tag_close'] = '</li>';
			$config['next_tag_open'] = '<li>';
			$config['next_tag_close'] = '</li>';
			$config['prev_tag_open'] = '<li>';
			$config['prev_tag_close'] = '</li>';
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$config['cur_tag_open'] = "<li class='active'><a>";
			$config['cur_tag_close'] = '</a></li>';
			

			$this->pagination->initialize($config);

			$articles = $this->article_model->search($query, $config['per_page'], $this->uri->segment(4)); //becouse our url is user/search_results/$query

			$this->load->view('public/search_result', compact('articles'));
		}

		
		//we need to create a function to make link on our all aricles in DB
		public function article($id) {

			$this->load->model('article_model');
			$article = $this->article_model->find($id);

			$this->load->view('public/article_detail', compact('article'));
		}
	}

?>





