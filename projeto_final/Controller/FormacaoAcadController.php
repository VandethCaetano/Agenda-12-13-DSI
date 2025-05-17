<?php
if (!isset($_SESSION)) {
    session_start();
}

class FormacaoAcadController
{

    public function inserir($descricao, $inicio, $fim, $idUsuario)
    {
        require_once '../Model/FormacaoAcad.php';

        $formacao = new FormacaoAcad();
        $formacao->setDescricao($descricao);
        $formacao->setInicio($inicio);
        $formacao->setFim($fim);
        $formacao->setIdUsuario($idUsuario);

        return $formacao->inserirBD();
    }

    public function listar($idUsuario)
    {
        require_once '../Model/FormacaoAcad.php';
        return (new FormacaoAcad())->listaFormacoes($idUsuario);
    }

    public function remover($idFormacao)
    {
        require_once '../Model/FormacaoAcad.php';

        $f = new FormacaoAcad();
        return $f->excluirBD($idFormacao);
    }
}
