<?php

namespace BlackJackGame;

require_once('Dealer.php');
require_once('Deck.php');
require_once('BlackJackHandEvaluator.php');


class BlackJackGame
{
  private const FIRST_DRAW_NUM = 2;
  private const CONTINUE_DRAW_CARD = 1;
  private const SELECT_YES = 'Y';
  private const SELECT_NO = 'N';
  private const DRAW_HAND = 'draw';

  private array $players;
  private Dealer $dealer;
  private Deck $deck;

  public function __construct(object ...$players)
  {
    $this->players = $players;
    $this->deck = new Deck();
    $this->dealer = new Dealer('ディーラー');
  }

  public function start(): void
  {
    echo 'ブラックジャックゲームを開始します。' . PHP_EOL;

    foreach ($this->players as $player) {
      $player->drawCard($this->deck, self::FIRST_DRAW_NUM);
    }

    $this->dealer->drawCard($this->deck, self::FIRST_DRAW_NUM);

    foreach ($this->players as $player) {
      $this->actionSelect($player);
    }
    $this->actionSelect($this->dealer);

    $handEvaluator = new BlackJackHandEvaluator();
    foreach ($this->players as $player) {
      echo '----------------------' . PHP_EOL;
      $winner = $handEvaluator->getWinner($player, $this->dealer);
      $this->showWinner($winner);
    }

    echo 'ブラックジャックゲームを終わります。' . PHP_EOL;
  }

  public function actionSelect(object $user): void
  {
    while (true) {
      $user->handScoreCalculate();
      if (BlackJackHandEvaluator::isBurst($user->getHandScore())) {
        break;
      }
      $action = $user->action();
      if ($action === self::SELECT_YES) {
        $user->selectYes($this->deck, self::CONTINUE_DRAW_CARD);
      } elseif ($action === self::SELECT_NO) {
        break;
      } else {
        echo 'YかNを選択してください。';
      }
    }
  }

  public function showWinner(string $winner): void
  {
    if ($winner === self::DRAW_HAND) {
      echo '引き分けです。' . PHP_EOL;
    } else {
      echo $winner . 'の勝ちです。' . PHP_EOL;
    }
  }
}
