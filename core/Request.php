<?php

namespace app\core;

class Request
{
    public function getPath(): string
    {
//        $path = $_SERVER['REQUEST_URI'] ?? '/';
//        $position = strpos($path,'?');
//        if($position === false){
//            return $path;
//        }
//        return substr($path,0,$position);
        return parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
    }

    public function getMethod(): string
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }
}