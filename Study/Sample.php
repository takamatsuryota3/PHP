<?php
// 変数展開の確認
$program = "PHP";
echo "このプログラムは{$program}で書かれています。\n";

// var_dump
var_dump($program); // string(3) "PHP"
var_dump(1 == 1);   // bool(true)
var_dump(1 == 2);   // bool(false)
var_dump(1 < 2);      // bool(ture)
var_dump(1 <= 1);     // bool(true)
var_dump(1 > 2);      // bool(false)

// 型の比較
var_dump(1 === "1");    // bool(false)

// 条件分岐
$score = 89;
$result = "";
// 点数が70以上の場合
if ($score >= 70) {
    if ($score >= 90) {
        $result = "とても素晴らしい結果";
    } else {
        $result = "合格";
    }
} else {
    $result = "不合格";
}
// 結果を表示
echo "結果は、{$result}です。\n";

// 配列
$arr = ["Apple", "Orange", "Banana"];
echo "選んだ果物は{$arr[0]}です。\n";    // Apple

// 連想配列
$arr2 = ["key1" => "Apple", "key2" => "Orange"];
echo "選んだ果物は{$arr2["key2"]}です。\n";     // Orange

// 配列のループ処理
$arr3 = ["PHP", "Ruby", "Python"];
foreach ($arr3 as $lang) {
    echo "{$lang}はプログラミング言語です。\n";
}

// 連想配列のループ処理
$arr4 = ["key1" => "PHP", "key2" => "Python"];
foreach ($arr4 as $key => $val) {
    echo "{$key}には、{$val}が設定されています。\n";
}

// メソッド
// 点数判定
function testResult($score)
{
    if (!is_int($score)) {
        // ケース1:数値以外または、整数で入力されていない
        echo "点数は、整数で指定してください。\n";
    } else if ($score > 100) {
        // ケース2:スコアが100以上入力された場合
        echo "満点は100点です。点数入力を確認してください。\n";
    } else {
        // スコアの判定
        if ($score == 100) {
            // ケース3:満点の場合
            echo "満点です。おめでとうございます！\n";
        } else if ($score >= 90 && $score < 100) {
            // ケース4:90点台の場合
            echo "優秀です。あともう少しで満点です。\n";
        } else if ($score >= 70 && $score < 90) {
            // ケース5:70点から89点までの場合
            echo "合格です。引き続き高得点目指して頑張りましょう。\n";
        } else {
            // ケース6:70点未満の場合
            echo "不合格です。補習を受けてください。\n";
        }
    }
}

// メソッドの呼び出し
testResult("100");      // ケース1
testResult(98.2);       // ケース1
testResult(120);        // ケース2
testResult(100);        // ケース3
testResult(98);         // ケース4
testResult(71);         // ケース5
testResult(69);         // ケース6
