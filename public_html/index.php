<?php
//require_once 'session.php';

namespace PHPMVC;

use PHPMVC\LIB\FrontController;
use PHPMVC\LIB\Languages;
use PHPMVC\LIB\SessionManager;
use PHPMVC\LIB\Template;
use PHPMVC\Models\EmployeeModel;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once "..".DIRECTORY_SEPARATOR."app".DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR."config.php";
require_once APP_PATH.DIRECTORY_SEPARATOR.'lib'.DIRECTORY_SEPARATOR.'autoload.php';

$session = new SessionManager();
$session->start();

if (!isset($session->lang)){
    $session->lang = 'en';
}

$templateParts = require_once "..".DIRECTORY_SEPARATOR."app".DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR."templateconfig.php";

$template = new Template($templateParts);
$language = new Languages();

$frontController = new FrontController($template,$language);
$frontController->dispatch();


//$employee = new EmployeeModel('khaled',26,'El Mahalla El kubra',10000,2);
//$employee->save();
//$db = new PDO('mysql:host=localhost;dbname=store','root','MNIkmy@2018');
////echo $employee->name;
//$name = "khaled";
//$age = 23;
//$salary = 2900;
//$tax = 6;
//$address = "Abo shaheen";
//$sql = "INSERT INTO employee SET name =:name ,age=:age,address=:address,salary=:salary,tax=:tax";
//$stmt = $db->prepare($sql);
//$stmt->execute(array(':name' => $name, ':age' => $age,
//    ':address' => $address, ':salary' => $salary, ':tax' => $tax));


//
//  alter table app_users_profiles drop id ;
//  show create app_users_profiles;
//  alter table app_users_profiles drop foreign key app_users_profiles_ibfk_1;   // delete forigen key constraint
//  alter table app_users_profiles modify UserId int unsigned not null primary key auto_increment;
//  alter table app_users_profiles add foreign key (UserId) references app_users (UserId);
//  alter table tbname add Coulmn tinyint(1) unsigned not null primary key auto increment first; // hna bn2add coulmn w first 3shan yb2a f awl el gdwal
//   create table app_suppliers like app_clients;
//
//
//CREATE TABLE `app_sales_invoices` (
//`InvoiceId` int unsigned NOT NULL AUTO_INCREMENT,
//  `ClientId` int unsigned NOT NULL,
//  `PaymentType` tinyint(1) DEFAULT NULL,
//  `PaymentStatus` tinyint(1) NOT NULL,
//  `created` date NOT NULL,
//  `Discount` decimal(8,2) DEFAULT NULL,
//  `UserId` int unsigned NOT NULL,
//  PRIMARY KEY (`InvoiceId`),
//  KEY `ClientId` (`ClientId`),
//  KEY `UserId` (`UserId`),
//  CONSTRAINT `app_sales_invoices_ibfk_1` FOREIGN KEY (`ClientId`) REFERENCES `app_clients` (`ClientId`),
//  CONSTRAINT `app_sales_invoices_ibfk_2` FOREIGN KEY (`UserId`) REFERENCES `app_users` (`UserId`)
//) ENGINE=InnoDB DEFAULT CHARSET=utf8
//
//
//CREATE TABLE `app_sales_invocies_details` (
//`Id` int unsigned NOT NULL AUTO_INCREMENT,
//`ProductId` int unsigned NOT NULL,
//`Quantity` smallint NOT NULL,
//`ProductPrice` decimal(7,2) NOT NULL,
//`InvoiceId` int unsigned NOT NULL,
//PRIMARY KEY (`Id`),
//KEY `ProductId` (`ProductId`),
//KEY `InvoiceId` (`InvoiceId`),
//CONSTRAINT `app_sales_invocies_details_ibfk_1` FOREIGN KEY (`ProductId`) REFERENCES `app_product_list` (`ProductId`),
//CONSTRAINT `app_sales_invocies_details_ibfk_2` FOREIGN KEY (`InvoiceId`) REFERENCES `app_sales_invoices` (`InvoiceId`)
//) ENGINE=InnoDB DEFAULT CHARSET=utf8
//
//
//CREATE TABLE `app_sales_invoices_receipts` (
//`ReceiptId` int unsigned NOT NULL AUTO_INCREMENT,
//  `InvoiceId` int unsigned NOT NULL,
//  `PaymentType` tinyint(1) NOT NULL,
//  `PaymentAmount` decimal(8,2) NOT NULL,
//  `PaymentLiteral` varchar(60) NOT NULL,
//  `BankName` varchar(30) DEFAULT NULL,
//  `BankAccountNumber` varchar(30) DEFAULT NULL,
//  `ChekNumber` varchar(15) DEFAULT NULL,
//  `TransferedTo` varchar(30) DEFAULT NULL,
//  `Created` date NOT NULL,
//  `UserId` int unsigned NOT NULL,
//  PRIMARY KEY (`ReceiptId`),
//  KEY `InvoiceId` (`InvoiceId`),
//  KEY `UserId` (`UserId`),
//  CONSTRAINT `app_sales_invoices_receipts_ibfk_1` FOREIGN KEY (`InvoiceId`) REFERENCES `app_sales_invoices` (`InvoiceId`),
//  CONSTRAINT `app_sales_invoices_receipts_ibfk_2` FOREIGN KEY (`UserId`) REFERENCES `app_users` (`UserId`)
//) ENGINE=InnoDB DEFAULT CHARSET=utf8