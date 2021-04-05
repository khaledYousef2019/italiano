<?php


namespace PHPMVC\Models;


class ProductCategoryModel extends AbstractModel
{
    public $CategoryId;
    public $Name;
    public $Image;

    protected static $tableName = 'app_products_categories';
    protected static $primaryKey = 'CategoryId';
    protected static $tableSchema = [
        'CategoryId' => self::DATA_TYPE_INT,
        'Name' => self::DATA_TYPE_STR,
        'Image' => self::DATA_TYPE_STR,
    ];
}