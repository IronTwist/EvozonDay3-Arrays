<?php

echo 'Stack: ';

interface StackInterface{
    /**
     * @param $element
     */
    public function push($element): void;

    /**
     * @return mixed
     */
    public function pop();

    /**
     * @return bool
     */
    public function isEmpty(): bool;

}

class Stack implements StackInterface {

    /**
     * @var array
     */
    private $data = [];

    public function push($element): void
    {
        array_push($this->data, $element);
    }

    public function pop()
    {
        if ($this->isEmpty()) {
            return array_pop($this->data);
        }

        return null;
    }

    public function isEmpty(): bool
    {
        return empty($this->data);
    }

}

$stack = new Stack();
$stack->push(2);
$stack->push(4);
$stack->push(3);
$stack->pop();
$stack->push(1);
$stack->pop();
$stack->pop();
$stack->push(21);
$stack->push(45);
$stack->pop();

