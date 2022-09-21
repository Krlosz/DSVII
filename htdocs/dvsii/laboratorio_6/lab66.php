<?php
final class ClaseBase
{
    public function test()
    {
        echo "ClaseBase::test() llamada\n";
    }
    // Aquí da igual si se declara el método como
    // final o no
    final public function moreTesting()
    {
        echo "ClaseBase::moreTesting() llamada\n";
    }
}
class ClaseHijo extends ClaseBase
{
}
// como la clase "ClaseBase" es final, no puede tener hijos