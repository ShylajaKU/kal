
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" /> -->
<!-- same as above -->
<link rel="stylesheet" href="<?= base_url('assets/css/selectize.bootstrap3.min.css')?>">

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
<!-- same as above -->
<script src="<?= base_url('assets/js/jquery.min.js')?>"></script>

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script> -->
<!-- same as above -->
<script src="<?= base_url('assets/js/selectize.min.js')?>"></script>

<br>
<div class="container vip-container">
    <style>
        .sp{
            font-size: 1.2rem;
            padding-left: 10%;
            color: blue;
        }
    </style>
    <h3>Enter your Personal Details <span class="sp"> Step 3</span></h3>
    <?= form_open('caste-selected',array('id'=>'form-1',))?>
    <label class="form-label" for="">Relegion *</label>
    <!-- <input class="form-control" type="text" name="relegion" required value = "<?php if(isset($relegion)){echo $relegion;} ?>" > -->
    <select name="relegion" id="">
        <option value="" selected disabled>Select</option>

        <?php foreach($relegion_list as $c){ ?>
            <option value="<?= $c['relegion'] ?>"
            <?php if(isset($relegion)){
                  if($c['relegion'] == $relegion){echo 'selected';}
                } ?>
            >
            <?= ucwords(strtolower($c['relegion'])) ?>
        </option>
        <?php } ?>

    </select>

    <label class="form-label" for="">Caste *</label>
    <select class="form-control" name="caste" id="" onchange="fn()" required >
        <option value="" selected disabled>Select</option>
        <?php foreach($caste_id_table as $c){ ?>
            <option value="<?= $c['caste'] ?>"
            <?php if(isset($caste_name)){
                  if($c['caste'] == $caste_name){echo 'selected';}
                } ?>
            >
            <?= ucwords(strtolower($c['caste'])) ?>
        </option>
        <?php } ?>
    </select>
    <?= form_close()?>

    <?= form_open('sub-caste-selected',array('id'=>'form-2',))?>
 
    <label class="form-label" for="">Sub Caste *</label>
    <select class="form-control" name="sub_caste" id="" onchange="fn_two()" required >
        <option value="" selected disabled>Select</option>
        <?php foreach($sub_caste_list as $c){ ?>
            <?php if(!empty($c['sub_caste'])):?>
            <option value="<?= $c['sub_caste'] ?>"
            <?php if(isset($sub_caste_name)){
                  if($c['sub_caste'] == $sub_caste_name){echo 'selected';}
                } ?>
            >
            <?= ucwords(strtolower($c['sub_caste'])) ?>
        </option>
        <?php endif; ?>
        <?php } ?>
    </select>


    <?= form_close()?>

</div>
<br>
<br>
<br>
<br>

<script>
      $(document).ready(function () {
      $('select').selectize({
          sortField: 'text'
      });
  });

    function fn(){
    setTimeout = 100;
    document.getElementById("form-1").submit();}
    function fn_two(){
    setTimeout = 100;
    document.getElementById("form-2").submit();} 

</script>