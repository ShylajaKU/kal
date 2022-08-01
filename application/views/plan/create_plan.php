<br>
<div class="container vip-container">

    <h3>Create a Plan</h3>
<?= form_open() ?>
    <div class="form-group">
        <label class="form-label" for="plan_name">Plan Name *</label>
        <input type="text" id="plan_name" name="plan_name" class="form-control" required>
    <?= form_error('plan_name'); ?>
    </div>

    <div class="form-group">
    <label class="form-label" for="times">Repeatability *</label>
    <select class="form-control" name="times" id="times" required>
        <option value="0">Many</option>
        <option value="1">Once</option>
    </select>
    <?= form_error('times'); ?>
</div>

<div class="form-group">
    <label class="form-label" for="plan_decs">Plan Description</label>
    <input type="text" class="form-control" id="plan_desc" name="plan_desc" placeholder="Description">
    <?= form_error('plan_desc'); ?>
</div>
<div class="form-group">
    <label class="form-label" for="p_dur_in_months">Plan Duration in Months</label>
    <input type="number" class="form-control" id="p_dur_in_months" name="p_dur_in_months" placeholder="Enter Plan Duration in Months">
    <?= form_error('p_dur_in_months'); ?>
</div>
<div class="form-group">
    <label class="form-label" for="plan_type">Plan Type</label>
    <select class="form-control" name="plan_type" id="plan_type">
        <option value="1">Main</option>
        <option value="2">Featured</option>
        <option value="3">Combo</option>
        <option value="4">Addon</option>
    </select>
    <?= form_error('plan_type'); ?>
</div>

<div class="form-group">
    <label class="form-label" for="no_of_images_allowed">Number of images allowed</label>
    <input type="number" class="form-control" id="no_of_images_allowed" name="no_of_images_allowed" placeholder="Number of images allowed">
    <?= form_error('no_of_images_allowed'); ?>
</div>
<div class="form-group">
    <label class="form-label" for="feature_images_allowed">Number of feature images allowed</label>
    <input type="number" class="form-control" id="feature_images_allowed" name="feature_images_allowed" value="0">
    <?= form_error('feature_images_allowed'); ?>
</div>

<div class="form-group">
    <label class="form-label" for="price">Price</label>
    <input type="number" class="form-control" id="price" name="price" placeholder="Enter Price">
    <?= form_error('price'); ?>
</div>
<div class="form-group">
    <label class="form-label" for="razerpay">Razerpay Button</label>
    <input type="text" class="form-control" id="razerpay" name="razerpay" placeholder="Razerpay Button">
    <?= form_error('razerpay'); ?>
</div>
<div class="form-group">
    <label class="form-label" for="tax">Tax</label>
    <input type="number" class="form-control" id="tax" name="tax"value="18" placeholder="Enter Tax in percentage">
    <?= form_error('tax'); ?>
</div>
<div class="form-group">
    <label class="form-label" for="select">Select</label>
    <input type="text" class="form-control" id="select" name="select" placeholder="Select">
    <?= form_error('select'); ?>
</div>
<br>
<button type="submit" class="btn btn-primary">Submit</button>
<?= form_close(); ?>



<br><br>
</div>