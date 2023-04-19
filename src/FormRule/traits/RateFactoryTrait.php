<?php
namespace FormRule\traits;

use FormRule\components\Rate;

trait RateFactoryTrait
{
    /**
     * 评分选择组件
     *
     * @param string $field
     * @param string $title
     * @param int|float $value
     * @return Rate
     */
    public static function rate($field, $title, $value = 0)
    {
        return new Rate($field, $title, (float)$value);
    }
}