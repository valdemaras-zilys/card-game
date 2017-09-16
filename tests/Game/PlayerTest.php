<?php

namespace Vz\Test\Game;

use PHPUnit\Framework\TestCase;
use Vz\Game\Deck\Card;
use Vz\Game\Player;

class PlayerTest extends TestCase
{


    public function testAddCard()
    {
        $player = new Player('Test Player');
        $this->assertEmpty($player->getCards(), 'Expected number of cards for new player is 0');
        $player->addCard(new Card('♥', 1, 'A', 1));
        $this->assertEquals(1, count($player->getCards()), 'Expected number of cards is 1');
    }
}
