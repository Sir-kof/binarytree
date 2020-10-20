<?php

namespace BinaryTree\src\DataStructures\Binary;



class Tree implements \Iterator
{
    protected $first = null, $last = null;
    
    private $iteratorNode = null;
    private $iteratorPosition = 0;
    
    public function push(Node $node)
    {
        if ( $this->count() ) {
            $top = $this->getLast();
            
            $top->right = $node;
            $node->left = $top;
            
        } else {
            $this->first = $node;
        }
        
        $this->last = $node;
        
        return $this;
    }
    
    public function count()
    {
        if ( !( $i_node = $this->first ) ) {
            return 0;
        }
        
        $i = 1;
        while ( $i_node = $i_node->right ) {
            $i++;
        }
        
        return $i;
    }
    
    public function getLast()
    {
        return $this->last;
    }
    
    public function getFirst()
    {
        return $this->first;
    }
    
    public function current()
    {
        return $this->iteratorNode;
    }
    
    public function key()
    {
        return $this->iteratorPosition;
    }
    
    public function next()
    {
        $this->iteratorNode = $this->iteratorNode->right;
        $this->iteratorPosition++;
    }
    
    public function rewind()
    {
        $this->iteratorNode = $this->first;
        $this->iteratorPosition = 0;
    }
    
    public function valid()
    {
        return (bool)( $this->iteratorNode );
    }
}

?>
