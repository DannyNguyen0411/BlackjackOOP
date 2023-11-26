<?php

namespace Project7;

class Deck
{
    private const CardsPerSuit = 13;
    private array $cards = [];

    public function __construct()
    {
        $suits = [
            Suit::SPADE(),
            Suit::DIAMOND(),
            Suit::CLUB(),
            Suit::HEART(),
        ];

        $hiddenSuits = [
            Suit::HIDDEN1(),
            Suit::HIDDEN2(),
        ];

        foreach ($suits as $suit) {
            foreach ($hiddenSuits as $hiddenSuit) {
                for ($i = 1; $i <= self::CardsPerSuit; $i++) {
                    $this->cards[] = new Card($suit, $hiddenSuit, $i);
                }
            }
        }
    }

    //shuffle the cards
    public function shuffle(): void
    {
        shuffle($this->cards);
    }

    public function addCard(Card $card)
    //addcard to a array for player/dealer hand
    {
        $this->cards[] = $card;
    }

    public function getCards(): array
    {
        return $this->cards;
    }


    public function drawCard(): ?Card
    {
        if (empty($this->cards)) {
            return null;
        }

        return array_shift($this->cards);
    }

    //hidden card
    public function drawHiddenCard(): ?Card
    {
        if (empty($this->cards)) {
            return null;
        }

        $card = array_shift($this->cards);

        if ($card->getValue() < 14) {
            $hiddenCard = new Card($card->getHiddenSuit(), $card->getHiddenSuit(), 0);
            return $hiddenCard;
        } else {
            return null;
        }
    }


}
