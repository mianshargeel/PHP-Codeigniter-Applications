<?php include_once('public_header.php'); ?>

<div class="container">
	<h1>Search Results</h1>
	<hr>
	<table class="table table-responsive">
		<thead style="font-size: 18px; color: blue">
			<tr>
				<td>Sr.No</td>
				<td>Article</td>
				<td>Published On</td>
			</tr>
		</thead>
		<tbody>

		<?php if(count($articles) > 0): 

		$count = $this->uri->segment(4);

		 foreach($articles as $row): ?>
	<tr>
		<td> <?php echo ++$count; ?></td>
		<td> <?php echo $row->title; ?></td>
		<td> <?php echo "date"; ?></td>
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





