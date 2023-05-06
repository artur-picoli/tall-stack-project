<?php

namespace App\View\Components;

use WireUi\View\Components\Inputs\BaseMaskable;

class inputCpf extends BaseMaskable
{
    protected function getInputMask(): string
    {
        return "['###.###.###-##']";
    }
}
