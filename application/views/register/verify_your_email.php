<style>
body {
  background: #f4f4f4;
}

.banner {
  background: #a770ef;
  background: -webkit-linear-gradient(to right, #a770ef, #cf8bf3, #fdb99b);
  background: linear-gradient(to right, #a770ef, #cf8bf3, #fdb99b);
}

</style>
<div class="container vip-container">
    <?php 
    $status = $email_verified;
    // var_dump($email_verified); 
    if($status){
        $message = 'Your Email is verified successfully';
    }
    if(!$status){
        $message = 'Your Email is is not verified please try again';
    }
    if($status == '2'){
        $message = 'An error occured please try again later';
    }
    ?>

<div class="container-fluid">
  <div class="px-lg-5">

    <!-- Heading -->
    <div class="row py-5">
      <div class="col-lg-12 mx-auto">
        <div class="text-white p-5 shadow-sm rounded banner">
          <h1 class="display-5"><?= $message ?></h1>
          <br>
          <p class="lead"> 
          <?php if($status){ ?>
    <a href="<?= base_url('login') ?>" class="btn btn-success btn-lg">Login to Continue</a>
    <?php } ?>
          </p>
        </div>
      </div>
    </div>
    <!-- End Heading -->

  </div>
  </div>



    
    <br><br><br>
    <br><br><br>

</div>