<?php

function randomNumbersGenerator($numbersReturn): iterable
{
    $x = 0;
    $holdNumber = 0;

    while($x <= $numbersReturn){
        if($x > $holdNumber && ($x - $holdNumber) <= 10){
            yield $x;
            $holdNumber = $x;
        }

        if($x >= $numbersReturn - 1){
            exit();
        }

        $x = mt_rand(1, $numbersReturn);
    }
}

function consumerIterable(iterable $iterable): array
{

    foreach ($iterable as $valueIterable) {
        echo $valueIterable.' ';
    }

}

$numbersToReturn = 100; //1000, 2342345 or PHP_INT_MAX

$get = consumerIterable(randomNumbersGenerator($numbersToReturn));
print_r($get);