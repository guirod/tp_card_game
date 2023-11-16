<?php
require_once('Card.php');

class Deck
{
    public  static int $size = 0;
    protected array $cards = [];

    public function getCards(): array
    {
        return $this->cards;
    }

    public function addCard(Card $card): Deck
    {
        $this->cards[] = $card;

        static::$size++;

        return $this;
    }

    public function initialize(bool $shuffle = true): Deck
    {
        foreach(Card::COULEURS as $colorKey => $colorValue) {
            foreach(Card::VALEURS as $valeurKey => $valeurValue) {
                $this->addCard(new Card($colorKey, $valeurKey));
            }
        }

        if ($shuffle) {
            $this->shuffle();
        }

        return $this;
    }

    public static function getSize():int
    {
        return static::$size;
    }

    public function drawCard(): Card
    {
        self::$size--;

        return array_pop($this->cards);
    }

    public function shuffle(): void
    {
        shuffle($this->cards);
    }

    // Fonction utilisant un paramètre passé par référence
    public static function staticDraw(array &$cards) {
        array_pop($cards);
        array_pop($cards);
        array_pop($cards);
        array_pop($cards);
    }

    public function sort()
    {
        $mappingValeurs = array_reverse(array_keys(Card::VALEURS));
        $mappingColors = array_keys(Card::COULEURS);

        usort($this->cards, function($a, $b) use ($mappingValeurs, $mappingColors) {
            // return array_search($a->getValeur(), $mappingValeurs) <=> array_search($b->getValeur(), $mappingValeurs);
            if (array_search($a->getValeur(), $mappingValeurs) > array_search($b->getValeur(), $mappingValeurs)) {
                return 1;
            } else if (array_search($a->getValeur(), $mappingValeurs) < array_search($b->getValeur(), $mappingValeurs)) {
                return -1;
            } else {
                // Compare les couleurs 
                return array_search($a->getCouleur(), $mappingColors) <=> array_search($b->getCouleur(), $mappingColors);
            }
        });
    }
}