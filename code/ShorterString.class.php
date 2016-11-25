<?php

class ShorterString
{
    var $maxLength;
    public function __construct() {
        $this->maxLength = 12;
    }
    
    function getShorter($string)
    {
        if(strlen($string) <= $this->maxLength)
        {
            return $string;   
        }
        return substr($string, 0, $this->maxLength)."...";
    }
}
