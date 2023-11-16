<?php

class Card
{
    const COULEURS = ['C' => 'hearts', 'P' => 'spades', 'A' => 'diamonds', 'T' => 'clubs'];
    const VALEURS = [
        '1' => 'ace',
        'R' => 'king',
        'D' => 'queen',
        'V' => 'jack',
        'X' => '10',
        '9' => '9',
        '8' => '8',
        '7' => '7'
    ];

    const IMAGES_URL = "http://localhost:8888/";
    protected string $couleur;
    protected string $valeur;
    // protected string $url;

    public function __construct(string $color, string $value)
    {
        $this->couleur = $color;
        $this->valeur = $value;
    }

    public function getUrl(): string
    {
        return self::IMAGES_URL . self::VALEURS[$this->valeur] . '_of_' . self::COULEURS[$this->couleur] . '.png';
    }

    public function getCouleur(): string
    {
        return $this->couleur;
    }

    public function getValeur(): string
    {
        return $this->valeur;
    }

    public function setCouleur(string $color): Card
    {
        $this->couleur = $color;

        return $this;
    }

    public function setValeur(string $value): Card
    {
        $this->valeur = $value;

        return $this;
    }
}