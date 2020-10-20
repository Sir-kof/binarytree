<?php
require_once 'vendor/autoload.php';
require_once 'db.php';


$hostname = 'localhost';
$database = 'arvores';
$username = 'root';
$password = '';

$pdo = new PDO("mysql:dbname={$database};host={$hostname}", $username, $password);

if (count($_POST)) {

    function insert() {
        $hostname = 'localhost';
        $database = 'arvores';
        $username = 'root';
        $password = '';

        $pdo = new PDO("mysql:dbname={$database};host={$hostname}", $username, $password);
        $user = $_POST["usuario"];
        $usuarioIndicador = $_POST["usuarioIndicador"];
        
        $insert = $pdo->prepare('INSERT INTO usuarios (nome, indicador) VALUES (:NOME, :INDICADOR)');
        
        $nome = "$user, indicado pelo usuário $usuarioIndicador";

        $insert->bindParam(":NOME", $user);
        $insert->bindParam(":INDICADOR", $usuarioIndicador);

        $insert->execute();
    }

    insert();
    echo "Inserido...";
    header('Location: /index.php');
}
?>