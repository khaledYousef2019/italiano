<form autocomplete="off" class="appForm clearfix" method="post" enctype="application/x-www-form-urlencoded">
    <fieldset>
        <legend><?= $text_office_details ?></legend>
        <div class="input_wrapper n40 border">
            <label class="floated"><?= $text_label_name ?></label>
            <input required type="text" name="name" id="name" maxlength="50" value="<?= $office->name ?>">
        </div>
        <div class="input_wrapper n40 padding border">
            <label class="floated"><?= $text_label_email ?></label>
            <input required type="text" id="email" name="email" maxlength="100" value="<?= $office->email ?>">
        </div>
        <div class="input_wrapper n30 border">
            <label class="floated"><?= $text_label_password ?></label>
            <input required type="password" id="password" name="password" maxlength="100" value="<?= $office->password ?>">
        </div>
        <div class="input_wrapper n20 padding border">
            <label class="floated"><?= $text_label_code ?></label>
            <input required type="code" id="code" name="code" maxlength="100" value="<?= $office->code ?>">
            <input required type="hidden" name="id" value="<?= $office->id ?>">

        </div>

        <input type="submit" name="btnEdit" value="<?= $text_label_save ?>">
    </fieldset>
</form>