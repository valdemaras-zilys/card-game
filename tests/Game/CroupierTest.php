<?php

namespace Vz\Test\Game;

use PHPUnit\Framework\TestCase;
use Vz\Game;
use Vz\Game\Croupier;

/**
 * Class CroupierTest
 * @package Vz\Test\Game
 */
class CroupierTest extends TestCase
{

    /** @var  Croupier */
    protected $_croupier;

    public function setUp()
    {
        $game = new Game();
        $this->_game = $game;
        $deck = new Game\Deck();
        $croupier = new Croupier($game, $deck);
        $this->_croupier = $croupier;

        parent::setUp();
    }

    /**
     * Shuffle game card deck
     */
    public function testShuffleDeck()
    {
        $failed = false;
        $runCount = 0;
        while (500 > $runCount++ && !$failed) {
            $this->_croupier->shuffleDeck();
            $cards = $this->_croupier->getCards();
            $this->assertEquals(52, count($cards));
            for ($i = 1; $i < 52; $i++) {
                /** @var Game\Deck\Card $currentCard */
                $currentCard = $cards[$i];
                /** @var Game\Deck\Card $previousCard */
                $previousCard = $cards[$i - 1];
                $this->assertNotEquals($previousCard->getPerfectSequencePosition(),
                    $currentCard->getPerfectSequencePosition() - 1,
                    "No 2 cards should be in sequence. Run Count: {$runCount}, card index:{$i}");
            }
        }
    }


    /**
     * Deal cards to players
     */
    public function testDealCards()
    {
        $this->_croupier->dealCards();
        $cards = $this->_croupier->getCards();
        $game = $this->_croupier->getGame();
        $this->assertEquals(24, count($cards));

        $players = $game->getPlayers();
        foreach ($players as $player) {
            $this->assertEquals(7, count($player->getCards()));
        }
    }
}
