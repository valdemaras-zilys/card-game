<?php

namespace Vz\Game\Deck;


class Card
{
    /** @var  string $_suit */
    protected $_suit;

    /** @var  int $_value */
    protected $_value;

    /** @var  string $_valueLabel */
    protected $_valueLabel;

    /** @var  string $_label */
    protected $_label;

    /** @var int $_perfectSequencePosition */
    protected $_perfectSequencePosition = 0;

    /**
     * Card constructor.
     * @param string $_suit
     * @param int $_value
     * @param string $_valueLabel
     * @param int $_perfectSequencePosition
     */
    public function __construct($_suit, $_value, $_valueLabel, $_perfectSequencePosition)
    {
        $this->_suit = $_suit;
        $this->_value = $_value;
        $this->_valueLabel = $_valueLabel;
        $this->_label = "[{$this->_suit} {$this->_valueLabel}]";
        $this->_perfectSequencePosition = $_perfectSequencePosition;
    }

    /**
     * @return string
     */
    public function getSuit()
    {
        return $this->_suit;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->_value;
    }

    /**
     * @return string
     */
    public function getLabel()
    {
        return $this->_label;
    }

    /**
     * @return int
     */
    public function getPerfectSequencePosition()
    {
        return $this->_perfectSequencePosition;
    }
}