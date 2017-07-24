<?php


class Session {
    function __construct(){
        $week = new DateTime('+1 week');
        self::__setHttpOnlySession($week);
        self::__setHttpOnlyCookies($week);
        self::__name();
        @session_start();
        self::__regenerate();
    } 
    public static function __getSession($name){
    	return $_SESSION[$name];
    }
     public static function __setHttpOnlyCookies($date){
         setcookie(hash('joaat','ikigami'), hash('sha256','sama'),$date->getTimestamp(),'/',null,null,true);
    }
    public static function __setHttpOnlySession($date){
         session_set_cookie_params($date->getTimestamp(),'/',null,false,true);
    }
    public static function __exists($name){
    	return isset($_SESSION[$name]) ? true : false;
    }
    public static function __insert($name,$info){
    	return $_SESSION[$name] = $info;
    }
    public static function __delete($session_data){
    	if(self::__exists($session_data))
    	unset($_SESSION[$session_data]);
    }
    public static function __name(){
        session_name(hash('snefru',"ikigami"));
    }
    public static function __regenerate(){
    	session_regenerate_id();
    }
    public static function __destroy(){
    	session_destroy();
    }
    public static function __timedSession($session , $time){
    	if (!empty($session) && $_SESSION['deleted_time'] < time() - $time) {
	        self::__destroy();
	        self::__construct();
	    }
    }

}
