<?php

namespace App\Conn;

use PDO;
use PDOException;

class Conn
{

    /** atributos da classe de conexão */
    private static $host = "localhost";
    private static $user = "root";
    private static $pass = "";
    private static $dbname = "study_pdo_singleton";

    /** @var PDO */
    private static $Connection = null;

    /**
     * Metodo de Conexão que retorna uma conexão PDO com Singleton Pattern.
     * Esse padrão tem como objetivo garantir que exista apenas uma instância de uma determinada classe e também definir um ponto de acesso global a essa instância
     *
     * @return PDO Singleton Pattern
     */
    private static function theConn()
    {

        try {
            
            if(self::$Connection == null){
                $dsn = "mysql:dbname=" . self::$dbname . ";host=" . self::$host;    
                $options = [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES UTF8"];

                self::$Connection = new PDO($dsn, self::$user, self::$pass, $options);
                self::$Connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }

        } catch (PDOException $e) {
            echo "
                <div style='color: #FEEAEA; background: #d12121; border:1px solid #7C1515; padding: 10px; font-family: Calibri, sans-serif; border-radius: 5px;'>
                    <strong>Erro:</strong> {$e->getMessage()} |
                    <strong>Arquivo:</strong> {$e->getFile()} |
                    <strong>Linha:</strong> {$e->getLine()} |
                    <strong>Código:</strong> {$e->getCode()}
                </div>    
            ";
            die;
        }   

        return self::$Connection;
    }

    /**
     * Método que retorna o Metodo theConn - conexão PDO Singlton Pattern
     *
     * @return theConn
     */
    public static function getConn()
    {
        return self::theConn();
    }
}
