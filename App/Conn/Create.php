<?php

namespace App\Conn;

use PDO;
use PDOException;
use PDOStatement;

class Create
{

    /* Atributos privados */
    private $table;
    private $data;
    private $result;

    /** @var PDOStatement */
    private $Create;

    /** @var PDO  */
    private $Conn;

    /* ======================== */
    /* ==== PUBLIC METHEDS ==== */
    /* ======================== */

    public function __construct()
    {
        $this->Conn = Conn::getConn();
    }

    public function goCreate($table, array $data)
    {
        $this->table = $table;
        $this->data = $data;

        $this->useSyntax();
        $this->Run();
    }

    public function getResult()
    {
        return $this->result;
    }

    /* ========================= */
    /* ==== PRIVATE METHEDS ==== */
    /* ========================= */
    private function useSyntax()
    {
        $fuel = implode(", ", array_keys($this->data));
        $places = ":" . implode(", :", array_keys($this->data));
        $this->Create = "INSERT INTO {$this->table} ({$fuel}) VALUES({$places})";
    }

    private function Connection()
    {
        $this->Create = $this->Conn->prepare($this->Create);
    }

    private function Run()
    {
        $this->Connection();

        try {
            $this->Create->execute($this->data);
            $this->result = $this->Conn->lastInsertId();
        } catch (PDOException $e) {
            echo "
                <div style='color: #FEEAEA; background: #d12121; border:1px solid #7C1515; padding: 10px; font-family: Calibri, sans-serif; border-radius: 5px;'>
                    <strong>Erro:</strong> {$e->getMessage()} |
                    <strong>Arquivo:</strong> {$e->getFile()} |
                    <strong>Linha:</strong> {$e->getLine()} |
                    <strong>Código:</strong> {$e->getCode()}
                </div>    
            ";
        }
    }
}
