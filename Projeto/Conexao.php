<?php
class Conexao{

    public static $banc;

    public static function conecta(){
        if(!isset(self::$banc)):
            self::$banc = new \PDO('mysql:host=localhost;dbname=projeto;charset=utf8','root','');
        endif;

        return self::$banc;
    }
}

?>