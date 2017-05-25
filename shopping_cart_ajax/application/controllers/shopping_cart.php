<?php

defined('BASEPATH') OR exit('No direct script access allowed');

	class Shopping_cart extends CI_Controller {
		public function index() {

			$this->load->model('shopping_cart_model');
			$data['products'] = $this->shopping_cart_model->fetch_all();

			$this->load->view('shopping_cart_view', $data);
		} 

		public function add() {
			//$this->load->library('cart'); autoload.php

			$data = array(
					"id"     =>    $_POST["product_id"],
					"name"     =>    $_POST["product_name"],
					"qty"     =>    $_POST["quantity"],
					"price"     =>    $_POST["product_price"]
			);

			$this->cart->insert($data);  //this will return rowid for perticular row
			echo $this->views();
		}

		public function load() {
			echo $this->views();
		}

		public function views() {
			//$this->load->library('cart'); autoload.php
			$output = '';
			$output .='
				<h3>Shopping Cart</h3><br>
				<div class="table-responsive">

					<div align="right">
					<button type="button" id="clear_cart" class="btn btn-warning clear_cart">Clear Cart</button>
					</div>
					
					<br/>
					<table class="table table-border">
						<tr>
							<td width="40%">Name</td>
							<td width="15%">Quantity</td>
							<td width="15%">Price</td>
							<td width="15%">Total</td>
							<td width="15%">Action</td>
						</tr>
					
			';
			$count = 0;
			foreach($this->cart->contents() as $items) {
				$count++;
				$output .= '
					<tr>
						<td>'.$items["name"].'</td>
						<td>'.$items["qty"].'</td> 
						<td>'.$items["price"].'</td>
						<td>'.$items["subtotal"].'</td>
						<td> <button type="button" name="remove" id="'.$items["rowid"].'" class="btn btn-danger btn-xs remove_inventory" >Remove</button>
						</td>
					</tr>
				';
			}
			$output .= '
				<tr>
					<td colspan="4" align="right">Total</td>
					<td>'.$this->cart->total().'</td>
				</tr>

			   </table>
			</div>

			';

			if($count == 0) {
				$output = '<h3 align="center">Cart is Empty</h3>';
			}

			return $output;
		}

		public function remove() {
			//$this->load->library('cart'); autoload.php
			$row_id = $_POST['row_id'];
			$data = array(
				"rowid"  =>   $row_id,
				"qty"    =>   0
			);

			$this->cart->update($data);
			echo $this->views();
	
		}

		public function clear() {
			//$this->load->library('cart'); autoload.php
			$this->cart->destroy();
			echo $this->views();
		}

	}

?>