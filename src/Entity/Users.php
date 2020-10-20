<?php
namespace BinaryTree\src\Entity;

use BinaryTree\src\DataStructures\MultipleChildren\Node;

class Users extends Node
{
    public $id;
    public $nome;
    public $indicador;
    
    public function __construct()
    {
        $this->parent_id = $this->indicador;
    }

    public function __toString()
    {
        return "#{$this->id} ({$this->nome})";
    }
}

?>
