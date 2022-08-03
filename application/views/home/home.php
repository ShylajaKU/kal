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
          <h1 class="display-5">Find your better half here</h1>
        </div>
      </div>
    </div>
    <!-- End Heading -->

    <div class="row">
<?php 
foreach($matches as $match){
    $upload_path = $match['upload_path'];
    $raw_name = $match['raw_name'];
    $file_ext = $match['file_ext'];
    $og_file = $upload_path.$raw_name.$file_ext;
    $webp_file = $upload_path.$raw_name.'.webp';
    // $profile_photo = $match['profile_photo'];
    // $image_id = $match['image_id'];
    $name = $match['name'];
    // caste is checked in the search_model
    $dob = $match['dob'];
    $age = $this->verification_model->age_calculator($dob);
    // $loc = $match['city'].','.$match['district'].','.$match['state'].','.$match['country'];
    $loc = $match['district'].','.$match['state'].','.$match['country'];
    $edu = $match['education'];
    $occupation = $match['occupation'];
    $height_cm = $match['height_cm'];
    $height_feet_inch = $match['height_feet_inch'];

    ?>
      <!-- Gallery item -->
      <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
      <div class="bg-white rounded shadow-sm">
            <picture>
                <source srcset="<?=base_url($webp_file)?>" type="image/webp">
                <img src="<?=base_url($og_file)?>" class="img-fluid card-img-top" alt="user image">
            </picture>
      <div class="p-4">
              <h5 class="text-dark"><?= $name ?></h5>
              <p>Education : <?= $edu ?></p>
              <p>Occupation : <?= $occupation ?></p>
              <p>Location : <?= $loc ?></p>
              <p>Age / Height : <?= $age .' yrs , '.$height_cm.' cm / '.$height_feet_inch  ?></p>
      <div class="d-flex align-items-center justify-content-between rounded-pill bg-light px-3 py-2 mt-4">
            
      </div>
      </div>
      </div>
      </div>
      <!-- End Gallery Item-->

<?php }?>

    </div>
    <!-- ============ -->





  </div>
  </div>

    <?php
    // var_dump($matches);
