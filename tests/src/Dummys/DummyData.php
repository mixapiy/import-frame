<?php

namespace ImportFrameTest\Dummys;

use ImportFrame\Data\IData;

class DummyData implements IData
{
    protected $val;
    function __construct($val)
    {
        $this->val =$val;
    }

}