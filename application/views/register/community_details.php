<link rel="stylesheet" href="<?= base_url('assets/css/selectize.bootstrap3.min.css')?>">

<script src="<?= base_url('assets/js/jquery.min.js')?>"></script>

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
<!-- welcome/community_details_fc -->
    <label class="form-label" for="mt">Mother Tounge *</label>
    <select name="language" id="mt">
        <option value="" selected disabled>Select</option>

        <?php foreach($language_list as $vip){ ?>
            <option value="<?= $vip['slug'] ?>"
            <?php if(isset($language)){
                  if($vip['language'] == $language){echo 'selected';}
                } ?>
            >
            <?= ucwords(strtolower($vip['language'])) ?>
        </option>
        <?php } ?>

    </select>



    <label class="form-label" for="rel">Relegion *</label>
    <select name="relegion" id="rel">
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

    <label class="form-label" for="cas">Caste *</label>
    <select class="form-control" name="caste" id="cas" onchange="fn()" required >
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