<?php

namespace BinaryTree\src\DataStructures\Binary;

abstract class Node
{
    public $left = null, $right = null;
    
    final public function isLastNode()
    {
        return !$this->right;
    }
    
    final public function isFirstNode()
    {
        return !$this->left;
    }
}

?>
