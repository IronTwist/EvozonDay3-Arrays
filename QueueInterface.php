<?php


interface QueueInterface
{
    public function enqueue($elem): void;
    public function dequeue();
    public function isEmpty(): bool;

}