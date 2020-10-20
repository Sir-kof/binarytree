<?php
namespace BinaryTree\src\Helper;

use BinaryTree\src\DataStructures\MultipleChildren\Node;

abstract class Stringifier
{
    public static function parseOneParentMultipleChildrenHierarchy(Node $node, $hierarchy_level = 0): string
    {
        $last_of_last = $node->isLastOfLast();
        $str = $last_of_last ? '&boxUR;' : ( $node->parent ? '&boxVR;' : '&boxDR;' );
        
        $spaces = implode(
            $last_of_last ? '&boxHU;' : '&boxVH;',
            array_fill( 0, $hierarchy_level, str_repeat( '&boxH;', 4 ) )
        );
        
        $pointer_char = self::getFinalConnectorChar( $node );
        $indent = function ($string) use ($spaces, $pointer_char) {
            return $spaces . $pointer_char . '&boxH;&#9658; ' . $string;
        };
        
        $str .= $indent( (string)$node . "\n" );
        
        if ( $node->children ) {
            ++$hierarchy_level;
            foreach ( $node->children as $child ) {
                $str .= self::parseOneParentMultipleChildrenHierarchy( $child, $hierarchy_level );
            }
        }
        
        return $str;
    }
    
    private static function getFinalConnectorChar(Node $node)
    {
        if ( !$node->parent ) {
            return '';
        }
        
        $siblings = $node->parent->children;
        if ( $siblings->getFirst() === $siblings->getLast() ) {
            return '';
        }
        
        if ( $node->left ) {
            if ( $node->right ) {
                return '&boxVH;';
            } else {
                return '&boxVH;';
            }
        } else {
            return '&boxHD;';
        }
    }
}

?>
