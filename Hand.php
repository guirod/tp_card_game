<?php
require_once('Deck.php');

class Hand extends Deck
{
    public static int $size = 0;

    public function initialize(bool $shuffle = true):Deck 
    {
        // Ne fait rien
        return $this;
    }
}