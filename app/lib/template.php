<?php


namespace PHPMVC\LIB;


class Template
{
    private $_templateParts;
    private $_action_view;
    private $_data;

    public function __construct(array $parts){
        $this->_templateParts = $parts;
    }

    public function setActionView($path){
        $this->_action_view = $path;
    }
    public function setAppData($data){
        $this->_data = $data;
    }

    private function renderTemplateHeaderStart(){
        require_once TEMPLATE_PATH."templateheaderstart.php";
    }
    private function renderTemplateHeaderEnd(){
        require_once TEMPLATE_PATH."templateheaderend.php";
    }
    private function renderTemplateFooter(){
        require_once TEMPLATE_PATH."templatefooter.php";
    }
    private function renderTemplateBlocks(){
        if (!array_key_exists('template',$this->_templateParts)){
            trigger_error('Sorry you have to define \'template\' key ');
        }else{
            if (!empty($this->_templateParts['template'])){
                foreach ($this->_templateParts['template'] as $partKey => $partFile){
                    extract($this->_data);
                    if ($partKey == ":view"){
                        require_once $this->_action_view;
                    }else{
                        require_once $partFile;
                    }
                }
            }
        }
    }
    private function renderHeaderResources(){
        $output = '';
        if (!array_key_exists('header_resources',$this->_templateParts)){
            trigger_error('Sorry you have to define \'header_resources\' key ');
        }else{
            if (!empty($this->_templateParts['header_resources'])){
                foreach ($this->_templateParts['header_resources']['css'] as $partKey => $partFile){
                        $output .= '<link type="text/css" rel="stylesheet" href="'.$partFile.'">';

                }
            }
            if (!empty($this->_templateParts['header_resources']['js'])){
                foreach ($this->_templateParts['header_resources']['js'] as $partKey => $partFile){
                        $output .= "<script src='".$partFile."'></script>";
                }
            }
        }
        echo $output;
    }

    private function renderFooterResources(){
        $output = '';
        if (!array_key_exists('footer_resources',$this->_templateParts)){
            trigger_error('Sorry you have to define \'header_resources\' key ');
        }else{

            if (!empty($this->_templateParts['footer_resources'])){
                foreach ($this->_templateParts['footer_resources'] as $partKey => $partFile){
                    $output .= "<script src='".$partFile."'></script>";
                }
            }
        }
        echo $output;
    }

    public function renderApp(){
        $this->renderTemplateHeaderStart();
        $this->renderHeaderResources();
        $this->renderTemplateHeaderEnd();
        $this->renderTemplateBlocks();

        $this->renderFooterResources();
        $this->renderTemplateFooter();

    }

}