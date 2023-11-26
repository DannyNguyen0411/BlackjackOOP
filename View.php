<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
<!--        <link href="../oopproject/css/style2.css" rel="stylesheet" type="text/css">-->
    <link href="../css/style2.css" rel="stylesheet" type="text/css">
</head>
<body>
<body class="background">
<div class="container">
    <div class="chip-bag">

        <div class="header">
            <img src="../image/suits-logo.png" alt="Poker Logo" id="poker" class="image-logo">
            <h1>BLACKJACK</h1>
        </div>
        <div id="table">
            <div id="messages">
                <h2>Let's Play!</h2>
                <?php if ($player->getScore() > 23 || $dealer->getScore() > 15 || $player->hasLost()):?>
                <?php  $player->checkOutcome($player, $dealer);
                    $player->checkBlackjack($player, $dealer);
                    ?>
                <?php endif; ?>
            </div>
            <label id="dealer-label">Dealer: <?php
                if (isset($_SESSION['bet']))
                {
                    echo nl2br("\t" . $dealer->getScore());
                }
                else
                {
                    echo nl2br("??");
                }
                ?></label>
            <div id="dealer-hand" class="hand">
                <?php if (isset($_SESSION['bet'])): ?>
                    <?php echo $dealer->showHand('hand'); ?>
                <?php else: ?>
                    <p>Place a bet to reveal your cards.</p>
                <?php endif; ?>
            </div>
            <label id="player-label">Player: <?php
                if (isset($_SESSION['bet']))
                {
                    echo nl2br("\t" . $player->getScore());
                }
                else
                {
                    echo nl2br("??");
                }
                ?></label>
            <div id="player-hand" class="hand">
                <?php if (isset($_SESSION['bet'])): ?>
                    <?php echo $player->showHand('hand'); ?>
                <?php else: ?>
                    <p>Place a bet to reveal your cards.</p>

                <?php endif; ?>
            </div>
        </div>
        <div class="betting">
            <div class="bet-square">
                <p>Chips</p>
                <p id="pot"><?php echo($player->getChips() ?? '0') ?></p>
            </div>
            <div class="pot-square">
                <p>Staked Chips</p>
                <p id="pot"><?php echo ($player->getBetChips() ?? '0')?></p>
            </div>
                <form method="POST">
                    <?php if (empty($_SESSION['chips']) && isset($_SESSION['chips']) && $_SESSION['chips'] == 0 && empty($_SESSION['betChips']) || isset($_SESSION['betChips']) && $_SESSION['betChips'] == 0): ?>
                        <h3 class="gameOver">Game Over! Click the button to add chips</<p><br>
                        <button name="addChips" id="addChips" class="betButton" type="submit" value="+50 Chips">+50 Chips</button>
                        <audio controls autoplay style='visibility: hidden'>
                            <source src='music/Peaches.mp3' type='audio/mpeg'></audio>
                <?php elseif (empty($_SESSION['betChips']) || !isset($_SESSION['bet'])): ?>
                    <label for="bet"></label>
                    <button type="submit" class="image-button" name="playChips5" value="+5">
                        <img src="../image/chip-5test.png" alt="Chips 5" class="chips-image">
                    </button>
                    <button type="submit" class="image-button" name="playChips10" value="+10">
                        <img src="../image/chip-10test.png" alt="Chips 10" class="chips-image">
                    </button>
                    <button type="submit" class="image-button" name="playChips25" value="+25">
                        <img src="../image/chip-25test.png" alt="Chips 25" class="chips-image">
                    </button>
                    <button type="submit" class="image-button" name="playChips50" value="+50">
                        <img src="../image/chip-50test.png" alt="Chips 50" class="chips-image">
                    </button>
                    <button type="submit" class="image-button" name="playChips100" value="+100">
                        <img src="../image/chip-100test.png" alt="Chips 100" class="chips-image">
                    </button>
                    <button type="submit" class="image-button" name="playChips500" value="+500">
                        <img src="../image/chip-500test.png" alt="Chips 500" class="chips-image">
                    </button>
                    </form>
                    <form method="POST">
                    <button type="submit" class="betButton" name="bet">Place Bet</button>
                <?php elseif ($player->getScore() > 23 || $dealer->getScore() > 15 || $player->hasLost()):?>
                    <div class="buttons">
                        <button name="testLegend" id="Try Again" class="betButton" type="submit" value="testLegend">New Game</button>
                    </div>
                <?php elseif (!isset($_SESSION['run'])): ?>
                    <div class="buttons">
                        <input name="run" id="run" type="submit" value="Hit" class="betButton"/>
                        <input name="run" id="run" type="submit" value="Stand" class="betButton"/>
                        <input name="run" id="run" type="submit" value="Fold" class="betButton"/>
                    </div>
                <?php endif; ?>
                </form>
        </div>
    </div>
</body>
</html>