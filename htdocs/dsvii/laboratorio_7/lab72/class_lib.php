<?php
abstract class ClaseAbstracta
{

    abstract protected function tomarValor();
    abstract protected function prefixValor($prefix);

    public function printOut()
    {
        print $this->tomarValor() . "<br>";
    }
}

class ClaseConcreta1 extends ClaseAbstracta
{
    protected function tomarValor()
    {
        return "ClaseConcreta1";
    }
    public function prefixValor($prefix)
    {
        return "{$prefix}ClaseConcreta1";
    }
}

class ClaseConcreta2 extends ClaseAbstracta
{
    protected function tomarValor()
    {
        return "ClaseConcreta2";
    }
    public function prefixValor($prefix)
    {
        return "{$prefix}ClaseConcreta2";
    }
}
