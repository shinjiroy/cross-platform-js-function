<?php

namespace App;

use RuntimeException;
use Exception;

class JsFunction
{
    public static function calc(CalcParamModel $param) : int
    {
        $path = '/calc';
        $result = self::exec($param, $path);
        return (int) $result;
    }

    private static function exec($param, string $path) : string
    {
        $jsfunctionHost = 'jsfunction'; // コンテナのホスト
        try {
            $ch = curl_init();
            curl_setopt_array($ch, [
                CURLOPT_URL => 'http://' . $jsfunctionHost . $path,
                CURLOPT_HEADER => false,
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => json_encode($param, JSON_UNESCAPED_SLASHES),
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HTTPHEADER => [
                    'Content-Type: application/json',
                ],
            ]);

            $responseStr = curl_exec($ch);
            if (curl_errno($ch) !== 0) {
                throw new RuntimeException('curl failed curl_errno: ' . curl_errno($ch) . ', curl_error:' . curl_error($ch));
            }

            return $responseStr;
        } catch (Exception $e) {
            throw $e;
        } finally {
            if ($ch) {
                curl_close($ch);
            }
        }
    }
}
