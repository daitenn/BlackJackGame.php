<?php

namespace BlackJackGame;

require_once('BlackJackGame.php');
require_once('Player.php');
require_once('PlayerComputer.php');


$players = new Player('あなた');
$playerCpu1 = new PlayerComputer('CPU1');
$game = new BlackJackGame($players, $playerCpu1);
$game->start();
