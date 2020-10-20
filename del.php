<?php
require_once 'vendor/autoload.php';
require_once 'db.php';

if (count($_POST)) {

function delete() {
    $hostname = 'localhost';
    $database = 'arvores';
    $username = 'root';
    $password = '';

    $pdo = new PDO("mysql:dbname={$database};host={$hostname}", $username, $password);

    $delete = $pdo->prepare('DELETE FROM usuarios');
    $delete->execute();
    echo "Apagado, recarrege a página.";
}
delete();
echo "Apagado, recarrege a página.";
header('Location: /index.php');

}
?>
