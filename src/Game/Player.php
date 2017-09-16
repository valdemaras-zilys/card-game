<?php

namespace Vz\Game;


use Vz\Game\Deck\Card;

class Player implements PlayerInterface
{
    protected $_name = '';
    protected $_cards = array();

    /**
     * Player constructor.
     * @param string $_name
     */
    public function __construct($_name)
    {
        $this->_name = $_name;
    }


    /**
     * Print card labels
     */
    public function showCards()
    {
        /** @var Card $card */
        foreach ($this->_cards as $card) {
            echo $card->getLabel();
        }
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->_name;
    }

    /**
     * @return array
     */
    public function getCards()
    {
        return $this->_cards;
    }

    /**
     * @param Card $card
     */
    public function addCard(Card $card)
    {
        $this->_cards[] = $card;
    }
}