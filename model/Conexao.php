<?php

$dbname = 'bdagendaphp';
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';

class Conexao
{

    private static $pdo;

    public static function config($dbname, $dbhost, $dbuser, $dbpass)
    {        
        try{
            // Pra usar a variavel de cima precisa so self
            self::$pdo = new PDO('mysql:dbmane='.$dbname.';host='.$dbhost.$dbuser.$dbpass);
            return true;
        } catch (PDOException $th) {
            return $th->getMessage();
        }
    }
    
    public static function getPDO() 
    {
        return self::$pdo;
    }
}

// Graças ao static não precisamos configurar outras vezes a variavel do banco, só precisa rodar uma vez
Conexao::config($dbname, $dbhost, $dbuser, $dbpass);

// Agora é só usar a função getPdo
Conexao::getPDO();