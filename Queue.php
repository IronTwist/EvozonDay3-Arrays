<?php
echo "Queue test: ";

interface Queue{
    public function enqueue($elem): void;
    public function dequeue(): void;
    public function isEmpty(): bool;
    public function show(): void;
}

class QueueImplementation implements Queue{

    private array $data;

    public function __construct()
    {
        $this->data = array();
    }

    public function enqueue($elem):void
    {
        array_push($this->data, $elem);
    }

    public function dequeue():void
    {
        if(!$this->isEmpty()){
            array_shift($this->data);
        }
    }

    public function isEmpty():bool
    {
        return count($this->data) == 0;
    }

    public function show(): void
    {
        if(!$this->isEmpty()) {
            foreach ($this->data as $elem){
                echo $elem . ' ';
            }
        }
    }

}

//Second implementation

class QueueImplementation2 implements Queue {

    public array $data = array();

    public function enqueue($elem): void
    {
        $this->data[] = $elem;
    }

    public function dequeue(): void
    {
         $arrayAfter = array_slice($this->data, 1);
         $this->data = $arrayAfter;
    }

    public function isEmpty(): bool
    {
        return count($this->data) == 0;
    }

   public function show(): void
    {
        if(!$this->isEmpty()) {
            foreach ($this->data as $elem){
                echo $elem . ' ';
            }
        }
    }

}

$q = new QueueImplementation2();
$q->enqueue("a");
$q->enqueue("x");
$q->enqueue("y");
$q->dequeue();
$q->enqueue("2");
$q->dequeue();

$q->show();



