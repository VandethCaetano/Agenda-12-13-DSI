<?php
if (!isset($_SESSION)) {
    session_start();
}

class ExperienciaProfissionalController {

    public function inserir($inicio, $fim, $empresa, $descricao, $idusuario) {
        require_once '../Model/ExperienciaProfissional.php';
        $expP = new ExperienciaProfissional();
        $expP->setInicio($inicio);
        $expP->setFim($fim);
        $expP->setEmpresa($empresa);
        $expP->setDescricao($descricao);
        $expP->setIdUsuario($idusuario);
        return $expP->inserirBD();
    }

    public function remover($id) {
        require_once '../Model/ExperienciaProfissional.php';
        $expP = new ExperienciaProfissional();
        return $expP->excluirBD($id);
    }

    public function gerarLista($idusuario) {
        require_once '../Model/ExperienciaProfissional.php';
        $expP = new ExperienciaProfissional();
        return $expP->listaExperiencias($idusuario);
    }
}
?>
