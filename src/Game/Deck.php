<?php

namespace Vz\Game;


use Vz\Game\Deck\Card;

class Deck
{
    const LABEL_ACE = 'A';
    const LABEL_TWO = '2';
    const LABEL_THREE = '3';
    const LABEL_FOUR = '4';
    const LABEL_FIVE = '5';
    const LABEL_SIX = '6';
    const LABEL_SEVEN = '7';
    const LABEL_EIGHT = '8';
    const LABEL_NINE = '9';
    const LABEL_TEN = '10';
    const LABEL_JACK = 'J';
    const LABEL_QUEEN = 'Q';
    const LABEL_KING = 'K';

    const VALUE_ACE = 1;
    const VALUE_TWO = 2;
    const VALUE_THREE = 3;
    const VALUE_FOUR = 4;
    const VALUE_FIVE = 5;
    const VALUE_SIX = 6;
    const VALUE_SEVEN = 7;
    const VALUE_EIGHT = 8;
    const VALUE_NINE = 9;
    const VALUE_TEN = 10;
    const VALUE_JACK = 11;
    const VALUE_QUEEN = 12;
    const VALUE_KING = 13;

    const SUIT_HEARTS = '♥';
    const SUIT_CLUBS = '♣';
    const SUIT_SPADES = '♠';
    const SUIT_DIAMONDS = '♦';

    protected static $suits = [
        self::SUIT_HEARTS,
        self::SUIT_CLUBS,
        self::SUIT_SPADES,
        self::SUIT_DIAMONDS
    ];

    protected $_values = [
        ['value' => self::VALUE_ACE, 'label' => self::LABEL_ACE],
        ['value' => self::VALUE_TWO, 'label' => self::LABEL_TWO],
        ['value' => self::VALUE_THREE, 'label' => self::LABEL_THREE],
        ['value' => self::VALUE_FOUR, 'label' => self::LABEL_FOUR],
        ['value' => self::VALUE_FIVE, 'label' => self::LABEL_FIVE],
        ['value' => self::VALUE_SIX, 'label' => self::LABEL_SIX],
        ['value' => self::VALUE_SEVEN, 'label' => self::LABEL_SEVEN],
        ['value' => self::VALUE_EIGHT, 'label' => self::LABEL_EIGHT],
        ['value' => self::VALUE_NINE, 'label' => self::LABEL_NINE],
        ['value' => self::VALUE_TEN, 'label' => self::LABEL_TEN],
        ['value' => self::VALUE_JACK, 'label' => self::LABEL_JACK],
        ['value' => self::VALUE_QUEEN, 'label' => self::LABEL_QUEEN],
        ['value' => self::VALUE_KING, 'label' => self::LABEL_KING]
    ];


    /** @var array $_cards */
    protected $_cards = array();

    /**
     * Deck constructor.
     */
    public function __construct()
    {
        $this->_init();

    }


    /**
     * Generate deck cards in initial sequence
     */
    protected function _init()
    {
        $idealSequenceIndex = 0;
        foreach (self::$suits as $suit) {
            foreach ($this->_values as $value) {
                $this->_cards[] = new Card($suit, $value['value'], $value['label'], $idealSequenceIndex++);
            }
        }
    }

    /**
     * @return array
     */
    public function getCards()
    {
        return $this->_cards;
    }
}