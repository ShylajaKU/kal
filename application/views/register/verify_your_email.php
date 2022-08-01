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

    <p><?= $message ?></p>
    
    <?php if($status){ ?>
    <a href="<?= base_url('home') ?>" class="btn btn-primary">Continue</a>
    <?php } ?>





    
    <br><br><br>

</div>