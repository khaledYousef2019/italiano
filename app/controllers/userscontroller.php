<?php


namespace PHPMVC\Controllers;


use PHPMVC\Models\UsersModel;

class UsersController extends AbstractController
{
    public function defaultAction()
    {

        $this->_language->load('template.common');
        $this->_language->load('users.default');
        $this->_data['users'] = UsersModel::getAll();

        $this->_view();
    }
}