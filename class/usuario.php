<?php
class  Usuario {
    private $idusuario;
    private $nome;
    private $sobrenome;

    

    public function getIdusuario()
    {
        return $this->idusuario;
    }

    public function setIdusuario($idusuario)
    {
        $this->idusuario = $idusuario;

        return $this;
    }

    public function getSobrenome()
    {
        return $this->sobrenome;
    }

    public function setSobrenome($sobrenome)
    {
        $this->sobrenome = $sobrenome;

        return $this;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    public function __construct($nome = "", $sobrenome = "") {
        $this->setNome($nome);
        $this->setSobrenome($sobrenome);
    }

    public function loadById($id) {
        $sql = new Sql();

        $result = $sql->select("SELECT * FROM tb_usuario WHERE idusuario = :ID", array(
            ":ID"=>$id
        ));

        if (count($result) > 0) {

            $this->setData($result[0]);
        }
    }

    public function __toString() {
        return json_encode(array(
            "idusuario"=>$this->getIdusuario(),
            "nome"=>$this->getNome(),
            "sobrenome"=>$this->getSobrenome()
        ));
    }

    public static function getLista() {
        $sql = new Sql();

        return $sql->select("SELECT * FROM tb_usuario ORDER BY idusuario");
    }

    public static function search($sobrenome) {
        $sql = new Sql();

        return $sql->select("SELECT * FROM tb_usuario WHERE nome LIKE :SEARCH ORDER BY nome", array(
            ':SEARCH'=>"%".$sobrenome."%"
        ));
    }

    public function insert() {
        $sql = new Sql();

        $result = $sql->select("CALL sp_usuario_insert(:NOME, :SOBRENOME)", array(
            ':NOME'=>$this->getNome(),
            ':SOBRENOME'=>$this->getSobrenome()
        ));

        if (count($result) > 0) {
            $this->setData($result[0]);
        }
    }

    public function setData($data) {
        $this->setIdusuario($data['idusuario']);
        $this->setNome($data['nome']);
        $this->setSobrenome($data['sobrenome']);
    }

    public function update($nome, $sobrenome) {
        $this->setNome($nome);
        $this->setSobrenome($sobrenome);

        $sql = new Sql();

        $sql->query("UPDATE tb_usuario SET nome = :NOME, sobrenome = :SOBRENOME WHERE idusuario = :ID", array(
            ':NOME'=>$this->getNome(),
            ':SOBRENOME'=>$this->getSobrenome(),
            ':ID'=>$this->getIdusuario()
        ));
    }

}


?>