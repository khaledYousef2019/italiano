<?php
namespace PHPMVC\Controllers;

class ReceiptController extends AbstractController
{
    public function defaultAction()
    {

//        $this->_language->load('template.common');
        $this->_language->load('receipt.default');
//        $this->_language->load('office.add');
        $this->_view();
    }
    public function addAction(){
        $this->_view();
    }
}