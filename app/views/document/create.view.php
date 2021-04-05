<form autocomplete="off" class="appForm clearfix" method="post" enctype="multipart/form-data">
    <fieldset>
        <legend><?= $text_legend ?></legend>
        <div class="input_wrapper n50 border">
            <label class="floated"><?= $text_label_Name ?></label>
            <input required type="text" name="Name" id="Name" maxlength="50" >
        </div>


        <div class="input_wrapper_other">
            <label><?= $text_label_Content ?></label>
            <textarea name="content" id="content" cols="30" rows="10"></textarea>
        </div>
        <input class="no_float" type="submit" name="submit" value="<?= $text_label_save ?>">
    </fieldset>
</form>