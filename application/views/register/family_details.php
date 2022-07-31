
<br>
<div class="container vip-container">
    <style>
        .sp{
            font-size: 1.2rem;
            padding-left: 10%;
            color: blue;
        }
    </style>
    <h3>Enter your Family Details <span class="sp"> Step 5</span></h3>

    <?= form_open() ?>
    <label class="form-label" for="mt">Mother Name</label>
    <input class="form-control" type="text" name="mothers_name">

    <label for="fn" class="form-label">Fathers Name</label>
    <input type="text" class="form-control" name="fathers_name">



    <label for="cl" class="form-label">Which class do you describe your family as *</label>
    <select class="form-control" name="family_class" id="cl" required>
        <option value="" selected disabled>Select</option>
        <?php foreach($family_class_list as $vip){ ?>
            <option value="<?= $vip['class'] ?>"><?=  $vip['class'] ?></option>
        <?php }?>
    </select>

<br>
<button type="submit" class="btn btn-primary">Save & Continue</button>

<br><br>


    <?= form_close() ?>




</div>