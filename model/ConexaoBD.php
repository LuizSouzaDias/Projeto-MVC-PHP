<?php
//classe -> uma estrutura de um obj contendo atributos e metodos
class ConexaoBD
{

    //atributos

    private $server = "localhost";
    private $bd = "teste_poo_php";
    private $user = "root";
    private $password = "";
    private $conn = "";      //atributo para receber a conexao


    //metodos

    //metodo conectar

    public function __construct()
    {
        //criar conexao com mysql utilizando a classe PDO (mais nova), mysqli ( mais velha/não utilizada)
        try {
            $this->conn = new PDO("mysql: host ={$this->server}; dbname={$this->bd};charset-uft8", $this->user, $this->password);

        } catch (PDOException $msg) {
            echo "Não foi possível conectar com o servidor: " . $msg->getMessage();
        }
    }

    public function executeQuery($comando){
        try {
            $sql = $this->conn->prepare($comando);

            $sql->execute();

            if ($sql->rowCount() > 0) {
                return "1";
            } else {
                return $sql->errorInfo();
            }

        } catch (PDOException $msg){
            echo "Não foi possível conectar com o servidor: " . $msg->getMessage();
        }
    }

    public function executeSelect($comando){
        try {
            $sql = $this->conn->prepare($comando);

            $sql->execute();

            if ($sql->rowCount() > 0){

                return $sql->fetchAll(PDO::FETCH_CLASS) ;

            }else{
                return "0";
            }

        }catch (PDOException $msg){
            echo "Não foi possivel conectar com o servidor: " . $msg->getMessage();
        }
    }



}

?>