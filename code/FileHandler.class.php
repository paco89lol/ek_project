<?php

class FileHandler
{
    function __construct() {
        
    }
    function getFileSize($base,$path)
    {
        $fileName = $base . $path;
        $res = "";
        if(!file_exists($fileName))
        {
            return "(File Not Exist)";
        }      
        if (($res = (filesize($fileName)/1024.00)) <= 1024)
        {
            return $res = (int)$res . "KB";
        }
        if(($res = (filesize($fileName)/1024.00/1024.00)) <= 1024)
        {
            $res = (int)$res . "MB";
        }
        return $res;
    }
}

