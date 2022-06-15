<?php

namespace BlackJackGame;

require_once('Deck.php');
require_once('Hand.php');

abstract class User
{

  abstract function action(): string;

  public const SELECT_YES = 'Y';
  public const SELECT_NO = 'N';
  public const DRAW_HAND = 'draw';

  public Hand $hand;

  public function __construct(protected string $name)
  {
    $this->hand = new Hand();
  }

  public function drawCard(Deck $deck, int $drawNum): void
  {
    $cards = $deck->drawCard($drawNum);
    foreach ($cards as $card) {
      echo $this->name . 'の引いたカードは' . $card->getSuit() . 'の' . $card->getNumber() . 'です。' . PHP_EOL;
      $this->addHand($card);
    }
  }

  public function getName(): string
  {
    return $this->name;
  }

  public function addHand(Card $card): void
  {
    $this->hand->addHand($card);
  }

  public function getHand()
  {
    return $this->hand->getHand();
  }

  public function handScoreCalculate(): void
  {
    $this->hand->handScoreCalculate();
  }

  public function getHandScore(): int
  {
    return $this->hand->getHandScore();
  }

  public function selectYes(Deck $deck, int $drawNum): void
  {
    $this->drawCard($deck, $drawNum);
  }
}
