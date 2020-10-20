<?php
namespace BinaryTree\src\DataStructures\MultipleChildren;

use BinaryTree\src\DataStructures\Binary;

class Node extends Binary\Node
{
    public $id, $parent_id;
    public $parent;
    public $children;
    
    public function push(Node $node)
    {
        $node->parent = $this->getNodeParent( $node );
        $parent_children =& $node->parent->children;
        
        if ( !$parent_children ) {
            $parent_children = new Binary\Tree;
        }
        
        $parent_children->push( $node );
    }
    
    public function isParentOf(Node $node)
    {
        return $this->id === $node->parent_id;
    }
    
    public function getNodeParent(Node $node)
    {
        if ( $this->isParentOf( $node ) ) {
            return $this;
        }
        
        if ( $this->children ) {
            foreach ( $this->children as $child ) {
                if ( $parent = $child->getNodeParent( $node ) ) {
                    return $parent;
                }
            }
        }
    }
    
    public function isLastOfLast()
    {
        if ( ( $node = $this )->children ) {
            return false;
        }
        
        do {
            if ( !$node->parent ) {
                return !$node->right;
            }
            
            if ( $node->parent->children->getLast() !== $node ) {
                return false;
            }
            
        } while ( $node = $node->parent );
        
        return true;
    }
}

?>
