<?php
//make universal
$tb1 = $users_table;
if(!empty($tb1['house_name'])){
$house_name = $tb1['house_name'];
}
$address =  $tb1['house_name'].','.$tb1['address_line_1'].','.$tb1['landmark'].','.$tb1['po_name'].','.$tb1['city'].','.$tb1['taluk'].','.$tb1['district'].','.$tb1['state'].','.$tb1['country'].','.$tb1['pincode'];
$address = str_replace(',,',',',$address);
// echo '<br>'. $address .'<br>';
$address_into_array = array('address'=>$address);
$tb1 = array_merge($tb1 , $address_into_array);

?>

<div class="container vip-container">


<!-- ======================================= -->
    <label class="">Email
        <?php if($tb1['email_verified']){echo ' - Verified';}else{echo ' - Verification pending';} ?>
    </label>
    
<div class="input-group mb-3">
  <input readonly type="text" class="form-control" value="<?= $tb1['email'] ?>" aria-label="<?= $tb1['email'] ?>" aria-describedby="basic-addon2">
  <!-- <div class="input-group-append">
    <button class="btn btn-outline-secondary" type="button">Button</button>
  </div> -->
</div>
<!-- ======================================= -->
<label class="">Phone Number
        <?php if($tb1['phone_no_verified']){echo ' - Verified';}else{echo ' - Verification pending';} ?>
    </label>
    
<div class="input-group mb-3">
  <input readonly type="text" class="form-control" value="<?= $tb1['phone_no'] ?>" aria-describedby="basic-addon2">
  <!-- <div class="input-group-append">
    <button class="btn btn-outline-secondary" type="button">Button</button>
  </div> -->
</div>
<!-- ======================================= -->
<label class="form-label">Profile Created by</label>
    
<div class="input-group mb-3">
  <input readonly type="text" class="form-control" value="Your <?= $tb1['created_by'] ?>" aria-describedby="basic-addon2">
  <!-- <div class="input-group-append">
    <button class="btn btn-outline-secondary" type="button">Button</button>
  </div> -->
</div>
<!-- ======================================= -->
<label class="form-label">Mothers Name</label>
    
<div class="input-group mb-3">
  <input readonly type="text" class="form-control" value="<?= $tb1['mothers_name'] ?>" aria-describedby="basic-addon2">
  <div class="input-group-append">
    <a class="btn btn-outline-secondary" href="<?= base_url('family-details')?>">Edit</a>
  </div>
</div>
<!-- ======================================= -->

<label class="form-label">Fathers Name</label>
<div class="input-group mb-3">
  <input readonly type="text" class="form-control" value="<?= $tb1['fathers_name'] ?>" aria-describedby="basic-addon2">
  <div class="input-group-append">
    <a class="btn btn-outline-secondary" href="<?= base_url('family-details')?>">Edit</a>
  </div>
</div>
<!-- ======================================= -->
<label class="form-label">Name</label>
    
<div class="input-group mb-3">
  <input readonly type="text" class="form-control" value="<?= $tb1['name'] ?>" aria-describedby="basic-addon2">
  <!-- <div class="input-group-append">
    <a class="btn btn-outline-secondary" href="<?= base_url('family-details')?>">Edit</a>
  </div> -->
</div>
<!-- ======================================= -->
<label class="form-label">Gender</label>
<div class="input-group mb-3">
  <input readonly type="text" class="form-control" value="<?= ucwords($tb1['gender']); ?>" aria-describedby="basic-addon2">
  <!-- <div class="input-group-append">
    <button class="btn btn-outline-secondary" type="button">Button</button>
  </div> -->
</div>
<!-- ======================================= -->
<label class="form-label">Date of Birth</label>
<div class="input-group mb-3">
  <input readonly type="date" class="form-control" value="<?= $tb1['dob']; ?>" aria-describedby="basic-addon2">
  <!-- <div class="input-group-append">
    <button class="btn btn-outline-secondary" type="button">Button</button>
  </div> -->
</div>
<!-- ======================================= -->
<?php
/**
 * Simple PHP age Calculator
 * 
 * Calculate and returns age based on the date provided by the user.
 * @param   date of birth('Format:yyyy-mm-dd').
 * @return  age based on date of birth
 */
function ageCalculator($dob){
    if(!empty($dob)){
        $birthdate = new DateTime($dob);
        $today   = new DateTime('today');
        $age = $birthdate->diff($today)->y;
        return $age;
    }else{
        return 0;
    }
}
$dob = $tb1['dob'];
$age = ageCalculator($dob);
?>
<label class="form-label">Age</label>
<div class="input-group mb-3">
  <input readonly type="number" class="form-control" value="<?= $age; ?>" aria-describedby="basic-addon2">
  <!-- <div class="input-group-append">
    <button class="btn btn-outline-secondary" type="button">Button</button>
  </div> -->
</div>
<!-- ======================================= -->
<label class="form-label">Height</label>
<div class="input-group mb-3">
  <input readonly type="text" class="form-control" value="<?= $tb1['height_cm'] ?> cm" aria-describedby="basic-addon2">
  <div class="input-group-append">
    <a class="btn btn-outline-secondary" href="<?= base_url('add-height')?>">Change</a>
  </div>
</div>
<!-- ======================================= -->
<label class="form-label">Marital Status</label>
<div class="input-group mb-3">
  <input readonly type="text" class="form-control" value="<?= ucwords($tb1['marital_status']); ?>" aria-describedby="basic-addon2">
  <!-- <div class="input-group-append">
    <a class="btn btn-outline-secondary" href="<?= base_url('')?>">Change</a>
  </div> -->
</div>
<!-- ======================================= -->
<label class="form-label">Address</label>
<div class="input-group mb-3">
  <textarea readonly rows="4" class="form-control" aria-label="With textarea"><?= $tb1['address'] ?></textarea>
  <div class="input-group-append">
    <a class="btn btn-outline-secondary" href="<?= base_url('search-by-place')?>">Change</a>
  </div>
</div>
<!-- ======================================= -->
<label class="form-label">Family Class</label>
<div class="input-group mb-3">
  <input readonly type="text" class="form-control" value="<?= $tb1['family_class'] ?>" aria-describedby="basic-addon2">
  <div class="input-group-append">
    <a class="btn btn-outline-secondary" href="<?= base_url('family-details')?>">Change</a>
  </div>
</div>
<!-- ======================================= -->
<label class="form-label">Mother Tounge</label>
<div class="input-group mb-3">
  <input readonly type="text" class="form-control" value="<?= $tb1['mother_tounge'] ?>" aria-describedby="basic-addon2">
  <div class="input-group-append">
    <a class="btn btn-outline-secondary" href="<?= base_url('community-details')?>">Change</a>
  </div>
</div>
<!-- ======================================= -->
<label class="form-label">Education</label>
<div class="input-group mb-3">
  <input readonly type="text" class="form-control" value="<?= $tb1['education'] ?>" aria-describedby="basic-addon2">
  <div class="input-group-append">
    <a class="btn btn-outline-secondary" href="<?= base_url('education-details')?>">Change</a>
  </div>
</div>
<!-- ======================================= -->
<label class="form-label">Occupation</label>
<div class="input-group mb-3">
  <input readonly type="text" class="form-control" value="<?= $tb1['occupation'] ?>" aria-describedby="basic-addon2">
  <div class="input-group-append">
    <!-- <a class="btn btn-outline-secondary" href="<?= base_url('education-details')?>">Change</a> -->
  </div>
</div>
<!-- ======================================= -->
<label class="form-label">Annual Income</label>
<div class="input-group mb-3">
  <input readonly type="text" class="form-control" value="<?= $tb1['income_bracket'] ?>" aria-describedby="basic-addon2">
  <div class="input-group-append">
    <!-- <a class="btn btn-outline-secondary" href="<?= base_url('education-details')?>">Change</a> -->
  </div>
</div>
<!-- ======================================= -->

<!-- ======================================= -->
<label class="form-label">Relegion</label>
<div class="input-group mb-3">
  <input readonly type="text" class="form-control" value="<?= $tb1['relegion'] ?>" aria-describedby="basic-addon2">
  <div class="input-group-append">
    <a class="btn btn-outline-secondary" href="<?= base_url('community-details')?>">Change</a>
  </div>
</div>
<!-- ======================================= -->
<label class="form-label">Caste</label>
<div class="input-group mb-3">
  <input readonly type="text" class="form-control" value="<?= ucwords(strtolower($tb1['caste'])) ?>" aria-describedby="basic-addon2">
  <!-- <div class="input-group-append">
    <button class="btn btn-outline-secondary" type="button">Button</button>
  </div> -->
</div>
<!-- ======================================= -->
<label class="form-label">Sub Caste</label>
<div class="input-group mb-3">
  <input readonly type="text" class="form-control" value="<?= ucwords(strtolower($tb1['sub_caste'])) ?>" aria-describedby="basic-addon2">
  <!-- <div class="input-group-append">
    <button class="btn btn-outline-secondary" type="button">Button</button>
  </div> -->
</div>
<!-- ======================================= -->











</div>



<br><br>

<?php
// var_dump($tb1);