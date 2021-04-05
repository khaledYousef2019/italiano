<form autocomplete="off" class="appForm clearfix" method="post" enctype="application/x-www-form-urlencoded">
    <fieldset>
        <legend><?= $text_office_details ?></legend>
        <div class="input_wrapper n30 border">
            <label><?= $text_label_name ?></label>
            <input required type="text" name="name" id="name" maxlength="50">
        </div>
        <div class="input_wrapper n30 padding border">
            <label><?= $text_label_email ?></label>
            <input required type="email" id="email" name="email" maxlength="100">
        </div>
        <div class="input_wrapper n30 padding border">
            <label><?= $text_label_password ?></label>
            <input required type="password" id="password" name="password" maxlength="100">
        </div>
        <div class="input_wrapper n30 border">
            <label><?= $text_label_code ?></label>
            <input required type="code" id="code" name="code" maxlength="100">
        </div>

        <input class="no_float" type="submit" name="btnSubmit" value="<?= $text_label_save ?>">
    </fieldset>
</form>


