<link rel="stylesheet" href="<?= base_url('assets/css/selectize.bootstrap3.min.css')?>">
<script src="<?= base_url('assets/js/jquery.min.js')?>"></script>
<script src="<?= base_url('assets/js/selectize.min.js')?>"></script>

<?php //var_dump($this->session->userdata()) ?>
  <div class="container cont">
  <style>
        .sp{
            font-size: 1.2rem;
            padding-left: 10%;
            color: blue;
        }
    </style>
    <h3>Enter your Address <span class="sp"> Step 2</span></h3>
    <br>
    <?= form_open('state-entered',array('id'=>'form-1',))?>

      <select class="form-control me-2" name="state_id" required
      onchange="fn()">
        <option value="" selected disabled>Select State</option>
        <?php 
        foreach($state_names as $st){ ?>
        <option value="<?= $st['state_id']?>"
                <?php if(isset($state_id)){
                  if($st['state_id'] == $state_id){echo 'selected';}
                } ?>
        >
        <?= ucwords(strtolower($st['statename']))?>
      </option>
        <?php } ?>
      </select>
      <br>
      <?= form_close() ?>


    <?= form_open($this->uri->segment(1)."/district-entered",array('id'=>'form-2',))?>

    <select class="form-control me-2" name="district_id" required
      onchange="fn_two()">
        <option value="" selected disabled>Select District</option>
        <?php 
        foreach($district_names as $district){ ?>
        <option value="<?= $district['district_id']?>"
                <?php if(isset($district_id)){
                  if($district['district_id'] == $district_id){echo 'selected';}
                } ?>
        >
        <?= ucwords(strtolower($district['Districtname']))?>
      </option>
        <?php } ?>
      </select>
      <br>
    <?= form_close()?>
    <?= form_open($this->uri->segment(1).'/'.$this->uri->segment(2)."/po_entered",array('id'=>'form-3',))?>

    <select class="form-control me-2" name="po_sl_no" required
      onchange="fn_three()">
        <option value="" selected disabled>Select Post Office Name</option>
        <?php 
        foreach($officenames as $po){ ?>
        <option value="<?= $po['sl_no']?>"
                <?php if(isset($po_sl_no)){
                  if($po['sl_no'] == $po_sl_no){echo 'selected';}
                } ?>
        >
        <?= ucwords(strtolower($po['officename_only']))?>
      </option>
        <?php } ?>
      </select>

    <?= form_close()?>
    </div>
    <br><br><br>

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
    function fn_three(){
    setTimeout = 100;
    document.getElementById("form-3").submit();} 
</script>



