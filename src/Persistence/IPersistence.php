<?php

namespace ImportFrame\Persistence;

use ImportFrame\Data\IData;

/**
 *
 * Interface IPersistence
 *
 * Describes the basic operation logic
 *
 * @author MishaK<mixapiy@yandex.ru>
 * @version 1.0
 * @package ImportFrame
 */
interface IPersistence
{
    /**
     * Basic work logic
     * @param IData $context
     * @return IData
     */
    function run(IData $context);
}