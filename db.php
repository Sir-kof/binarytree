<?php
require_once 'vendor/autoload.php';

$hostname = 'localhost';
$database = 'arvores';
$username = 'root';
$password = '';

$pdo = new PDO("mysql:dbname={$database};host={$hostname}", $username, $password);

/**
 * A ordem por ID é importante, pois garantimos a hierarquia da árvore.
 * Além disso fica evidente que o primeiro registro é o usuário raíz.
 */
$query = 'SELECT `id`, `nome`, `indicador` FROM `usuarios` ORDER BY `indicador`, `id` ASC';

$stmt = $pdo->query( $query, PDO::FETCH_CLASS, '\\BinaryTree\\src\\Entity\\Users' );

$root = $stmt->fetch();

/**
 * Agora alimentamos o raíz com seus nós-filhos
 */
while ( $node = $stmt->fetch() ) {
    $root->push( $node );
}

?>
