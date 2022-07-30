<style>
    #hidden_div {
    display: none;
}
</style>

<div class="container vip-container">
<style>
        .sp{
            font-size: 1.2rem;
            padding-left: 10%;
            color: blue;
        }
    </style>
    <h3>Add your Educational / Professional details <span class="sp"> Step 4</span></h3>
    <br>
    <?= form_open()?>
    <label class="form-label" for="he">Highest Education Qualification *</label>
<select class="form-control" id="he" name="highest_education" onchange="showDiv('hidden_div', this)" required>
    <option value="" selected disabled>Select</option>
    <?php foreach($highest_education_list as $he){ ?>
        <option value="<?= $he['highest_education'] ?>"><?=  $he['highest_education'] ?></option>
    <?php }?>
    <option value="0">Other</option>
</select>
<div id="hidden_div"><br>
    <label for="" class="form-label"> Please Specify * </label>
    <input name="highest_education_typed_in" class="form-control" type="text">
</div>




<br>
<button type="submit" class="btn btn-primary">Save</button>
<?= form_close()?>
</div>
<br><br>
<script>
    function showDiv(divId, element)
{
    document.getElementById(divId).style.display = element.value == 0 ? 'block' : 'none';
}
</script>