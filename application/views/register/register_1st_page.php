<style>
    .asd{
        width: 80vw;
        margin: auto;
    }
    .bg-col-1{
            background-color: #03fcf4;
        }
</style>


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

<div class="asd" >
<?= form_open() ?>
    <!-- ------------------------------------- -->
    <!-- <label for="" class="form-label">Profile created by *</label>
    <select class="form-control" name="" id="" required>
        <option value="" selected disabled>Profile Created By *</option>
        <option value="self">Self</option>
        <option value="parents">Parents</option>
        <option value="sibling">Sibling</option>
        <option value="relative">Relative</option>
        <option value="friend">Friend</option>
    </select><br> -->
    <!-- ------------------------------------- -->
    <label for="" class="form-label">Profile created by *</label><br>
    <input type="radio" class="btn-check" name="created_by" id="option1" autocomplete="off" value="self">
    <label class="btn bg-col-1" for="option1">Self</label>

    <input type="radio" class="btn-check" name="created_by" id="option2" autocomplete="off" value="parents">
    <label class="btn bg-col-1" for="option2">Parents</label>

    <input type="radio" class="btn-check" name="created_by" id="option3" autocomplete="off" value="sibling">
    <label class="btn bg-col-1" for="option3">Sibling</label>

    <input type="radio" class="btn-check" name="created_by" id="option4" autocomplete="off" value="friend">
    <label class="btn bg-col-1" for="option4">Friend</label>
<br><br>
    <!-- ------------------------------------- -->
    <label class="form-label" for="">Name of Bride/Groom *</label>
    <input class="form-control" type="text" required><br>
    <!-- ------------------------------------- -->
    <label for="" class="form-label">Gender *</label> <br>
    <input type="radio" class="btn-check" name="gender" id="option1" autocomplete="off" value="male">
    <label class="btn bg-col-1" for="option1">Male</label>
    <input type="radio" class="btn-check" name="gender" id="option2" autocomplete="off" value="female">
    <label class="btn bg-col-1" for="option2">Female</label>
<br><br>
    <!-- ------------------------------------- -->
    <label class="form-label"  for="">Date of Birth *</label>
    <input class="form-control" style="width:300px ;" type="date" name="dob" id="" required><br>
    <!-- ------------------------------------- -->
    <label for="" class="form-label">Marital Status *</label><br>
    <input type="radio" class="btn-check" name="marital_status" id="option1" autocomplete="off">
<label class="btn bg-col-1" for="option1">Unmarried</label>

<input type="radio" class="btn-check " name="marital_status" id="option2" autocomplete="off">
<label class="btn bg-col-1" for="option2">Widow/Widower</label>

<input type="radio" class="btn-check" name="marital_status" id="option3" autocomplete="off" >
<label class="btn bg-col-1" for="option3">Divorced</label>

<input type="radio" class="btn-check" name="marital_status" id="option4" autocomplete="off">
<label class="btn bg-col-1" for="option4">Seperated</label>

<br><br>


    <!-- ------------------------------------- -->
    <input class="form-control" id="email" type="text" name="email" placeholder="Email">
<br>
    <!-- ------------------------------------- -->
    <input class="form-control" type="password" name="password" id="pass" placeholder="Password">
    <br>
    <!-- ------------------------------------- -->
    <button type="submit" class="btn btn-primary vip-center">Register</button>
    <!-- ------------------------------------- -->
    <a style="margin-left:15px ;" href="http://">Login Here</a>
    <!-- ------------------------------------- -->
    
    <br>
    <?= form_close() ?>
</div>


<script>
      $(document).ready(function () {
      $('select').selectize({
          sortField: 'text'
      });
  });
</script>