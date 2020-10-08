<?php
namespace PHPMVC\Controllers;

use PHPMVC\LIB\FrontController;
use PHPMVC\LIB\Template;

class AbstractController
{


    protected $_controller;
    protected $_action;
    protected $_params;
    protected $_template;
    protected $_language;

    protected $_data = array();

    public function notFoundAction()
    {
        $this->_language->load('template.common');
        $this->_view();
    }

    public function setController ($controllerName)
    {
        $this->_controller = $controllerName;
    }

    public function setAction ($actionName)
    {
        $this->_action = $actionName;
    }

    public function setParams ($params)
    {
        $this->_params = $params;
    }
    public function setLanguage ($language)
    {
        $this->_language = $language;
    }
    public function setTemplate (Template $template)
    {
        $this->_template = $template;
    }

    protected function _view()
    {

        $view = VIEWS_PATH . DIRECTORY_SEPARATOR. $this->_controller . DIRECTORY_SEPARATOR . $this->_action . '.view.php';
        if($this->_action == FrontController::NOT_FOUND_ACTION  || !file_exists($view)) {
            $view = VIEWS_PATH. DIRECTORY_SEPARATOR  . 'notfound' . DIRECTORY_SEPARATOR . 'notfound.view.php';
        }
        $this->_data = array_merge($this->_data,$this->_language->getDict());
        $this->_template->setActionView($view);
        $this->_template->setAppData($this->_data);
        $this->_template->renderApp();

    }
}