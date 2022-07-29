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
    <div>
        <h3> Register for free at k4kalyanam.in</h3><br>
    </div>
<?= form_open() ?>
    <!-- ------------------------------------- -->
    <label for="" class="form-label">Profile created by *</label><br>
    <input type="radio" class="btn-check" name="created_by" id="self" autocomplete="off" value="self">
    <label class="btn bg-col-1" for="self">Self</label>

    <input type="radio" class="btn-check" name="created_by" id="parents" autocomplete="off" value="parents">
    <label class="btn bg-col-1" for="parents">Parents</label>

    <input type="radio" class="btn-check" name="created_by" id="sibling" autocomplete="off" value="sibling">
    <label class="btn bg-col-1" for="sibling">Sibling</label>

    <input type="radio" class="btn-check" name="created_by" id="friend" autocomplete="off" value="friend">
    <label class="btn bg-col-1" for="friend">Friend</label>
<br><br>
    <!-- ------------------------------------- -->
    <label class="form-label" for="">Name of Bride/Groom *</label>
    <input class="form-control" type="text" required><br>
    <!-- ------------------------------------- -->
    <label for="" class="form-label">Gender *</label> <br>
    <input type="radio" class="btn-check" name="gender" id="male" autocomplete="off" value="male">
    <label class="btn bg-col-1" for="male">Male</label>
    <input type="radio" class="btn-check" name="gender" id="female" autocomplete="off" value="female">
    <label class="btn bg-col-1" for="female">Female</label>
<br><br>
    <!-- ------------------------------------- -->
    <label class="form-label"  for="">Date of Birth *</label>
    <input class="form-control" style="width:300px ;" type="date" name="dob" id="" required><br>
    <!-- ------------------------------------- -->
    <label for="" class="form-label">Marital Status *</label><br>
    <input type="radio" class="btn-check" name="marital_status" id="unmarried" autocomplete="off">
<label class="btn bg-col-1" for="unmarried">Unmarried</label>

<input type="radio" class="btn-check " name="marital_status" id="wid" autocomplete="off">
<label class="btn bg-col-1" for="wid">Widow/Widower</label>

<input type="radio" class="btn-check" name="marital_status" id="divorced" autocomplete="off" >
<label class="btn bg-col-1" for="divorced">Divorced</label>

<input type="radio" class="btn-check" name="marital_status" id="seperated" autocomplete="off">
<label class="btn bg-col-1" for="seperated">Seperated</label>

<br><br>


    <!-- ------------------------------------- -->
    <label for="" class="form-label">Phone Number *</label>
    <input class="form-control" type="tel" name="phone_no" id="" required placeholder="Please enter a valid phone number">
    <br>

    <!-- ------------------------------------- -->
    <label for="" class="form-label">Email ID *</label>
    <input class="form-control" id="email" type="text" name="email" placeholder="Email">
<br>
    <!-- ------------------------------------- -->
    <label for="" class="form-label">Create Password *</label>

    <input class="form-control" type="password" name="password" id="pass" placeholder="Create a Password">
    <br>
    <!-- ------------------------------------- -->
    <label for="" class="form-label">Confirm Password *</label>

<input class="form-control" type="password" name="confirm_password" id="pass" placeholder="Confirm Password">
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