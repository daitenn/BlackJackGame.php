<?php

namespace BlackJackGame;

require_once('Card.php');

class Hand
{
  private int $handScore = 0;
  private array $hand = [];

  public function addHand(Card $card): void
  {
    $this->hand[] = $card;
  }

  public function getHand(): array
  {
    return $this->hand;
  }

  public function handScoreCalculate(): void
  {
    $this->handScore = 0;
    foreach ($this->hand as $card) {
      if ($card->getNumber() === 'A') {
        $this->handScore += (int) $card->getRankA($this->handScore);
      } else {
        $this->handScore += (int) $card->getRank();
      }
    }
  }

  public function getHandScore(): int
  {
    return $this->handScore;
  }
}
