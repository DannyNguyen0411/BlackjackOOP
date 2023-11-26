<?php

namespace Project7;


class Player
{
    private Deck $hand;
    private int $money = 100;
    protected int $handValue = 21;
    private bool $lost = false;
    private bool $tie = false;
    private bool $TwentyOne = false;
    private const Even = 21;
    private int $blackJack = 21;
    private int $win = 10;
    private int $loss = -5;
    private int $chipsMultiply = 2;
    private int $minimumBet = 5;

    private $session;
    private int $chips = 100;
    private int $betChips;



//In the constructor of the player we pass the constructor to the 'Game' class
// So for this constructor, it will draw 2 cards at the start of the game.
    public function __construct(Deck $deck)
    {
        $this->cards[] = $deck->drawCard();
        $this->cards[] = $deck->drawCard();

        if($this->getScore() == self::Even){
            $this->TwentyOne = true;

        }
    }

    public function setSession(Session $session)
    {
        return $this->session = $session;
    }

    public function lost(): void
    {
        $this->lost = true;
    }
    public function tie(): void
    {
        $this->tie = true;
    }


    // This function will calculate the rank of each rank and suit.
    public function getScore(): int
    {
        $totalScore = 0;
        foreach ($this->cards as $card) {
            if ($card instanceof Card) {
                $totalScore += $card->getValue();
            }
        }
        return $totalScore;
    }

    //if player has lost
    public function hasLost(): bool
    {
        if ($this->getScore() > self::Even) {
            $this->lost = true;
        }

        $game = new Game();  // Instantiate the Game object
        $player = $game->getPlayer();  // Get the player object from the game
        $dealer = $game->getDealer();  // Get the dealer object from the game

        $_SESSION['gameOver'] = true;
        return $this->lost;
    }



    //if player has tie
    public function hasTie($player, $dealer): bool
    {
        $game = new Game();
        $playerScore = $player->getScore();
        $dealerScore = $dealer->getScore();

        if ($playerScore === $dealerScore) {
            return true;
        }

        return false;
    }


    //check if player or dealer has blackjack
    public function checkBlackjack(Player $player, Dealer $dealer): void
    {
        $blackjackPlayer = $player->getScore();
        $blackjackDealer = $dealer->getScore();

        if ($blackjackPlayer == 21 || $blackjackDealer == 21) {
            if ($blackjackPlayer == 21 && $blackjackDealer == 21) {
                $html = "<h3 class='tie'>Blackjack Tie!</h3>";
            } elseif ($blackjackPlayer == 21) {
                $html =  "<h3 class='win'>Blackjack Player!</h3>";
                $_SESSION['chips'] += $this->win;
            } elseif ($blackjackDealer == 21) {
                $html = "<h3 class='lose'>Blackjack Dealer!</h3>";
                $_SESSION['chips'] += $this->loss;
            } else {
                $html = '';
            }
            echo $html;
            $_SESSION['gameOver'] = true;
            unset($_SESSION['blackjack']);
        }
    }

    //check outcome of player and dealer and show on screen
    public function checkOutcome($player, $dealer): void
    {
        $dealerScore = $dealer->getScore(); // Access the dealer's score

        if ($dealerScore <= $this->blackJack && $this->getScore() <= $dealerScore) {
            $player->lost();
            $_SESSION['gameOver'] = true;
        } elseif ($this->getScore() <= $this->blackJack && $this->getScore() > $dealerScore) {
            $dealer->lost();
            $_SESSION['gameOver'] = false;
        } elseif ($this->getScore() <= $this->blackJack && $this->getScore() == $dealerScore) {
            $player->tie();
            $_SESSION['gameOver'] = false;
        }

        if (isset($_SESSION['betChips'])) {
            if ($player->hasLost()) {
                $html = '<h3 class="lose">You Lose</h3>';
            } elseif ($dealer->hasLost()) {
                $html = '<h3 class="win">You Win</h3>'.
                    $_SESSION['chips'] += (int)$_SESSION['betChips'] * $this->chipsMultiply;
            } elseif ($player->hasTie()) {
                $html = '<h3 class="tie">It\'s a Tie!</h3>';
                "<audio controls autoplay style='visibility: hidden'>".
                "<source src='music/Coin.mp3' type='audio/mpeg'></audio>";
                $_SESSION['chips'] += (int)$_SESSION['betChips'];
            }
            echo $html;

            $_SESSION['gameOver'] = true;
        }
    }


    //set start money
    public function placeBet()
    {
        // Bet logic goes here
        $money = 1000;
        $this->money = $money;
    }

    // When the player uses the 'hit' button to draw a card
    // You don't need the 'stand'.
    public function hit($deck): void
    {
        $this->cards[] = $deck->drawCard();

        if ($this->getScore() < self::Even) {
//            print "<h3>Do you want to Hit, Stand or Fold?</h3>";

        }
    }

    //what happens when player folds
    public function fold()
    {
        $this->lost = true;
        if ($this->getScore() <= self::Even) {
            print                  "<audio controls autoplay style='visibility: hidden'>".
                "<source src='music/MarioGameOver.mp3' type='audio/mpeg'></audio><br>";
            print "You folded. You lost!";
        } else {
            print "You folded.";
        }
    }

    //set chips for the session
    public function setChips($chips)
    {
        $this->session->set('chips', $chips);
    }

    //set betted chips for session
    public function setBetChips($betChips)
    {
        $this->session->set('betChips', $betChips);
    }

    public function getChips()
    {
        return $this->session->get('chips');
    }

    public function getBetChips()
    {
        return $this->session->get('betChips');
    }



    //This is a surrender
    public function showHand($show): void
    {
        if ($show === 'hand') {
            foreach ($this->cards as $card) {
                echo $card->getCard(true);
            }
        } elseif ($show === 'first') {
            // Display the hidden card
            echo $this->cards[0]->getHiddenCard(true);
        }
    }


    public function getEven(): int
    {
        return self::Even;
    }

    public function getTwentyOne(): bool
    {
        return $this->TwentyOne;

    }

    public function getBlackjack(): int
    {
        return $this->blackJack;
    }
}