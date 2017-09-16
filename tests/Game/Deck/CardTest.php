<?php

namespace Vz\Test\Game\Deck;

use PHPUnit\Framework\TestCase;
use Vz\Game\Deck\Card;

class CardTest extends TestCase
{
    /**
     * Data provider
     */
    public function getLabelDataProvider()
    {
        return [
            ['♥', 1, 'A'],
            ['♦', 6, '6'],
            ['♠', 8, '8'],
            ['♣', 13, 'K'],

        ];
    }

    /**
     *
     * @dataProvider getLabelDataProvider
     */
    public function testGetLabel($suit, $value, $valueLabel)
    {
        $card = new Card($suit, $value, $valueLabel, 0);
        $this->assertEquals("[{$suit} {$valueLabel}]", $card->getLabel());
    }

}
