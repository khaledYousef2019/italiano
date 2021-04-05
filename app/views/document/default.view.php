<div class="container">
    <a href="/document/create" class="button"><i class="fa fa-plus"></i> <?= $text_new_item ?></a>
    <table class="data">
        <thead>
        <tr>
            <th><?= $text_table_name ?></th>
            <th><?= $text_table_serial ?></th>
            <th><?= $text_table_control ?></th>
        </tr>
        </thead>
        <tbody>
        <?php if(false !== $documents): foreach ($documents as $document): ?>
            <tr>
                <td><?= $document->name ?></td>
                <td><?= $document->serial ?></td>
                <td>
                    <a href="/document/pdf/<?= $document->id ?>"><i class="fa fa-download" aria-hidden="true"></i></a>
                    <a href="/document/edit/<?= $document->id ?>"><i class="fa fa-edit"></i></a>
                    <a href="/document/delete/<?= $document->id ?>" onclick="if(!confirm('<?= $text_table_control_delete_confirm ?>')) return false;"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
        <?php endforeach; endif; ?>
        </tbody>
    </table>
</div>