<?php

namespace App;

use JsonSerializable;

class CalcParamModel implements JsonSerializable {
    private int $val1;
    private int $val2;

    public function __construct(int $val1, int $val2) {
        $this->val1 = $val1;
        $this->val2 = $val2;
    }

    public function jsonSerialize(): array
    {
        return get_object_vars($this);
    }
}
