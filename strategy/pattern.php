<?php

/*
 * Com este padrão, voce encapsula o algoritmo de forma clara para que outros desenvolvedores possam adicionar
 * novos tipos de saida.
 * Implementamos uma interface para que todas as classes estejam obedecendo os contratos.
 */

interface IPattern
{
    public function carregar();
}

class ClasseJson implements IPattern
{
    public function carregar()
    {
        return json_encode($data);
    }
}

class ClasseArray implements IPattern
{
    public function carregar()
    {
        return $data;
    }
}

class ClasseCliente
{
    private $saida;

    public function setSaida(IPattern $ipattern)
    {
        $this->saida = $ipattern;
    }

    public function carregarSaida()
    {
        $this->saida->carregar();
    }
}

$cliente = new ClasseCliente();
$cliente->setSaida(new ClasseArray());
$data = $cliente->carregarSaida();

$cliente = new ClasseCliente();
$cliente->setSaida(new ClasseJson());
$data = $cliente->carregarSaida();