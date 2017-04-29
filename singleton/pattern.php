<?php

/*
 * Util quando é necessario garantir somente uma instancia da classe em todo o ciclo de vida da requisicao.
 * Por exemplo: conexao com banco de dados.
 *
 */

class Singleton
{
    /*
     * Retorna uma instancia da classe
     */
    public static function getInstance()
    {
        static $instance = null;

        if (null === $instance)
            $instance = new static();

        return $instance;
    }

    /*
     * Construtor protegido para evitar instancia por "new" fora desta classe
     */
    protected function __construct()
    {
    }

    /*
     * Metodo clone privado para evitar a clonagem da instancia
     */
    private function __clone()
    {
    }

    /*
     * Metodo wakeup para evitar a desserialização da instancia
     */
    private function __wakeup()
    {
    }
}

class SingletonFilha extends Singleton
{
}

$obj = Singleton::getInstance();
var_dump($obj === Singleton::getInstance());

$outroObj = SingletonFilha::getInstance();
var_dump($outroObj === Singleton::getInstance());

var_dump($outroObj === SingletonFilha::getInstance());