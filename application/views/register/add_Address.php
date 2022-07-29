

<br>

<div class="container vip-container">
    <h3>Enter your Home Address</h3>
    <?= form_open()?>
      <!-- <input class="form-control" type="search" name="pincode" placeholder="Enter your Pincode" aria-label="Pincode" required>
      <button class="btn btn-primary" type="submit">Next</button> -->

      <label class="form-label" for="al1">Address Line 1 *</label>
      <textarea name="address_line_1" class="form-control" id="al1" rows="2" required></textarea>

      <label class="form-label" for="lm">Landmark</label>
      <input class="form-control" type="text" name="landmark" id="lm">

      <label class="form-label" for="pc">Pincode *</label>
      <input class="form-control" type="text" name="pincode" id="pc" required>
<span style="color: red;"><?= form_error('pincode'); ?></span>


      <label class="form-label" for="city">City *</label>
      <input class="form-control" type="text" name="city" id="city" required>

      <label class="form-label" for="dt">District *</label>
      <input type="text" class="form-control" id="dt" name="district" required>

      <label class="form-label" for="st">State *</label>
      <input type="text" class="form-control" id="st" name="state" required>

      <label class="form-label" for="ct">Country *</label>
      <input type="text" class="form-control" id="ct" name="country" value="India" readonly required>
<br>
      <button type="submit" class="btn btn-primary">Save</button>


    <?= form_close()?>
    </div>
<br>
