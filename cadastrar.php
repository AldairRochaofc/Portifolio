<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário</title>
</head>
<body>
    <h2>Cadastro de Usuário</h2>
    <form action="" method="POST"> 
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required><br><br>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        
        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required><br><br>

        <label for="sobrenome">Sobrenome:</label>
        <input type="text" id="sobrenome" name="sobrenome" required><br><br> 

        <input type="submit" value="Cadastrar">
    </form>

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
        exit(); 
    }
    ?>
</body>
</html>