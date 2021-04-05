<form autocomplete="off" class="appForm clearfix" method="post" enctype="multipart/form-data">
    <fieldset>
        <legend><?= $text_legend ?></legend>
        <div class="input_wrapper n50 border">
            <label class="floated"><?= $text_label_Name ?></label>
            <input required type="text" name="name" id="name" maxlength="50" value="<?=  $document->name ?>">
        </div>

        <div class="input_wrapper_other">
            <label><?= $text_label_Content ?></label>
            <textarea name="content" id="content" cols="30" rows="10" ><?=  $document->content ?></textarea>
        </div>

        <input class="no_float" type="submit" name="submit" value="<?= $text_label_save ?>">
    </fieldset>
</form>