<?php
namespace FormRule\traits;

use FormRule\components\InputNumber;

trait InputNumberFactoryTrait
{
    /**
     * 数字输入框组件
     *
     * @param string $field
     * @param string $title
     * @param null|number $value
     * @return InputNumber
     */
    public static function number($field, $title, $value = null)
    {
        return new InputNumber($field, $title, $value);
    }
}