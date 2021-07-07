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

    public function show(): void;
}

class Stack implements StackInterface {

    /**
     * @var array
     */
    private $data = array();

    public function push($element): void
    {
        array_push($this->data, $element);
    }

    public function pop()
    {
        if (count($this->data) > 0) {
            return array_pop($this->data);
        }
    }

    public function isEmpty(): bool
    {
        return $this->data == 0;
    }

    public function show(): void
    {
        echo $this->isEmpty();
        if(!$this->isEmpty()) {
            foreach ($this->data as $elem){
                echo $elem . ' ';
            }
        }
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

$stack->show();