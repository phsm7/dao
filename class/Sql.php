<?php
 // classe Sql extende do PDO que é nativo do php ( bind param, execute, prepare, etc)
class Sql extends PDO {

  private $conn;

  // quando alguem chamar a classe new Sql, o construtor conectará
  // automaticamente no banco de dados
  public function __construct() {
    $this->conn = new PDO("mysql:host=localhost;dbname=pedroits","root","");
  }

  // funcao para setar parametros no db
  private function setParams($statement, $parameters = array()){
    // Associando os parâmetros
    foreach ($parameters as $key => $value) {
        $this->setParam($statement, $key, $value);
    }
  }

  private function setParam($statement, $key, $value) {
    $statement->bindParam($key, $value);
  }

  // funcao query executa um comando no banco de dados
  // rawQuery = nosso comando SQL
  public function query($rawQuery, $params = array())
  {
      $stmt = $this->conn->prepare($rawQuery);

      $this->setParams($stmt, $params);

      $stmt->execute();

      return $stmt;
  }

  public function select($rawQuery, $params=array()):array {
    $stmt = $this->query($rawQuery, $params);
    // FETCH ASSOC PEGA SOMENTE OS DADOS ASSOCIATIVOS SEM OS INDEX
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }


}


?>
