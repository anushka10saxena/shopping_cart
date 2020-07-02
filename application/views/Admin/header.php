<!DOCTYPE html>
<html>
<head>
<title>ARTICLE LIST</title>
<?= link_tag("Assets/css/bootstrap.min.css");?>
<script src="<?= base_url("Assets/js/bootstrap.min.js") ?>"></script>
<!----<?php //echo link_tag("Assets/css/bootstrap.min.css");?>--->
</head>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
  <a class="navbar-brand" href="#">Admin Panel</a>
</div>
  <!----<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
   <span class="navbar-toggler-icon"></span>
  </button>
</div>--->

  <!----<div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">login <span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Search">
      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>--->
      <?php if ($this->session->userdata('id')):?>
        <li><a href="<?php echo base_url('admin/logout');?>" class="btn btn-danger" style="">Logout</a></li>
        <?php endif; ?>
      </div>
</nav>