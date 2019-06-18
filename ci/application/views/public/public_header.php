<!DOCTYPE html>
<html>
<head>
	<title>Articles List</title>
  <link rel="shortcut icon" type="text/css" href="<?php echo base_url('assets/images/img.png')?>">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
 
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="<?php echo base_url()?>">CI Blog</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor02">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url('login')?>">Login <span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <div >
    <?php echo form_open('user/search',['class'=>"form-inline my-2 my-lg-0 navbar-left"])?>
    <!-- <form class="form-inline my-2 my-lg-0"> -->
      <input class="form-control mr-sm-2" name="query"type="text" placeholder="Search">
      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
    <?= form_close();?></div>
    <?php echo form_error('query',"<p class='navbar-text'>","</p>")?>
  </div>
</nav>