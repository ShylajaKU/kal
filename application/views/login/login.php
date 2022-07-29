<style>
    .try{
        /* border: 1px black solid; */
        width: 300px;
        margin: auto;
        align-items: center;
        padding-top: 5px;
        margin-top: 50px;
        margin-bottom: 50px;
    }

</style>
<div class="try">
    <?= form_open() ?>
        <input class="form-control" id="email" type="text" name="email" placeholder="Registered Email ID">
<br>
        <input class="form-control" type="password" name="password" id="pass" placeholder="Password">
    <br>
    <button type="submit" class="btn btn-primary vip-center">Login</button>
    <a style="margin-left:15px ;" href="<?= base_url('register')?>">Register Here</a>
    <br>
    <?php echo validation_errors(); ?>

    <?= form_close() ?>
</div>
<hr>