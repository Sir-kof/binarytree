<?php
require_once 'vendor/autoload.php';
require_once 'db.php';
require_once 'actions.php';
//require_once 'del.php';

//var_dump($root);
        //die;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Árvore Binária</title>
</head>
<style>

    #tree {
        background: #eee;
        margin-top: 50px;
        border-radius: 4px;
        display: flex;
        flex-direction: row;
        min-height: 300px;
        align-items: center;
        justify-content: center;
    }

    #treeInSide {
        align-items: center;
        justify-content: center;
        padding: 20px 20px;
    }

    #insert {
        background: #eee;
        display: flex;
        flex-direction: row;
        border-radius: 4px;
    }

    #usuario {
        flex: 1;
        border: 1px solid #eee;
        padding: 10px 15px;
        border-radius: 4px;
        font-size: 16px;
    }

    #usuarioIndicador {
        flex: 1;
        border: 1px solid #eee;
        padding: 10px 15px;
        border-radius: 4px;
        font-size: 16px;
    }

    #top {
        background: #eee; 
        height: 150px;
        border-radius: 4px;
        align-items: center;
        justify-content: center;
        margin-top: 50px;
    }

    #topInSide {
        padding: 50px 35px;
    }

    .img {
        width: 36px;
        height: 36px;
        border: 1px solid #eee;
        border-radius: 50%;
    }
</style>
<body style="background:#7159c1;">
    <div class="container">
        <div id="top">
            <form action="del.php" method="post">
                <button type="submit" style="margin: 5px 30px;" class="btn btn-danger">Apagar toda a arvore</button>
            </form>
            <div id="topInSide">
                <form id="insert" action="actions.php" method="post">
                        <input id="usuario" name="usuario" type="text" placeholder="Digite o seu nome de usuário">
                        <input id="usuarioIndicador" name="usuarioIndicador" type="text" placeholder="Digite o nome do usuário que indicou você">
                        <button type="submit" style="border-radius:4px; margin-left: 20px;" class="btn btn-primary">Enviar</button>
                </form>
            </div>
        </div>


        <div id="tree">
            <div id="treeInSide">
            <?php
            if ($root) {
            echo '<pre>' . BinaryTree\src\Helper\Stringifier::parseOneParentMultipleChildrenHierarchy( $root ) . '</pre>';
            } else {
                echo 'Você ainda não construiu uma árvore';
            }
            /*
                echo "
                <div>
                    <img class='img' src='/img/emptyUser.jpg' /> $root->nome é o usuário raíz</br>
                </div>
                ";

                foreach ($root as $key => $value) {
                    echo "
                    <div>
                        <img class='img' src='/img/emptyUser.jpg' /> $value->nome foi indicado pelo usuario $value->indicador</br>
                    </div>
                    ";
                }*/
            ?>
            </div>
        </div>
    </div>
</body>
</html>