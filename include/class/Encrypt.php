<?php


class Encrypt {
     public static function __key(){
        return hash('md5', 'ikigami');
    }
    public static function __protect($string){
        $string = trim(strip_tags(addslashes($string)));
        return $string;
    }
    public static function __encode($data){
        $string = rtrim(convert_uuencode(mcrypt_encrypt(MCRYPT_BLOWFISH_COMPAT, self::__key(), $data, MCRYPT_MODE_ECB)));
        return $string;
    }
    public static function __decode($data){
        $string = rtrim(mcrypt_decrypt(MCRYPT_BLOWFISH_COMPAT, self::__key(), convert_uudecode($data), MCRYPT_MODE_ECB));
        return $string;
    }
    public static function __encodeInfo($data){
        $string = rtrim(base64_encode(mcrypt_encrypt(MCRYPT_SAFERPLUS, self::__key(), $data, MCRYPT_MODE_ECB)));
        return $string;
    }
    public static function __decodeInfo($data){
        $string = rtrim(mcrypt_decrypt(MCRYPT_SAFERPLUS, self::__key(), base64_decode($data), MCRYPT_MODE_ECB));
        return $string;
    }
   public static function __encodeSession($data){
        $string = rtrim(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, self::__key(), $data, MCRYPT_MODE_ECB)));
        return $string;
    }
    public static function __decodeSession($data){
        $string = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, self::__key(), base64_decode($data), MCRYPT_MODE_ECB));
        return $string;
    }
     public static function __encodePassword($data){
        $string = rtrim(base64_encode(mcrypt_encrypt(MCRYPT_SERPENT, self::__key(), $data, MCRYPT_MODE_ECB)));
        return $string;
    }
    public static function __decodePassword($data){
        $string = rtrim(mcrypt_decrypt(MCRYPT_SERPENT, self::__key(), base64_decode($data), MCRYPT_MODE_ECB));
        return $string;
    }
    public static function __encryptOPENSSL($data) {
        $encryption_key = base64_decode(self::__key());
        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
        $encrypted = openssl_encrypt($data, 'aes-256-cbc', $encryption_key, 0, $iv);
        return base64_encode($encrypted . '::' . $iv);
    }
 
    public static function __decryptOPENSSL($data) {
        $encryption_key = base64_decode(self::__key());
        list($encrypted_data, $iv) = explode('::', base64_decode($data), 2);
        return openssl_decrypt($encrypted_data, 'aes-256-cbc', $encryption_key, 0, $iv);
    }
    public static function __htmlspecialencode($data){
        return htmlspecialchars($data, ENT_QUOTES);
    }
    public static function __htmlspecialdecode($data){
        return htmlspecialchars_decode($data,ENT_QUOTES);
    }
    public static function __generateUniqueID(){
        return uniqid(bin2hex(openssl_random_pseudo_bytes(10)), true);
    }
}
