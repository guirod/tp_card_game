<?php
require_once('Deck.php');

$deck = new Deck();

$deck->initialize();
$deck->sort();

// echo "<pre>";
// var_dump($deck);
// echo "</pre>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="deal.php">
        <label for="nb_joueurs">Nb de joueurs</label>
        <input type="number" id="nb_joueurs" name="nb_joueurs" />
        <label for="nb_cards">Nb de cartes</label>
        <input type="number" id="nb_cards" name="nb_cards" />
        <input type="submit" value="Distribuer"/>
    </form>

    <h2>Deck</h2>
    <div>
    <?php $couleur = null; ?>
    <?php foreach($deck->getCards() as $card): ?>
    <?php 
        if ($couleur !== null && $couleur !== $card->getCouleur()) { echo "<br>";}
        $couleur = $card->getCouleur(); 
    ?>
    <img src="<?= $card->getUrl() ?>" width="100px" />
    <?php endforeach; ?>

    <?php
        // $deck2 = new Deck(); 
        // $deck2->initialize();
        // echo Deck::getSize(); 

        // $i= 0;
        // echo "<br>";
        // foreach($deck->getCards() as $card) {
        //     echo $i++ . "<br>";
        // }

        // Appel par référence vs par valeur
        $cards = $deck->getCards();
        echo "<br>" . count($cards) . "<br>";
        Deck::staticDraw($cards);
        echo count($cards) . "<br>";
    ?> 
    </div>
</body>
</html>