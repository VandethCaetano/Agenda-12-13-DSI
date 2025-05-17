<?php
class ExperienciaProfissional {
    private $idexperienciaprofissional;
    private $descricao;
    private $empresa;
    private $fim;
    private $idusuario;
    private $inicio;

    public function setId($id) { $this->idexperienciaprofissional = $id; }
    public function getId() { return $this->idexperienciaprofissional; }

    public function setDescricao($d) { $this->descricao = $d; }
    public function getDescricao() { return $this->descricao; }

    public function setEmpresa($e) { $this->empresa = $e; }
    public function getEmpresa() { return $this->empresa; }

    public function setFim($f) { $this->fim = $f; }
    public function getFim() { return $this->fim; }

    public function setIdUsuario($i) { $this->idusuario = $i; }
    public function getIdUsuario() { return $this->idusuario; }

    public function setInicio($i) { $this->inicio = $i; }
    public function getInicio() { return $this->inicio; }

    // Inserir no banco
    public function inserirBD() {
        require_once 'ConexaoBD.php';
        $con = new ConexaoBD();
        $conn = $con->conectar();

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO experienciaprofissional (inicio, fim, empresa, descricao, idusuario)
                VALUES ('{$this->inicio}', '{$this->fim}', '{$this->empresa}', '{$this->descricao}', '{$this->idusuario}')";

        if ($conn->query($sql) === true) {
            $this->idexperienciaprofissional = mysqli_insert_id($conn);
            $conn->close();
            return true;
        } else {
            $conn->close();
            return false;
        }
    }

    // Excluir
    public function excluirBD($id) {
        require_once 'ConexaoBD.php';
        $con = new ConexaoBD();
        $conn = $con->conectar();

        $sql = "DELETE FROM experienciaprofissional WHERE idexperienciaprofissional = {$id}";
        $res = $conn->query($sql);
        $conn->close();
        return $res;
    }

    // Listar
    public function listaExperiencias($idusuario) {
        require_once 'ConexaoBD.php';
        $con = new ConexaoBD();
        $conn = $con->conectar();

        $sql = "SELECT * FROM experienciaprofissional WHERE idusuario = {$idusuario}";
        return $conn->query($sql);
    }
}
?>
