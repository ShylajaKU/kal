
<link rel="stylesheet" href="<?= base_url('assets/css/selectize.bootstrap3.min.css')?>">
<script src="<?= base_url('assets/js/jquery.min.js')?>"></script>
<script src="<?= base_url('assets/js/selectize.min.js')?>"></script>

<style>
    #hidden_div {
    display: none;
    }
    #hidden_div_two {
    display: none;
    }
</style>

<div class="container vip-container">
<style>
        .sp{
            font-size: 1.2rem;
            padding-left: 10%;
            color: blue;
        }
    </style>
    <h3>Add your Educational / Professional details <span class="sp"> Step 4</span></h3>
    <br>
    <?= form_open()?>

<!-- =================================== -->

    <label class="form-label" for="he">Highest Education Qualification *</label>
    <select class="form-control" id="he" name="highest_education" onchange="showDiv('hidden_div', this)" required>
    
        <option value="" selected disabled>Select</option>
    <?php foreach($highest_education_list as $he){ ?>
        <option value="<?= $he['highest_education'] ?>"><?=  $he['highest_education'] ?></option>
    <?php }?>
        <option value="0">Other</option>

</select>
<div id="hidden_div"><br>
    <label for="" class="form-label"> Please Specify * </label>
    <input name="highest_education_typed_in" class="form-control" type="text" placeholder="Education">
</div>
<br>

<!-- =================================== -->

<label for="job" class="form-label">Your profession/Job *</label>
<select class="form-control" name="profession" id="job" onchange="showDiv('hidden_div_two', this)" required>
    <option value="" selected disabled>Select</option>
    <?php foreach($professions_list as $ip){ ?>
        <option value="<?= $ip['profession'] ?>"><?=  $ip['profession'] ?></option>
    <?php }?>
    <option value="0">Other</option>
</select>

<div id="hidden_div_two"><br>
    <label for="" class="form-label"> Please Specify * </label>
    <input name="profession_typed_in" class="form-control" type="text" placeholder="Profession/Job">
</div>
<br>
<!-- =================================== -->
<label for="income" class="form-label">Annual Income *</label>
<select name="annual_income" id="income">

<?php foreach($annual_income_list as $ip){ ?>
        <option value="<?= $ip['sl_no'] ?>"><?=  $ip['income_bracket'] ?></option>
    <?php }?>
</select>

<br>


<!-- =================================== -->
<br>
<button type="submit" class="btn btn-primary">Save & Continue</button>
<?= form_close()?>
</div>
<br><br>
<script>
          $(document).ready(function () {
      $('select').selectize({
          sortField: 'text'
      });
  });




    function showDiv(divId, element)
{
    document.getElementById(divId).style.display = element.value == 0 ? 'block' : 'none';
}
</script>