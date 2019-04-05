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

    public function loadById($id) {
        $sql = new Sql();

        $result = $sql->select("SELECT * FROM tb_usuario WHERE idusuario = :ID", array(
            ":ID"=>$id
        ));

        if (count($result) > 0) {
            $row = $result[0];

            $this->setIdusuario($row['idusuario']);
            $this->setNome($row['nome']);
            $this->setSobrenome($row['sobrenome']);
        }
    }

    public function __toString() {
        return json_encode(array(
            "idusuario"=>$this->getIdusuario(),
            "nome"=>$this->getNome(),
            "sobrenome"=>$this->getSobrenome()
        ));
    }
}


?>