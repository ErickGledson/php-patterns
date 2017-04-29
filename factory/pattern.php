<?php

/*
 * Beneficios
 *
 * Caso a classe "Carro" for renomeada, modificada ou substituida, só precisará mudar na Factory.
 * Se a instancia da classe "Carro" for um processo complicado, isso fica encapsulado na Factory.
 *
 */

class Carro
{
    private $modelo;
    private $cor;

    public function __construct($modelo, $cor)
    {
        $this->modelo = $modelo;
        $this->cor = $cor;
    }

    public function getModeloCor()
    {
        return $this->modelo . ' ' . $this->cor;
    }
}

class CarroFactory
{
    public static function create($modelo, $cor)
    {
        return new Carro($modelo, $cor);
    }
}

$palio = CarroFactory::create('palio fire', 'branco');

echo $palio->getModeloCor();