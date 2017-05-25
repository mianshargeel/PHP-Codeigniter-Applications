<?php include_once('public_header.php'); ?>

<div class="container">
<div class="row">
	<div class="col-lg-6">
<h1 style="color: blue"><?php echo $article->title; ?></h1>
</div>

<div class="col-lg-6">
<span class="pull-right"> 
	<?php echo date('d M y H:i:s' , strtotime($article->created_at)); ?>
</span>
</div>
</div> <!-- end of row -->

<hr>
<p><?php echo $article->body; ?></p>

<!-- showing image -->
<?php if(! is_null($article->image_path)): ?>

	<img src="<?php  echo $article->image_path; ?> ">

<?php endif; ?>


</div>

<?php include_once('public_footer.php'); ?>