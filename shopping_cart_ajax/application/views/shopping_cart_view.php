<!DOCTYPE html>
<html>
<head>
	<title>Shopping Cart With Ajax and JQuert</title>
	<link rel="stylesheet" type="text/css" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<style type="text/css">
	body{
		background-color: #ff7373;
	}
	h3{
		color: #333333;
	}
</style>
</head>
<body>
	<div class="container">
	<br><br>
		<div class="col-lg-6 col-md-6">
			<div class="table-responsive">
				<h3 align="center">Codeigniter Shopping Cart With Ajax and jQuery</h3><br><br>
			<?php
				foreach($products as $row) {
					echo '
						<div class="col-md-4" style="padding: 16px; background-color: #f1f1f1; border: 1px solid #ccc; margin-bottom: 16px; height: 400px;" align="center">
						 <img src="'.base_url('images/'.$row->product_image).'" /> <br>
						<h4>'.$row->product_name.'</h4>
						<h3 class="text-danger">'.$row->product_price.'</h3>

						<input type="text" name="quantity" class="quantity" 
						     id="'.$row->product_id.'" /> <br/>

					   <button type="button" name="add_cart" class="btn btn-success add_cart"  data-product_name="'.$row->product_name.'"
					   	   data-price="'.$row->product_price.'"
					   	   data-product_id="'.$row->product_id.'" /> Add to Cart 
					   	</button>

						</div>
					';
				}


			?>
			</div>
		</div>

		<div class="col-lg-6 col-md-6">
			<div id="cart_details">
				<h3 align="center">Cart is Empty</h3>
			</div>
		</div>
	</div> <!-- end of container -->

</body>
</html>

<script type="text/javascript">
	$(document).ready(function(){
		$('.add_cart').click(function(){//user will click on this button this code will exicute
			var product_id = $(this).data("product_id");
			var product_name = $(this).data("product_name");
			var product_price = $(this).data("price");
			var quantity = $('#'+product_id).val(); // this func will take value of qty enter by user and put into quantity variable

			if(quantity != '' && quantity > 0) {

				$.ajax({

					url:"<?php echo base_url('shopping_cart/add'); ?>",
					method:"POST",
					data:{product_id:product_id, product_name:product_name,
						product_price:product_price, quantity:quantity},
					success:function(data) {
						alert("Product Added to Cart");
						$('#cart_details').html(data);
						$('#'+product_id).val('');
					}
				});

			} else {
				alert("Please Enter the Quantity of Products");
			}
		});
		//we are creating another method for div(#cart_details) to load cart when page uploaded
		$('#cart_details').load("<?php echo base_url('shopping_cart/load'); ?>");

//function to remove products from cart 
		$(document).on('click', '.remove_inventory', function(){
			var row_id = $(this).attr("id");//'id' may be from controller/views(button -> id) 

			if(confirm("Are You Sure You Want Remove Products ?")) {
				$.ajax({
					url:"<?php echo base_url('shopping_cart/remove')?>",
					method:"POST",
					data:{row_id:row_id},
					success:function(data) {
						alert("Products Has Removed From Cart!");
						$('#cart_details').html(data);
					}
				});
			} else {
				return false;
			}
		});
//function to clear all products from cart
		$(document).on('click', '#clear_cart', function(){

			if(confirm("Are You Sure You Want Clear All Products from Cart ?")) {

				$.ajax({
					url:"<?php echo base_url('shopping_cart/clear'); ?>",
					success:function(data) {
						alert("Your Cart Has been Cleared....");
						$('#cart_details').html(data);
					}
				});

			} else {

				return false;
			}
		});

	});
</script>




