<?php

namespace BlackJackGame;

require_once('User.php');
require_once('Deck.php');

class Player extends User
{
  public function action(): string
  {
    echo 'あなたの現在の得点は' . $this->getHandScore() . '点です。カードを引きますか？（Y/N）' . PHP_EOL;

    return trim(fgets(STDIN));
  }
}
