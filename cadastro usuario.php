<?php 


$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'evento';
$conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if($conexao->connect_errno)
    echo"erro";


if( isset($_POST['submit'])){
    echo 'valores enviados';

    

    if(
        isset($_POST["firstname"]) &&
        isset($_POST["lastname"]) &&
        isset($_POST["date"]) &&
        isset($_POST["number"]) &&
        isset($_POST["gender"]) 
        ){
         $nome = $_POST["firstname"];
            $sobrenome = $_POST["lastname"];
            $nascimento = $_POST["date"];
            $celular = $_POST["number"];
            $genero = $_POST["gender"];
            echo $nome, $sobrenome, $nascimento, $celular, $genero;
            
            $sql = "INSERT INTO pessoa(nome, sobrenome, nascimento, celular, genero) VALUES('$nome', '$sobrenome', '$nascimento', '$celular', '$genero')";
        $stmt = mysqli_stmt_init($conexao);

        if(!mysqli_stmt_prepare($stmt, $sql))
            exit('SQL error');
      
        mysqli_stmt_execute($stmt);
        mysqli_close($conexao);
        }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cadastro cosplay.css">
    <title>CADASTRO USUÁRIO</title>
</head>

<body>
    <div class="container">
        <div class="form-image">
            <img src="img_cadastro/personagem 3.png" alt="">
        </div>
        <div class="form">
            <form  method="POST">
                <div class="form-header">
                    <div class="title">
                        <h1>Cadastre-se</h1>
                    </div>
                    <div class="login-button">
                        <button><a href="#">Login</a></button>
                    </div>
                </div>

                <div class="input-group">
                    <div class="input-box">
                        <label for="firstname">Primeiro Nome</label>
                        <input id="firstname" type="text" name="firstname" placeholder="Digite seu primeiro nome" required>
                    </div>

                    <div class="input-box">
                        <label for="lastname">Sobrenome</label>
                        <input id="lastname" type="text" name="lastname" placeholder="Digite seu sobrenome" required>
                    </div>
                    <div class="input-box">
                        <label for="number">Celular</label>
                        <input id="number" type="tel" name="number" placeholder="(xx) xxxx-xxxx" required>
                    </div>

                    <div class="input-box">
                        <label class="date" for="date">Data de Nascimento</label>
                        <input class="date" id="date" type="date" name="date" placeholder="Digite sua Data de Nascimento" required>
                    </div>
                </div>

                <div class="gender-inputs">
                    <div class="gender-title">
                        <h6>Gênero</h6>
                    </div>

                    <div class="gender-group">
                        <div class="gender-input">
                            <input id="female" type="radio" name="gender">
                            <label for="female">Feminino</label>
                        </div>

                        <div class="gender-input">
                            <input id="male" type="radio" name="gender">
                            <label for="male">Masculino</label>
                        </div>

                        <div class="gender-input">
                            <input id="others" type="radio" name="gender">
                            <label for="others">Outros</label>
                        </div>

                        <div class="gender-input">
                            <input id="none" type="radio" name="gender">
                            <label for="none">Prefiro não dizer</label>
                        </div>
                    </div>
                </div>

                <div class="continue-button">
                    <input type="submit" name="submit" value="Continuar">
                </div>
            </form>
        </div>
    </div>
</body>

</html>
