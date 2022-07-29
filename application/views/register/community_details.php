
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
    <h3>Enter your Personal Details</h3>
    <?= form_open('caste-selected',array('id'=>'form-1',))?>
    <label class="form-label" for="">Relegion *</label>
    <input class="form-control" type="text" name="relegion" required>

    <label class="form-label" for="">Caste *</label>
    <select class="form-control" name="caste" id="" onchange="fn()" required >
        <option value="" selected disabled>Select</option>
        <?php foreach($caste_id_table as $c){ ?>
            <option value="<?= $c['caste'] ?>"><?= ucwords(strtolower($c['caste'])) ?></option>
        <?php } ?>
    </select>
    <?= form_close()?>


</div>

<script>
      $(document).ready(function () {
      $('select').selectize({
          sortField: 'text'
      });
  });

    function fn(){
    setTimeout = 100;
    document.getElementById("form-1").submit();}

</script>