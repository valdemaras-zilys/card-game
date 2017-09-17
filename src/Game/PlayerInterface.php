<?php

namespace Vz\Game;


/**
 * Interface PlayerInterface
 * @package Vz\Game
 */
interface PlayerInterface
{
    /**
     * Print card labels
     */
    public function showCards();

    /**
     * Append a card to player's card list.
     *
     * @param \Vz\Game\Deck\Card $card
     */
    public function addCard(\Vz\Game\Deck\Card $card);
}