<?php
class ClaseBase
{
    public function test()
    {
        echo "ClaseBase::test() llamada\n";
    }
    final public function masTests()
    {
        echo "ClaseBase::masTests() llamada\n";
    }
}
class ClaseHijo extends ClaseBase
{
    // public function masTests()
    // {
    //    echo "ClaseHijo::masTests() llamada\n";
    //}
}

//Debido a que la funcion "masTest" es final, no se puede sobre escribir
