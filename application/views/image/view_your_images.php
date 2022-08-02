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
<!-- <link rel="stylesheet" href="assets\css\fontawesome4.7.0.css"> -->
<?php
    // var_dump($all_user_images[0]);
    // echo base_url();

?>
<div class="container-fluid">
  <div class="px-lg-5">

    <!-- Heading -->
    <div class="row py-5">
      <div class="col-lg-12 mx-auto">
        <div class="text-white p-5 shadow-sm rounded banner">
          <h1 class="display-4">Photo gallery</h1>
          <p class="lead"><?= $user_name ?>'s  photos</p>
          
        </div>
      </div>
    </div>
    <!-- End -->
    <div class="row">



<?php foreach($all_user_images as $image){
    $upload_path = $image['upload_path'];
    $raw_name = $image['raw_name'];
    $file_ext = $image['file_ext'];
    $og_file = $upload_path.$raw_name.$file_ext;
    $webp_file = $upload_path.$raw_name.'.webp';
    ?>
      <!-- Gallery item -->
      <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
        <div class="bg-white rounded shadow-sm">
            <picture>
                <source srcset="<?=base_url($webp_file)?>" type="image/webp">
                <img src="<?=base_url($og_file)?>" class="img-fluid card-img-top" alt="user image">
            </picture>
            <!-- ============ -->
          <div class="p-4">
            <div class="d-flex align-items-center justify-content-between rounded-pill bg-light px-3 py-2 mt-4">
            <button class="btn btn-primary">Set as profile photo</button>
            <button class="btn btn-danger">Delete</button>
            </div>
          </div>
            <!-- ============ -->

        </div>
      </div>
      <!-- End -->
<?php }?>

    </div>
    <div class="py-5 text-right"><a href="#" class="btn btn-dark px-5 py-3 text-uppercase">Show me more</a></div>
  </div>
</div>
