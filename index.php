<!--++++++++++++++++++PHP++++++++++++++++++++++++++++++++-->
<?php
// 初期設定
$year = "";  //年
$month = ""; // 月
$day = ""; // 日

// TODO 現在日付と指定した日付を取得できるように修正
$year = 2021;
$month = 7;
$day = 14;

// カレンダーのタイトルを作成する関数
function makeTitle($year, $month)
{
    return $year . "年" . $month . "月のカレンダー";
}

// テーブルを作成する関数
function makeTable($year, $month, $day)
{
    $table = "";    // テーブルの文字列
    $end_month = ""; //月末日
    $anyWeek = ['日', '月', '火', '水', '木', '金', '土'];   // 曜日の配列

    // 曜日部分のループ
    foreach ($anyWeek as $week) {
        $table .= "<th>" . $week . "</th>";   //  曜日を一つずつヘッダーに設定
    }

    // 日付のループ
    $table .= "<tr>";
    $day1 = 1;  // ループで使用する日（1日スタート）
    $end_month = date('t', mktime(0, 0, 0, $month + 1, 0, $year));  // 月末日の取得

    // 1日までの余白
    $wd1 = date('w', mktime(0, 0, 0, $month, 1, $year));  // 1日の曜日を取得
    for ($i = 1; $i <= $wd1; $i++) {
        $table .= "<td>　</td>";    // 1日の曜日まで空白をセット
    }

    // 日付部分
    while (checkdate($month, $day1, $year)) {
        // 現在日付の処理

        // その他の日付の処理
        $table .= "<td>$day1</td>";
        // 土曜日の場合の処理
        if (date('w', mktime(0, 0, 0, $month, $day1, $year)) == 6) {
            $table .= "</tr>";    // 日曜日始まりの為、土曜になったら、次の行に進む
            if (checkdate($month, $day1 + 1, $year)) {
                $table .= "<tr>"; // 次の日付が妥当な場合は、次の行を追加
            }
        }
        $day1++;    // 日付を1日進める
    }

    // 月末日からの余白
    $wd_end = date('w', mktime(0, 0, 0, $month, $end_month, $year)); // 月末日の曜日を取得
    for ($i = 1; $i <= 6 - $wd_end; $i++) {
        $table .= "<td>　</td>";    // 月末日の曜日から、土曜日までの日数分、空白をセット
    }
    // 連結した文字列を返す
    return $table;
}

// カレンダーのタイトル
$calendar_title = makeTitle($year, $month);

// カレンダーのテーブル
$calendar_date = makeTable($year, $month, $day);

?>
<!--++++++++++++++++++HTML+++++++++++++++++++++++++++++++-->
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>カレンダー</title>
</head>

<body>
    <main>
        <!--カレンダーのタイトル-->
        <p><?php echo $calendar_title ?></p>
        <form action="/" method="POST">
            <input type="hidden" name="nowYear" value="<?php echo $year ?>">
            <input type="hidden" name="nowMonth" value="<?php echo $month ?>">
            <input type="hidden" name="nowDay" value="<?php echo $day ?>">
        </form>
        <!--カレンダー表示-->
        <table class="calendar">
            <tr>
                <?php echo $calendar_date ?>
            </tr>
        </table>
    </main>
</body>

</html>
