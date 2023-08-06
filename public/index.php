<?php

require_once '../vendor/autoload.php';

use App\JsFunction;
use App\CalcParamModel;

ini_set('error_log', 'php://stderr');
error_reporting(E_ALL);

try {
    $param = new CalcParamModel($_GET['val1'] ?? 0, $_GET['val2'] ?? 0);
    $result = JsFunction::calc($param);
} catch (Throwable $e) {
    error_log($e);
    http_response_code(500);
    echo 'server error';
}
?>

<!doctype html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>cross-platform-js-function</title>
    <script src="build/browser/main.js"></script>
    <script src="build/functions/calc.js"></script>
</head>
</html>
