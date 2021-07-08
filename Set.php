<?php

interface SetInterface{
    public function add($element): void;
    public function contains($element): bool;
    public function intersect(SetInterface $set): SetInterface;
    public function reunion(SetInterface  $set): SetInterface;
    public function isEmpty(): bool;
    public function show(): void;
}

class Set implements SetInterface{

    public $data = array();

    public function add($element): void
    {
        $checkSet = $this->contains($element);

        if($checkSet == false){
            $this->data[] = $element;
        }
    }

    public function contains($element): bool
    {
        return in_array($element, $this->data, true);
    }

    public function intersect(SetInterface $set): SetInterface
    {
        $newIntersectSet = new Set();
        $newIntersectSet->data = array_intersect($this->data, $set->data);

        return $newIntersectSet;
    }

    public function reunion(SetInterface $set): SetInterface
    {
        $newReunionSet = new Set();
        $newReunionSet->data = array_merge($this->data, $set->data);
        $newReunionSet->data = array_unique($newReunionSet->data);

        return $newReunionSet;
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
            echo PHP_EOL;
            var_dump($this->data);
        }
    }

}
$set = new Set();

$set->add(4);
$set->add(2);
$set->add(1);
$set->show();

$set2 = new Set();
$set2->add(3);
$set2->add(2);
$set2->add(4);
$set2->show();

echo "Intersection: ";
$intersection = $set2->intersect($set);
var_dump($intersection->data);

echo "Reunion: ";
$reunion = $set2->reunion($set);
print_r($reunion->data);




