<?php


namespace PHPMVC\LIB;


class Languages
{
    private $_dictionary;

    public function load($path){
        $file = LANGUAGES_PATH.$_SESSION['lang'].DIRECTORY_SEPARATOR.str_replace('.',DIRECTORY_SEPARATOR,$path).'.lang.php';
        if (file_exists($file)){
            require_once $file;
            if(is_array($_) && !empty($_)){
                foreach ($_ as $key => $value){
                    $this->_dictionary[$key] = $value;
                }
            }
        }else{
            trigger_error("Sorry The Language File $path is not existed" , E_USER_WARNING);
        }

    }

    public function getDict(){
        return $this->_dictionary;
    }
}