<?php


namespace PHPMVC\Models;


class PrivilegesModel extends AbstractModel
{
    public $PrivilegeId;
    public $Privilege;
    public $PrivilegeTitle;

    protected static $tableName = 'app_users_privileges';
    protected static $primaryKey = 'PrivilegeId';
    protected static $tableSchema = [
        'PrivilegeId' => self::DATA_TYPE_INT,
        'Privilege' => self::DATA_TYPE_STR,
        'PrivilegeTitle' => self::DATA_TYPE_STR,
        ];


}