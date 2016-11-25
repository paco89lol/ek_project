<?php

class ReponseMessage
{
    var $errMsg;
    var $data;
    var $error;
    
    public function getJsonFormat()
    {
        $arrObj = array($this);
        return json_encode($arrObj);
    }
}