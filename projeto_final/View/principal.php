<?php
include_once '../Model/Usuario.php';
if (!isset($_SESSION)) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Enlatados Juarez</title>
    <style>
        body,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: "Montserrat", sans-serif;
        }

        .w3-sidebar {
            width: 170px;
        }
    </style>
</head>

<body class="w3-light-grey">

<!-- Sidebar -->
<nav class="w3-sidebar w3-bar-block w3-center w3-blue" style="padding-top: 30px;">
    <a href="#home" class="w3-bar-item w3-button w3-block w3-cell w3-hover-light-grey w3-hover-text-cyan w3-text-light-grey">
        <i class="fa fa-home w3-xxlarge"></i>
        <p>HOME</p>
    </a>
<br><br>
    <a href="#dPessoais" class="w3-bar-item w3-button w3-block w3-cell w3-hover-light-grey w3-hover-text-cyan w3-text-light-grey">
        <i class="fa fa-address-book-o w3-xxlarge"></i>
        <p>Dados Pessoais</p>
    </a>
<br><br>
    <a href="#formacao" class="w3-bar-item w3-button w3-block w3-cell w3-hover-light-grey w3-hover-text-cyan w3-text-light-grey">
        <i class="fa fa-mortar-board w3-xxlarge"></i>
        <p>Formação</p>
    </a>
<br><br>
    <a href="#eProfissional" class="w3-bar-item w3-button w3-block w3-cell w3-hover-light-grey w3-hover-text-cyan w3-text-light-grey">
        <i class="fa fa-briefcase w3-xxlarge"></i>
        <p>Experiência</p>
    </a>
<br><br>
    <a href="#outrasformacoes" class="w3-bar-item w3-button w3-block w3-cell w3-hover-light-grey w3-hover-text-cyan w3-text-light-grey">
        <i class="fa fa-book w3-xxlarge"></i>
        <p>Outras Formações</p>
    </a>
</nav>

<!-- Conteúdo principal -->
<div class="w3-padding-large" id="main">
    <br><br>

    <!---------------------------------------------------------------------- navegação -->
    <div class="w3-padding-128 w3-content w3-text-grey" id="dPessoais">
        <h2 class="w3-text-cyan">Dados Pessoais</h2>

        <form action="" method="post"
            class="w3-container w3-card-4 w3-light-grey w3-text-blue w3-padding"
            style="width: 100%;">

            <input type="hidden" name="txtID"
                value="<?= unserialize($_SESSION['Usuario'])->getID(); ?>">

            <!-- nome -->
            <div class="w3-row w3-section">
                <div class="w3-col" style="width:11%;">
                    <i class="w3-xxlarge fa fa-user"></i>
                </div>
                <div class="w3-rest">
                    <input class="w3-input w3-border w3-round-large" name="txtNome" type="text"
                        placeholder="Nome Completo"
                        value="<?= unserialize($_SESSION['Usuario'])->getNome(); ?>">
                </div>
            </div>

            <!-- dt nacimento -->
            <div class="w3-row w3-section">
                <div class="w3-col" style="width:11%;">
                    <i class="w3-xxlarge fa fa-calendar"></i>
                </div>
                <div class="w3-rest">
                    <input class="w3-input w3-border w3-round-large" name="txtData" type="date"
                        value="<?= unserialize($_SESSION['Usuario'])->getDataNascimento(); ?>">
                </div>
            </div>

            <!-- CPF -->
            <div class="w3-row w3-section">
                <div class="w3-col" style="width:11%;">
                    <i class="w3-xxlarge fa fa-id-card"></i>
                </div>
                <div class="w3-rest">
                    <input class="w3-input w3-border w3-round-large" name="txtCPF" type="text"
                        placeholder="CPF"
                        value="<?= unserialize($_SESSION['Usuario'])->getCPF(); ?>">
                </div>
            </div>

            <!-- e-mailL -->
            <div class="w3-row w3-section">
                <div class="w3-col" style="width:11%;">
                    <i class="w3-xxlarge fa fa-envelope"></i>
                </div>
                <div class="w3-rest">
                    <input class="w3-input w3-border w3-round-large" name="txtEmail" type="text"
                        placeholder="E-mail"
                        value="<?= unserialize($_SESSION['Usuario'])->getEmail(); ?>">
                </div>
            </div>

            <!-- botão atualizar -->
            <div class="w3-row w3-section">
                <div class="w3-center" style="width:100%;">
                    <button name="btnAtualizar"
                        class="w3-button w3-blue w3-round-large"
                        style="width:70%;">
                        Atualizar
                    </button>
                </div>
            </div>
        </form>


        <!------------------------------------------------------ formação  -->
        <br><br>
        <div class="w3-padding-128 w3-content w3-text-grey" id="formacao">
            <h2 class="w3-text-cyan">Formação</h2>

            <form action="" method="post"
                class="w3-container w3-card-4 w3-light-grey w3-text-blue w3-padding"
                style="width: 100%;">

                <!-- Rótulos -->
                <div class="w3-row w3-center">
                    <div class="w3-col" style="width:50%;">Data Inicial</div>
                    <div class="w3-col" style="width:50%;">Data Final</div>
                </div>

                <!-- Datas -->
                <div class="w3-row w3-section">
                    <!-- Início -->
                    <div class="w3-row w3-section w3-col" style="width:50%;">
                        <div class="w3-col" style="width:15%;">
                            <i class="w3-xxlarge fa fa-calendar"></i>
                        </div>
                        <div class="w3-rest">
                            <input class="w3-input w3-border w3-round-large" name="txtInicioFA" type="date">
                        </div>
                    </div>

                    <!-- Fim -->
                    <div class="w3-row w3-section w3-rest">
                        <div class="w3-col w3-margin-left" style="width:13%;">
                            <i class="w3-xxlarge fa fa-calendar"></i>
                        </div>
                        <div class="w3-rest">
                            <input class="w3-input w3-border w3-round-large" name="txtFimFA" type="date">
                        </div>
                    </div>
                </div>

                <!-- Tipo da formação -->
                <div class="w3-row w3-section">
                    <div class="w3-col" style="width:11%;">
                        <i class="w3-xxlarge fa fa-book"></i>
                    </div>
                    <div class="w3-rest">
                        <input class="w3-input w3-border w3-round-large" name="txtNomeFA" type="text"
                            placeholder="Nome da Formação">
                    </div>
                </div>

                <!-- Instituição -->
                <div class="w3-row w3-section">
                    <div class="w3-col" style="width:11%;">
                        <i class="w3-xxlarge fa fa-university"></i>
                    </div>
                    <div class="w3-rest">
                        <input class="w3-input w3-border w3-round-large" name="txtInstituicaoFA" type="text"
                            placeholder="Instituição">
                    </div>
                </div>

                <!-- Nível -->
                <div class="w3-row w3-section">
                    <div class="w3-col" style="width:11%;">
                        <i class="w3-xxlarge fa fa-graduation-cap"></i>
                    </div>
                    <div class="w3-rest">
                        <input class="w3-input w3-border w3-round-large" name="txtNivelFA" type="text"
                            placeholder="Nível (Técnico, Superior...)">
                    </div>
                </div>

                <!-- Botão adicionar formação -->
                <div class="w3-row w3-section">
                    <div class="w3-center" style="width:100%;">
                        <button name="btnAddFormacao" class="w3-button w3-blue w3-round-large" style="width:70%;">
                            Adicionar Formação
                        </button>
                    </div>
                </div>
            </form>

            <!-- Tabela de formações -->
            <?php
            require_once '../Model/FormacaoAcad.php';
            $usuario = unserialize($_SESSION["Usuario"]);
            $formacoes = (new FormacaoAcad())->listaFormacoes($usuario->getID());

            if ($formacoes && $formacoes->num_rows > 0): ?>
                <table class="w3-table-all w3-centered">
                    <thead>
                        <tr class="w3-blue">
                            <th>Início</th>
                            <th>Fim</th>
                            <th>Descrição</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($linha = $formacoes->fetch_object()): ?>
                            <tr>
                                <td><?= $linha->inicio ?></td>
                                <td><?= $linha->fim ?></td>
                                <td><?= $linha->descricao ?></td>
                                <td>
                                    <form method="post" action="">
                                        <input type="hidden" name="id" value="<?= $linha->idformacaoAcademica ?>">
                                        <button name="btnDelFormacao" class="w3-button w3-red w3-round-large">Excluir</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p class="w3-margin" style="width:70%;">Nenhuma formação cadastrada.</p>
            <?php endif; ?>
        </div>


        <!-------------------------------------------- experiencia profissionalç -->
     <br><br>
<div class="w3-padding-128 w3-content w3-text-grey" id="eProfissional">
    <h2 class="w3-text-cyan">Experiência Profissional</h2>

    <form action="../Controller/Navegacao.php" method="post"
        class="w3-container w3-card-4 w3-light-grey w3-text-blue w3-padding"
        style="width: 100%;">

        <div class="w3-row w3-center">
            <div class="w3-col" style="width:50%;">Data Inicial</div>
            <div class="w3-col" style="width:50%;">Data Final</div>
        </div>

        <div class="w3-row w3-section">
            <div class="w3-row w3-section w3-col" style="width:45%;">
                <div class="w3-col" style="width:15%;">
                    <i class="w3-xxlarge fa fa-calendar"></i>
                </div>
                <div class="w3-rest">
                    <input class="w3-input w3-border w3-round-large" name="txtInicioEP" type="date" required>
                </div>
            </div>

            <div class="w3-row w3-section w3-rest">
                <div class="w3-col w3-margin-left" style="width:13%;">
                    <i class="w3-xxlarge fa fa-calendar"></i>
                </div>
                <div class="w3-rest">
                    <input class="w3-input w3-border w3-round-large" name="txtFimEP" type="date" required>
                </div>
            </div>
        </div>

        <div class="w3-row w3-section">
            <div class="w3-col" style="width:7%;">
                <i class="w3-xxlarge fa fa-align-justify"></i>
            </div>
            <div class="w3-rest">
                <input class="w3-input w3-border w3-round-large" name="txtEmpEP" type="text"
                    placeholder="Centro Paula Souza" required>
            </div>
        </div>

        <div class="w3-row w3-section">
            <div class="w3-col" style="width:7%;">
                <i class="w3-xxlarge fa fa-align-justify"></i>
            </div>
            <div class="w3-rest">
                <input class="w3-input w3-border w3-round-large" name="txtDescEP" type="text"
                    placeholder="Descrição: Ex.: Técnico em Desenvolvimento de Sistemas - Desenvolvimento de Páginas WEB"
                    required>
            </div>
        </div>

        <div class="w3-row w3-section">
            <div class="w3-center" style="width:100%;">
                <button name="btnAddEP" class="w3-button w3-blue w3-round-large" style="width: 15%;">
                    <i class="w3-xxlarge fa fa-user-plus"></i>
                </button>
            </div>
        </div>
    </form>

    <!-- tabela experiencia -->
    <?php
    require_once '../Controller/ExperienciaProfissionalController.php';
    if (!isset($_SESSION)) {
        session_start();
    }
    $usuario = unserialize($_SESSION["Usuario"]);
    $experiencias = (new ExperienciaProfissionalController())->gerarLista($usuario->getID());

    if ($experiencias->num_rows > 0): ?>
        <table class="w3-table w3-bordered w3-striped w3-centered w3-margin-top">
            <thead>
                <tr class="w3-blue">
                    <th>Início</th>
                    <th>Fim</th>
                    <th>Empresa</th>
                    <th>Descrição</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($linha = $experiencias->fetch_object()): ?>
                    <tr>
                        <td><?= $linha->inicio ?></td>
                        <td><?= $linha->fim ?></td>
                        <td><?= $linha->empresa ?></td>
                        <td><?= $linha->descricao ?></td>
                        <td>
                            <form method="post" action="../Controller/Navegacao.php">
                                <input type="hidden" name="idEP" value="<?= $linha->idexperienciaprofissional ?>">
                                <button name="btnExcluirEP" class="w3-button w3-red w3-round-large">Excluir</button>
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="w3-margin" style="width:70%;">Nenhuma experiência profissional cadastrada.</p>
    <?php endif; ?>




            <!-------------------------------------------------------------- outras formações -->
            <br><br>
            <div class="w3-padding-128 w3-content w3-text-grey" id="outrasformacoes">
                <h2 class="w3-text-cyan">Outras Formações</h2>

                <form action="" method="post"
                    class="w3-container w3-card-4 w3-light-grey w3-text-blue w3-padding"
                    style="width: 100%;">

                    <!-- Rótulos -->
                    <div class="w3-row w3-center">
                        <div class="w3-col" style="width:50%;">Data Inicial</div>
                        <div class="w3-col" style="width:50%;">Data Final</div>
                    </div>

                    <!-- Datas -->
                    <div class="w3-row w3-section">
                        <!-- Início -->
                        <div class="w3-row w3-section w3-col" style="width:45%;">
                            <div class="w3-col" style="width:15%;">
                                <i class="w3-xxlarge fa fa-calendar"></i>
                            </div>
                            <div class="w3-rest">
                                <input class="w3-input w3-border w3-round-large" name="txtInicioOF" type="date" required>
                            </div>
                        </div>

                        <!-- Fim -->
                        <div class="w3-row w3-section w3-rest">
                            <div class="w3-col w3-margin-left" style="width:13%;">
                                <i class="w3-xxlarge fa fa-calendar"></i>
                            </div>
                            <div class="w3-rest">
                                <input class="w3-input w3-border w3-round-large" name="txtFimOF" type="date" required>
                            </div>
                        </div>
                    </div>

                    <!-- Descrição -->
                    <div class="w3-row w3-section">
                        <div class="w3-col" style="width:7%;">
                            <i class="w3-xxlarge fa fa-align-justify"></i>
                        </div>
                        <div class="w3-rest">
                            <input class="w3-input w3-border w3-round-large" name="txtDescOF" type="text"
                                placeholder="Ex.: Curso de Inglês - Inglês City" required>
                        </div>
                    </div>

                    <!-- botão adicionar outras formações -->
                    <div class="w3-row w3-section" style="margin-bottom: 0;">
                        <div class="w3-center" style="width:100%;">
                            <button name="btnAddOF" class="w3-button w3-blue w3-round-large" style="width: 15%;">
                                <i class="w3-xxlarge fa fa-user-plus"></i>
                            </button>
                        </div>
                    </div>

                </form>

                <!-- tabela outras formações -->
                <?php
                require_once '../Model/OutrasFormacoes.php';
                $usuario = unserialize($_SESSION["Usuario"]);
                $formacoes = (new OutrasFormacoes())->listaFormacoes($usuario->getID());

                if ($formacoes && $formacoes->num_rows > 0): ?>
                    <table class="w3-table-all w3-centered">
                        <thead>
                            <tr class="w3-blue">
                                <th>Início</th>
                                <th>Fim</th>
                                <th>Descrição</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($linha = $formacoes->fetch_object()): ?>
                                <tr>
                                    <td><?= $linha->inicio ?></td>
                                    <td><?= $linha->fim ?></td>
                                    <td><?= $linha->descricao ?></td>
                                    <td>
                                        <form method="post" action="">
                                            <input type="hidden" name="idOF" value="<?= $linha->idoutrasformacoes ?>">
                                            <button name="btnDelOF" class="w3-button w3-red w3-round-large">Excluir</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <p class="w3-margin">Nenhuma outra formação cadastrada.</p>
                <?php endif; ?>



            </div>
        </div>

</body>

</html>