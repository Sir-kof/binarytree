<?php
require_once 'vendor/autoload.php';
require_once 'db.php';

use Rain\RainTPL;

$app = new \Slim\App();

$app->get('/', function() {
    $tpl = new Rain\Tpl();
    var_dump($tpl);
    die;
    //return $tpl->draw("index");
    //echo 'blalbal';
});

$app->post('/insert', function($nome, $indicador) {
    var_dump($_POST);
    die;
    $insert = $pdo->prepare('INSERT INTO usuarios (nome, indicador) VALUES (:NOME, :INDICADOR)');

    $this->indicador = $_POST[''];
    $nome = "$nome, indicado pelo usuário $indicador";

    $insert->bindParam(":NOME", $nome);
    $insert->bindParam(":INDICADOR", $indicador);

    $insert->execute();
    echo "Inserido, recarrege a página.";
});

$app->delete('/delete', function() {
    $delete = $pdo->prepare('DELETE FROM usuarios');
    $delete->execute();
    echo "Apagado, recarrege a página.";
});

$app->run();

?>
