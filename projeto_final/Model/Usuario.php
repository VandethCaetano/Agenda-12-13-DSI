<?php
class Usuario
{
    // ATRIBUTOS
    private $id;
    private $nome;
    private $cpf;
    private $email;
    private $dataNascimento;
    private $senha;

    // ID
    public function setID($id) {
        $this->id = $id;
    }

    public function getID() {
        return $this->id;
    }

    // Nome
    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getNome() {
        return $this->nome;
    }

    // CPF
    public function setCPF($cpf) {
        $this->cpf = $cpf;
    }

    public function getCPF() {
        return $this->cpf;
    }

    // Email
    public function setEmail($email) {
        $this->email = $email;
    }

    public function getEmail() {
        return $this->email;
    }

    // Data de Nascimento
    public function setDataNascimento($dataNascimento) {
        $this->dataNascimento = $dataNascimento;
    }

    public function getDataNascimento() {
        return $this->dataNascimento;
    }

    // Senha
    public function setSenha($senha) {
        $this->senha = $senha;
    }

    public function getSenha() {
        return $this->senha;
    }

    // INSERIR no Banco de Dados
    public function inserirBD() {
        require_once 'ConexaoBD.php';
        $con = new ConexaoBD();
        $conn = $con->conectar();

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO usuario (nome, cpf, email, senha)
                VALUES ('".$this->nome."', '".$this->cpf."', '".$this->email."', '".$this->senha."')";

        if ($conn->query($sql) === TRUE) {
            $this->id = mysqli_insert_id($conn);
            $conn->close();
            return true;
        } else {
    echo "Erro ao inserir: " . $conn->error; // Mostra o erro real
    $conn->close();
    return false;
}
    }

    // CARREGAR usuário pelo CPF
    public function carregarUsuario($cpf) {
        require_once 'ConexaoBD.php';
        $con = new ConexaoBD();
        $conn = $con->conectar();

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM usuario WHERE cpf = '".$cpf."'";
        $re = $conn->query($sql);
        $r = $re->fetch_object();

        if ($r != null) {
            $this->id = $r->idusuario;
            $this->nome = $r->nome;
            $this->email = $r->email;
            $this->cpf = $r->cpf;
            $this->dataNascimento = $r->dataNascimento;
            $this->senha = $r->senha;
            $conn->close();
            return true;
        } else {
            $conn->close();
            return false;
        }
    }

    // ATUALIZAR no Banco de Dados
    public function atualizarBD() {
        require_once 'ConexaoBD.php';
        $con = new ConexaoBD();
        $conn = $con->conectar();

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "UPDATE usuario SET 
                    nome = '".$this->nome."',
                    cpf = '".$this->cpf."',
                    dataNascimento = '".$this->dataNascimento."',
                    email = '".$this->email."'
                WHERE idusuario = '".$this->id."'";

        if ($conn->query($sql) === TRUE) {
            $conn->close();
            return true;
        } else {
            $conn->close();
            return false;
        }
    }
}
?>
