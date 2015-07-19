<?php

namespace Melp\Cg\Php;

use Melp\Cg\Common\BufferInterface;
use Melp\Cg\Common\Node;

class Arg extends Node
{
    public function write(BufferInterface $buffer)
    {
        if (isset($this['typehint'])) {
            $buffer
                ->append($this['typehint'])
                ->append(' ')
            ;

        }
        $buffer->append('$' . $this['name']);

        if (isset($this['default'])) {
            $buffer
                ->append(' = ')
                ->append($this['default'])
            ;
        }
    }
}