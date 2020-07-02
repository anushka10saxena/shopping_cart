<!DOCTYPE html>
<html>
<head>
<title>ARTICLE LIST</title>
<?= link_tag("Assets/css/bootstrap.min.css") ?>
<script src="<?= base_url("Assets/js/bootstrap.min.js") ?>"></script>
</head>
<body>
<!---<a href="<?php //echo base_url('login/index')?>" class="btn btn-default">Admin Login</a>
<a href="<?php //echo base_url('Dynamic_dependent_controller')?>" class="btn btn-default">New Demo</a>--->
<nav class="navbar navbar-default">
  <div class="container-fluid">
  <div class="navbar-header">
  <a class="navbar-brand" href="#">ANUSHKA</a>
</div>
<ul class="nav navbar-nav">
  <li class="active"><a class="nav-link" href="<?php echo base_url('login/index')?>">Admin Login<span class="sr-only">(current)</span></a>
  </li>
 <li><a class="nav-link" href="<?php echo base_url('Dynamic_dependent_controller')?>">Drop Down Demo</a></li>
 <li class="active"><a class="nav-link" href="<?php echo base_url('Users/login')?>">Login<span class="sr-only">(current)</span></a>
  </li>
  <!---<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">--->
  </ul>
  </div>
</nav>