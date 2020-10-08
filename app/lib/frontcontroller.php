<?php


namespace PHPMVC\LIB;


use PHPMVC\Controllers\AbstractController;

class FrontController extends AbstractController
{
    protected $_controller = "index";
    protected $_action = "default";
    protected $_params = array();
    protected $_template;
    protected $_language;

    const NOT_FOUND_CONTROLLER = 'PHPMVC\Controllers\\NotFoundController';
    const NOT_FOUND_ACTION = 'notFoundAction';

    public function __construct(Template $template,Languages $language){
        $this->_parseUrl();
        $this->_template = $template;
        $this->_language = $language;
    }
    public function _parseUrl(){
        // parsing url to determine controller and action
        $url = explode('/',trim(parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH),"/"),3);
        if (isset($url[0]) && $url[0] != ''){$this->_controller = $url[0];}
        if (isset($url[1]) && $url[1] != ''){$this->_action = $url[1];}
        if (isset($url[2]) && $url[2] != ''){$this->_params=explode('/',$url[2]);}

    }

    public function dispatch(){
        $controllerClassName = 'PHPMVC\Controllers\\'.ucfirst($this->_controller)."Controller";
        if(!class_exists($controllerClassName)){
            $controllerClassName = self::NOT_FOUND_CONTROLLER;
        }
        $actionName = $this->_action."Action";
        $controller = new $controllerClassName();
        if (!method_exists($controller,$actionName)){
            $this->_action = $actionName = self::NOT_FOUND_ACTION;
        }
        $controller->setController($this->_controller);
        $controller->setAction($this->_action);
        $controller->setParams($this->_params);
        $controller->setTemplate($this->_template);
        $controller->setLanguage($this->_language);
        $controller->$actionName();
//        var_dump($actionName);
    }

}