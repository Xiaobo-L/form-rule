<?php
namespace FormRule\traits;

use FormRule\components\Radio;

trait RadioFactoryTrait
{
    /**
     * 单选框组件
     *
     * @param string $field
     * @param string $title
     * @param mixed $value
     * @return Radio
     */
    public static function radio($field, $title, $value = '')
    {
        return new Radio($field, $title, $value);
    }
}