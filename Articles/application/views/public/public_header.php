<!DOCTYPE html>
<html>
<head>
	<title>Articles List</title>
	<!-- <link rel="stylesheet" type="text/css" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
	<!-- <link rel="stylesheet" type="text/css" href="<?php //echo base_url('assets/css/bootstrap.min.css'); ?>"> -->
	<?php echo link_tag('assets/css/bootstrap.min.css'); ?> 
	<!-- here we used three ways to load bootstrap  -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
</head>
<body>
	<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a style="margin-top: 10px" class="navbar-brand" href="<?php echo base_url('user'); ?>">Articles</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">

<!-- here we are creating our form for search -->
<?php echo form_open('user/search', ['class'=>'navbar-form navbar-left','role'=>'search']); ?>

      <!-- <form class="navbar-form navbar-left" role="search"> -->

        <div class="form-group">
          <input style="margin-top: 10px" type="text" name="query" class="form-control" placeholder="Search">
        </div>
        <button style="margin-top: 10px" name="submit" type="submit" class="btn btn-default">Search</button>

<?php echo form_close(); ?>
  
      <?php echo form_error('query', "<p class='navbar-text' style='color: #fff'>", '</p>'); ?>

      <ul class="nav navbar-nav navbar-right">
        <li><a href="<?php echo base_url()."login"; ?>">Login</a>"></li>
      </ul>
    </div> <!-- end of navbar-header -->
  </div> <!-- end of container-fluid -->
</nav>