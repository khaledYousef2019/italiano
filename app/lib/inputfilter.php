<?php


namespace PHPMVC\LIB;


trait InputFilter
{
    public function filterInt(int $input){
        return filter_var($input,FILTER_SANITIZE_NUMBER_INT);
    }
    public function filterFloat(float $input){
        return filter_var($input,FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION);
    }
    public function filterStr(string $input){
//        filter_var($input,FILTER_SANITIZE_STRING);
        return htmlentities(strip_tags($input),ENT_QUOTES,'UTF-8');
    }

}