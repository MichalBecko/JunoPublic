<?php

namespace FrontModule\Classes;

use Latte\Macros\MacroSet,
    Latte\MacroNode,
    Latte\PhpWriter,
    Latte\Compiler;

/**
 * Description of TextMacro
 *
 * @author Vladimír Vráb <www.artexe.sk>
 */
class TextMacro extends MacroSet {
    
    public static function install(Compiler $compiler)
    {
        $set = new static($compiler);
        $set->addMacro('text', [$set, 'macroText']);
    }
    
    public function macroText(MacroNode $node, PhpWriter $writer) {
        
        return $writer->write("\$arr = %node.array; echo \$presenter->getText(%node.word)->\$arr[0]; ");
        
    }
    
}
