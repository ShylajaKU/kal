<br>
<div class="container vip-container">
    <h3>Enter your Personal Details</h3>
    <?= form_open() ?>

    <label class="form-label" for="">language *</label>
    <input class="form-control" type="text" name="language" required value = "<?=$language ?>" readonly >

    <label class="form-label" for="">Relegion *</label>
    <input class="form-control" type="text" name="relegion" required value = "<?=$relegion ?>" readonly >
    
    <label class="form-label" for="">Caste *</label>
    <input class="form-control" type="text" name="caste" required value = "<?= $caste ?>" readonly >

    <label class="form-label" for="">Sub Caste *</label>
    <input class="form-control" type="text" name="sub_caste" required value = "<?= $sub_caste ?>" readonly >

    <br>
    <style>
        .try{
            display: flex;
        }
        .go-back-btn{
            margin-left: 20px;
        }
    </style>
    <div class="try">
    <button type="submit" class="btn btn-primary">Save & Continue</button>

    <?= form_close()?>

    <?= form_open('welcome/go_back_to_community')?>
    
    <button type="submit" class="btn btn-danger go-back-btn">Go Back</button>

    <?= form_close() ?>
    </div>