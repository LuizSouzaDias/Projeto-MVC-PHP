<?php
header("Content-type:text/html; charset=utf8");

require_once "ConexaoBD.php";
class Usuarios
{
    //atributos serao os campos da tabela
    public $id;
    public $nome;
    public $email;
    public $cpf;
    public $dtNasc;
    public $endereco;
    public $ddd;
    public $telefone;

    //metodo CRUD

    public function listar_todos(){                    //classe que ira listar todos os usuarios cadastrados
        try {
            $bd = new ConexaoBD();

            $lista = $bd->executeSelect("select * from usuario");

            return $lista;
        }catch (PDOException $msg){
            echo "Não foi póssivel listar os dados Produtos!" . $msg->getMessage();
        }
    }

    public function listarID(){                         //classe que ira listar apenas um usuario ( usado para carregar os dados na tela quando clicar em editar)
        try {
            $bd = new ConexaoBD();

            $this->id = $_POST["editar"];

            $lista = $bd->executeSelect("select * from usuario where id = '$this->id'");

            return $lista;
        }catch (PDOException $msg){
            echo "Não foi póssivel listar os dados Produtos!" . $msg->getMessage();
        }
    }

    public function apagarID(){                       //classe que ira apagar um usuario ( usado para deletar os dados de um usuario cadastrado)
        try {
            $bd = new ConexaoBD();

            $this->id = $_POST["deletar"];

            $comando_drop = ("delete from usuario where id = '$this->id'");
            
            return $bd->executeQuery($comando_drop);

        }catch (PDOException $msg){
            echo "Não foi póssivel apagar os dados Produtos!" . $msg->getMessage();
        }
    }

    public function inserir(){              //classe que ira cadastrar no sistema
        try{

            $this->nome = $_POST["nome"];
            $this->email = $_POST["email"];
            $this->cpf = $_POST["cpf"];
            $this->dtNasc = $_POST["birth"];
            $this->telefone = $_POST["phone"];
            $this->ddd = $_POST["ddd"];
            $this->endereco = $_POST["address"];

            $bd = new ConexaoBD();

            $comando_insert = "insert into usuario(id,nome,email,cpf,dtNasc,endereco,ddd,telefone) values (null,'$this->nome','$this->email','$this->cpf',CURDATE(),'$this->endereco','$this->ddd','$this->telefone')";

            return $bd->executeQuery($comando_insert);



        }catch(PDOException $msg){
            echo("Não foi possivel inserir este usuário: " . $msg);

        }
    }

    public function editar(){         //classe que ira editar um usuario cadstrado no sistema //terminar a classe
        try {
            $bd = new ConexaoBD();

            $this->id = $_POST["id"];            
            $this->nome = $_POST["nome"];
            $this->email = $_POST["email"];
            $this->cpf = $_POST["cpf"];

            var_dump($this->nome);
            var_dump($this->email);
            var_dump($this->cpf);
            var_dump($this->id);

            $comando_drop = ("update usuario set nome = '$this->nome', email = '$this->email', cpf = '$this->cpf' where id = '$this->id'");
            
            return $bd->executeQuery($comando_drop);

        }catch (PDOException $msg){
            echo "Não foi póssivel listar os dados Produtos!" . $msg->getMessage();
        }
    }


}