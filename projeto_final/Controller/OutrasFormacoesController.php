<?php
if (!isset($_SESSION)) {
    session_start();
}

class OutrasFormacoesController
{
    public function inserir($inicio, $fim, $descricao, $idUsuario)
    {
        require_once '../Model/OutrasFormacoes.php';

        $outra = new OutrasFormacoes();
        $outra->setInicio($inicio);
        $outra->setFim($fim);
        $outra->setDescricao($descricao);
        $outra->setIdUsuario($idUsuario);

        return $outra->inserirBD();
    }

    public function listar($idUsuario)
    {
        require_once '../Model/OutrasFormacoes.php';
        return (new OutrasFormacoes())->listaFormacoes($idUsuario);
    }

    public function remover($idFormacao)
    {
        require_once '../Model/OutrasFormacoes.php';
        $f = new OutrasFormacoes();
        return $f->excluirBD($idFormacao);
    }
}
