<?php if($input_type == 'select'){?>
<link rel="stylesheet" href="<?= base_url('assets/css/selectize.bootstrap3.min.css')?>">
<script src="<?= base_url('assets/js/jquery.min.js')?>"></script>
<script src="<?= base_url('assets/js/selectize.min.js')?>"></script>
<?php } ?>


<?php //$route['edit-profile/(:any)'] = 'user_controller/edit_profile_item_fc/$1'; ?>

<div class="container vip-container">
<?= form_open()?>
<h2><?= $heading?></h2>
<br>
<label for="" class="form-label"><?= $label ?></label>
<?php if($input_type != 'select'){?>
<input class="form-control" type="<?= $input_type ?>" <?= $required?> name="<?= $input_name?>" value="<?= $current_value?>">
<?php }else{?>
            <select name="<?= $input_name?>" class="form-control">
            <?php foreach($family_class_list as $vip){ ?>
            <option value="<?= $vip[$name_in_db] ?>" <?php if($current_value == $vip[$name_in_db]){echo 'selected';} ?> >
            <?=  $vip[$name_in_db] ?></option>
            <?php }?>
            </select>
<?php }?>
<br>
<button class="btn btn-primary" type="submit">Update</button>




<?= form_close()?>


</div>

<br><br><br><br>
<br><br><br><br>