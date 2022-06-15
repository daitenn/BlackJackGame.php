# ルール説明
オブジェクト指向でプログラムを作成した実績を作るのが目的です。

ブラックジャックはカジノで行われるカードゲームの一種です。1〜13までの数が書かれたカード52枚を使ってゲームが行われます。ルールは次の通りです。

実行開始時、ディーラーとプレイヤー全員に２枚ずつカードが配られる
自分のカードの合計値が21に近づくよう、カードを追加するか、追加しないかを決める
カードの合計値が21を超えてしまった時点で、その場で負けが確定する
プレイヤーはカードの合計値が21を超えない限り、好きなだけカードを追加できる
ディーラーはカードの合計値が17を超えるまでカードを追加する
各カードの点数は次のように決まっています。

2から9までは、書かれている数の通りの点数
10,J,Q,Kは10点
Aは1点あるいは11点として、手の点数が最大となる方で数える
このゲームには2人のプレイヤーがおり、ディーラー含めて3人でカードの合計値を競います。

# 静的解析ツール一覧

・PHP_CodeSniffer
・PHPMD
・PHPStan
・PHPUnit