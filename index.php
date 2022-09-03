<?php
header('Content-Type: text/html; charset=utf-8');

require_once("model/Usuarios.php");

$Usuarios = new Usuarios();

$listaUsuarios = $Usuarios->listar_todos();

//var_dump($listaUsuarios);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projeto CRUD</title>

    <!-- icone na janela do navegador-->
    <link rel="shortcut icon" href="resources/img/favicon.png" type="image/x-icon">

    <!-- bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"/>

    <!-- icones do botstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet" />

    <!-- google fonts OpenSans -->
    <link href="fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet"/>

    <!-- style css -->
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
    
    <div class="container">
        <h2 class="text-center">Lista de Clientes <i class="bi bi-people-fill"></i></h2>

        <h5 class="text-end">
            <a href="view/page_register.php" class="btn btn-primary">
                <i class="bi bi-person-plus-fill"></i>
            </a>
        </h5>
        
        <div class="table responsive">
            <table class="table table-hover">

                <thead class="thead">                          <!-- thead = tag usada para titulo das tabelas, nesse caso a tag <th> tbm tem que ser usada-->
                    <tr>
                        <th>ID</th>
                        <th>NOME</th>
                        <th>E-MAIL</th>
                        <th>CPF</th>
                        <th>DT DE NASCIMENTO</th>
                        <th>ENDERECO</th>
                        <th>DDD</th>
                        <th>TELEFONE</th>
                        <th colspan="3" >AÇÕES</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($listaUsuarios as $usuario){ ?>
                    <tr>
                        <td><?php echo $usuario->id ?></td>                               <!-- tbody = info das tabelas, nesse caso o td é usado    ( tag tr nao muda, sempre representa a linha )-->
                        <td><?php echo $usuario->nome ?></td>
                        <td><?php echo $usuario->email ?></td>
                        <td><?php echo $usuario->cpf ?></td>
                        <td><?php echo $usuario->dtNasc ?></td>
                        <td><?php echo $usuario->endereco ?></td>
                        <td><?php echo $usuario->ddd ?></td>
                        <td><?php echo $usuario->telefone ?></td>
                        <td>
                            <form action="view/page_edit.php" method="POST">
                                <button class="btn btn-warning btn-xs" value="<?php echo $usuario->id ?>" name="editar" type="submit"> 
                                    <i class="bi bi-pencil-square"></i>
                                </button>
                            </form>
                        </td>
                        <td>
                            <form action="view/page_register.php" method="POST" onclick="return confirm('Você tem certeza que quer excluir?');">
                                <button class="btn btn-danger btn-xs" value="<?php echo $usuario->id  ?>" type="submit" name="deletar">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>