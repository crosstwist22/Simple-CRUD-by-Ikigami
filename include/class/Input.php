<?php


class Input {
    public static function __validHTTP($data = array()){
        if(!empty($data) && count($data)){
            return true;
        }
        return false;
    }
    public static function __post($data){
        if(self::__validHTTP($_POST)){
            return $_POST[$data];
        }
    }
    public static function __getURL($data){
        if(self::__validHTTP($_GET)){
            return $_GET[$data];
        }
    }
    public static function __submitData($submit_data,$request){
        if(self::__validHTTPPost($request)){
            return true;
        }
        return false;
    }
    public static function __setServer($server){
        if(self::__validHTTPPost($_SERVER)){
            return $_SERVER[$data];
        }
    }
    public static function __file($file_name){
        return $_FILES[$file_name];
    }
    public static function __fileName($file_name){
        return self::__file($file_name)['name'];
    }
    public static function __fileTmp($file_name){
        return self::__file($file_name)['tmp_name'];
    }
     public static function __fileSize($file_name){
        return self::__file($file_name)['size'];
    }
    
}
