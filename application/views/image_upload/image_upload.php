<br>
<div class="container vip-container">
<h3>Add your Photo</h3>
<br>
<?= form_open_multipart() ?>

<label for="im">Select your photo *</label>
<input type="file" name="userfile" id="" class="form-control" required>
<br>

<label for="pp" class="form-label">Make this Your Profile Photo *</label>
<select name="profile_photo_yes_or_no" id="pp" class="form-control">
    <option value="" selected disabled>Select</option>
    <option value="0" >No</option>
    <option value="1">Yes</option>
</select>

<br>
<button type="submit" class="btn btn-primary">Upload</button>


<?= form_close() ?>

<br><br>
</div>