<?php


namespace PHPMVC\Models;


class EmployeeModel extends AbstractModel
{
    public $id;
    public $name;
    public $age;
    public $address;
    public $salary;
    public $tax;

    protected static $tableName = 'employee';
    protected static $primaryKey = 'id';
    protected static $tableSchema = [
//        'id' => self::DATA_TYPE_INT,
        'name' => self::DATA_TYPE_STR,
        'age' => self::DATA_TYPE_INT,
        'address' => self::DATA_TYPE_STR,
        'salary' => self::DATA_TYPE_DECIMAL,
        'tax' => self::DATA_TYPE_DECIMAL,
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