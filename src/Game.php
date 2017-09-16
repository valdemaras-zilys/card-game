<?php

namespace Vz;

use Vz\Game\Player;

class Game
{
    const NUMBER_OF_PLAYERS = 4;
    const NUMBER_OF_CARDS_TO_DEAL = 7;

    protected $_players = array();

    /**
     * Game constructor.
     */
    public function __construct()
    {
        $this->_init();
    }

    protected function _init()
    {
        for ($i = 1; $i <= self::NUMBER_OF_PLAYERS; $i++) {
            $player = new Player("Player {$i}");
            $this->addPlayer($player);
        }
    }

    /**
     * @param Player $player
     */
    public function addPlayer(Player $player)
    {
        $this->_players[] = $player;
    }

    /**
     * @return array
     */
    public function getPlayers()
    {
        return $this->_players;
    }

    /**
     * @return int
     */
    public function getNumberOfCardsToDeal()
    {
        return self::NUMBER_OF_CARDS_TO_DEAL;
    }
}
