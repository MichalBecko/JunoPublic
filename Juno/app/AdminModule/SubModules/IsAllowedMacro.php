<?php
/**
 * Created by PhpStorm.
 * User: Matej
 * Date: 2.2.2018
 * Time: 15:50
 */

namespace Functions;


use Latte\Compiler;
use Latte\MacroNode;
use Latte\Macros\MacroSet;
use Latte\PhpWriter;

class IsAllowedMacro extends MacroSet {

    /**
     * This install macro
     * @param Compiler $compiler
     */
    public static function install(Compiler $compiler) {
        $me = new static($compiler);

        $me->addMacro('is-allowed', [$me, 'macroIf'], [$me, 'macroEndIf']);
    }

    public function macroIf(MacroNode $node, PhpWriter $writer) {
        if ($node->modifiers) {
            throw new CompileException('Modifiers are not allowed in ' . $node->getNotation());
        }
        if ($node->data->capture = ($node->args === '')) {
            return 'ob_start(function () {})';
        }
        if ($node->prefix === $node::PREFIX_TAG) {
            return $writer->write($node->htmlNode->closing ? 'if (array_pop($this->global->ifs)) {' : 'if ($this->global->ifs[] = (%node.args)) {');
        }
        return $writer->write('if ($presenter->isAllowed(%node.args)) {');
    }

    public function macroEndIf(MacroNode $node, PhpWriter $writer)
    {
        if ($node->data->capture) {
            if ($node->args === '') {
                throw new CompileException('Missing condition in {if} macro.');
            }
            return $writer->write('if (%node.args) '
                . (isset($node->data->else) ? '{ ob_end_clean(); echo ob_get_clean(); }' : 'echo ob_get_clean();')
                . ' else '
                . (isset($node->data->else) ? '{ $this->global->else = ob_get_clean(); ob_end_clean(); echo $this->global->else; }' : 'ob_end_clean();')
            );
        }
        return '}';
    }


}