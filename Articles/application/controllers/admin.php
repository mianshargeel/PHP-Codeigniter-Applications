<?php
	class Admin extends My_Controller {
// here we are checking if user logged in then only he can access admin panel otherwise redirecting him to login-controller
//note if we are loading model in constructor then we dont need it to load in every func

		public function __construct() {
			parent::__construct();

			if(! $this->session->userdata('user_id')) {
				return redirect('login');
			}

			$this->load->model('article_model');//loaded here for all methods

		}

		public function dashboard() {
			//creating pagination
			//$this->load->library('pagination'); autoload.php

			$config['base_url'] = base_url('admin/dashboard'); //pagination will be at
			$config['per_page'] = 5;  //satndered 10 per page
			$config['total_rows'] = $this->article_model->num_rows(); //num of total rows
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
			$config['cur_tag_close'] = '<a/></li>';
			

			$this->pagination->initialize($config);
			//now setting limit and offset in articles_list to show on dashboard

			$data['articles'] = $this->article_model->articles_list($config['per_page'],
			$this->uri->segment(3));

			$data['links'] = $this->pagination->create_links();


			$this->load->view('admin/dashboard', $data);
		}

		public function add_article() {
			$this->load->view('admin/add_articles');

		}
// we have using here validation, creating form_validation.php in config folder
//we want to upload image thats why we hato upload lib and config array see http://localhost:8888/Codeigniter-Apps/My_Code/user_guide/libraries/file_uploading.html

		public function store_article() {

			$config = [
				'upload_path'     =>    './uploads', //creating directory in root folder 
				'allowed_types'   =>    'jpg|JPG|jpeg|png|gif',
				// 'max_width'       =>    '2024',
				// 'max_height'	  =>    '2068'

			];
			$this->load->library('upload', $config);//as 2nd arg

			$this->load->library('form_validation');

		  if($this->form_validation->run('add_article_rules') && $this->upload->do_upload()) {//calling func to upload image 

			  $post = $this->input->post(); //print_r($post all articles without images
			  $data = $this->upload->data();
			  //echo "<pre>";
			  //print_r($data); exit;
			  $image_path = base_url("uploads/" . $data['raw_name'] . $data['file_ext']); 
			  // echo "<pre>";  please echo $image_path and see about two indexes
			  // print_r($image_path); exit;
			  
			  $post['image_path'] = $image_path;//'image_path' is name of col from DB, saving

			  if($this->article_model->add_article($post)) { //articles+image adding

			  	$this->session->set_flashdata('feedback', 'Article added Successfully!');

			  } else {

			  	$this->session->set_flashdata('feedback', 'Failed to add Article Please try again!');
			  }

			  return redirect('admin/dashboard');

			} else {

				$upload_error = $this->upload->display_errors();
				$this->load->view('admin/add_articles', compact('upload_error'));
			}
		} //Add article complete heres

//this is the which we have passed in dashboard.php there we are recieving it from DB, Also this is the ID shows in the url check like controller/method/perameters

		public function edit_article($row_id) {  //dashboard.php  [echo $row_id;]
//creating a method in article_model to fetch one row to edit  

//model loaded above
			$data['article'] = $this->article_model->find_article($row_id);
			//print_r($article);
			$this->load->view('admin/edit_article', $data);

		}

//using this func in form of file edit_article.php 
		public function update_article($article_id) { 
			//print_r($this->input->post()); also we can check only about id as [exit($article_id);]

			$this->load->library('form_validation');

			if ($this->form_validation->run('add_article_rules')) { 

			  	$post = $this->input->post();  //$post an array
			  	// echo "<pre>";
			  	// print_r($post); exit;

//model loaded above

			  	if($this->article_model->update_article($article_id, $post)) { //true

			  		$this->session->set_flashdata('feedback', 'Article Updated Successfully!');

			  	} else {

			  		$this->session->set_flashdata('feedback', 'Failed to Update Article Please try again!');
			  	}

			  		return redirect('admin/dashboard');

			} else {

				$this->load->view('admin/edit_articles');
			}
		}   // end of Edit function


		public function delete_article() {
//print_r($this->input->post()); we can see here values of article_id and submit from dashboard.php
			$article_id = $this->input->post('article_id'); //we are getting only id from all inputs to delete complete row 

//model loaded above


			if($this->article_model->delete_article($article_id)) { //true

				$this->session->set_flashdata('feedback', 'Article Deleted Successfully!');

			} else {

				$this->session->set_flashdata('feedback', 'Failed to Delete Article Please try again!');
			}

			return redirect('admin/dashboard');
		}

	}

?>