<?php
	class Login extends My_Controller {

		public function index() {

			if($this->session->userdata('user_id')) {
				return redirect('admin/dashboard');
// here we sre checking if user already logged in redirecting him to admin/dashboard when he typing login in url 
			}

			$this->load->view('public/admin_login_view');

		}

		public function admin_login() {
			$this->load->library('form_validation');
			//$this->form_validation->set_rules('username','User Name','required|trim');
			//$this->form_validation->set_rules('password','Password','required');
			//see config/form_validation.php
$this->form_validation->set_error_delimiters("<p class='text-danger'>", "</p>");
// using this function we can change color of errore see source page

			if($this->form_validation->run('admin_login_rules')) { //if true
				//success
				$username = $this->input->post('username');
				$password = $this->input->post('password');

				$this->load->model('login_model');

			   $login_id = $this->login_model->login_valid($username, $password);
//recieving id from DB see model
				if($login_id > 0) {
					//"credentials valid, login user";

					$this->session->set_userdata('user_id', $login_id);
					//1st arg key and 2nd agr id value 
					return redirect('admin/dashboard'); //admin controller
				} else {
					$this->session->set_flashdata('login_failed','Invalid UserName/Password'); //taking two args key and value 
					return redirect('login');
				}
			} else {
				$this->load->view('public/admin_login_view');
				//echo validation_errors();
			}
		}

		public function logout() {
			$this->session->unset_userdata('user_id');
			return redirect('login');
		}
	}
?>
