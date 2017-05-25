<?php include_once('public_header.php'); ?>

<div class="container">
	<h1>All Articles</h1>
	<hr>
	<table class="table table-responsive">
		<thead style="font-size: 20px; color: maroon">
			<tr>
				<td>Sr.No</td>
				<td>Article</td>
				<td>Published On</td>
			</tr>
		</thead>
		<tbody>

		<?php if(count($articles) > 0): 

		$count = $this->uri->segment(3);

		 foreach($articles as $row): ?>
	<tr>
		<td> <?php echo ++$count; ?></td>
<!-- creating links on articles -->
		<td> 
		<?php echo anchor( "user/article/{$row->id}", $row->title,"style='color: blue'");//concatination of url ?>
		</td>
<!-- 	<td> <?php //echo $row->created_at; ?></td> -->	
		<td> <?php echo date('d M y H:i:s' , strtotime($row->created_at)); //Note 1st arg formate of dete 2nd converting string into timestamp formate urra ?></td>
	
	</tr>

	<?php endforeach; ?>
	<?php else: ?>
		<tr>
			<td colspan="3"> No Record Found </td>
		</tr>
	<?php endif; ?>
		</tbody>
		
	</table>
	<?php echo $this->pagination->create_links();  ?>

</div> <!-- end of container -->

<?php include_once('public_footer.php'); ?>



