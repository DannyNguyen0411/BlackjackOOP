<?php
namespace Project7;
class Card
{
    private const AceValue = 11;
    private const FaceValue = 10;

    private Suit $suit;
    private Suit $hiddenSuit;
    private int $value;

    public function __construct(Suit $suit, Suit $hiddenSuit, int $value)
    {
        $this->suit = $suit;
        $this->hiddenSuit = $hiddenSuit;
        $this->value = $value;
    }

    public function getSuit(): Suit
    {
        return $this->suit;
    }

    public function getHiddenSuit(): Suit
    {
        return $this->hiddenSuit;
    }

    //Ace value can be 1 or 11
    //face value: a king, queen etc is 10
    public function getValue(): int
    {
        if ($this->value === 1) {
            return self::AceValue;
        }
        if ($this->value >= 10) {
            return self::FaceValue;
        }


        return $this->value;
    }

    //return only value not any sort of card
    private function getRawValue(): int
    {
        return $this->value;
    }

    //showing the cards with unicode characters
    public function getCard(bool $includeColor = false): string
    {
        $value = '&#' . ($this->suit->getStartValue() + $this->getRawValue()) . ';';
        if ($includeColor) {
            $value = sprintf('<span class="playCard" style="color: %s;"><span>%s</span></span>',
                $this->suit->getColor(),
                $value
            );
        }

        return $value;
    }

    public function getHiddenCard(bool $includeColor = false): string
    {
        $value = '&#' . ($this->hiddenSuit->getStartValue() + $this->getRawValue()) . ';';

        // If $includeColor is true, add the color span
        if ($includeColor) {
            $value = sprintf('<span class="playCard" style="color: %s;"><span>%s</span></span>',
                $this->hiddenSuit->getColor(),
                $value // Placeholder for hidden card
            );
        } else {
            $value = 'X'; // Placeholder for hidden card without color
        }

        return $value;
    }

}