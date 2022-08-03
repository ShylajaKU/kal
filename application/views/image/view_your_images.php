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

<div class="container-fluid">
  <div class="px-lg-5">

    <!-- Heading -->
    <div class="row py-5">
      <div class="col-lg-12 mx-auto">
        <div class="text-white p-5 shadow-sm rounded banner">
          <h1 class="display-4">Photo gallery</h1>
          <p class="lead"><?= $user_name ?>'s  photos</p>
          <a class="btn btn-success" href="<?= base_url('image-uploader')?>" rel="noopener noreferrer">Upload New Photo</a>
        </div>
      </div>
    </div>
    <!-- End Heading -->
    <div class="row">

    <?php
    // var_dump($all_user_images[0]);
    // echo base_url();
?>
<?php 
foreach($all_user_images as $image){
// $count = count($all_user_images);
// for($i=0; $i < $count; $i++){
// $image = $all_user_images[$i];
    $upload_path = $image['upload_path'];
    $raw_name = $image['raw_name'];
    $file_ext = $image['file_ext'];
    $og_file = $upload_path.$raw_name.$file_ext;
    $webp_file = $upload_path.$raw_name.'.webp';
    $profile_photo = $image['profile_photo'];
    $image_id = $image['image_id'];
    ?>
      <!-- Gallery item -->
      <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
      <div class="bg-white rounded shadow-sm">
            <picture>
                <source srcset="<?=base_url($webp_file)?>" type="image/webp">
                <img src="<?=base_url($og_file)?>" class="img-fluid card-img-top" alt="user image">
            </picture>
      <div class="p-4">
            <?php if($profile_photo):?>
              <h5 class="text-dark">Current profile photo</h5>
              <p>You need to set another photo as profile photo before deleting this photo</p>
            <?php endif;?>
      <div class="d-flex align-items-center justify-content-between rounded-pill bg-light px-3 py-2 mt-4">
            <!-- ============ -->
              <a href="<?= base_url('set-as-profile-photo/'.$image_id)?>" 
            <?php if($profile_photo){?>
              style="pointer-events: none; display: inline-block;"
              class="btn btn-secondary"
              <?php }else{?>
              class="btn btn-primary"
                <?php }?>
              >Set as PP</a>
            <!-- ============ -->
            <a href="<?= base_url('delete-image/'.$image_id)?>" 
            <?php if($profile_photo){?>
              style="pointer-events: none; display: inline-block;"
              class="btn btn-secondary"
              <?php }else{?>
              class="btn btn-danger"
                <?php }?>
            >Delete</a>
            <!-- ============ -->
      </div>
      </div>
      </div>
      </div>
      <!-- End Gallery Item-->

<?php }?>

    </div>
    <!-- <div class="py-5 text-right"><a href="#" class="btn btn-dark px-5 py-3 text-uppercase">Show me more</a></div> -->
  </div>
</div>
