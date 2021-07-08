<?php

namespace App\Conn;

use PDO;
use PDOException;
use PDOStatement;

class Delete
{

    /* ==== Atributos privados ==== */
    private $table;
    private $terms;
    private $result;
    private $rules;

    /** @var PDOStatement */
    private $Delete;

    /** @var PDO */
    private $Conn;

    /* ======================== */
    /* ==== PUBLIC METHODS ==== */
    /* ======================== */

    public function __construct()
    {
        $this->Conn = Conn::getConn();
    }

    public function goDelete($table, $terms, $rules)
    {
        $this->table = $table;
        $this->terms = $terms;
        parse_str($rules, $this->rules);

        $this->getSyntax();
        $this->Run();
    }

    public function getResult()
    {
        return $this->result;
    }

    public function getRowCount()
    {
        $this->Delete->rowCount();
    }

    /* ======================== */
    /* ==== PRIVATE METHODS ==== */
    /* ======================== */

    private function getSyntax()
    {
        $this->Delete = "DELETE FROM {$this->table} {$this->terms}";
    }

    private function Connection()
    {
        $this->Delete = $this->Conn->prepare($this->Delete);
    }

    private function Run()
    {
        $this->Connection();

        try {
            $this->Delete->execute($this->rules);
            $this->result = true;
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
