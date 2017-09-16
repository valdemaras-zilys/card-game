<?php

namespace Vz\Game;


/**
 * Interface CroupierInterface
 * @package Vz\Test\Game
 */
interface CroupierInterface
{

    /**
     * Shuffle game card deck
     */
    public function shuffleDeck();

    /**
     * Deal cards to players
     */
    public function dealCards();
}