<?php

namespace PHPMVC\Controllers;

class NotFoundController extends AbstractController
{
    public function notFoundAction()
    {
        $this->_language->load('template.common');
        $this->_view();
////        $this->language->load('template.common');
////        $this->_view();
//        echo "404 Not Found";
    }
}