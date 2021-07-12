<?php
echo "Queue test: ";

require_once 'QueueInterface.php';

class QueueImplementation implements QueueInterface, IteratorAggregate {

    private array $data;

    public function __construct()
    {
        $this->data = array();
    }

    public function enqueue($elem):void
    {
        array_push($this->data, $elem);
    }

    public function dequeue()
    {
        if(!$this->isEmpty()){
            return array_shift($this->data);
        }

        return null;
    }

    public function isEmpty():bool
    {
        return empty($this->data);
    }

    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->data);
    }
}

//Second implementation

class QueueImplementation2 implements QueueInterface, IteratorAggregate {

    public array $data = array();

    public function enqueue($elem): void
    {
        $this->data[] = $elem;
    }

    public function dequeue()
    {
        if(!$this->isEmpty()) {
            $elem = $this->data[0];

            $arrayAfter = array_slice($this->data, 1);
            $this->data = $arrayAfter;

            return $elem;
        }

        return null;
    }

    public function isEmpty(): bool
    {
        return empty($this->data);
    }

    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->data);
    }

}

$q = new QueueImplementation();
$q->enqueue("a");
$q->enqueue("x");
$q->enqueue("y");
$q->dequeue();
$q->enqueue("3");
$q->dequeue();

foreach ($q as $qShow){
    echo $qShow. ' ';
}



