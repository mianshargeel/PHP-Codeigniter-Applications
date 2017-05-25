<?php include_once('admin_header.php'); ?>

<div class="container">

<div class="row">
	<div class="row">
	<div class="col-lg-6 col-lg-offset-6">
		<a href="<?php echo base_url('admin/store_article'); ?>" class="btn btn-success pull-right">Add Articles</a>
	</div> <!-- end of col-6 -->
	</div> <!-- end of row -->

	<?php if($feedback = $this->session->flashdata('feedback')): ?>
    <div class="row">
    <div class="col-lg-6">
    <div style="margin-left: 100px" class="alert alert-dismissible alert-success">
      <?php echo $feedback; ?>
    </div>
    </div> <!-- end of coi-6 -->
    </div> <!-- end of row -->
	<?php endif; ?>


<table class="table">
	<thead style="color: blue">
		<th >Sr.NO</th>
		<th >Title</th>
		<th >Action</th>
	</thead>
	<tbody>

	<?php if(count($articles) > 0): 

		$count = $this->uri->segment(3);

		 foreach($articles as $row): ?>
	<tr>
		<td> <?php echo ++$count; ?></td>
		<td> <?php echo $row->title; ?></td>

		<td>

		<div class="row">
		<div class="col-lg-2">
			<?php echo anchor("admin/edit_article/" . $row->id, 'Edit', ['class' => 'btn btn-info']);
			 ?>
		</div> <!-- end of col-2 -->

			<!-- <a href="#" class="btn btn-info">Edit</a> -->
			<!-- <a href="#" class="btn btn-danger">Delete</a> -->

		<div class="col-lg-2">
			<?php
				echo form_open('admin/delete_article');
				echo form_hidden('article_id', $row->id);
				echo form_submit(['name'=>'submit','value'=>'Delelte','class'=>'btn btn-danger','onclick'=>
					"<script> alert('Are you sure You Want to Delete ?'); </script>"]);

				echo form_close();
			?>
		</div> <!-- end of col-2 -->
		</div> <!-- end of row -->

		</td>

	</tr>
	<?php endforeach; ?>
	<?php else: ?>
		<tr>
			<td colspan="3"> No Record Found </td>
		</tr>
	<?php endif; ?>
	</tbody>
	
</table>
</div>
	<!-- <ul class="pagination">
		<li><a href=""><</a> </li>
		<li><a href="">1</a> </li>
		<li><a href="">2</a> </li>
		<li><a href="">3</a> </li>
		<li class="active"><a href="">4</a> </li>
		<li><a href="">5</a> </li>
		<li><a href="">6</a> </li>
		<li><a href="">></a> </li>
	</ul> -->

<?php echo $links; ?>
</div> <!-- end of container -->

<?php include_once('admin_footer.php'); ?>

