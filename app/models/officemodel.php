<?php


namespace PHPMVC\Models;


class OfficeModel extends AbstractModel
{
    public $id;
    public $name;
    public $email;
    public $password;
    public $code;
//    public $tax;

    protected static $tableName = 'offices';
    protected static $primaryKey = 'id';
    protected static $tableSchema = [
//        'id' => self::DATA_TYPE_INT,
        'name' => self::DATA_TYPE_STR,
        'email' => self::DATA_TYPE_STR,
        'password' => self::DATA_TYPE_STR,
        'code' => self::DATA_TYPE_STR,
        ];

//    public function getClone($id,$name,$age,$address,$salary,$tax){
////        $this->id = $id;
//        self::getByPK($id);
//        static::__construct($name,$age,$address,$salary,$tax);
//        return $this;
//
//    }
//    public function __construct($name,$age,$address,$salary,$tax){
//        $this->name = $name;
//        $this->age = $age;
//        $this->salary = $salary;
//        $this->address = $address;
//        $this->tax = $tax;
//    }

    public function __get($prop){
        return $this->$prop;
    }
}
