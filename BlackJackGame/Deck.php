<?php

namespace BlackJackGame;

require_once('Card.php');

class Deck
{
  private $cards = [];

  private const CARD_SUIT_NUMBER = ['クラブ', 'ハート', 'スペード', 'ダイヤ'];
  private const CARD_NUMBER = ['2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'Q', 'K', 'A'];

  public function __construct()
  {
    foreach (self::CARD_SUIT_NUMBER as $suit) {
      foreach (self::CARD_NUMBER as $number) {
        $this->cards[] = new Card($suit, $number);
      }
    }
    $this->shuffles();
  }

  public function drawCard(int $drawNum): array
  {
    return array_splice($this->cards, 0, $drawNum);
  }

  private function shuffles()
  {
    shuffle($this->cards);
  }
}
