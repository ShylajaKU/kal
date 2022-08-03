
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <?php 
    // $this->meta_model->meta_fm();
    // $title = $this->meta_model->get_meta_title_fm($this->uri->uri_string());
    // if($title !== ''){
    //     $title = $title;
    // }else{$title = 'pincodes.ind.in';}
    // echo '<meta name="title" content="'.$title.'">';
    ?>
    <!-- <title><?= $title.' - Find Pincodes' ?></title> -->

    <?php
    // $description = $this->meta_model->get_meta_description_fm($this->uri->uri_string());
    // if($description == ''){
    //   $description = 'Find any pincodes or post offices in India';
    // }
    // echo '<meta name="description" content="'.$description. '">';
    ?>


    <link rel="shortcut icon" href="<?= base_url('assets/favicon/i-favicon.ico')?>" type="image/x-icon">

<link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css')?>"> 
<link rel="stylesheet" href="<?= base_url('assets/css/byme.css')?>"> 



</head>
<?php
$site_name = 'k for kalyanam.in';
?>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
  <!-- <div class="container px-4"> -->

    <a class="navbar-brand" href="<?= base_url()?>"><?= $site_name ?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
      <li class="nav-item">
          <div class="nav-link active">Version 1.0.1 beta</div>
        </li>
      <?php if(!$this->session->userdata('logged_in')){ ?>
        <li class="nav-item">
          <a class="nav-link active" href="<?= base_url('register')?>">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="<?= base_url('login')?>">Login</a>
        </li>
      <?php }else{ ?>
        <li class="nav-item">
          <a class="nav-link active" href="<?= base_url('your-profile')?>">Profile</a>
        </li>
          <li class="nav-item">
          <a class="nav-link active" href="<?= base_url('your-photos')?>">Photo gallery</a>
          </li>

          <li class="nav-item">
          <a class="nav-link active" href="<?= base_url('logout')?>">Logout</a>
        </li>
      <?php } ?>
        <?php //class=nav-link only gives less brighter links  ?>

      </ul>
    </div>
  </div>
</nav>
<?php if($this->uri->segment(1) != ''){ ?>
<br>
<?php } ?>
<style>
  .mystyle{
    color: black;
  }
</style>
<?php 
// var_dump($this->session->userdata());
//var_dump($this->session->flashdata()); 
?>
<div class="container vip-container">
<?php if($this->session->flashdata('error')): ?>

<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong class="mystyle"><?= $this->session->flashdata('error') ?> </strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php endif; ?>

<?php if($this->session->flashdata('success')): ?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong><?= $this->session->flashdata('success') ?></strong> 
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php endif; ?>

</div>