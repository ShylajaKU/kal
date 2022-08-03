
<style>
body {
  background: #f4f4f4;
}

.banner {
  background: #a770ef;
  background: -webkit-linear-gradient(to right, #a770ef, #cf8bf3, #fdb99b);
  background: linear-gradient(to right, #a770ef, #cf8bf3, #fdb99b);
}

</style>

<div class="container-fluid">
  <div class="px-lg-5">
    <!-- Heading -->
    <div class="row py-5">
      <div class="col-lg-12 mx-auto">
        <div class="text-white p-5 shadow-sm rounded banner">
          <h3 class="display-5">Please verify your email id</h3>
          <p class="lead">A verification link has been send to your email id <span class="display-5"><?= $email ?></span> </p>
          <p class="lead"> Please verify your email by clicking on that link.</p>

          <p class="lead btn btn-warning disabled" >Please check your spam folder also if you haven't received the email yet.</p>

          <p><a class="btn btn-secondary">Still not received try resending the verification email</a></p>
          
          <a class="btn btn-success" href="<?= base_url('resend-verification-email/'.$user_id)?>" rel="noopener noreferrer">Resend</a>
        </div>
      </div>
    </div>
    <!-- End Heading -->
  </div>
  </div>