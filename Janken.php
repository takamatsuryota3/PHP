<!--PHP-->
<?php
    // コンピューターの出し手
    // 0:グー
    // 1:チョキ
    // 2:パー
    $hands=["グー","チョキ","パー"];

    // プレイヤーの出し手
    if (isset($_POST["playerHand"])){
        // ラジオボタンが選択されている時
        $playerHand = $_POST["playerHand"];

        // コンピューターなので、ランダムに出す
        $key = array_rand($hands);
        $cpuHand = $hands[$key];

        // じゃんけんの結果処理
        // あいこの場合
        if ($playerHand == $cpuHand){
            $result = "あいこ";
        }
        // プレイヤーが勝つ場合
        //プレイヤーが「グー」で、コンピューターが「チョキ」
        else if ($playerHand == "グー" && $cpuHand=="チョキ"){
            $result = "勝ち";
        }
        //プレイヤーが「チョキ」で、コンピューターが「パー」
        else if ($playerHand == "チョキ" && $cpuHand =="パー"){
            $result ="勝ち";
        }
        //プレイヤーが「パー」で、コンピューターが「グー」
        else if ($playerHand == "パー" && $cpuHand =="グー"){
            $result ="勝ち";
        // それ以外（コンピューターが勝つ時）
        }else {
            $result ="負け";
        }
    }else {
        // ラジオボタンが選択されていない時
        $playerHand ="選択なし";
        $cpuHand ="選択なし";
        $result = "何も出していません。";
    }
?>
<!--HTML-->
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>じゃんけんゲーム</title>
</head>
<body>
    <!--タイトル-->
    <h1>じゃんけんゲーム</h1>
    <!--説明文-->
    <p>コンピューターとじゃんけん勝負しよう！！</p>
    <form method ="POST">
    <!--プレイヤーの出し手-->
    <label>
        <input type="radio" name="playerHand" value="グー">グー
    </label>
    <label>
        <input type="radio" name="playerHand" value="チョキ">チョキ
    </label>
    <label>
        <input type="radio" name="playerHand" value="パー">パー
    </label>
    <!--勝負ボタン-->
    <button type="submit">いざ勝負!!</button>
    </form>
    <!--結果-->
    <p>あなた：<?php echo $playerHand?></p>
    <p>コンピューター：<?php echo $cpuHand?></p>
    <p>結果：<?php echo $result?></p>
</body>
</html>
