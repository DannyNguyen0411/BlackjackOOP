<?php
namespace Project7;

class Game
{
    private Player $player;
    private Dealer $dealer;
    private Deck $deck;

    public function __construct()
    {
        $deck = new Deck();
        $deck->shuffle();
        $this->deck = $deck;
        $this->player = new Player($deck);
        $this->dealer = new Dealer($deck);
    }

    public function getPlayer(): Player
    {
        return $this->player;
    }

    public function getDealer(): Dealer
    {
        return $this->dealer;
    }

    public function getDeck(): Deck
    {
        return $this->deck;
    }
}
