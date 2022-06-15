<?php

namespace BlackJackGame;

require_once('User.php');
require_once('Deck.php');

class PlayerComputer extends User
{
  private const DRAW_STOR_SCORE_CPU = 21;
  public function action(): string
  {
    $action = self::SELECT_NO;
    if ($this->getHandScore() < self::DRAW_STOR_SCORE_CPU) {
      $action = self::SELECT_YES;
      echo $this->name . 'の現在の得点は' . $this->getHandScore() . 'です。' . PHP_EOL;
    }
    return $action;
  }
}
