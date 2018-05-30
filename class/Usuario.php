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

  public static function getList(){
    $sql = new Sql();
    return $sql->select("SELECT * FROM usuario ORDER BY nome;");
  }

  public static function search($nome) {
    $sql = new Sql();
    return $sql->select(
      "SELECT * FROM usuario WHERE nome LIKE :SEARCH ORDER BY nome",
          array(
              ':SEARCH'=>"%" .$nome . "%"
          ));
  }

  public function login($nome, $senha) {

    $sql = new Sql();
    $results = $sql->select(
      "SELECT * FROM usuario WHERE nome = :NOME AND senha = :PASSWORD",
          array(
            ":NOME"=>$nome,
            ":PASSWORD"=>$senha
          ));

    if (isset($results[0])) {
      $row = $results[0];
      $this->setIdusuario($row['idusuario']);
      $this->setNome($row['nome']);
      $this->setSenha($row['senha']);
    } else {
      throw new Exception("Login e/ou senha inválidos.");
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
