<?php
	class Article_model extends CI_Model {
		public function articles_list($limit, $offset) { //for admin.php
			//we are recieving 2 args to set pagination on ourdashboard page

			$id = $this->session->userdata('user_id');

			$query = $this->db->select(['id','title',])
								->from('articles')
								->where('user_id', $id) //column name from table articles
								->limit($limit, $offset) //setting limit and offset means from which num of record pagination will start and limit means per_page
								->get();

			return $query->result();//it return an array with multiple Objects

		}
		//creating function to know total number of rows in our table [articles]
		public function num_rows() {
			$user_id = $this->session->userdata('user_id');
			$this->db->select(['id','title']);
			$this->db->where('id', $user_id);
			$query = $this->db->get('articles');

			return $query->num_rows();
		}


//--------------------------------------------------------------------------------------------

		//creating func to get number of rows of all users for user.php
		public function count_all_articles() {
			$query = $this->db->select(['id', 'title'])
							  ->from('articles')
							  ->get();

			return $query->num_rows(); //we need to get all number of rows
		}

		//creating func to get all data from table articles  for user.php
		public function all_articles_list($limit, $offset) {

			$query = $this->db->select(['id','title','created_at'])
								->from('articles')
								->limit($limit, $offset)
								->order_by('created_at', 'DESC') 
								->get();

			return $query->result();
		}


		//creating function to search data from DB for user.php
		public function search($query, $limit, $offset) {
			$q = $this->db->from('articles')
			              ->like('title', $query) //1st column name 2nd article name searched by the user
			              ->limit($limit, $offset)//for pagination
			              ->get();

			return $q->result();
		}

		//creatin function to Know number of rows for 'user/search_results'
		public function count_search_results($query) {
			$q = $this->db->from('articles')
						  ->like('title', $query)
						  ->get();

			return $q->num_rows();
		} 

		//we need to create a function to make link on our all aricles in DB for that finding single row
		public function find($id) {
			$query = $this->db->from('articles')
							  ->where('id', $id)
							  ->get();

			if($query->num_rows() > 0) {
				return $query->row();
			} else {
				return false;
			}
		}

// ------------------------------------------------------------------------------------------


		public function add_article($post) {
			return $this->db->insert('articles', $post);
			//"INSERT Into articles Where title=title, body=body";
		}

		//creating a method in article_model to fetch one row to edit  
		public function find_article($row_id) {
			//exit($row_id);
			$this->db->select(['id','title','body']);
			$this->db->where('id', $row_id);
			$query = $this->db->get('articles');

			return $query->row(); //returns single row
		}

		//creating function to store updated data in DB
		public function update_article($article_id, $article) {
//this is the id of updated row and $article containing all complete updeted row see admin.php
			$this->db->where('id', $article_id);
			$query = $this->db->update('articles', $article);

			return $query;

		}

		//creating function to delete record from DB
		// public function delete_article($article_id) {
		// 	$this->db->where('id', $article_id);
		// 	$query = $this->db->delete('articles');

		// 	return $query;
		// }

	}

?>