<?php


namespace PHPMVC\Models;


class DocumentModel extends AbstractModel
{
    public $id;
    public $office_id;
    public $name;
    public $content;
    public $serial;

    protected static $tableName = 'documents';
    protected static $primaryKey = 'id';
    protected static $tableSchema = [
//        'office_id' => self::DATA_TYPE_INT,
        'name' => self::DATA_TYPE_STR,
        'content' => self::DATA_TYPE_STR,
        'serial' => self::DATA_TYPE_STR,
    ];
}