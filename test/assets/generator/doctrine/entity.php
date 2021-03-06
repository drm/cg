<?php


use Melp\Cg\Common\Iterator\Traverser;
use Melp\Cg\Doctrine\Builder;
use Melp\Cg\Doctrine\Visitor\EntityVisitor;
use Melp\Cg\Doctrine\Visitor\FieldVisitor;
use Melp\Cg\Php\Visitor\SingleNamespaceVisitor;

$node = (new Builder())
    ->file()
        ->namespacex('Foo')
            ->usex('Doctrine\ORM\Mapping')->as('ORM')->end()
            ->entity('MyEntity')
                ->field('id')->id('auto')->type('integer')->generatedValue()->setter(false)->end()
                ->field('title')->type('string')->end()
            ->end()
        ->end()
    ->peek()
;

return
    (new Traverser())
        ->addVisitor(new EntityVisitor())
        ->addVisitor(new SingleNamespaceVisitor())
        ->addVisitor(new FieldVisitor())
        ->traverse($node)
    ;
