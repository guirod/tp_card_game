<?php
require_once('Deck.php');
require_once('Hand.php');

if (isset($_POST['nb_joueurs']) && isset($_POST['nb_cards']) && is_numeric($_POST['nb_joueurs']) && is_numeric($_POST['nb_cards'])) {
    $deck = (new Deck())->initialize();

    $nbJoueurs = $_POST['nb_joueurs'];
    $nbCards = $_POST['nb_cards'];

    if ($nbJoueurs * $nbCards <= count($deck->getCards())) {

        $joueurs = [];

        for ($j = 0; $j < $nbJoueurs; $j++) {
            $joueurs[$j] = new Hand();
        }

        for ($i = 0; $i < $nbCards; $i++) {
            for ($j = 0; $j < $nbJoueurs; $j++) {
                $joueurs[$j] = $joueurs[$j]->addCard($deck->drawCard());
            }
        }

        foreach ($joueurs as $key => $joueur) {
            $joueur->sort();

            echo "<h1>Joueur$key</h1>";
            foreach ($joueur->getCards() as $card) {
                echo '<img src="' . $card->getUrl() . '" width="100px" />';
            }
        }

        echo Hand::getSize();
    } else {
        echo "STOP !";
    }
}