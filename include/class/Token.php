<?php


class Token {
   public static function __generateLogin(){
	return Session::__insert('ikigami', bin2hex(openssl_random_pseudo_bytes(32)));	
    }
    public static function __validateLoginToken($token){
        if(Session::__exists('ikigami') && $token === Session::__getSession('ikigami')){
            Session::__delete('ikigami');
            return true;
        }
        return false;
    }
}
