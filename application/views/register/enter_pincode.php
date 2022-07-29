
<br>

<div class="container vip-container">
    <h3>Enter your Pincode</h3>
    <?= form_open()?>
      <input class="form-control" type="search" name="pincode" placeholder="Enter your Pincode" aria-label="Pincode" required>
      <br>
<span style="color: red;"><?= form_error('pincode'); ?></span>
      <button class="btn btn-primary" type="submit">Next</button>

</div>