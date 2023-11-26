<?php

namespace Project7;

class Dealer extends Player
{
    private const DealerTakeCard = 15;
    public ?Card $hiddenCard = null;
    protected array $cards; // Define the $cards property

    public function __construct(Deck $deck)
    {
        $this->cards = []; // Initialize the $cards array
        $this->cards[] = $deck->drawCard();
//        $this->hideCard($deck);
    }

    //dealer hits when he is under 17, and if he is over 17 he stands
    public function runDealer(Deck $deck): void
    {
        if ($this->getScore() < self::DealerTakeCard) {
            $this->hit($deck);
            $this->runDealer($deck);
        }

        while ($this->getScore() < 17) {
            $this->drawCard($deck);
        }
    }

    //get the value of all the cards the player or dealer has and calculate total amount
    public function getHandValue(): int
    {
        $handValue = 0;
        $visibleCards = count($this->cards) - 1;

        foreach ($this->cards as $index => $card) {
            if ($index === 0 && !$this->hiddenCard) {
                continue; // Skip the hidden card
            }

            $handValue += $card->getValue();
        }

        return $handValue;
    }

    public function showHand($show): void
    {
        if ($show === 'hand') {
            foreach ($this->cards as $card) {
                echo $card->getCard(true);
            }
        } elseif ($show === 'first') {
            if ($this->hiddenCard !== null && $this->getScore() > self::DealerTakeCard) {
                echo $this->cards[0]->getCard(true);
            } else {
                echo $this->hiddenCard->getHiddenCard(true, $this->hiddenCard->getValue());
            }
        }
    }


//    //show second card dealer as hidden and show when dealers runs
//    public function showHiddenCard(): void
//    {
//        if (empty($this->cards)) {
//            return null;
//        }
//
//        $showHiddenCard = new Card(Suit::SHOW1(), Suit::SHOW1(), Suit::SHOW1(), 0);
//
//        return $showHiddenCard;
//    }


    //dealer hits
    public function drawCard(Deck $deck): void
    {
        $this->cards[] = $deck->drawCard();
    }
}
