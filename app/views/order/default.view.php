<div class="container" style="text-align: center">
    <form action="/order/create" method="post">

    <table class="data">
        <thead>
        <tr>
            <th><?= $text_table_name ?></th>
            <th><?= $text_table_category ?></th>
            <th><?= $text_table_price ?></th>

            <th><?= $text_table_control ?></th>
        </tr>
        </thead>
        <tbody>
        <?php if(false !== $products): foreach ($products as $product): ?>
            <tr>
                <td><?= $product->Name ?></td>
                <td class="product-image"><?= \PHPMVC\Models\ProductCategoryModel::getByPK($product->CategoryId)->Name ?></td>
                <td><?= $product->Price ?></td>

                <td>
                    <input type="checkbox" name="listedproducts[]" value="<?= $product->ProductId ?>">
                </td>
            </tr>
        <?php endforeach; endif; ?>
        </tbody>
    </table>
        <div class="input_wrapper n40 padding border" style=";float: right;margin-top: 3rem">
        <label><?= $text_label_address ?></label>
        <input required type="text" id="address" name="address" maxlength="150" style="background-color: #f7f7f7;border: 1px solid #ccc" autocomplete="off">
        </div>
        <div class="input_wrapper n40 padding border" style=";float: right;margin-top: 3rem;margin-right: 3rem">
        <label><?= $text_label_phone_number ?></label>
        <input required type="text" id="phoneNumber" name="phoneNumber" maxlength="100" style="background-color: #f7f7f7;border: 1px solid #ccc" autocomplete="off">
        </div>

        <div class="input_wrapper n40 padding border" style=";float: right;margin-top: 3rem;margin-right: 3rem">
            <label><?= $text_label_delivery ?></label>
            <input required type="number" min="0" max="100" step="1" id="delivery" name="delivery" style="background-color: #f7f7f7;border: 1px solid #ccc" autocomplete="off">
        </div>

        <div class="input_wrapper n40 padding border" style=";margin-top: 6rem">
             <input type="submit" class="button" style="margin: auto;float: none;background-color: #408eba;padding: 1rem;border: 1px solid #408eba;border-radius: 2rem;color: #fff" name="submit" value="<?= $text_new_item ?>">
        </div>
    </form>

</div>