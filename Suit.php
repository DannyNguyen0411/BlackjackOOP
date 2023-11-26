<?php
namespace Project7;
class Suit
{
    const TypeSpade = 'Spade';
    const TypeHeart = 'Heart';
    const TypeDiamond = 'Diamond';
    const TypeClub = 'Club';
    const TypeHidden1 = 'Hidden1';
    const TypeHidden2 = 'Hidden2';

    private const CharSpade = 127136;
    private const CharHeart = 127152;
    private const CharDiamond = 127168;
    private const CharClub = 127184;

    private const CharHidden1 = 127136;
    private const CharHidden2 = 127136;

    private string $name;

    private function __construct(string $name)
    {
        $this->name = $name;
    }

    static function SPADE()
    {
        return new Suit(self::TypeSpade);
    }

    static function HEART()
    {
        return new Suit(self::TypeHeart);
    }

    static function DIAMOND()
    {
        return new Suit(self::TypeDiamond);
    }

    static function CLUB()
    {
        return new Suit(self::TypeClub);
    }

    static function HIDDEN1()
    {
        return new Suit(self::TypeHidden1);
    }

    static function HIDDEN2()
    {
        return new Suit(self::TypeHidden2);
    }


    public function getName(): string
    {
        return $this->name;
    }

    public function getColor(): string
    {
        return in_array($this->name, [self::TypeHeart, self::TypeDiamond, self::TypeHidden2]) ? 'red' : 'black';
    }

    public function getStartValue(): int
    {
        switch ($this->name) {
            case self::TypeSpade;
                return self::CharSpade;
            case self::TypeClub;
                return self::CharClub;
            case self::TypeDiamond;
                return self::CharDiamond;
            case self::TypeHeart;
                return self::CharHeart;
            case self::TypeHidden1;
                return self::CharHidden1;
            case self::TypeHidden2;
                return self::CharHidden2;
            default:
                return ('Invalid suit type');
        }
    }
}
