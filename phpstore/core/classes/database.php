<?php

//caminho do arquivo ou Indentificador.
namespace core\classes;

use Exception;
use PDO;
use PDOException;


class database
{

    private $ligacao;
    private function ligar()
    {

        $this->ligacao =  new PDO(
            'mysql:' .
                'host=' . MYSQL_SERVER . ';' .
                'dbname=' . MYSQL_DATABASE . ';',
            MYSQL_USER,
            MYSQL_PASS,
            array(PDO::ATTR_PERSISTENT => true)
        );
        $this->ligacao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }
    private function desligar()
    {

        $this->ligacao = null;
    }

    public function select($sql, $params = null)
    {
        if (!preg_match("/^SELECT/i", $sql)) {
            throw new Exception("Error", 1);
        }

        $this->ligar();
        $resultados = null;

        try {
            if (!empty($params)) {

                $executar = $this->ligacao->prepare($sql);
                $executar->execute($params);
                $resultados = $executar->fetchAll(PDO::FETCH_CLASS);
            } else {

                $executar = $this->ligacao->prepare($sql);
                $executar->execute();
                $resultados = $executar->fetchAll(PDO::FETCH_CLASS);
            }
        } catch (PDOException $erro) {
            return false;
        }
        $this->desligar();

        return $resultados;
    }

    public function uptade($sql, $params = null)
    {
        if (!preg_match("/^UPTADE/i", $sql)) {

            throw new Exception("Error", 1);
        }

        $this->ligar();
        $resultados = null;

        try {
            if (!empty($params)) {

                $executar = $this->ligacao->prepare($sql);
                $executar->execute($params);
            } else {

                $executar = $this->ligacao->prepare($sql);
                $executar->execute();
            }
        } catch (PDOException $erro) {
            return false;
        }
    }

    public function delete($sql, $params = null)
    {
        if (!preg_match("/^DELETE/i", $sql)) {

            throw new Exception("Error", 1);
        }


        $this->ligar();
        $resultados = null;

        try {
            if (!empty($params)) {

                $executar = $this->ligacao->prepare($sql);
                $executar->execute($params);
            } else {

                $executar = $this->ligacao->prepare($sql);
                $executar->execute();
            }
        } catch (PDOException $erro) {
            return false;
        }
    }

    public function insert($sql, $params = null)
    {
        if (!preg_match("/^INSERT/i", $sql)) {

            throw new Exception("Error", 1);
        }


        $this->ligar();
        $resultados = null;

        try {
            if (!empty($params)) {

                $executar = $this->ligacao->prepare($sql);
                $executar->execute($params);
            } else {

                $executar = $this->ligacao->prepare($sql);
                $executar->execute();
            }
        } catch (PDOException $erro) {
            return false;
        }
    }

    public function statement($sql, $params = null)
    {
        if (preg_match("/^UPTADE | INSERT | DELETE | SELECT /i", $sql)) {

            throw new Exception("Error", 1);
        }

        $this->ligar();
        $resultados = null;

        try {
            if (empty($params)) {

                $executar = $this->ligacao->prepare($sql);
                $executar->execute($params);
            } else {

                $executar = $this->ligacao->prepare($sql);
                $executar->execute();
            }
        } catch (PDOException $erro) {
            return false;
        }

        $this->desligar();
        return $resultados;
    }
}
