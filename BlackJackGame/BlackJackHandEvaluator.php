<?php

namespace BlackJackGame;

class BlackJackHandEvaluator
{
  private const BURST_SCORE = 22;
  private const BLACK_JACK_SCORE = 21;

  public function getWinner(User $player, Dealer $dealer): string
  {
    $playerNumber = $player->getHandScore();
    $playerName = $player->getName();
    $dealerNumber = $dealer->getHandScore();
    $dealerName = $dealer->getName();

    echo $playerName . 'の得点は' . $playerNumber . 'です' . PHP_EOL;
    echo $dealerName . 'の得点は' . $dealerNumber . 'です' . PHP_EOL;

    $winner = 'draw';

    if ($this->isBurst($playerNumber)) {
      $winner = $dealerName;
    }

    if ($this->isBurst($dealerNumber)) {
      $winner = $playerName;
    }

    if ($this->playerWinner($playerNumber, $dealerNumber)) {
      $winner = $playerName;
    }

    if ($this->dealerWinner($playerNumber, $dealerNumber)) {
      $winner = $dealerName;
    }

    if ($this->isDraw($playerNumber, $dealerNumber)) {
      $winner = 'draw';
    }

    if ($this->isBurstDraw($playerNumber, $dealerNumber)) {
      $winner = 'draw';
    }
    return $winner;
  }

  public static function isBurst(int $score): bool
  {
    return $score >= self::BURST_SCORE;
  }

  public function playerWinner(int $playerNumber, int $dealerNumber): bool
  {
    return (self::BLACK_JACK_SCORE - $playerNumber) < (self::BLACK_JACK_SCORE - $dealerNumber);
  }

  public function dealerWinner(int $playerNumber, int $dealerNumber): bool
  {
    return (self::BLACK_JACK_SCORE - $playerNumber) > (self::BLACK_JACK_SCORE - $dealerNumber);
  }

  public function isDraw(int $playerNumber, int $dealerNumber): bool
  {
    return $playerNumber === $dealerNumber;
  }

  public function isBurstDraw(int $playerNumber, int $dealerNumber): bool
  {
    return ($playerNumber >= self::BURST_SCORE) && ($dealerNumber >= self::BURST_SCORE);
  }
}
