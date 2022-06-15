<?php

namespace BlackJackGame;

require_once('User.php');
require_once('Deck.php');

class Dealer extends User
{
  private const SECOND_INDEX_NUMBER = 1;
  public function drawCard(Deck $deck, int $drawNum): void
  {
    $cards = $deck->drawCard($drawNum);
    foreach ($cards as $index => $card) {
      $this->addHand($card);
      if ($index === self::SECOND_INDEX_NUMBER) {
        echo $this->name . 'の引いた２枚目のカードは分かりません。' . PHP_EOL;
      }
      echo $this->name . 'の引いたカードは' . $card->getSuit() . 'の' . $card->getNumber() . 'です。' . PHP_EOL;
    }
  }

  public function action(): string
  {
    $hand = $this->getHand();
    if (count($hand) === 2) {
      echo $this->name . 'の引いた2枚目のカードは' . $hand[1]->getSuit() . 'の' . $hand[1]->getNumber() . PHP_EOL;
    }

    $action = self::SELECT_NO;
    if ($this->getHandScore() < 17) {
      $action = self::SELECT_YES;
      echo $this->name . 'の現在の得点は' . $this->getHandScore() . 'です' . PHP_EOL;
    }
    return $action;
  }
}
