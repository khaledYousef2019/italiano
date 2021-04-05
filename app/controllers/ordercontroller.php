<?php


namespace PHPMVC\Controllers;


use PHPMVC\LIB\Helper;
use PHPMVC\LIB\InputFilter;
use PHPMVC\Models\OfficeModel;
use PHPMVC\Models\ProductModel;

class OrderController extends AbstractController
{
    use InputFilter;
    use Helper;

    public function defaultAction()
    {
        $this->_language->load('template.common');
        $this->_language->load('order.default');
        $this->_data['products'] = ProductModel::getAll();
        $this->_view();
//        var_dump($this->_data);
    }


    public function createAction()
    {
        $this->_language->load('template.common');
        $this->_language->load('order.create');
        $listedProducts = isset($_POST['listedproducts']) ? $_POST['listedproducts'] : 0;
        if ($listedProducts){
            foreach ($_POST['listedproducts'] as $productid){
                $product[] = ProductModel::getByPK($productid);
            }
        }else{
            $this->redirect("/order");
        }

        $this->_data['products'] = $product;
        $this->_view();

//        var_dump($this->_data);
    }
}