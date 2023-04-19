<?php
namespace FormRule\traits;

use FormRule\components\Checkbox;

trait CheckBoxFactoryTrait
{
    /**
     * 多选框组件
     *
     * @param string $field
     * @param string $title
     * @param array $value
     * @return Checkbox
     */
    public static function checkbox($field, $title, array $value = [])
    {
        return new Checkbox($field, $title, $value);
    }
}