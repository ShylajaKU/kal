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
<style>
        .sp{
            font-size: 1.2rem;
            padding-left: 10%;
            color: blue;
        }
    </style>
<div class="vip-container container" >

    <h3>Register for free at k4kalyanam.in <span class="sp"> Step 1</span></h3>
<?= form_open() ?>
    <!-- ------------------------------------- -->
    <label for="" class="form-label">Profile created by *</label><br>

    <input type="radio" class="btn-check" name="created_by" id="self" autocomplete="off" value="self" <?php if($this->session->userdata('created_by') == 'self'){echo 'checked';} ?> >
    <label class="btn btn-outline-primary" for="self">Self</label>

    <input type="radio" class="btn-check" name="created_by" id="parents" autocomplete="off" value="parents" <?php if($this->session->userdata('created_by') == 'parents'){echo 'checked';} ?> >
    <label class="btn btn-outline-primary" for="parents">Parents</label>

    <input type="radio" class="btn-check" name="created_by" id="sibling" autocomplete="off" value="sibling" <?php if($this->session->userdata('created_by') == 'sibling'){echo 'checked';} ?>>
    <label class="btn btn-outline-primary" for="sibling">Sibling</label>

    <input type="radio" class="btn-check" name="created_by" id="relative" autocomplete="off" value="relative" <?php if($this->session->userdata('created_by') == 'relative'){echo 'checked';} ?> >
    <label class="btn btn-outline-primary" for="relative">Relative</label>

    <input type="radio" class="btn-check" name="created_by" id="friend" autocomplete="off" value="friend" <?php if($this->session->userdata('created_by') == 'friend'){echo 'checked';} ?>>
    <label class="btn btn-outline-primary" for="friend">Friend</label>
<br>
<span style="color: red;"><?= form_error('created_by'); ?></span>
<br>
    <!-- ------------------------------------- -->
    <label class="form-label" for="">Name of Bride/Groom *</label>
    <input class="form-control" name="name_b_g" type="text" required value = "<?php if($this->session->userdata('name_b_g') != 'null'){echo $this->session->userdata('name_b_g');} ?>"><br>
<span style="color: red;"><?= form_error('name_b_g'); ?></span>

    <!-- ------------------------------------- -->
    <label for="" class="form-label">Gender *</label> <br>
    <input type="radio" class="btn-check" name="gender" id="male" autocomplete="off" value="male" <?php if($this->session->userdata('gender') == 'male'){echo 'checked';} ?>>
    <label class="btn btn-outline-primary" for="male">Male</label>
    <input type="radio" class="btn-check" name="gender" id="female" autocomplete="off" value="female" <?php if($this->session->userdata('gender') == 'female'){echo 'checked';} ?>>
    <label class="btn btn-outline-primary" for="female">Female</label>
<br>
<span style="color: red;"><?= form_error('gender'); ?></span>
<br>
    <!-- ------------------------------------- -->
    <label class="form-label"  for="">Date of Birth * (mm/dd/yyyy)</label>
    <input class="form-control" style="width:300px ;" type="date" name="dob" id="" required value="<?php if($this->session->userdata('dob') != 'null'){echo $this->session->userdata('dob');} ?>"><br>
<span style="color: red;"><?= form_error('dob'); ?></span>

    <!-- ------------------------------------- -->
    <label for="" class="form-label">Marital Status *</label><br>
    <input type="radio" class="btn-check" name="marital_status" value="unmarried" id="unmarried" autocomplete="off" <?php if($this->session->userdata('marital_status') == 'unmarried'){echo 'checked';} ?>>
<label class="btn btn-outline-primary" for="unmarried">Unmarried</label>

<input type="radio" class="btn-check " name="marital_status" value="widow/widower" id="wid" autocomplete="off" <?php if($this->session->userdata('marital_status') == 'widow/widower'){echo 'checked';} ?>>
<label class="btn btn-outline-primary" for="wid">Widow/Widower</label>

<input type="radio" class="btn-check" name="marital_status" value="divorced" id="divorced" autocomplete="off" <?php if($this->session->userdata('marital_status') == 'divorced'){echo 'checked';} ?> >
<label class="btn btn-outline-primary" for="divorced">Divorced</label>

<input type="radio" class="btn-check" name="marital_status" value="seperated" id="seperated" autocomplete="off" <?php if($this->session->userdata('marital_status') == 'seperated'){echo 'checked';} ?>>
<label class="btn btn-outline-primary" for="seperated">Seperated</label>

<br>
<span style="color: red;"><?= form_error('marital_Status'); ?></span>
<br>


    <!-- ------------------------------------- -->
    <label for="" class="form-label">Phone Number *</label>
    <input class="form-control" type="tel" name="phone_no" id="" required placeholder="Please enter a valid phone number" value="<?php if($this->session->userdata('phone_no') != 'null'){echo $this->session->userdata('phone_no');} ?>">
    <br>
    <span style="color: red;"><?= form_error('phone_no'); ?></span>

    <!-- ------------------------------------- -->
    <label for="" class="form-label">Email ID *</label>
    <input class="form-control" id="email" type="text" name="email" placeholder="Email" value="<?php if($this->session->userdata('email') != 'null'){echo $this->session->userdata('email');} ?>">
<br>
<span style="color: red;"><?= form_error('email'); ?></span>

    <!-- ------------------------------------- -->

    <script>
    function checkPass()
{
    var pass1 = document.getElementById('pass1');
    var pass2 = document.getElementById('pass2');
    var message = document.getElementById('error-nwl');
    // var goodColor = "#66cc66";
    // var goodColor = "#f6e6b4";
    var goodColor = "white";
    var badColor = "#ff6666";
    var bgbadColor = "#26d4c2";
    
    
 	
    if(pass1.value.length > 5)
    {
        pass1.style.backgroundColor = goodColor;
        message.style.color = goodColor;
        message.innerHTML = "character number ok!"
    }
    else
    {
        pass1.style.backgroundColor = bgbadColor;
        // pass1.style.backgroundColor = '#26d4c2';
        message.style.color = badColor;
        message.innerHTML = " Password must be at least 6 characters"
        return;
    }
  
    if(pass1.value == pass2.value)
    {
        pass2.style.backgroundColor = goodColor;
        // message.style.color = goodColor;
        // message.style.color = 'green';
        // message.innerHTML = "Ok!"
    }
	else
    {
        pass2.style.backgroundColor = bgbadColor;
        // pass1.style.backgroundColor = '#26d4c2';

        message.style.color = badColor;
        message.innerHTML = " Passwords don't match"
    }
}  
</script>

    <label for="" class="form-label">Create Password *</label>

    <input class="form-control" type="password" name="password" id="pass1" placeholder="Create a Password" onkeyup="checkPass(); return false;"/>
    <br>
<span style="color: red;"><?= form_error('password'); ?></span>

    <!-- ------------------------------------- -->
    <label for="" class="form-label">Confirm Password *</label>

<input class="form-control" type="password" name="confirm_password" id="pass2" placeholder="Confirm Password" onkeyup="checkPass(); return false;"/>
<br>
<span style="color: red;"><?= form_error('confirm_password'); ?></span>

<!-- ------------------------------------- -->
<!-- ------------------------------------- -->
<div id="error-nwl"></div>
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