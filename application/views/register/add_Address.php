

<br>

<div class="container vip-container">
    <h3>Enter your Home Address</h3>
    <?= form_open()?>
      <!-- <input class="form-control" type="search" name="pincode" placeholder="Enter your Pincode" aria-label="Pincode" required>
      <button class="btn btn-primary" type="submit">Next</button> -->

      <label class="form-label" for="hn">House Name</label>
      <input class="form-control" type="text" name="house_name" id="hn">

      <label class="form-label" for="al1">Address Line 1 *</label>
      <textarea name="address_line_1" class="form-control" id="al1" rows="2" required></textarea>
      <span style="color: red;"><?= form_error('address_line_1'); ?></span>


      <label class="form-label" for="lm">Landmark</label>
      <input class="form-control" type="text" name="landmark" id="lm">

      <label class="form-label" for="pc">Pincode *</label>
      <input class="form-control" type="text" name="pincode" id="pc" required value="<?= $po_list[0]['pincode'] ?>" readonly>

      <label class="form-label" for="poname">Post Office Name *</label>
      <input class="form-control" type="text" name="po_name" id="poname" required value="<?= ucwords(strtolower($po_list[0]['officename_only'])) ?>" readonly>

      <label class="form-label" for="city">City *</label>
      <input class="form-control" type="text" name="city" id="city" required value="<?= ucwords(strtolower($po_list[0]['divisionname'])) ?>" readonly>

      <label class="form-label" for="taluk">Taluk *</label>
      <input class="form-control" type="text" name="taluk" id="taluk" required value="<?= ucwords(strtolower($po_list[0]['Taluk'])) ?>" readonly>

      <label class="form-label" for="dt">District *</label>
      <input class="form-control" type="text" name="district" id="dt" required value="<?= ucwords(strtolower($po_list[0]['Districtname'])) ?>" readonly>

      <label class="form-label" for="st">State *</label>
      <input class="form-control" type="text" name="state" id="st" required value="<?= ucwords(strtolower($po_list[0]['statename'])) ?>" readonly>            

      <label class="form-label" for="ct">Country *</label>
      <input type="text" class="form-control" id="ct" name="country" value="India" readonly required>
<br>
      <button type="submit" class="btn btn-primary">Save</button>


    <?= form_close()?>
    </div>
<br>
