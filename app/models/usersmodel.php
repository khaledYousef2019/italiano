<?php


namespace PHPMVC\Models;


class UsersModel extends AbstractModel
{
    public $UserId;
    public $Username;
    public $Password;
    public $Email;
    public $PhoneNumber;
    public $SubscriptionDate;
    public $LastLogin;
    public $GroupId;

    protected static $tableName = 'app_users';
    protected static $primaryKey = 'UserId';
    protected static $tableSchema = [
//        'UserId' => self::DATA_TYPE_INT,
        'Username' => self::DATA_TYPE_STR,
        'Password' => self::DATA_TYPE_STR,
        'Email' => self::DATA_TYPE_STR,
        'PhoneNumber' => self::DATA_TYPE_INT,
        'SubscriptionDate' => self::DATA_TYPE_DATE,
        'LastLogin' => self::DATA_TYPE_STR,
        'GroupId' => self::DATA_TYPE_INT,
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