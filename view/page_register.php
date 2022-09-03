<?php
header('Content-Type: text/html; charset=utf-8');     //aceitar acento php
require_once("../model/Usuarios.php");
$Usuarios = new Usuarios();

if( isset($_POST['salvar'])){
    $result = $Usuarios->inserir();

    if($result == '1'){
        header("location: ../index.php");
    }
}

if( isset($_POST['deletar'])){
    $result = $Usuarios->apagarID();

    if($result == '1'){
        header("location: ../index.php");
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projeto CRUD</title>

    <!-- icone na janela do navegador-->
    <link rel="shortcut icon" href="../resources/favicon.png" type="image/x-icon">

    <!-- bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"/>

    <!-- icones do botstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet" />

    <!-- google fonts OpenSans -->
    <link href="fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet"/>

    <!-- style css -->

    <style type="text/css">
        body{
            margin: 20px;
            background-color: whitesmoke;
        }

        *{
            font-family: 'Open Sans', sans-serif;
        }

        h2{
            font-family: 'Open Sans', sans-serif;
        }

        .thead{
            background-color: #f7f7f7;
        }
    </style>

</head>
<body>
    
    <div class="container">
        <h2 class="py-3 text-center">Novo Usuário <i></i></h2>

        <form method="POST" action="page_register.php">
            <div class="row g-3">

                <div class="col-md-6">
                    <label for="nome" class="form-label">Nome <i class="bi bi-person"></i></label>
                    <input type="text" class="form-control" name="nome" required autofocus>
                </div>

                <div class="col-md-6">
                    <label for="email" class="form-label">Email <i class="bi bi-envelope"></i></label>
                    <input type="email" class="form-control" name="email" required>
                </div>

                <div class="col-md-4">
                    <label for="cpf" class="form-label">CPF <i class="bi bi-credit-card-2-front"></i></label>
                    <input type="text" class="form-control" name="cpf" required>
                </div>

                <div class="col-md-4">
                    <label for="birth" class="form-label">Dt de Nascimento <i class="bi bi-calendar"></i></label>
                    <input type="date" class="form-control" name="birth">
                </div>

                <div class="col-md-1">
                    <label for="ddd" class="form-label">DDD <i class="bi bi-whatsapp"></i></label>
                    <input type="text" class="form-control" name="ddd">
                </div>

                <div class="col-md-3">
                    <label for="phone" class="form-label">Telefone <i class="bi bi-whatsapp"></i></label>
                    <input type="text" class="form-control" name="phone">
                </div>

                <div class="col-md-12">
                    <label for="address" class="form-label">Endereço <i class="bi bi-map"></i></label>
                    <input type="text" class="form-control" name="address">
                </div>

                <hr class="my-4">

                <div class="col-md-12 text-end">
                    <button class="btn btn-primary btn-lg" type="submit" name="salvar">Cadastrar</button>
                    <a href="../index.php" class="btn btn-success btn-lg">Cancelar</a>
                </div>

            </div>
        </form>
    </div>

<!-- Jquery e JqueryMask    -->

</body>
</html>