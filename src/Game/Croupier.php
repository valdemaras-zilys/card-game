<?php

namespace Vz\Game;


use Vz\Game;
use Vz\Game\Deck\Card;

class Croupier implements CroupierInterface
{

    protected $_cards = array();
    protected $_game;

    /**
     * Croupier constructor.
     *
     * @param Game $_game
     * @param Deck $cardDeck
     */
    public function __construct($_game, $cardDeck)
    {
        $this->_game = $_game;
        $this->_cards = $cardDeck->getCards();

    }

    /**
     * @return Game
     */
    public function getGame()
    {
        return $this->_game;
    }

    /**
     * Prints all cards in croupier deck
     */
    public function showCards()
    {
        foreach ($this->getCards() as $card) {
            echo "{$card->getLabel()} ";
        }
    }

    /**
     * @return array
     */
    public function getCards()
    {
        return $this->_cards;
    }

    /**
     * Shuffle game card deck
     */
    public function shuffleDeck()
    {
        shuffle($this->_cards);
        //check for cards still in sequence and re-arrange them
        for ($i = 1; $i < count($this->_cards); $i++) {
            /** @var Card $currentCard */
            $currentCard = $this->_cards[$i];
            /** @var Card $previousCard */
            $previousCard = $this->_cards[$i - 1];
            if ($previousCard->getPerfectSequencePosition() === $currentCard->getPerfectSequencePosition() - 1) {
                /** @var Card $firstCard */
                $firstCard = $this->_cards[0];
                unset($this->_cards[$i]);
                if ($firstCard->getPerfectSequencePosition() - 1 !== $currentCard->getPerfectSequencePosition()) {
                    array_unshift($this->_cards, $currentCard);
                } else {
                    unset($this->_cards[0]);
                    array_unshift($this->_cards, $currentCard);
                    array_unshift($this->_cards, $firstCard);
                }
            }
        }
    }

    /**
     * Deal cards to players
     */
    public function dealCards()
    {
        for ($i = 0; $i < $this->_game->getNumberOfCardsToDeal(); $i++) {
            /** @var Player $player */
            foreach ($this->_game->getPlayers() as $player) {
                $player->addCard(array_pop($this->_cards));
            }
        }
    }
}