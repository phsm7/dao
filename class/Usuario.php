<?php

class Usuario {
  private $idusuario;
  private $nome;
  private $senha;

  public function getIdusuario(){
    return $this->idusuario;
  }

  public function setIdusuario($value){
    $this->idusuario = $value;
  }

  public function getNome(){
    return $this->nome;
  }

  public function setNome($value){
    $this->nome = $value;
  }

  public function getSenha(){
    return $this->senha;
  }

  public function setSenha($value){
    $this->senha = $value;
  }

  public function loadById($id){
    $sql = new Sql();
    $results = $sql->select(
      "SELECT * FROM usuario WHERE idusuario = :ID",
          array(
            ":ID"=>$id
          ));

    if (isset($results[0])) {
      $row = $results[0];
      $this->setIdusuario($row['idusuario']);
      $this->setNome($row['nome']);
      $this->setSenha($row['senha']);
    }
  }

  public function __toString() {
    return json_encode(array(
      "idusuario"=>$this->getIdusuario(),
      "nome"=>$this->getNome(),
      "senha"=>$this->getSenha()
    ));
  }
}

?>
