<!DOCTYPE html>
<html>
<head>
	<title>Admin Panel</title>
	<?php echo link_tag('assets/css/bootstrap.min.css'); ?> 

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
      <a style="font-size: 25px" class="navbar-brand" href="<?php echo base_url('admin/dashboard'); ?>">Admin Panel</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
      <ul class="nav navbar-nav navbar-right">
        <li style="color: blue">
          <!-- <a href="<?php //echo base_url('login/logout'); ?>">Logout</a> -->
          <?php echo anchor('login/logout','Logout', "style='color: #fff'") ?>
        </li>
      </ul>
    </div> <!-- end of navbar-header -->
  </div> <!-- end of container-fluid -->
</nav>