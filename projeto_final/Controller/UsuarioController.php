<?php

if (!isset($_SESSION)) {
    session_start();
}

// Controle dados usuário
class UsuarioController
{

    public function inserir($nome, $cpf, $email, $senha)
    {
        require_once '../Model/Usuario.php';

        $usuario = new Usuario();
        $usuario->setNome($nome);
        $usuario->setCPF($cpf);
        $usuario->setEmail($email);
        $usuario->setSenha($senha);

        $r = $usuario->inserirBD();

        $_SESSION['Usuario'] = serialize($usuario);

        return $r;
    }

    // Controle login
    public function login($cpf, $senha)
    {
        require_once '../Model/Usuario.php';

        $usuario = new Usuario();
        $resultado = $usuario->carregarUsuario($cpf);

        if (!$resultado) {
            echo "Usuário não encontrado com o CPF: " . $cpf;
            return false;
        }

        $verSenha = $usuario->getSenha();

        if ($senha == $verSenha) {
            $_SESSION['Usuario'] = serialize($usuario);
            return true;
        } else {
            echo "⚠️ Senha incorreta.<br>Digitada: $senha<br>Esperada: $verSenha";
            return false;
        }
    }
    // Controle atualizar
    public function atualizar($id, $nome, $cpf, $email, $dataNascimento)
    {
        require_once '../Model/Usuario.php';

        $usuario = new Usuario();
        $usuario->setID($id);
        $usuario->setNome($nome);
        $usuario->setCPF($cpf);
        $usuario->setEmail($email);
        $usuario->setDataNascimento($dataNascimento);

        return $usuario->atualizarBD();
    }
}
