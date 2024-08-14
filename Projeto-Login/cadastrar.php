<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário</title>
    <link rel="stylesheet" href="./assets/register.css">
</head>
<body>

    <div id="content-register">
    <div id="showcase-register">

        <img src="../Projeto-Login/Img/6310507-removebg-preview.png" alt="foto">

    </div>
        <form action="" method="POST">
        <h2 class="h2-text">Cadastro de Usuário</h2>
            <label for="nome">Nome:</label> 
            <input class="input-nome" type="text" id="nome" name="nome" required><br><br>
        
            <label for="email">Email:</label>
            <input class="input-email" type="email" id="email" name="email" required><br><br>
        
            <label for="senha">Senha:</label>
            <input class="input-password" type="password" id="senha" name="senha" required><br><br>
            <label for="sobrenome">Sobrenome:</label>
            <input class="input-sobrenome" type="text" id="sobrenome" name="sobrenome" required><br><br>
            <input class="register-button" type="submit" value="Cadastrar">
        </form>
    </div>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

       include('conexao.php');
        $mysqli = new mysqli($host, $usuario, $senha, $database);

        if ($mysqli->connect_error) {
            die("Falha na conexão: " . $mysqli->connect_error);
        }

        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $sobrenome = $_POST['sobrenome'];
        $senha = $_POST['senha']; 

        $sql = "INSERT INTO usuarios (nome, email, senha, sobrenome) VALUES ('$nome', '$email', '$senha', '$sobrenome')";

        if ($mysqli->query($sql) === TRUE) {
            echo "Novo usuário cadastrado com sucesso!";
        } else {
            echo "Erro: " . $sql . "<br>" . $mysqli->error;
        }

        $mysqli->close();

        header('Location: index.php');
       
    }
    ?>
</body>
</html>