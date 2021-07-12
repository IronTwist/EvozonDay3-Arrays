<?php

function randomNumbersGenerator($numberGiven): iterable
{
    $x = 0;
    $holdNumber = 0;

    while($x <= $numberGiven){
        if($x > $holdNumber-1 && ($x - $holdNumber) <= 10){
            yield $x;
            $holdNumber = $x;
        }

        if($x >= $numberGiven - 1){
            yield $x;
            break;
        }

        $x = random_int(1, $numberGiven);
    }
}

function consumerIterable(iterable $iterable)
{

    foreach ($iterable as $valueIterable) {
        echo $valueIterable.' ';
    }

}

$numbersToReturn = 100; //1000, 2342345 or PHP_INT_MAX

consumerIterable(randomNumbersGenerator($numbersToReturn));
