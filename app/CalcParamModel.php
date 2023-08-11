<?php

namespace App;

use JsonSerializable;

class CalcParamModel implements JsonSerializable {
    private int $val1;
    private int $val2;
    private string $kusoDekaString = '';

    public function __construct(int $val1, int $val2) {
        $this->val1 = $val1;
        $this->val2 = $val2;
        $this->kusoDekaString = bin2hex(random_bytes(100000)); // オーバーヘッドの確認のため、クソデカリクエストデータにする
    }

    public function jsonSerialize(): array
    {
        return get_object_vars($this);
    }

    public function lengthKusoDekaString(): int
    {
        return strlen($this->kusoDekaString);
    }
}
