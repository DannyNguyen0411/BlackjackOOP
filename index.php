<?php
declare(strict_types=1);

namespace Project7;

require_once 'vendor/autoload.php';

$session = new Session();
$session->start();

$game = $session->get('blackjack') ?? new Game();
$session->set('blackjack', $game);

$player = $game->getPlayer();
$player->setSession($session); // Set the session object in the player

$dealer = $game->getDealer();
$deck = $game->getDeck();

$chips = 0; // You can add the chips with the '+50' button.

if (!$player->getChips()) {
    $player->setChips($chips);
}


//test dealer.
$dealer->getScore();

$cardsVisible = ($player->getScore() > 0 || $dealer->getScore() > 0);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['bet']) && !isset($_SESSION['betPlaced'])) {
        $post = htmlspecialchars($_POST['bet'], ENT_NOQUOTES);

        if ($post >= 0 && is_numeric($post) && $post <= $player->getChips()) {
            $playerChips = $player->getChips();
            $bet = (int) $post;
            $playerChips -= $bet;

            $playerBetChips = $player->getBetChips();
            $bet = (int) $post;
            $playerBetChips += $bet;

            $_SESSION['bet'] += (int)$post;
            $_SESSION['betPlaced'] = true;

            $player->setBetChips($playerBetChips);
            $player->setChips($playerChips);
        }
    }

    //This is for adding or remove chips
    if (isset($_POST['addChips'])) {
        $playerChips = $player->getChips();
        $playerChips += 50;
        $player->setChips($playerChips);
    }


//    if (isset($_POST['removeChips'])) {
//        $playerChips = $player->getChips();
//        $playerChips -= 100;
//        $player->setChips($playerChips);
//    }

    //This is for the reset
    if(isset($_POST['testLegend']))
    {
        unset($_SESSION['blackjack'], $_SESSION['betChips'], $_SESSION['betPlaced'], $_SESSION['bet']);
    }

    //This is for betting chips
    if (isset($_POST['playChips5']) && $_SESSION['chips'] >= 5) {
        $playerChips = $player->getChips();
        $playerChips -= 5;
        $player->setChips($playerChips);

        $playerChips = $player->getBetChips();
        $playerChips += 5;
        $player->setBetChips($playerChips);
    }


    if (isset($_POST['playChips10']) && $_SESSION['chips'] >= 10) {
        $playerChips = $player->getChips();
        $playerChips -= 10;
        $player->setChips($playerChips);

        $playerChips = $player->getBetChips();
        $playerChips += 10;
        $player->setBetChips($playerChips);
    }

    if (isset($_POST['playChips25']) && $_SESSION['chips'] >= 25) {
        $playerChips = $player->getChips();
        $playerChips -= 25;
        $player->setChips($playerChips);

        $playerChips = $player->getBetChips();
        $playerChips += 25;
        $player->setBetChips($playerChips);
    }


    if (isset($_POST['playChips50']) && $_SESSION['chips'] >= 50) {
        $playerChips = $player->getChips();
        $playerChips -= 50;
        $player->setChips($playerChips);

        $playerChips = $player->getBetChips();
        $playerChips += 50;
        $player->setBetChips($playerChips);
    }

    if (isset($_POST['playChips100']) && $_SESSION['chips'] >= 100) {
        $playerChips = $player->getChips();
        $playerChips -= 100;
        $player->setChips($playerChips);

        $playerChips = $player->getBetChips();
        $playerChips += 100;
        $player->setBetChips($playerChips);
    }

    if (isset($_POST['playChips500']) && $_SESSION['chips'] >= 500) {
        $playerChips = $player->getChips();
        $playerChips -= 500;
        $player->setChips($playerChips);

        $playerChips = $player->getBetChips();
        $playerChips += 500;
        $player->setBetChips($playerChips);
    }

    if (isset($_POST['bet']) && $player->getBetChips() >= 5) {
        $betAmount = $_POST['bet'];
        print "<h1>test</h1>";

        // Perform any necessary validation on the bet amount

        // Update the value of $_SESSION['bet']
        $_SESSION['bet'] = $betAmount;
    } else {
        print "Please bet the amount of the chips!";
    }


    //When you run the deck, this code will run.
    if (isset($_POST['run'])) {
        $_SESSION['run'] = $_POST['run'];

        if ($_SESSION['run'] === 'Hit') {
            $player->hit($deck);
            if ($player->getScore() >= 21) {
                $_SESSION['run'] = 'Hold';
                $dealer->runDealer($deck);
            }
        }
    }


    if ($_SESSION['run'] === 'New') {
        unset($_SESSION['betPlaced']);
        $player->unset('betChips');
        $player->reset();
        $dealer->reset();
    }



    header('Location: index.php');
    exit;
}


if (isset($_SESSION['run']))
{
    $action = $_SESSION['run'];
    $result = '';

    switch ($action) {
        case 'Hold':
            $dealer->runDealer($deck);
            if ($player->hasLost()) {
                echo "<audio controls autoplay style='visibility: hidden'>" .
                    "<source src='music/MarioGameOver.mp3' type='audio/mpeg'></audio>";
            } else {
                echo "<audio controls autoplay style='visibility: hidden'>" .
                    "<source src='music/WinSoundEffect.mp3' type='audio/mpeg'></audio>";
                // Play other sound effects or perform other actions for winning
            }
            break;

        case 'Stand':
            $dealer->runDealer($deck);

                echo "<audio controls autoplay style='visibility: hidden'>" .
                    "<source src='music/Coin.mp3' type='audio/mpeg'></audio>";
            break;

        case 'Fold':
            $player->fold();
            break;
    }

    // Save the result to a session variable

    // Redirect to the desired output file
}
unset($_SESSION['run'], $_SESSION['gameOver']);
require_once 'src/View.php';

