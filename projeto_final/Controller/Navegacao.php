<?php

switch (true) {

    //-------------primeiro acesso--//
    case isset($_POST["btnPrimeiroAcesso"]):
        include_once "../View/primeiroAcesso.php";
        break;

    //----------------cadastrar--//
    case isset($_POST["btnCadastrar"]):
        require_once "../Controller/UsuarioController.php";

        $uController = new UsuarioController();

        if ($uController->inserir(
            $_POST["txtNome"],
            $_POST["txtCPF"],
            $_POST["txtEmail"],
            $_POST["txtSenha"]
        )) {
            include_once "../View/cadastroRealizado.php";
        } else {
            include_once "../View/cadastroNaoRealizado.php";
        }
        break;

    //-------------------login--//
    case isset($_POST["btnLogin"]):
        require_once "../Controller/UsuarioController.php";

        $uController = new UsuarioController();

        if ($uController->login($_POST["txtLogin"], $_POST["txtSenha"])) {
            include_once "../View/principal.php";
        } else {
            include_once "../View/cadastroNaoRealizado.php";
        }
        break;

    //-----------------atualizar---//
    case isset($_POST["btnAtualizar"]):
        require_once "../Controller/UsuarioController.php";
        $uController = new UsuarioController();

        if ($uController->atualizar(
            $_POST["txtID"] ?? '',
            $_POST["txtNome"] ?? '',
            $_POST["txtCPF"] ?? '',
            $_POST["txtEmail"] ?? '',
            $_POST["txtData"] ?? ''
        )) {
            include_once "../View/atualizacaoRealizada.php";
        } else {
            include_once "../View/operacaoNaoRealizada.php";
        }
        break;

    //-------------------------------------formação---//
    case isset($_POST["btnAddFormacao"]):
        require_once "../Controller/FormacaoAcadController.php";
        require_once "../Model/Usuario.php";

        $ctrl = new FormacaoAcadController();
        $usuario = unserialize($_SESSION["Usuario"]);

        if ($ctrl->inserir(
            $_POST["txtNomeFA"],
            $_POST["txtInicioFA"],
            $_POST["txtFimFA"],
            $usuario->getID()
        )) {
            include_once "../View/atualizacaoRealizada.php";
        } else {
            include_once "../View/operacaoNaoRealizada.php";
        }
        break;

    //--- excluir formação ---//
    case isset($_POST["btnDelFormacao"]):
        require_once "../Controller/FormacaoAcadController.php";

        $ctrl = new FormacaoAcadController();

        if ($ctrl->remover($_POST["id"])) {
            include_once "../View/atualizacaoRealizada.php";
        } else {
            include_once "../View/operacaoNaoRealizada.php";
        }
        break;

    //-------------------------- experiencia profissional---//
   
case isset($_POST["btnAddEP"]):
    require_once "../Controller/ExperienciaProfissionalController.php";
    include_once "../Model/Usuario.php";

    $epController = new ExperienciaProfissionalController();
    if ($epController->inserir(
            date("Y-m-d", strtotime($_POST["txtInicioEP"])),
            date("Y-m-d", strtotime($_POST["txtFimEP"])),
            $_POST["txtEmpEP"],
            $_POST["txtDescEP"],
            unserialize($_SESSION["Usuario"])->getID()
        )) {
        include_once "../View/informacaoInserida.php";
    } else {
        include_once "../View/operacaoNRealizada.php";
    }
    break;

//--Excluir Experiencia Profissional--//
case isset($_POST["btnExcluirEP"]):
    require_once "../Controller/ExperienciaProfissionalController.php";
    include_once "../Model/Usuario.php";

    $epController = new ExperienciaProfissionalController();
    if ($epController->remover($_POST["idEP"])) {
        include_once "../View/informacaoExcluida.php";
    } else {
        include_once "../View/operacaoNRealizada.php";
    }
    break;

    //--- excluir formação---//
    case isset($_POST["btnDelOF"]):
        require_once "../Controller/OutrasFormacoesController.php";

        $ctrl = new OutrasFormacoesController();

        if ($ctrl->remover($_POST["idOF"])) {
            include_once "../View/atualizacaoRealizada.php";
        } else {
            include_once "../View/operacaoNaoRealizada.php";
        }
        break;

    //--- outras formação---//
    case isset($_POST["btnAddOF"]):
        require_once "../Controller/OutrasFormacoesController.php";
        require_once "../Model/Usuario.php";

        $ctrl = new OutrasFormacoesController();
        $usuario = unserialize($_SESSION["Usuario"]);

        if ($ctrl->inserir(
            $_POST["txtInicioOF"],
            $_POST["txtFimOF"],
            $_POST["txtDescOF"],
            $usuario->getID()
        )) {
            include_once "../View/atualizacaoRealizada.php";
        } else {
            include_once "../View/operacaoNaoRealizada.php";
        }
        break;

    //-------login nenhum botão click---//
    default:
        include_once(__DIR__ . "/../View/login.php");
        break;
}