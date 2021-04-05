<a class="button" href="/office/add"><i class="fa fa-plus"></i> <?= $text_add_office ?></a>
<table class="data" style="width: 70%;margin: auto">
    <thead>
    <tr>
        <th><?= $text_table_office_name ?></th>
        <th><?= $text_table_office_email ?></th>
        <th><?= $text_table_office_code ?></th>
        <th><?= $text_table_office_lastlogin ?></th>
        <th><?= $text_table_control ?></th>
    </tr>
    </thead>
    <tbody>
    <?php
    if(false !== $offices) {
        foreach ($offices as $office) {
            ?>
            <tr>
                <td><?= $office->name ?></td>
                <td><?= $office->email ?></td>
                <td><?= $office->code ?></td>
                <td><?= $office->lastlogin ?></td>
                <td>
                    <a href="/office/edit/<?= $office->id ?>"><i class="fa fa-edit"></i></a>
                    <a href="/office/delete/<?= $office->id ?>" onclick="if(!confirm('<?= $text_delete_confirm ?>')) return false;"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
            <?php
        }
    }
    ?>
    </tbody>
</table>