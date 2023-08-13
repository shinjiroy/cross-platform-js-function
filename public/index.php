<?php

require_once '../vendor/autoload.php';

use App\JsFunction;
use App\CalcParamModel;

ini_set('error_log', 'php://stderr');
error_reporting(E_ALL);

try {
    $param = new CalcParamModel($_GET['val1'] ?? 0, $_GET['val2'] ?? 0);

    // PHPで実行する時とjsfunctionコンテナ経由で実行させる時の処理時間の差を見たい
    // 通信する分、どれだけオーバーヘッドがあるかはリクエスト、レスポンスのデータ量にもよるだろう。

    $time_start = microtime(true);
    // jsfunctionコンテナでやってる処理と同じ処理をする
    // jsfunctionコンテナではkusoDekaStringの長さを測る処理と、val1+val2の計算をしている。
    ($_GET['val1'] ?? 0) + ($_GET['val2'] ?? 0);
    $param->lengthKusoDekaString();
    $timePHP = microtime(true) - $time_start;
    error_log($timePHP . 'sec for calc by PHP');

    $time_start = microtime(true);
    $result = JsFunction::calc($param);
    $timeJsfunction = microtime(true) - $time_start;
    error_log($timeJsfunction . 'sec for calc by jsfunction');

    // データ量増える事によるコンテナ間通信によるオーバーヘッドはそれほど差が無さそう。
    error_log('difference between jsfunction and PHP : ' . ($timeJsfunction - $timePHP));

} catch (Throwable $e) {
    error_log($e);
    http_response_code(500);
    echo 'server error';
    exit;
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8" />
    <title>cross-platform-js-function</title>
    <script src="build/js/app.js" defer></script>
</head>
<body>
    <div><span>サーバー側での結果:</span><span><?php echo $result; ?></span></div>
    <div><span>ブラウザ側での結果:</span><span id="result"></span></div>
</body>
</html>
